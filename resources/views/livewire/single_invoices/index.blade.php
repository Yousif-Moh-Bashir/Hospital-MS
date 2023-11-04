
@extends('Dashboard.layouts.master')
@section('css')
@endsection
@section('title')
{{ trans('dashboard/Invoices.Invoices') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('dashboard/Invoices.Invoices') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('dashboard/Invoices.Single_Service_Bill') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <livewire:single-invoices />
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection
@section('js')
@endsection
