@extends('dashboard.layouts.master')
@section('css')
<!--Internal   Notify -->
<link href="{{asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('dashboard/doctors_trans.Doctors') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('dashboard/sections_trans.Show') }}</span>
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
                                <a href="{{ route('doctor.create') }}" class="btn btn-info" role="button" aria-pressed="true"><i class="fa fa-stethoscope"></i> {{ trans('dashboard/doctors_trans.Add_doctor') }}</a>
                                <button type="button" class="btn btn-danger" id="btn_delete_all"><i class="las la-trash"></i> {{trans('dashboard/doctors_trans.delete_select')}}</button>
							</div>

							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th>#</th>
                                                <th><input name="select_all" id="example-select-all" type="checkbox"></th>
                                                <th>{{ trans('dashboard/doctors_trans.photo') }}</th>
												<th>{{ trans('dashboard/doctors_trans.Name') }}</th>
												<th>{{ trans('dashboard/doctors_trans.Email') }}</th>
												<th>{{ trans('dashboard/doctors_trans.Section') }}</th>
												<th>{{ trans('dashboard/doctors_trans.Phone') }}</th>
												<th>{{ trans('dashboard/doctors_trans.Appointments') }}</th>
												<th>{{ trans('dashboard/doctors_trans.Price') }}</th>
												<th>{{ trans('dashboard/doctors_trans.Status') }}</th>
												<th>{{ trans('dashboard/doctors_trans.Date_created') }}</th>
												<th>{{ trans('dashboard/doctors_trans.Processes') }}</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($doctors as $index=>$doctor )
                                            <tr>
												<td>{{ $index + 1 }}</td>
                                                <td>
                                                    <input type="checkbox" name="delete_select" value="{{$doctor->id}}" class="delete_select">
                                                </td>
                                                <td>
                                                    @if($doctor->image)
                                                        <img src="{{asset('dashboard/img/doctors/'.$doctor->image->filename)}}" height="50px" width="50px" alt="">
                                                    @else
                                                        <img src="{{asset('dashboard/img/no_image.jpg')}}" height="50px" width="50px" alt="">
                                                    @endif
                                                </td>
												<td>{{ $doctor->name }}</td>
												<td>{{ $doctor->email }}</td>
												<td>{{ $doctor->section->name }}</td>
												<td>{{ $doctor->phone }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-secondary btn-sm" data-toggle="dropdown" type="button">{{trans('dashboard/doctors_trans.Appointments')}}<i class="fas fa-caret-down mr-1"></i></button>
                                                        <div class="dropdown-menu tx-13" style="border: 1px solid #737f9e; box-shadow: 0 0 10px #719ECE; border-radius: 10px; " >
                                                            @foreach($doctor->DoctorAppioment as $appointment)
                                                                <a class="dropdown-item" href="#" ><i class="text-primary ti-alarm-clock"></i>&nbsp;&nbsp;{{$appointment->name}}</a>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>{{ $doctor->price }}</td>
                                                <td>
                                                    @if($doctor->status == 1)
                                                        <span class="badge badge-success">{{ trans('dashboard/doctors_trans.Enabled') }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ trans('dashboard/doctors_trans.Not_enabled') }}</span>
                                                    @endif
                                                </td>
												<td>{{ $doctor->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm" data-toggle="dropdown" type="button">{{trans('dashboard/doctors_trans.Processes')}}<i class="fas fa-caret-down mr-1"></i></button>
                                                        <div class="dropdown-menu tx-13" style="border: 1px solid #737f9e; box-shadow: 0 0 10px #719ECE; border-radius: 10px; " >
                                                            <a class="dropdown-item" href="{{ route('doctor.edit',$doctor->id) }}"><i style="color: #0ba360" class="text-success ti-pencil"></i>&nbsp;&nbsp;{{ trans('dashboard/doctors_trans.Edit') }}</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_password{{$doctor->id}}"><i class="text-primary ti-lock"></i>&nbsp;&nbsp;{{ trans('dashboard/doctors_trans.Change_Password') }}</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_status{{$doctor->id}}"><i class="text-warning ti-back-right"></i>&nbsp;&nbsp;{{ trans('dashboard/doctors_trans.Change_Status') }}</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$doctor->id}}"><i class="text-danger ti-trash"></i>&nbsp;&nbsp;{{ trans('dashboard/doctors_trans.Delete') }}</a>
                                                        </div>
                                                    </div>
                                                </td>
											</tr>
                                            @include('dashboard.doctors.delete')
                                            @include('dashboard.doctors.delete_selected')
                                            @include('Dashboard.Doctors.update_password')
                                            @include('Dashboard.Doctors.update_status')
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div><!--/div-->
				</div><!-- row closed -->
                @include('dashboard.sections.add')
			</div><!-- Container closed -->
		</div><!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Notify js -->
<script src="{{asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{asset('dashboard/plugins/notify/js/notifit-custom.js')}}"></script>

<script>
    $(function() {
        jQuery("[name=select_all]").click(function(source) {
            checkboxes = jQuery("[name=delete_select]");
            for(var i in checkboxes){
                checkboxes[i].checked = source.target.checked;
            }
        });
    })
</script>

<script type="text/javascript">
    $(function () {
        $("#btn_delete_all").click(function () {
            var selected = [];
            $("#example1 input[name=delete_select]:checked").each(function () {
                selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#delete_select').modal('show')
                $('input[id="delete_select_id"]').val(selected);
            }
        });
    });
</script>

@endsection
