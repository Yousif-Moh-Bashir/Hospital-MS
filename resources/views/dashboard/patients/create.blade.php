@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
{{ trans('dashboard/Patient.Patient') }}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ trans('dashboard/Services_trans.Services') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('dashboard/Patient.Patients') }} </span>
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
                <form action="{{route('Patients.store')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <label>{{  trans('dashboard/Patient.Patient_name')  }}</label>
                            <input type="text" name="name"  value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror " required>
                        </div>

                        <div class="col">
                            <label>{{ trans('dashboard/doctors_trans.Email') }}</label>
                            <input type="email" name="email"  value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" required>
                        </div>


                        <div class="col">
                            <label>{{ trans('dashboard/Patient.date_birth') }}</label>
                            <input class="form-control fc-datepicker" name="Date_Birth" placeholder="YYYY-MM-DD" type="date" required>
                        </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-3">
                            <label>{{ trans('dashboard/doctors_trans.Phone') }}</label>
                            <input type="text" name="Phone"  value="{{old('Phone')}}" class="form-control @error('Phone') is-invalid @enderror" required>
                        </div>

                        <div class="col">
                            <label>{{ trans('dashboard/Patient.gender') }}</label>
                            <select class="form-control" name="Gender" required>
                                <option value="" selected>-- {{ trans('dashboard/login_trans.choose') }} --</option>
                                <option value="1">{{ trans('dashboard/Patient.Male') }}</option>
                                <option value="2">{{ trans('dashboard/Patient.Female') }}</option>
                            </select>
                        </div>

                        <div class="col">
                            <label>{{ trans('dashboard/Patient.blood_type') }}</label>
                            <select class="form-control" name="Blood_Group" required>
                                <option value="" selected>-- {{ trans('dashboard/login_trans.choose') }} --</option>
                                <option value="O-">O-</option>
                                <option value="O+">O+</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>{{ trans('dashboard/Patient.Address') }}</label>
                            <textarea rows="5" cols="10" class="form-control" name="Address"></textarea>
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
