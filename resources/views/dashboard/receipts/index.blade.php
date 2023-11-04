@extends('Dashboard.layouts.master')
@section('title')
    {{ trans('dashboard/Receipt.Accounts') }}
@stop
@section('css')
<link href="{{asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('dashboard/Receipt.Accounts') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('dashboard/Receipt.Catch_Receipt') }}</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@include('dashboard.layouts.messages_alert')
				<!-- row -->
                    <!-- row opened -->
                    <div class="row row-sm">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{route('Receipt.create')}}" class="btn btn-primary" role="button" aria-pressed="true"><i class="fa fa-id-card-o" aria-hidden="true"></i> {{ trans('dashboard/Receipt.Add_Catch_Receipt') }}</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-md-nowrap" id="example1">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ trans('dashboard/Patient.Patient_name') }}</th>
                                                <th>{{ trans('dashboard/Receipt.Amount') }}</th>
                                                <th>{{  trans('dashboard/Receipt.Statement')  }}</th>
                                                <th>{{ trans('dashboard/Receipt.Date_added') }}</th>
                                                <th>{{ trans('dashboard/Patient.Processes') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($receipts as $receipt)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{ $receipt->patient->name }}</td>
                                                    <td>{{ number_format($receipt->amount, 2) }}</td>
                                                    <td>{{ \Str::limit($receipt->description, 50) }}</td>
                                                    <td>{{ $receipt->created_at->diffForHumans() }}</td>
                                                    <td>
                                                        <a href="{{route('Receipt.show',$receipt->id)}}" class="btn btn-sm btn-secondary"><i class="fas fa-print"></i></a>
                                                        <a href="{{route('Receipt.edit',$receipt->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$receipt->id}}"><i class="las la-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @include('Dashboard.receipts.delete')
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- bd -->
                            </div><!-- bd -->
                        </div>
                        <!--/div-->

                    <!-- /row -->

				</div>
				<!-- row closed -->

			<!-- Container closed -->

		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Notify js -->
<script src="{{asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{asset('dashboard/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
