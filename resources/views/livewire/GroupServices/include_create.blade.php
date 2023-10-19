
@extends('Dashboard.layouts.master')
@section('css')
@endsection
@section('title')
    {{ trans('dashboard/GroupServices_trans.Services_group') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('dashboard/GroupServices_trans.Services') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('dashboard/GroupServices_trans.Services_group') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <livewire:crate-group-service />
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection
@section('js')
@endsection
