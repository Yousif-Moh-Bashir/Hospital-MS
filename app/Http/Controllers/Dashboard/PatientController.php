<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interface\Patients\PatientRepositoryInterface;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    private $Patient;

    public function __construct(PatientRepositoryInterface $Patient)
    {
        $this->Patient = $Patient;
    }

    public function index()
    {
        return $this->Patient->index();
    }


    public function create()
    {
        return$this->Patient->create();
    }


    public function show($id)
    {
        return $this->Patient->show($id);
    }

    public function store(Request $request)
    {
        return $this->Patient->store($request);
    }



    public function edit($id)
    {
        return $this->Patient->edit($id);
    }


    public function update(Request $request)
    {
        return $this->Patient->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Patient->destroy($request);
    }

}
