<?php
namespace App\Interface\Finance;


interface ReceiptRepositoryInterface
{
    public function index();

    public function show($id);

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);

}
