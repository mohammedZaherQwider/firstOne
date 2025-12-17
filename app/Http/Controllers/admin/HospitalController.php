<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Hospital;
use App\Models\Image;
use App\Models\localization\Hospitellocalization;
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
            'id' => 'nullable|exists:hospitals,id',
            'name' => 'required|string',
            'nameAr' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'bed_number' => 'required|integer',
            'description' => 'required',
            'descriptionAr' => 'required',
            'services.*.name' => 'required|string',
            'services.*.type' => 'required|in:in,out',
            'services.*.icon' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'bed_number' => $request->bed_number,
            'description' => $request->description,
            'services' => $request->services,
        ];

        if ($request->id) {
            $hospital = Hospital::findOrFail($request->id);
            $hospitallocalization = Hospitellocalization::findOrFail($hospital->localization->id);
            $hospital->update($data);
            $localization = [
                'name' => $request->nameAr,
                'description' => $request->descriptionAr,
                'hospital_id' => $hospital->id,
            ];
            $hospitallocalization->update($localization);
            $msg = 'Hospital updated successfully';
        } else {
            $hospital = Hospital::create($data);
            $localization = [
                'name' => $request->nameAr,
                'description' => $request->descriptionAr,
                'hospital_id' => $hospital->id,
            ];
            $hospitallocalization = Hospitellocalization::create($localization);
            $msg = 'Hospital created successfully';
        }
        return response()->json([
            'status' => 'success',
            'msg' => $msg,
            'data' => $hospital
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital)
    {
        $hospital = Hospital::findOrFail($hospital->id);
        return view('back_end.hospitals.show', compact('hospital'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hospital = Hospital::findOrFail($id);
        return response()->json($hospital);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hospital $hospital) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hospital = Hospital::findorFail($id);
        $hospitallocalization = Hospitellocalization::findorFail($id);
        $hospital->delete();
        $hospitallocalization->delete();
        return $hospital;
    }
    function pdf() {}
    public function getCities($country_id)
    {
        $cities = City::where('country_id', $country_id)->get();
        return response()->json($cities);
    }
    function uploadImage(Request $request)
    {
        $request->validate([
            'uploaded_images' => 'required|array',
            'uploaded_images.*' => 'required|string',
            'hospital_id' => 'required|exists:hospitals,id'
        ]);
        $hospital = Hospital::findOrFail($request->hospital_id);
        foreach ($request->uploaded_images as $filename) {
            $hospital->images()->create([
                'image' => $filename
            ]);
        }

        return redirect()->route('hospitals.edit', $hospital->id);
    }
}
