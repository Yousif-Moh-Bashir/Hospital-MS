@extends('dashboard.layouts.master_doctor')
@section('css')
<link href="{{ asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet">
<!-- Internal Data table css -->
<link href="{{ asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->

<link href="{{ asset('dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal  Datetimepicker-slider css -->
<link href="{{ asset('dashboard/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
<link href="{{ asset('dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
<link href="{{ asset('dashboard/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
<!-- Internal Spectrum-colorpicker css -->
<link href="{{ asset('dashboard/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
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
                                            <th>{{ trans('dashboard/Patient.Processes') }}</th>
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

                                                <td>
                                                    <div class="dropdown">
                                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm" data-toggle="dropdown" type="button">{{trans('dashboard/doctors_trans.Processes')}}<i class="fas fa-caret-down mr-1"></i></button>
                                                        <div class="dropdown-menu tx-13" style="border: 1px solid #737f9e; box-shadow: 0 0 10px #719ECE; border-radius: 10px; " >
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_diagnosis{{$invoice->id}}"><i class="text-primary fa fa-stethoscope"></i>&nbsp;&nbsp;{{ trans('dashboard/Invoices.Add_Diagnosis') }}</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_review{{$invoice->id}}"><i class="text-warning far fa-file-alt"></i>&nbsp;&nbsp;{{ trans('dashboard/Invoices.Add_Review') }}</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_password"><i class="text-primary fas fa-x-ray"></i>&nbsp;&nbsp;{{ trans('dashboard/Invoices.Conversion_To_X-rays') }}</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_status"><i class="text-warning fas fa-syringe"></i>&nbsp;&nbsp;{{ trans('dashboard/Invoices.Transfer_To_Laboratory') }}</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"><i class="text-danger  ti-trash"></i>&nbsp;&nbsp;{{ trans('dashboard/Invoices.Delete_Data') }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('doctor.invoice.add_diagnosis')
                                            @include('doctor.invoice.add_review')
                                            @include('doctor.invoice.update_status')
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
<script src="{{ asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{ asset('dashboard/plugins/notify/js/notifit-custom.js')}}"></script>

<!--Internal  Datepicker js -->
<script src="{{ asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{ asset('dashboard/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{ asset('dashboard/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{ asset('dashboard/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{ asset('dashboard/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{ asset('dashboard/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{ asset('dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{ asset('dashboard/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{ asset('dashboard/js/form-elements.js')}}"></script>

<script>
    $('#review_date').datetimepicker({
    })
</script>

@endsection
