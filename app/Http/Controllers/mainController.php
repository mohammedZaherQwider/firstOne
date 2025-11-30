<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Content;
use App\Models\Country;
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
        $hostpials = Hospital::select('id', 'name', 'img', 'country_id', 'city_id')->with('ratings')->get();
        // $ratings = Rating::select('user_id', 'type', 'type_id', 'rating', 'date', 'comment')->get();
        $doctors = Doctor::with(['nationalitie', 'ratings'])->get();
        $offers = Offer::all();
        $contents = Content::all();
        return view('front_end.index', compact('specializations', 'hostpials', 'doctors', 'offers', 'contents'));
    }
    function hostpial(Request $request)
    {
        $query = Hospital::with('ratings');
        $specializations = Specialization::select('id', 'name')->get();
        $countries = Country::select('id', 'name')->get();
        $cities = City::select('id', 'name')->get();

        if ($request->filled('hospital_name')) {
            $query->where('name', 'like', '%' . $request->hospital_name . '%');
        }

        if ($request->filled('city_id')) {
            $query->where('city_id', $request->city_id);
        }

        if ($request->filled('specialization_id')) {
            $query->where('specialization_id', $request->specialization_id);
        }

        $hostpials = $query->paginate(5)->appends(request()->query());
        return view('front_end.hospitals', compact('hostpials', 'specializations', 'countries', 'cities'));
    }
    function hostpial_details(Hospital $hostpial)
    {
        $hostpial->load(['ratings', 'country', 'city', 'specializations']);
        $hostpials = Hospital::select('id', 'name', 'img', 'country_id', 'city_id')
            ->withAvg('ratings', 'rating')
            ->orderByDesc('ratings_avg_rating')
            ->take(3)
            ->get();
        return view('front_end.hospital-details', compact('hostpial', 'hostpials'));
    }
    function profile()
    {
        $countries = Country::select('id', 'name')->get();
        return view('front_end.profile', compact('countries'));
    }
}
