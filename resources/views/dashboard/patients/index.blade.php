@extends('dashboard.layouts.master')
@section('css')
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
                <h4 class="content-title mb-0 my-auto">{{ trans('dashboard/Services_trans.Services') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('dashboard/Patient.Patient') }} </span>
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
                                <a href="{{ route('Patients.create') }}" class="btn btn-info">
                                    <i class="fa fa-user"></i> {{ trans('dashboard/Patient.Add_Patient') }}
                                </a>
							</div>

							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th>#</th>
												<th>{{ trans('dashboard/Patient.Patient_name') }}</th>
												<th>{{ trans('dashboard/doctors_trans.Email') }}</th>
												<th>{{ trans('dashboard/Patient.date_birth') }}</th>
												<th>{{ trans('dashboard/doctors_trans.Phone') }}</th>
												<th>{{ trans('dashboard/Patient.gender') }}</th>
												<th>{{ trans('dashboard/Patient.blood_type') }}</th>
												<th>{{ trans('dashboard/Patient.Address') }}</th>
												<th>{{ trans('dashboard/Ambulance.Processes') }}</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($patients as $index=>$patient )
                                            <tr>
												<td>{{ $index + 1 }}</td>
												<td>{{ $patient->name }}</td>
												<td>{{ $patient->email }}</td>
												<td>{{ $patient->Date_Birth }}</td>
												<td>{{ $patient->Phone }}</td>
												<td>{{ $patient->Gender == 1 ? 'ذكر' : 'انثى' }}</td>
												<td>{{ $patient->Blood_Group }}</td>
												<td>{{ $patient->Address }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-info"  href="{{ route('Patients.edit',$patient->id) }}"><i class="las la-pen"></i></a>
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$patient->id}}"><i class="las la-trash"></i></a>
                                                </td>
											</tr>
                                            @include('dashboard.patients.delete')
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
