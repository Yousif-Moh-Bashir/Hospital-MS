@extends('dashboard.layouts.master')
@section('css')
<link href="{{asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> {{ trans('dashboard/Insurance_companies.Insurance_companies') }} </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('dashboard/sections_trans.Show') }} </span>
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
                                <a href="{{ route('insurance_companies.create') }}" class="btn btn-info">
                                    {{ trans('dashboard/Insurance_companies.Add_Insurance') }}
                                </a>
							</div>

							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th>#</th>
												<th>{{ trans('dashboard/Insurance_companies.company_code') }}</th>
												<th>{{ trans('dashboard/Insurance_companies.company_name') }}</th>
												<th>{{ trans('dashboard/Insurance_companies.Patient_discount_rate') }}</th>
												<th>{{ trans('dashboard/Insurance_companies.Insurance_company_bearing_ratio') }}</th>
												<th>{{ trans('dashboard/Insurance_companies.status') }}</th>
												<th>{{ trans('dashboard/Insurance_companies.note') }}</th>
												<th>{{ trans('dashboard/Insurance_companies.Processes') }}</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($insurances as $index=>$insurance )
                                            <tr>
												<td>{{ $index + 1 }}</td>
												<td>{{ $insurance->insurance_code }}</td>
												<td>{{ $insurance->name }}</td>
												<td>{{ $insurance->discount_percentage }} %</td>
												<td>{{ $insurance->Company_rate }} %</td>
                                                <td>
                                                    @if($insurance->status == 1)
                                                    <span class="badge badge-success">{{ trans('dashboard/doctors_trans.Enabled') }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ trans('dashboard/doctors_trans.Not_enabled') }}</span>
                                                    @endif
                                                </td>
												<td>{{ \Str::limit($insurance->notes, 50) }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-info"  href="{{ route('insurance_companies.edit',$insurance->id) }}"><i class="las la-pen"></i> {{ trans('dashboard/sections_trans.Edit') }}</a>
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$insurance->id}}"><i class="las la-trash"></i> {{ trans('dashboard/sections_trans.Delete') }}</a>
                                                </td>
											</tr>
                                            @include('dashboard.insurances.delete')
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
