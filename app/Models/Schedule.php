<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';

    protected $fillable = [
        'course_id',
        'week_day',
        'start',
        'end'
    ];

    protected $attributes = [

    ];

    protected $defaultColumns = [
        'course_id',
        'week_day',
        'start',
        'end'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
