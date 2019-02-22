<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'title'
    ];

    protected $attributes = [

    ];

    protected $defaultColumns = [
        'id',
        'title'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
