<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;
    protected $guarded = [];

    function user()
    {
        return $this->belongsTo(user::class);
    }
    function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
    function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
      function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }
}
