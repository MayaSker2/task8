<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\SoftDelete;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory,SoftDelete;
    protected $fillable= [
        'department_name',
        'department_id',
        'description',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function notes()
    {
        return $this->morphMany(Note::class,'notable');
    }
}
