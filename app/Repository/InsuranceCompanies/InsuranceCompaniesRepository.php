<?php

namespace App\Repository\InsuranceCompanies;

use App\Interface\InsuranceCompanies\InsuranceCompaniesRepositoryInterface;
use App\Models\Insurance;

class InsuranceCompaniesRepository implements InsuranceCompaniesRepositoryInterface
{
    public function index()
    {
        $insurances = Insurance::all();
        return view('dashboard.insurances.index',compact('insurances'));
    }


    public function create()
    {
        return view('dashboard.insurances.create');
    }


    public function edit($id)
    {
        $insurance = Insurance::findOrFail($id);
        return view('dashboard.insurances.edit',compact('insurance'));
    }

    public function store($request)
    {
        try
        {
            $insurance = new Insurance();
            $insurance->name= $request->name;
            $insurance->notes= $request->notes;
            $insurance->insurance_code= $request->insurance_code;
            $insurance->discount_percentage= $request->discount_percentage;
            $insurance-> Company_rate= $request->Company_rate;
            $insurance->save();
            session()->flash('add');
            return redirect()->route('insurance_companies.index');
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
            $insurance = Insurance::findOrFail($request->id);
            $insurance->name= $request->name;
            $insurance->notes= $request->notes;
            $insurance->insurance_code= $request->insurance_code;
            $insurance->discount_percentage= $request->discount_percentage;
            $insurance-> Company_rate= $request->Company_rate;
            if($request->has('status'))
            {
                $insurance->status = $request->status;
            }
            else
            {
                $insurance->status = 0;
            }
            $insurance->update();
            session()->flash('edit');
            return redirect()->route('insurance_companies.index');
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
            Insurance::findOrFail($request->id)->delete();
            session()->flash('delete');
            return redirect()->route('insurance_companies.index');
        }
        catch(\Exception $ex)
        {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }

    }



}
