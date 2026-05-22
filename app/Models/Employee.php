<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
    'name',
    'basic_salary',
    'bonus',
    'deduction',
    'user_id',
];
}


