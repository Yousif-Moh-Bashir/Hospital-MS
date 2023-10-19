@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
{{ trans('dashboard/Services_trans.Edit') }}
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
                <form action="{{ route('ambulance.update','update') }}" method="post" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $ambulance->id }}">
                    <div class="row">
                        <div class="col">
                            <label>{{ trans('dashboard/Ambulance.plate_number') }}</label>
                            <input type="text" name="car_number"  value="{{old('car_number',$ambulance->car_number)}}" class="form-control @error('car_number') is-invalid @enderror">
                        </div>

                        <div class="col">
                            <label>{{ trans('dashboard/Ambulance.car_model') }}</label>
                            <input type="text" name="car_model"  value="{{old('car_model',$ambulance->car_model)}}" class="form-control @error('car_model') is-invalid @enderror">
                        </div>

                        <div class="col">
                            <label>{{ trans('dashboard/Ambulance.Year_manufacture') }}</label>
                            <input type="number" name="car_year_made"  value="{{old('car_year_made',$ambulance->car_year_made)}}" class="form-control @error('car_year_made') is-invalid @enderror">
                        </div>

                        <div class="col">
                            <label>{{ trans('dashboard/Ambulance.Car_Type') }}</label>
                            <select class="form-control" name="car_type">
                                <option {{ $ambulance->car_type == 1 ? 'selected' : '' }} value="1">{{ trans('dashboard/Ambulance.Owned') }}</option>
                                <option {{ $ambulance->car_type == 0 ? 'selected' : '' }} value="0">{{ trans('dashboard/Ambulance.rent') }}</option>
                            </select>
                        </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-6">
                            <label>{{ trans('dashboard/Ambulance.driver_name') }}</label>
                            <input type="text" name="driver_name"  value="{{old('driver_name',$ambulance->driver_name)}}" class="form-control @error('driver_name') is-invalid @enderror">
                        </div>

                        <div class="col-3">
                            <label>{{ trans('dashboard/Ambulance.license_number') }}</label>
                            <input type="text" name="driver_license_number"  value="{{old('driver_license_number',$ambulance->driver_license_number)}}" class="form-control @error('driver_license_number') is-invalid @enderror">
                        </div>

                        <div class="col-3">
                            <label>{{ trans('dashboard/doctors_trans.Phone') }}</label>
                            <input type="number" name="driver_phone"  value="{{old('driver_phone',$ambulance->driver_phone)}}" class="form-control @error('driver_phone') is-invalid @enderror">
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>{{ trans('dashboard/Ambulance.note') }}</label>
                            <textarea rows="5" cols="10" class="form-control" name="notes">{{ old('notes',$ambulance->notes) }}</textarea>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>{{ trans('dashboard/Insurance_companies.status') }}</label>
                            &nbsp;
                            <input name="is_available" {{$ambulance->is_available == 1 ? 'checked' : ''}} value="1" type="checkbox" class="form-check-input" id="exampleCheck1" style="margin-left: 0.2rem;">
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
