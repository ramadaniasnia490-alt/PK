<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    public function index()
    {
        $specialists = Specialist::all();
        return response()->json($specialists, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $specialist = Specialist::create($request->all());
        return response()->json($specialist, 201);
    }

    public function show(string $id)
    {
        $specialist = Specialist::find($id);
        if (!$specialist) {
            return response()->json(['message' => 'Specialist not found'], 404);
        }
        return response()->json($specialist, 200);
    }

    public function update(Request $request, string $id)
    {
        $specialist = Specialist::find($id);
        if (!$specialist) {
            return response()->json(['message' => 'Specialist not found'], 404);
        }

        $request->validate([
            'name'        => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $specialist->update($request->all());
        return response()->json($specialist, 200);
    }

    public function destroy(string $id)
    {
        $specialist = Specialist::find($id);
        if (!$specialist) {
            return response()->json(['message' => 'Specialist not found'], 404);
        }

        $specialist->delete();
        return response()->json(['message' => 'Specialist deleted successfully'], 200);
    }
}