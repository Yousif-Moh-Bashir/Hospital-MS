<?php
namespace App\Interface\DoctorDashboard;


interface DoctorDashboardRepositoryInterface
{
    public function index();

    public function reviewInvoices();

    public function completedInvoices();

    // public function show($id);

    // public function create();

    // public function edit($id);

    // public function store($request);

    // public function update($request ,$id);

    // public function destroy($request);

    // public function update_password($request);

    // public function update_status($request);

}
