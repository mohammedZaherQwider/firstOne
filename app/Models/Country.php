<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded = [];


    function cities()
    {
        return $this->hasMany(City::class);
    }
     function users()
    {
        return $this->hasMany(User::class);
    }
    function hostpials()
    {
        return $this->hasMany(Hostpials::class);
    }
}
