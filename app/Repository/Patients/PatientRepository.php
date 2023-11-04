<?php

namespace App\Repository\Patients;

use App\Models\Ambulance;
use App\Interface\Patients\PatientRepositoryInterface;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\ReceiptAccount;
use App\Models\SingleInvoicesModel;
use Illuminate\Support\Facades\Hash;

class PatientRepository implements PatientRepositoryInterface
{
    public function index()
    {
        $patients = Patient::all();
        return view('dashboard.patients.index',compact('patients'));
    }


    public function create()
    {
        return view('dashboard.patients.create');
    }


    public function show($id)
    {
        $Patient = patient::findorfail($id);
        $invoices = SingleInvoicesModel::where('patient_id', $id)->get();
        $receipt_accounts = ReceiptAccount::where('patient_id', $id)->get();
        // $Patient_accounts = PatientAccount::orWhereNotNull('single_invoice_id')
        //     ->orWhereNotNull('receipt_id')
        //     ->orWhereNotNull('Payment_id')
        //     ->where('patient_id',$id)
        //     ->get();
        $Patient_accounts = PatientAccount::where('patient_id',$id)->get();
        return view('dashboard.patients.show', compact('Patient', 'invoices', 'receipt_accounts', 'Patient_accounts'));
    }


    public function store($request)
    {
        $Patients = new Patient();
        $Patients->email = $request->email;
        $Patients->Password = Hash::make($request->Phone);
        $Patients->Date_Birth = $request->Date_Birth;
        $Patients->Phone = $request->Phone;
        $Patients->Gender = $request->Gender;
        $Patients->Blood_Group = $request->Blood_Group;
        $Patients->save();
        //insert trans
        $Patients->name = $request->name;
        $Patients->Address = $request->Address;
        $Patients->save();
        session()->flash('add');
        return redirect()->route('Patients.index');
    }


    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('dashboard.patients.edit',compact('patient'));
    }


    public function update($request)
    {
        $Patient = Patient::findOrFail($request->id);
        $Patient->email = $request->email;
        $Patient->Password = Hash::make($request->Phone);
        $Patient->Date_Birth = $request->Date_Birth;
        $Patient->Phone = $request->Phone;
        $Patient->Gender = $request->Gender;
        $Patient->Blood_Group = $request->Blood_Group;
        $Patient->save();
        // insert trans
        $Patient->name = $request->name;
        $Patient->Address = $request->Address;
        $Patient->save();
        session()->flash('edit');
        return redirect()->route('Patients.index');
    }

    public function destroy($request)
    {
        Patient::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Patients.index');
    }



}
