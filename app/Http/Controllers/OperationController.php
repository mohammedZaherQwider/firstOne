<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Operation;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operations = Operation::all();
        return view('back_end.operations.index', compact('operations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hospitals =    Hospital::all();
        $doctors =    Doctor::all();
        $specializations =    Specialization::all();
        return  view('back_end.operations.create', compact('hospitals', 'doctors', 'specializations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'id_patient' => 'required|integer',
            'specialization_id' => 'required|exists:specializations,id',
            'doctor_id' => 'required|exists:doctors,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'operation_name' => 'required|string',
            'operation_date' => 'required|date',
            'operation_date_time' => 'required',
            'operation_schedule' => 'required|integer|min:1',
            'status' => 'required|string',
            'price' => 'nullable|numeric',
            'currency' => 'required|string',
            'pay' => 'nullable|boolean',
            'report' => 'nullable|string',
        ]);

        $data = [
            'name' => $request->name,
            'user_id' => 1,
            'id_patient' => $request->id_patient,
            'specialization_id' => $request->specialization_id,
            'doctor_id' => $request->doctor_id,
            'hospital_id' => $request->hospital_id,
            'operation_name' => $request->operation_name,
            'operation_date' => $request->operation_date,
            'operation_date_time' => $request->operation_date_time,
            'operation_schedule' => $request->operation_schedule,
            'status' => $request->status,
            'price' => $request->price,
            'currency' => $request->currency,
            'pay' => $request->has('pay') ? 1 : 0,
            'report' => $request->report,
        ];

        if ($request->id) {
            $operation = Operation::findOrFail($request->id);
            $operation->update($data);
            return redirect()->back()->with('success', 'Operation Updated Successfully');
        }

        Operation::create($data);

        return redirect()->back()->with('success', 'Operation Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Operation $operation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operation $operation)
    {
        $hospitals =    Hospital::all();
        $doctors =    Doctor::all();
        $specializations =    Specialization::all();
        $operation = Operation::findOrFail($operation->id);
        return view('back_end.operations.create', compact('hospitals', 'doctors', 'specializations', 'operation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Operation $operation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operation $operation)
    {
        $operation = Operation::findorFail($operation->id);
        $operation->delete();
        return $operation;
    }
}
