<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 'last_name', 'image', 'status', 'position', 'short_description', 'detailed_description'
    ];
}