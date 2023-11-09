<?php

namespace App\Repository\Doctors;

use App\Models\Doctor;
use App\Interface\Doctors\DoctorRepositoryInterface;
use App\Models\Appointment;
use App\Models\Section;
use App\Traits\HelperFunctions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorRepository implements DoctorRepositoryInterface
{

    use HelperFunctions;
    public function index()
    {
        $doctors = Doctor::all();
        return view('dashboard.doctors.index',compact('doctors'));
    }

    public function show($id)
    {
        $section = Section::with('Doctors')->findOrFail($id);
        return view('dashboard.sections.show',compact('section'));
    }

    public function create()
    {
        $sections = Section::all();
        $appointments = Appointment::all();
        return view('dashboard.doctors.create',compact('sections','appointments'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            $doctors = new Doctor();
            $doctors->email = $request->email;
            $doctors->password = Hash::make($request->password);
            $doctors->section_id = $request->section_id;
            $doctors->phone = $request->phone;
            $doctors->price = $request->price;
            $doctors->status = 1;
            $doctors->save();
            // store trans
            $doctors->name = $request->name;
            $doctors->save();
            //RELATIONS
            $doctors->DoctorAppioment()->attach($request->appointments);

            //Upload img
            $this->UploadImage($request,'photo','doctors','upload_image',$doctors->id,'App\Models\Doctor');

            DB::commit();
            session()->flash('add');
            return redirect()->route('doctor.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $sections = Section::all();
        $appointments = Appointment::all();
        foreach($doctor->DoctorAppioment as $appointmentDOC){
            $DoctorAppioment[] = $appointmentDOC->id;
        }
        // return $DoctorAppioment;
        return view('dashboard.doctors.edit',compact('doctor','sections','appointments','DoctorAppioment'));
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try
        {
            $doctors = Doctor::findOrFail($id);
            $doctors->email = $request->email;
            $doctors->password = Hash::make($request->password);
            $doctors->section_id = $request->section_id;
            $doctors->phone = $request->phone;
            $doctors->price = $request->price;
            $doctors->status = 1;
            $doctors->update();
            // store trans
            $doctors->name = $request->name;
            $doctors->update();
            //RELATIONS
            $doctors->DoctorAppioment()->sync($request->appointments);

            // update photo
            if ($request->has('photo'))
            {
                // Delete old photo
                if ($doctors->image)
                {
                    $old_img = $doctors->image->filename;
                    $this->Delete_attachment('upload_image','doctors/'.$old_img,$id);
                }
                //Upload img
                $this->UploadImage($request,'photo','doctors','upload_image',$id,'App\Models\Doctor');
            }
            DB::commit();
            session()->flash('edit');
            return redirect()->route('doctor.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    public function destroy($request)
    {
        if($request->page_id==1)
        {
            if($request->filename)
            {
                $this->Delete_attachment('upload_image','doctors/'.$request->filename,$request->id,$request->filename);
            }
            Doctor::destroy($request->id);
            session()->flash('delete');
            return redirect()->back();
        }
        else
        {
            // delete selector doctor
            $delete_select_id = explode(",", $request->delete_select_id);
            foreach ($delete_select_id as $ids_doctors){
                $doctor = Doctor::findorfail($ids_doctors);
                if($doctor->image){
                    $this->Delete_attachment('upload_image','doctors/'.$doctor->image->filename,$ids_doctors,$doctor->image->filename);
                }
            }

            Doctor::destroy($delete_select_id);
            session()->flash('delete');
            return redirect()->back();
        }
    }//end of destroy


    public function update_password($request)
    {
        try {
            $doctor = Doctor::findorfail($request->id);
            $doctor->update([
                'password'=>Hash::make($request->password)
            ]);

            session()->flash('edit');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update_status($request)
    {
        try {
            $doctor = Doctor::findorfail($request->id);
            $doctor->update([
                'status'=>$request->status
            ]);

            session()->flash('edit');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


}
