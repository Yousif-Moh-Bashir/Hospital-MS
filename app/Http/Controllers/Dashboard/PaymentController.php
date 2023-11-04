<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interface\Finance\PaymentRepositoryInterface;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $Payment;
    public function __construct(PaymentRepositoryInterface $Payment)
    {
        return $this->Payment = $Payment;
    }


    public function index()
    {
        return $this->Payment->index();
    }


    public function create()
    {
        return $this->Payment->create();
    }


    public function show($id)
    {
        return $this->Payment->show($id);
    }


    public function edit($id)
    {
        return $this->Payment->edit($id);
    }


    public function store(Request $request)
    {
        return $this->Payment->store($request);
    }



    public function update(Request $request)
    {
        return $this->Payment->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Payment->destroy($request);
    }

}//end of controller

