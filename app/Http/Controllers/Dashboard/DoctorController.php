<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interface\Doctors\DoctorRepositoryInterface;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    private $Doctors;
    public function __construct(DoctorRepositoryInterface $Doctors)
    {
        return $this->Doctors = $Doctors;
    }

    public function index()
    {
        return $this->Doctors->index();
    }

    public function show($id)
    {
        return $this->Doctors->show($id);
    }


    public function create()
    {
        return $this->Doctors->create();
    }


    public function store(Request $request)
    {
        return $this->Doctors->store($request);
    }


    public function edit($id)
    {
        return $this->Doctors->edit($id);
    }


    public function update(Request $request, $id)
    {
        return $this->Doctors->update($request, $id);
    }


    public function destroy(Request $request)
    {
        return $this->Doctors->destroy($request);
    }

    public function update_password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);
        return $this->Doctors->update_password($request);
    }

    public function update_status(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|in:0,1',
        ]);
        return $this->Doctors->update_status($request);
    }

}//end of controller
