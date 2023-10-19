<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interface\InsuranceCompanies\InsuranceCompaniesRepositoryInterface;
use Illuminate\Http\Request;

class InsuranceCompaniesController extends Controller
{
    private $InsuranceCompanies;
    public function __construct(InsuranceCompaniesRepositoryInterface $InsuranceCompanies)
    {
        return $this->InsuranceCompanies = $InsuranceCompanies;
    }


    public function index()
    {
        return $this->InsuranceCompanies->index();
    }


    public function create()
    {
        return $this->InsuranceCompanies->create();
    }


    public function edit($id)
    {
        return $this->InsuranceCompanies->edit($id);
    }


    public function store(Request $request)
    {
        return $this->InsuranceCompanies->store($request);
    }



    public function update(Request $request)
    {
        return $this->InsuranceCompanies->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->InsuranceCompanies->destroy($request);
    }


}
