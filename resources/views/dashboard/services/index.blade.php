@extends('dashboard.layouts.master')
@section('title')
{{ trans('dashboard/Services_trans.Services') }}
@endsection
@section('css')
<!-- Internal Data table css -->
<link href="{{asset('dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{asset('dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('dashboard/Services_trans.Services') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('dashboard/Services_trans.Show') }}</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">

					</div>
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')
				<!-- row -->
                @include('dashboard.layouts.messages_alert')
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                                    {{ trans('dashboard/Services_trans.Add_Service') }}
                                </button>
							</div>

							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th>#</th>
												<th>{{ trans('dashboard/Services_trans.Name') }}</th>
												<th>{{ trans('dashboard/Services_trans.Price') }}</th>
												<th>{{ trans('dashboard/Services_trans.Describtion') }}</th>
												<th>{{ trans('dashboard/Services_trans.Status') }}</th>
												<th>{{ trans('dashboard/Services_trans.Date_created') }}</th>
												<th>{{ trans('dashboard/Services_trans.Processes') }}</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($services as $index=>$service )
                                            <tr>
												<td>{{ $index + 1 }}</td>
												<td>{{ $service->name }}</td>
												<td>{{ $service->price }}</td>
												<td>{{ \Str::limit($service->description, 50) }}</td>
                                                <td>
                                                    @if($service->status == 1)
                                                        <span class="badge badge-success">{{ trans('dashboard/doctors_trans.Enabled') }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ trans('dashboard/doctors_trans.Not_enabled') }}</span>
                                                    @endif
                                                </td>
												<td>{{ $service->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"  data-toggle="modal" href="#edit{{$service->id}}"><i class="las la-pen"></i> {{ trans('dashboard/Services_trans.Edit') }}</a>
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$service->id}}"><i class="las la-trash"></i> {{ trans('dashboard/Services_trans.Delete') }}</a>
                                                </td>
											</tr>
                                            @include('dashboard.services.edit')
                                            @include('dashboard.services.delete')
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div><!--/div-->
				</div><!-- row closed -->
                @include('dashboard.services.add')
			</div><!-- Container closed -->
		</div><!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{asset('dashboard/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{asset('dashboard/js/table-data.js')}}"></script>
<!--Internal  Notify js -->
<script src="{{asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{asset('dashboard/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
