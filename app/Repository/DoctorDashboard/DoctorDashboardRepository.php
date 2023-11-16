<?php

namespace App\Repository\DoctorDashboard;

use App\Interface\DoctorDashboard\DoctorDashboardRepositoryInterface;
use App\Models\Invoice;
use App\Traits\HelperFunctions;


class DoctorDashboardRepository implements DoctorDashboardRepositoryInterface
{

    use HelperFunctions;

    // قائمة الكشوفات تحت الاجراء
    public function index()
    {
        $invoices = Invoice::where('doctor_id',auth()->user()->id)->where('invoice_status', 1)->get();
        $count = $invoices->count();
        return view('doctor.invoice.index',compact('invoices','count'));
    }

    // قائمة المراجعات
    public function reviewInvoices()
    {
        $invoices = Invoice::where('doctor_id', auth()->user()->id)->where('invoice_status', 2)->get();
        $count = $invoices->count();
        return view('doctor.invoice.review_invoices', compact('invoices','count'));
    }

    // قائمة الفواتير المكتملة
    public function completedInvoices()

    {
        $invoices = Invoice::where('doctor_id', auth()->user()->id)->where('invoice_status', 3)->get();
        $count = $invoices->count();
        return view('doctor.invoice.completed_invoices', compact('invoices','count'));
    }


}
