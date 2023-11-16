<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Interface\DoctorDashboard\DoctorDashboardRepositoryInterface;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    private $Doctors;
    public function __construct(DoctorDashboardRepositoryInterface $Doctors)
    {
        return $this->Doctors = $Doctors;
    }


    public function index()
    {
        return $this->Doctors->index();
    }

    public function reviewInvoices()
    {
        return $this->Doctors->reviewInvoices();
    }

    public function completedInvoices()
    {
        return $this->Doctors->completedInvoices();
    }


    // public function store(Request $request)
    // {
    //     return $this->Doctors->store($request);
    // }


    // public function update(Request $request)
    // {
    //     return $this->Doctors->update($request);
    // }


    // public function destroy(Request $request)
    // {
    //     return $this->Doctors->destroy($request);
    // }

}
