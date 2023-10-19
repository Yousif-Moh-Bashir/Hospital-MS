@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ asset('dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet"/>
@endsection
@section('title')
    {{trans('insurance.Add_Insurance')}}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{trans('dashboard/Services_trans.Services')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('dashboard/Insurance_companies.Insurance_companies')}}</span>
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
                <form action="{{route ('insurance_companies.store') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label>{{trans('dashboard/Insurance_companies.company_code')}}</label>
                            <input type="text" name="insurance_code"  value="{{old('insurance_code')}}" class="form-control @error('insurance_code') is-invalid @enderror">
                            @error('insurance_code')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label>{{trans('dashboard/Insurance_companies.company_name')}}</label>
                            <input type="text" name="name"  value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>{{trans('dashboard/Insurance_companies.Patient_discount_rate')}} %</label>
                            <input type="number" name="discount_percentage" class="form-control @error ('discount_percentage') is-invalid @enderror">
                            @error('discount_percentage')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col">
                            <label>{{trans('dashboard/Insurance_companies.Insurance_company_bearing_ratio')}} %</label>
                            <input type="number" name="Company_rate" class="form-control @error ('Company_rate') is-invalid @enderror">
                            @error('Company_rate')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>{{trans('dashboard/Insurance_companies.note')}}</label>
                            <textarea rows="5" cols="10" class="form-control" name="notes"></textarea>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <button class="btn btn-info">{{trans('dashboard/sections_trans.Submit')}}</button>
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
