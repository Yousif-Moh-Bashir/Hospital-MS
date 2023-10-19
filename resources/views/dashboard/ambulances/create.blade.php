@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
   اضافة سيارة جديدة
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ trans('dashboard/Services_trans.Services') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  {{ trans('dashboard/Ambulance.Ambulance') }}</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
@include('dashboard.layouts.messages_alert')
<!-- row -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{route('ambulance.store')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label>{{ trans('dashboard/Ambulance.plate_number') }}</label>
                            <input type="text" name="car_number"  value="{{old('car_number')}}" class="form-control @error('car_number') is-invalid @enderror">
                        </div>

                        <div class="col">
                            <label>{{ trans('dashboard/Ambulance.car_model') }}</label>
                            <input type="text" name="car_model"  value="{{old('car_model')}}" class="form-control @error('car_model') is-invalid @enderror">
                        </div>

                        <div class="col">
                            <label>{{ trans('dashboard/Ambulance.Year_manufacture') }}</label>
                            <input type="number" name="car_year_made"  value="{{old('car_year_made')}}" class="form-control @error('car_year_made') is-invalid @enderror">
                        </div>

                        <div class="col">
                            <label>{{ trans('dashboard/Ambulance.Car_Type') }}</label>
                            <select class="form-control" name="car_type">
                                <option value="1">{{ trans('dashboard/Ambulance.Owned') }}</option>
                                <option value="0">{{ trans('dashboard/Ambulance.rent') }}</option>
                            </select>
                        </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <label>{{ trans('dashboard/Ambulance.driver_name') }}</label>
                            <input type="text" name="driver_name"  value="{{old('driver_name')}}" class="form-control @error('driver_name') is-invalid @enderror">
                        </div>

                        <div class="col-3">
                            <label>{{ trans('dashboard/Ambulance.license_number') }}</label>
                            <input type="text" name="driver_license_number"  value="{{old('driver_license_number')}}" class="form-control @error('driver_license_number') is-invalid @enderror">
                        </div>

                        <div class="col-3">
                            <label>{{ trans('dashboard/doctors_trans.Phone') }}</label>
                            <input type="number" name="driver_phone"  value="{{old('driver_phone')}}" class="form-control @error('driver_phone') is-invalid @enderror">
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>{{ trans('dashboard/Ambulance.note') }}</label>
                            <textarea rows="5" cols="10" class="form-control" name="notes"></textarea>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <button class="btn btn-info">{{ trans('dashboard/doctors_trans.Submit') }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
