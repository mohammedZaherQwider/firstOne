<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospitals = Hospital::orderBy('id', 'desc')->get();
        $countries = Country::all();
        $cities = City::all();
        return view('back_end.hospitals.index', compact('hospitals', 'countries', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'bed_number' => 'required|integer',
            'description' => 'required',
            'services.*.name' => 'required|string',
            'services.*.type' => 'required|in:in,out',
            'services.*.icon' => 'required|string',
        ]);

        $hospital = Hospital::create($request->all());

        return response()->json([
            'status' => 'success',
            'msg' => 'Hospital created successfully',
            'data' => $hospital
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospital $hospital)
    {
        $hospital = Hospital::findOrFail($hospital->id);
        require view('back_end.hospitals.index', compact('hospital'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hospital $hospital) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
    function pdf() {}
    public function getCities($country_id)
    {
        $cities = City::where('country_id', $country_id)->get();
        return response()->json($cities);
    }
}
