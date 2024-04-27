<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable= [
        'first_name',
        'last_name',
        'email',
        'position',
    ];
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucwords($value);
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucwords($value);
    }

    public function getFirstNameAttribute($value)
    {
        return ucwords($value);
    }

    public function getLastNameAttribute($value)
    {
        return ucwords($value);
    }
   
    public function projects()
    {
        return $this->belongsToMany(Project::class);

    }

      public function department()
    {
        return $this->belongTo(Department::class);

    }
    public function notes()
    {
        return $this->morphMany(Note::class,'notable');
    }
 
       
}
