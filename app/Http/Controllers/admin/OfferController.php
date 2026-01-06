<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Offer;
use App\Models\Specialization;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::with(['doctor', 'hospital', 'specialization'])->get();
        return view('back_end.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::select('id', 'name')->get();
        $hospitals = Hospital::select('id', 'name')->get();
        $specializations = Specialization::select('id', 'name')->get();
        return view('back_end.offers.create', compact('doctors', 'hospitals', 'specializations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'discount_value' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'doctor_id' => 'required|exists:doctors,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'specialization_id' => 'required|exists:specializations,id',
        ]);

        $data = $request->only(['name', 'discount_value', 'price', 'doctor_id', 'hospital_id', 'specialization_id']);

        if ($request->id) {
            $offer = Offer::findOrFail($request->id);
            $offer->update($data);
            if ($request->has('uploaded_images')) {
                $images = array_filter($request->uploaded_images);
                foreach ($images as $filename) {
                    $offer->image()->create([
                        'image' => $filename
                    ]);
                }
            }
            $msg = 'Offer updated successfully';
        } else {
            $offer = Offer::create($data);
            // dd($offer->image());
           if ($request->has('uploaded_images')) {
                $images = array_filter($request->uploaded_images);
                foreach ($images as $filename) {
                    $offer->image()->create([
                        'image' => $filename
                    ]);
                }
            }
            $msg = 'Offer created successfully';
        }

        return redirect()->route('offers.index')->with([
            'status' => 'success',
            'msg' => $msg,
            'data' => $offer
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        $offer = Offer::findOrFail($offer->id);
        $doctors = Doctor::select('id', 'name')->get();
        $hospitals = Hospital::select('id', 'name')->get();
        $specializations = Specialization::select('id', 'name')->get();

        return view('back_end.offers.create', compact('offer', 'doctors', 'hospitals', 'specializations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        $offer = Offer::findOrFail($offer->id);
        $offer->delete();
        return response()->json([
            'status' => 'success',
            'msg' => 'Offer deleted successfully',
            'data' => $offer
        ]);
    }
}
