@extends('dashboard.layouts.master')
@section('css')
<link href="{{asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> {{ trans('dashboard/Services_trans.Services') }} </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('dashboard/Ambulance.Ambulance') }} </span>
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
                                <a href="{{ route('ambulance.create') }}" class="btn btn-info">
                                    <i class="fa fa-ambulance"></i> {{ trans('dashboard/Ambulance.Add_Ambulance') }}
                                </a>
							</div>

							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th>#</th>
												<th>{{ trans('dashboard/Ambulance.plate_number') }}</th>
												<th>{{ trans('dashboard/Ambulance.car_model') }}</th>
												<th>{{ trans('dashboard/Ambulance.Year_manufacture') }}</th>
												<th>{{ trans('dashboard/Ambulance.Car_Type') }}</th>
												<th>{{ trans('dashboard/Ambulance.driver_name') }}</th>
												<th>{{ trans('dashboard/Ambulance.license_number') }}</th>
												<th>{{ trans('dashboard/doctors_trans.Phone') }}</th>
												<th>{{ trans('dashboard/Ambulance.status') }}</th>
												<th>{{ trans('dashboard/Ambulance.note') }}</th>
												<th>{{ trans('dashboard/Ambulance.Processes') }}</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($ambulances as $index=>$ambulance )
                                            <tr>
												<td>{{ $index + 1 }}</td>
												<td>{{ $ambulance->car_number }}</td>
												<td>{{ $ambulance->car_model }}</td>
												<td>{{ $ambulance->car_year_made }}</td>
                                                <td>
                                                    @if($ambulance->car_type == 1)
                                                    <span class="badge badge-pill badge-info">{{ trans('dashboard/Ambulance.Owned') }}</span>
                                                    @else
                                                        <span class="badge badge-pill badge-secondary">{{ trans('dashboard/Ambulance.rent') }}</span>
                                                    @endif
                                                </td>
												<td>{{ $ambulance->driver_name }}</td>
												<td>{{ $ambulance->driver_license_number }}</td>
												<td>{{ $ambulance->driver_phone }}</td>
                                                <td>
                                                    @if($ambulance->is_available == 1)
                                                    <span class="badge badge-success">{{ trans('dashboard/doctors_trans.Enabled') }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ trans('dashboard/doctors_trans.Not_enabled') }}</span>
                                                    @endif
                                                </td>
												<td>{{ \Str::limit($ambulance->notes, 50) }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-info"  href="{{ route('ambulance.edit',$ambulance->id) }}"><i class="las la-pen"></i></a>
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$ambulance->id}}"><i class="las la-trash"></i></a>
                                                </td>
											</tr>
                                            @include('dashboard.ambulances.delete')
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div><!--/div-->
				</div><!-- row closed -->
			</div><!-- Container closed -->
		</div><!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Notify js -->
<script src="{{asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{asset('dashboard/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
