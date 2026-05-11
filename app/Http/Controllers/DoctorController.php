<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('specialist')->get();
        return response()->json($doctors, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'phone'          => 'required|string|max:20',
            'license_number' => 'required|string|unique:doctors,license_number',
            'specialist_id'  => 'required|exists:specialists,id',
        ]);

        $doctor = Doctor::create($request->all());
        return response()->json($doctor->load('specialist'), 201);
    }

    public function show(string $id)
    {
        $doctor = Doctor::with('specialist')->find($id);
        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }
        return response()->json($doctor, 200);
    }

    public function update(Request $request, string $id)
    {
        $doctor = Doctor::find($id);
        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        $request->validate([
            'name'           => 'sometimes|required|string|max:255',
            'phone'          => 'sometimes|required|string|max:20',
            'license_number' => 'sometimes|required|string|unique:doctors,license_number,' . $id,
            'specialist_id'  => 'sometimes|required|exists:specialists,id',
        ]);

        $doctor->update($request->all());
        return response()->json($doctor->load('specialist'), 200);
    }

    public function destroy(string $id)
    {
        $doctor = Doctor::find($id);
        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        $doctor->delete();
        return response()->json(['message' => 'Doctor deleted successfully'], 200);
    }
}