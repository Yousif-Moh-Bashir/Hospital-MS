<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Interface\DoctorDashboard\DiagnosisRepositoryInterface;
use Illuminate\Http\Request;

class DiagnosticsController extends Controller
{

    private $Diagnosis;

    public function __construct(DiagnosisRepositoryInterface $Diagnosis)
    {
        $this->Diagnosis = $Diagnosis;
    }

    public function index()
    {
        return $this->Diagnosis->index();
    }

    public function store(Request $request)
    {
        return $this->Diagnosis->store($request);
    }


    public function show($id)
    {
        return $this->Diagnosis->show($id);
    }


    public function addReview(Request $request)
    {
        return $this->Diagnosis->addReview($request);
    }

}
