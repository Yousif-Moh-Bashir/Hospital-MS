<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use App\Models\FundAccount;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\Service;
use App\Models\SingleInvoicesModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class SingleInvoices extends Component
{

    public $InvoiceSaved,$InvoiceUpdated, $price, $patient_id, $doctor_id, $section_id, $type, $Service_id, $single_invoice_id;
    public $show_table = true;
    public $updateMode = false;

    public $tax_rate = 13, $discount_value = 0;

    public function render()
    {
        return view('livewire.single_invoices.single-invoices',[
            'single_invoices'=> SingleInvoicesModel::all(),
            'Patients'=> Patient::all(),
            'Doctors'=> Doctor::all(),
            'Services'=> Service::all(),
            'subtotal' => $Total_after_discount = ((is_numeric($this->price) ? $this->price : 0)) - ((is_numeric($this->discount_value) ? $this->discount_value : 0)),
            'tax_value'=> $Total_after_discount * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100)
        ]);
    }

    public function print($id)
    {
        $single_invoice = SingleInvoicesModel::findorfail($id);

        return Redirect::route('Print_single_invoices',
        [
            'invoice_id' => $single_invoice->id,
            'invoice_date' => $single_invoice->created_at->isoFormat('MMM Do YYYY'),
            'doctor_name' => $single_invoice->Doctor->name,
            'doctor_email' => $single_invoice->Doctor->email,
            'section_name' => $single_invoice->Section->name,
            'Service_name' => $single_invoice->Service->name,
            'pation_name' => $single_invoice->Patient->name,
            'pation_address' => $single_invoice->Patient->Address,
            'pation_email' => $single_invoice->Patient->email,
            'type' => $single_invoice->type,
            'price' => $single_invoice->price,
            'discount_value' => $single_invoice->discount_value,
            'tax_rate' => $single_invoice->tax_rate,
            'total_with_tax' => $single_invoice->total_with_tax,
        ]);
    }

    public function show_form_add()
    {
        $this->show_table = false;
    }

    public function get_section()
    {
        $doctor_id = Doctor::with('section')->where('id', $this->doctor_id)->first();
        $this->section_id = $doctor_id->section->name;
    }

    public function get_price()
    {
        $this->price = Service::where('id', $this->Service_id)->first()->price;
    }


    public function edit($id){

        $this->show_table = false;
        $this->updateMode = true;
        $single_invoice = SingleInvoicesModel::findorfail($id);
        $this->single_invoice_id = $single_invoice->id;
        $this->patient_id = $single_invoice->patient_id;
        $this->doctor_id = $single_invoice->doctor_id;
        $this->section_id = DB::table('section_translations')->where('id', $single_invoice->section_id)->first()->name;
        $this->Service_id = $single_invoice->Service_id;
        $this->price = $single_invoice->price;
        $this->discount_value = $single_invoice->discount_value;
        $this->type = $single_invoice->type;


    }

    public function store()
    {
        if($this->type == 1)   // في حالة كانت الفاتورة نقدي
        {
            DB::beginTransaction();
            try {

                if($this->updateMode)  // في حالة التعديل
                {
                    $single_invoices = SingleInvoicesModel::findorfail($this->single_invoice_id);
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                    $single_invoices->tax_value = ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                    $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    $single_invoices->save();

                    $fund_accounts = FundAccount::where('single_invoice_id',$this->single_invoice_id)->first();
                    $fund_accounts->date = date('Y-m-d');
                    $fund_accounts->single_invoice_id = $single_invoices->id;
                    $fund_accounts->Debit = $single_invoices->total_with_tax;
                    $fund_accounts->credit = 0.00;
                    $fund_accounts->save();
                    $this->InvoiceUpdated =true;
                    $this->show_table =true;

                }

                else  // في حالة الاضافة
                {

                    $single_invoices = new SingleInvoicesModel();
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                    $single_invoices->tax_value = ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                    $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    $single_invoices->save();

                    $fund_accounts = new FundAccount();
                    $fund_accounts->date = date('Y-m-d');
                    $fund_accounts->single_invoice_id = $single_invoices->id;
                    $fund_accounts->Debit = $single_invoices->total_with_tax;
                    $fund_accounts->credit = 0.00;
                    $fund_accounts->save();
                    $this->InvoiceSaved =true;
                    $this->show_table =true;
                }
                DB::commit();
            }
            catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }

        }
        else // في حالة كانت الفاتورة اجل  //------------------------------------------------------------------------
        {
            DB::beginTransaction();
            try {
                    if($this->updateMode)   // في حالة التعديل
                    {

                        $single_invoices = SingleInvoicesModel::findorfail($this->single_invoice_id);
                        $single_invoices->invoice_date = date('Y-m-d');
                        $single_invoices->patient_id = $this->patient_id;
                        $single_invoices->doctor_id = $this->doctor_id;
                        $single_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                        $single_invoices->Service_id = $this->Service_id;
                        $single_invoices->price = $this->price;
                        $single_invoices->discount_value = $this->discount_value;
                        $single_invoices->tax_rate = $this->tax_rate;
                        // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                        $single_invoices->tax_value = ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                        // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                        $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                        $single_invoices->type = $this->type;
                        $single_invoices->save();

                        $patient_accounts = PatientAccount::where('single_invoice_id',$this->single_invoice_id)->first();
                        $patient_accounts->date = date('Y-m-d');
                        $patient_accounts->single_invoice_id = $single_invoices->id;
                        $patient_accounts->patient_id = $single_invoices->patient_id;
                        $patient_accounts->Debit = $single_invoices->total_with_tax;
                        $patient_accounts->credit = 0.00;
                        $patient_accounts->save();
                        $this->InvoiceUpdated =true;
                        $this->show_table =true;

                    }

                    else  // في حالة الاضافة
                    {

                        $single_invoices = new SingleInvoicesModel();
                        $single_invoices->invoice_date = date('Y-m-d');
                        $single_invoices->patient_id = $this->patient_id;
                        $single_invoices->doctor_id = $this->doctor_id;
                        $single_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
                        $single_invoices->Service_id = $this->Service_id;
                        $single_invoices->price = $this->price;
                        $single_invoices->discount_value = $this->discount_value;
                        $single_invoices->tax_rate = $this->tax_rate;
                        // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                        $single_invoices->tax_value = ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                        // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                        $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                        $single_invoices->type = $this->type;
                        $single_invoices->save();

                        $patient_accounts = new PatientAccount();
                        $patient_accounts->date = date('Y-m-d');
                        $patient_accounts->single_invoice_id = $single_invoices->id;
                        $patient_accounts->patient_id = $single_invoices->patient_id;
                        $patient_accounts->Debit = $single_invoices->total_with_tax;
                        $patient_accounts->credit = 0.00;
                        $patient_accounts->save();
                        $this->InvoiceSaved =true;
                        $this->show_table =true;
                    }

                DB::commit();
            }

            catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }

        }//end of store

    }

    public function delete($id)
    {
        SingleInvoicesModel::destroy($id);
        return redirect()->route('single_invoices');
    }



}//The End
