<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Offer;
use App\Models\Rating;
use App\Models\Specialization;
use Illuminate\Http\Request;

class mainController extends Controller
{
    function index()
    {
        $specializations = Specialization::select('name', 'img')->get();
        $hostpials = Hospital::select('id','name', 'img', 'country_id', 'city_id')->with('ratings')->get();
        // $ratings = Rating::select('user_id', 'type', 'type_id', 'rating', 'date', 'comment')->get();
        $doctors = Doctor::select('id','name', 'specialization_id', 'nationality_id', 'hostpials_id', 'gender', 'img','bio')->with(['nationalitie','ratings'])->get();
        $offers = Offer::select('id','name', 'discount_value', 'price', 'doctor_id', 'hospital_id', 'specialization_id')->with(['specialization','hospital','doctor'])->get();
        return view('front_end.index', compact('specializations', 'hostpials','doctors','offers'));
    }
}
