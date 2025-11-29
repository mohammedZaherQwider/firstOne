<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $guarded = [];

    function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }
    function country()
    {
        return $this->belongsTo(Country::class);
    }
    function city()
    {
        return $this->belongsTo(City::class);
    }
    function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
    function offers()
    {
        return $this->hasMany(Offer::class);
    }
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'ratable');
    }
}
