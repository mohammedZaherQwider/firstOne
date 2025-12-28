<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::with('country')->get();
        return view('back_end.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd("dd");
        $countries = Country::select('id', 'name')->get();
        return view('back_end.cities.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

        $data = $request->only(['name', 'country_id']);

        if ($request->id) {
            $city = City::findOrFail($request->id);
            $city->update($data);
            $msg = 'City updated successfully';
        } else {
            $city = City::create($data);
            $msg = 'City created successfully';
        }

        return redirect()->route('cities.index')->with([
            'status' => 'success',
            'msg'    => $msg,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $countries = Country::select('id', 'name')->get();
        return view('back_end.cities.create', compact('city', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();

        return response()->json([
            'status' => 'success',
            'msg'    => 'City deleted successfully',
        ]);
    }
}
