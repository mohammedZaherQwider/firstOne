<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $guarded = [];


    function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
    function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
