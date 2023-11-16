@extends('dashboard.layouts.master_doctor')
@section('css')
<link href="{{asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('dashboard/doctors_trans.Statements') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">| {{ trans('dashboard/sections_trans.Show') }}</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">

					</div>
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')
    @include('dashboard.layouts.messages_alert')
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <!-- Button trigger modal -->
                    </div>

                    <div class="card-body">
                        @if($count > 0)
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('dashboard/Payment.Invoice_Date') }}</th>
                                        <th>{{ trans('dashboard/Payment.Service_Name') }}</th>
                                        <th>{{ trans('dashboard/Payment.Patient_Name') }}</th>
                                        <th>{{ trans('dashboard/Payment.service_price') }}</th>
                                        <th>{{ trans('dashboard/Payment.discount_value') }}</th>
                                        <th>{{ trans('dashboard/Payment.tax_rate') }}</th>
                                        <th>{{ trans('dashboard/Payment.tax_value') }}</th>
                                        <th>{{ trans('dashboard/Payment.total_with_tax') }}</th>
                                        <th>{{ trans('dashboard/Invoices.Invoice_status') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($invoices as $invoice)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $invoice->invoice_date }}</td>
                                            <td>{{ $invoice->Service->name ?? $invoice->Group->name }}</td>
                                            <td><a class="btn ripple btn-outline-secondary btn-sm" href="{{ route('diagnosis.show',$invoice->patient_id) }}">{{ $invoice->Patient->name }}</a></td>
                                            <td>{{ number_format($invoice->price, 2) }}</td>
                                            <td>{{ number_format($invoice->discount_value, 2) }}</td>
                                            <td>{{ $invoice->tax_rate }}%</td>
                                            <td>{{ number_format($invoice->tax_value, 2) }}</td>
                                            <td>{{ number_format($invoice->total_with_tax, 2) }}</td>
                                            <td>
                                                @if($invoice->invoice_status == 1)
                                                    <span class="badge badge-danger">{{ trans('dashboard/Invoices.Under_procedure') }}</span>
                                                @elseif($invoice->invoice_status == 2)
                                                    <span class="badge badge-warning">{{ trans('dashboard/Invoices.Review') }}</span>
                                                @else
                                                    <span class="badge badge-success">{{ trans('dashboard/Invoices.Complete') }}</span>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                        </div>
                        @else
                            <div class="alert alert-danger">{{ trans('dashboard/Invoices.no_records') }}</div>
                        @endif
                    </div>
                </div>
            </div><!--/div-->
        </div><!-- row closed -->
    @include('dashboard.sections.add')
@endsection
@section('js')
<!--Internal  Notify js -->
<script src="{{asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{asset('dashboard/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
