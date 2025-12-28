<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        return view('back_end.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back_end.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:countries,name',
        ]);

        $data = $request->only(['name']);

        if ($request->id) {
            $country = Country::findOrFail($request->id);
            $country->update($data);
            $msg = 'Country updated successfully';
        } else {
            $country = Country::create($data);
            $msg = 'Country created successfully';
        }

        return redirect()->route('countries.index')->with([
            'status' => 'success',
            'msg' => $msg,
            'data' => $country
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view('back_end.countries.create', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return response()->json([
            'status' => 'success',
            'msg' => 'Country deleted successfully',
            'data' => $country
        ]);
    }
}
