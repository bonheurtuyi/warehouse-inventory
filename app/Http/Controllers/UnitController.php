<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;

class UnitController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $units = Unit::all();

        return view('admin.units.index')
            ->with(["units"=>$units]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnitRequest $request)
    {
        Unit::create($request->validated());

        session()->flash('status', 'Unit added successfully!');
        return redirect()->route('units.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($unit)
    {
        $unit = Unit::find($unit);
        return view('admin.units.edit')
            ->with(["unit"=>$unit]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitRequest $request, $unit)
    {
        $unit = Unit::find($unit);
        $validated = $request->validated();
        $unit->update($validated);

        session()->flash('status', 'Unit updated successfully!');
        return redirect()->route('units.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($unitId)
    {
        $unit = Unit::findOrFail($unitId);
        $unit->delete();

        session()->flash('status', 'unit deleted successfully');
        return redirect()->back();
    }
}
