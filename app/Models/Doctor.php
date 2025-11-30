<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $guarded = [];


    function nationalitie()
    {
        return $this->belongsTo(Nationalitie::class, 'nationality_id');
    }
    function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }
    function hostpial()
    {
        return $this->belongsTo(Hospital::class);
    }
    function offers()
    {
        return $this->hasMany(Offer::class);
    }
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'ratable');
    }
    function operations()
    {
        return $this->hasMany(Operation::class);
    }
}
