<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAccount extends Model
{
    use HasFactory;


    protected $fillable = ['id','date','patient_id','amount','credit','Debit','description','single_invoice_id','receipt_id','Payment_id','created_at','updated_at'];

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function single_invoice()
    {
        return $this->belongsTo(SingleInvoicesModel::class,'single_invoice_id');
    }

    public function ReceiptAccount()
    {
        return $this->belongsTo(ReceiptAccount::class,'receipt_id');
    }


    public function PaymentAccount()
    {
        return $this->belongsTo(PaymentAccount::class,'Payment_id');
    }

}
