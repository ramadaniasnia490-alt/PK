<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'license_number',
        'specialist_id',
    ];

    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }
}