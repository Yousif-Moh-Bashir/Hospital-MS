<?php

namespace App\Repository\DoctorDashboard;

use App\Interface\DoctorDashboard\DiagnosisRepositoryInterface;
use App\Models\Diagnosis;
use App\Models\Invoice;
use App\Traits\HelperFunctions;
use Illuminate\Support\Facades\DB;


class DiagnosisRepository implements DiagnosisRepositoryInterface
{

    use HelperFunctions;
    public function index()
    {
        $invoices = Invoice::where('doctor_id',auth()->user()->id)->get();
        $count = $invoices->count();
        return view('doctor.invoice.index',compact('invoices','count'));
    }


    public function store($request)
    {
        DB::beginTransaction();

        try {

            $this->invoice_status($request->invoice_id,3);
            $diagnosis = new Diagnosis();
            $diagnosis->date = date('Y-m-d');
            $diagnosis->diagnosis = $request->diagnosis;
            $diagnosis->medicine = $request->medicine;
            $diagnosis->invoice_id = $request->invoice_id;
            $diagnosis->patient_id = $request->patient_id;
            $diagnosis->doctor_id = $request->doctor_id;
            $diagnosis->save();

            DB::commit();
            session()->flash('add');
            return redirect()->back();
        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show($id)
    {
        $patient_records = Diagnosis::where('patient_id',$id)->get();
        $count = $patient_records->count();
        return view('doctor.invoice.patient_record',compact('patient_records','count'));
    }


    public function addReview($request)
    {
        DB::beginTransaction();
        try {

            $this->invoice_status($request->invoice_id,2);
            $diagnosis = new Diagnosis();
            $diagnosis->date = date('Y-m-d');
            $diagnosis->review_date = date('Y-m-d H:i:s');
            $diagnosis->diagnosis = $request->diagnosis;
            $diagnosis->medicine = $request->medicine;
            $diagnosis->invoice_id = $request->invoice_id;
            $diagnosis->patient_id = $request->patient_id;
            $diagnosis->doctor_id = $request->doctor_id;
            $diagnosis->save();

            DB::commit();
            session()->flash('add');
            return redirect()->back();
        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function invoice_status($invoice_id,$id_status){
        $invoice_status = Invoice::findorFail($invoice_id);
        $invoice_status->update([
            'invoice_status'=>$id_status
        ]);
    }


}
