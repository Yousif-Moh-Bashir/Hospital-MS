<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequestDoctor;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function store(LoginRequestDoctor $request)
    {
        if($request->authenticate()){
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::DOCTOR);
        }
        return redirect()->back()->withErrors(['name' => (trans('dashboard/auth.failed'))]);
    }

    public function destroy(Request $request)
    {
        Auth::guard('doctor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
