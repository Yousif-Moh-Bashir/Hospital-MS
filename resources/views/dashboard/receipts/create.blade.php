@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
    <link href="{{ asset('dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('title')
    {{ trans('dashboard/Receipt.Accounts') }}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ trans('dashboard/Receipt.Accounts') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('dashboard/Receipt.Catch_Receipt') }} </span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
@include('dashboard.layouts.messages_alert')

    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{route('Receipt.store')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="pd-30 pd-sm-40 bg-gray-200">

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label>{{ trans('dashboard/Patient.Patient_name') }} :</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <select name="patient_id" class="form-control select2" required>
                                    @foreach($patients as $patient)
                                        <option value=""></option>
                                        <option value="{{$patient->id}}">{{$patient->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label>{{ trans('dashboard/Receipt.Amount') }} :</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="Debit" type="number" step="0.01" placeholder="0.00">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label>{{ trans('dashboard/Receipt.Statement') }} :</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <textarea class="form-control" name="description" rows="3"></textarea>
                            </div>
                        </div>

                        <button class="btn btn-info">{{ trans('dashboard/doctors_trans.Submit') }}</button>

                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')
<script src="{{asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{asset('dashboard/plugins/notify/js/notifit-custom.js')}}"></script>

<!--Internal  Datepicker js -->
<script src="{{asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{asset('dashboard/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{asset('dashboard/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{asset('dashboard/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{asset('dashboard/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{asset('dashboard/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{asset('dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{asset('dashboard/js/form-elements.js')}}"></script>
@endsection
