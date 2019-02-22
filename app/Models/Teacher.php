<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'name_surname',
        'birthday',
        'phone_number',
        'academic_degree'
    ];

    protected $attributes = [

    ];

    protected $defaultColumns = [
        'id',
        'name_surname',
        'birthday',
        'phone_number',
        'academic_degree'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
