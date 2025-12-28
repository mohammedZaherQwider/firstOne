<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specializations = Specialization::all();
        return view('back_end.specializations.index', compact('specializations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back_end.specializations.create');
    }

    /**
     * Store a newly created resource in storage.
     * Handles both create and update.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = $request->only(['name']);

        if ($request->id) {
            $specialization = Specialization::findOrFail($request->id);
            $specialization->update($data);
            $msg = 'Specialization updated successfully';
        } else {
            $specialization = Specialization::create($data);
            $msg = 'Specialization created successfully';
        }

        return redirect()->route('specializations.index')->with([
            'status' => 'success',
            'msg'    => $msg,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialization $specialization)
    {
        return view('back_end.specializations.show', compact('specialization'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialization $specialization)
    {
        return view('back_end.specializations.create', compact('specialization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specialization $specialization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialization $specialization)
    {
        $specialization->delete();

        return response()->json([
            'status' => 'success',
            'msg'    => 'Specialization deleted successfully',
        ]);
    }
}
