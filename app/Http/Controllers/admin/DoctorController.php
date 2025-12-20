<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Image;
use App\Models\Nationalitie;
use App\Models\Specialization;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::orderBy('id', 'desc')->get();

        return view('back_end.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        // return $user->hasPermissionTo('Show all Doctors') ? 'true' : 'false';
        $specializations = Specialization::all();
        $nationalitys = Nationalitie::all();
        $hospitals = Hospital::all();
        return view('back_end.doctors.create', compact('nationalitys', 'specializations', 'hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required |string',
            'specialization_id' => 'required|exists:specializations,id',
            'nationality_id' => 'required|exists:nationalities,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'gender' => 'required|in:male,female',
            'bio' => 'required | string',
        ]);
        // $doctor = Doctor::Create($request->all());
        $doctor = Doctor::Create(
            [
                'name' => $request->name,
                'specialization_id' => $request->specialization_id,
                'nationality_id' => $request->nationality_id,
                'hospital_id' => $request->hospital_id,
                'gender' => $request->gender,
                'bio' => $request->bio,
            ]
        );
        if ($request->has('uploaded_images')) {
            $images = array_filter($request->uploaded_images);
            foreach ($images as $filename) {
                $doctor->image()->create([
                    'image' => $filename
                ]);
            }
        }
        return redirect()->route('doctors.index')
            ->with('mas',  'Doctor added .')
            ->with('icon', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $doctor = Doctor::findOrFail($doctor->id);
        $specializations = Specialization::all();
        $nationalitys = Nationalitie::all();
        $hospitals = Hospital::all();
        return view('back_end.doctors.create', compact('doctor', 'specializations', 'nationalitys', 'hospitals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required |string',
            'specialization_id' => 'required|exists:specializations,id',
            'nationality_id' => 'required|exists:nationalities,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'gender' => 'required|in:male,female',
            'bio' => 'required | string',
        ]);
        $doctor->update([
            'name' => $request->name,
            'specialization_id' => $request->specialization_id,
            'nationality_id' => $request->nationality_id,
            'hospital_id' => $request->hospital_id,
            'gender' => $request->gender,
            'bio' => $request->bio,
        ]);
        // if ($request->has('uploaded_images')) {

        //     if ($doctor->image) {
        //         $doctor->image()->delete();
        //     }

        //     $images = array_filter($request->uploaded_images);
        //     // dd($images);
        //     $doctor->image()->create([
        //         'image' => $images[0]
        //     ]);
        // }
        return redirect()->route('doctors.index')
            ->with('mas', 'Doctor updated.')
            ->with('icon', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotel = Doctor::findorFail($id);
        $hotel->delete();
        return $hotel;
    }
    function pdf()
    {
        $data = Doctor::all();
        $pdf = Pdf::loadView('back_end.doctors.pdf', compact('data'));
        return $pdf->download('invoice.pdf');
    }
}
