<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentAccount extends Model
{
    use HasFactory;

    protected $fillable = ['id','date','description','patient_id','amount','created_at','updated_at'];

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

}
