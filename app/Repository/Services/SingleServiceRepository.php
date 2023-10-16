<?php

namespace App\Repository\Services;

use App\Models\Section;
use App\Interface\Services\SingleServiceRepositoryInterface;
use App\Models\Service;

class SingleServiceRepository implements SingleServiceRepositoryInterface
{
    public function index()
    {
        $services = Service::all();
        return view('dashboard.services.index',compact('services'));
    }

    public function store($request)
    {
        try
        {
            Service::create([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
            ]);
            session()->flash('add');
            return redirect()->route('service.index');
        }
        catch(\Exception $ex)
        {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }

    }

    public function update($request)
    {
        try
        {
            $section = Service::findOrFail($request->id);
            $section->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'status' => $request->status,
                'description' => $request->input('description'),
            ]);
            session()->flash('edit');
            return redirect()->route('service.index');
        }
        catch(\Exception $ex)
        {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }

    }

    public function destroy($request)
    {
        try
        {
            Service::findOrFail($request->id)->delete();
            session()->flash('delete');
            return redirect()->route('service.index');
        }
        catch(\Exception $ex)
        {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }

    }



}
