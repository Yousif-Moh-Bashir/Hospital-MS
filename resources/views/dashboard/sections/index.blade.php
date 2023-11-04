@extends('dashboard.layouts.master')
@section('css')
<link href="{{asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('dashboard/sections_trans.Sections') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('dashboard/sections_trans.Show') }}</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">

					</div>
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')
    @include('dashboard.layouts.messages_alert')
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                            {{ trans('dashboard/sections_trans.Add_section') }}
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('dashboard/sections_trans.Name') }}</th>
                                        <th>{{ trans('dashboard/sections_trans.Describtion') }}</th>
                                        <th>{{ trans('dashboard/sections_trans.Date_created') }}</th>
                                        <th>{{ trans('dashboard/sections_trans.Processes') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sections as $index=>$section )
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><a class="btn ripple btn-outline-secondary btn-sm" href="{{ route('doctor.show',$section->id) }}">{{ $section->name }}</a></td>
                                        <td>{{ \Str::limit($section->describtion, 50) }}</td>
                                        <td>{{ $section->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"  data-toggle="modal" href="#edit{{$section->id}}"><i class="las la-pen"></i> {{ trans('dashboard/sections_trans.Edit') }}</a>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$section->id}}"><i class="las la-trash"></i> {{ trans('dashboard/sections_trans.Delete') }}</a>
                                        </td>
                                    </tr>
                                    @include('dashboard.sections.edit')
                                    @include('dashboard.sections.delete')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!--/div-->
        </div><!-- row closed -->
    @include('dashboard.sections.add')
@endsection
@section('js')
<!--Internal  Notify js -->
<script src="{{asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{asset('dashboard/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
