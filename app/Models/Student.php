<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'name_surname',
        'birthday',
        'phone_number'
    ];

    protected $attributes = [

    ];

    protected $defaultColumns = [
        'id',
        'name_surname',
        'birthday',
        'phone_number'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
