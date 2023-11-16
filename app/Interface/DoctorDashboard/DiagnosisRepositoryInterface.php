<?php
namespace App\Interface\DoctorDashboard;


interface DiagnosisRepositoryInterface
{
    public function index();

    public function show($id);

    public function addReview($request);

    // public function create();

    // public function edit($id);

    public function store($request);

    // public function update($request ,$id);

    // public function destroy($request);

    // public function update_password($request);

    // public function update_status($request);

}
