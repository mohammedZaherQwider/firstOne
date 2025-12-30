<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;
    protected $guarded = [];

    function hostpials()
    {
        return $this->belongsToMany(Hospital::class);
    }
    function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
    function offers()
    {
        return $this->hasMany(Offer::class);
    }
    function operations()
    {
        return $this->hasMany(Operation::class);
    }
   function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
