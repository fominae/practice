<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'departmen_type_id',
        'title',
        'number_staff'
    ];

}
