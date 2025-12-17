<?php

namespace App\Models\localization;

use App\Models\Hospital;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitellocalization extends Model
{
    use HasFactory;
    protected $guarded = [];

    function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
