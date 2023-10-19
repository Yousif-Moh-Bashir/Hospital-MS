<?php

namespace App\Repository\Ambulance;

use App\Models\Ambulance;
use App\Interface\Ambulance\AmbulanceRepositoryInterface;

class AmbulanceRepository implements AmbulanceRepositoryInterface
{
    public function index()
    {
        $ambulances = Ambulance::all();
        return view('dashboard.ambulances.index',compact('ambulances'));
    }


    public function create()
    {
        return view('dashboard.ambulances.create');
    }


    public function store($request)
    {
        $ambulances = new Ambulance();
        $ambulances->car_number = $request->car_number;
        $ambulances->car_model = $request->car_model;
        $ambulances->car_year_made = $request->car_year_made;
        $ambulances->driver_license_number = $request->driver_license_number;
        $ambulances->driver_phone = $request->driver_phone;
        $ambulances->is_available = 1;
        $ambulances->car_type = $request->car_type;
        $ambulances->save();

        //insert trans
        $ambulances->driver_name = $request->driver_name;
        $ambulances->notes = $request->notes;
        $ambulances->save();
        session()->flash('add');
        return redirect()->route('ambulance.index');
    }


    public function edit($id)
    {
        $ambulance = Ambulance::findOrFail($id);
        return view('dashboard.ambulances.edit',compact('ambulance'));
    }


    public function update($request)
    {
        if (!$request->has('is_available'))
            $request->request->add(['is_available' => 0]);
        else
            $request->request->add(['is_available' => 1]);
            $ambulance = Ambulance::findOrFail($request->id);
            
            $ambulance->update($request->all());

        // insert trans
        $ambulance->driver_name = $request->driver_name;
        $ambulance->notes = $request->notes;
        $ambulance->save();
        session()->flash('edit');
        return redirect()->route('ambulance.index');
    }

    public function destroy($request)
    {
        Ambulance::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('ambulance.index');
    }



}
