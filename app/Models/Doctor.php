<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
class Doctor extends Model
{
    use HasFactory;
    use Translatable;
    protected $translatedAttributes = ['name'];
    public $fillable= ['email','email_verified_at','section_id','password','phone','price','name','status'];

    /**
     * Get the doctor's image.
     */
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
