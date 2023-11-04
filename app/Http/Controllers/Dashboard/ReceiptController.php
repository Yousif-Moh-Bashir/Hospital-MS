<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interface\Finance\ReceiptRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{

    private $Receipt;
    public function __construct(ReceiptRepositoryInterface $Receipt)
    {
        return $this->Receipt = $Receipt;
    }


    public function index()
    {
        return $this->Receipt->index();
    }


    public function show($id)
    {
        return $this->Receipt->show($id);
    }


    public function create()
    {
        return $this->Receipt->create();
    }


    public function edit($id)
    {
        return $this->Receipt->edit($id);
    }


    public function store(Request $request)
    {
        return $this->Receipt->store($request);
    }



    public function update(Request $request)
    {
        return $this->Receipt->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Receipt->destroy($request);
    }

}//end of controller
