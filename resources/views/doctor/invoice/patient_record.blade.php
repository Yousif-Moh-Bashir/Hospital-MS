@extends('dashboard.layouts.master_doctor')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('dashboard/doctors_trans.Statements') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">| {{ trans('dashboard/Invoices.Patient_Record') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    @php
                        $this_doctor_id = auth()->user()->id
                    @endphp
                    <div class="vtimeline">
                        @if($count > 0)
                            @foreach($patient_records as $patient_record)
                                <div
                                    class="timeline-wrapper {{ $patient_record->Doctor->id == $this_doctor_id ? '' : 'timeline-inverted' }} timeline-wrapper-primary">
                                    <div class="timeline-badge"><i class="las la-check-circle"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h6 class="timeline-title">{{ trans('dashboard/Invoices.Record_Statements') }} | <span class="text-muted mt-1 tx-13 mb-0" style="font-size: 0.7rem;">{{ $patient_record->Patient->name }}</span></h6>
                                        </div>
                                        <div class="timeline-body">
                                            <p>{{$patient_record->diagnosis}}</p>
                                        </div>
                                        <div class="timeline-footer d-flex align-items-center flex-wrap">
                                            <i class="fas fa-user-md"></i>&nbsp;<span>{{$patient_record->Doctor->name}}</span>
                                            <span class="mr-auto"><i class="fe fe-calendar text-muted mr-1"></i>{{$patient_record->date}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-danger">{{ trans('dashboard/Invoices.no_records') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
