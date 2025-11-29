<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $guarded = [];

    function user()
    {
        return $this->belongsTo(User::class);
    }
    public function hospital()
    {
        return $this->morphTo();
    }
    public function doctor()
    {
        return $this->morphTo();
    }
}
