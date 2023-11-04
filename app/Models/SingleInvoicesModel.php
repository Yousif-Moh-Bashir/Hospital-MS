<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleInvoicesModel extends Model
{
    use HasFactory;

    protected $table = 'single_invoices';
    protected $fillable = ['id','invoice_date','patient_id','doctor_id','section_id','Service_id','price','discount_value','tax_rate','tax_value','total_with_tax','type','created_at','updated_at'];

    public function Service()
    {
        return $this->belongsTo(Service::class,'Service_id');
    }

    public function Patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function Doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function Section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
}
