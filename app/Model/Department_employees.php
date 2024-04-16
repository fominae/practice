<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department_employees extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'department_id',
        'employeer_id'
    ];

}
