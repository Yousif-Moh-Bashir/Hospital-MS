<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Doctor extends Authenticatable
{
    use HasFactory;
    
    use Translatable;
    protected $translatedAttributes = ['name'];
    public $fillable= ['email','email_verified_at','section_id','password','phone','price','name','status'];


    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

    public function DoctorAppioment()
    {
        return $this->belongsToMany(Appointment::class,'doctor_appoitment');
    }


}//end of model
