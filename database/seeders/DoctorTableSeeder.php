<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /**
     * Run the database seeders.
     */
    public function run()
    {
        DB::table('doctors')->delete();
        $doctors =  Doctor::factory()->count(30)->create();
        $Appointments = Appointment::all();
/*
        foreach ($doctors as $doctor){
            $Appointments = Appointment::all()->random()->id;
            $doctor->doctorappointments()->attach($Appointments);
        }
*/
        Doctor::all()->each(function ($doctor) use ($Appointments) {
            $doctor->DoctorAppioment()->attach(
                $Appointments->random(rand(1,7))->pluck('id')->toArray()
            );
        });
    }
}
