@extends('dashboard.layouts.master')
@section('css')
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/sumoselect/sumoselect-rtl.css') }}">
    <link href="{{asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

@section('title')
    {{trans('doctors.add_doctor')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> {{trans('dashboard/doctors_trans.Doctors')}}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{trans('dashboard/doctors_trans.Edit_doctor')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @include('dashboard.layouts.messages_alert')

    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('doctor.update',$doctor->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="pd-30 pd-sm-40 bg-gray-200">

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">
                                        {{trans('dashboard/doctors_trans.Name')}}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="name" type="text" value="{{ old('name',$doctor->name) }}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">
                                        {{trans('dashboard/doctors_trans.Email')}}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="email" type="email" value="{{ old('email',$doctor->email) }}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">
                                        {{ trans('dashboard/login_trans.Password') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="password" type="password" value="{{ old('password',$doctor->password) }}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">
                                        {{ trans('dashboard/doctors_trans.Phone') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="phone" type="tel" value="{{ old('phone',$doctor->phone) }}">
                                </div>
                            </div>


                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">
                                        {{trans('dashboard/sections_trans.Sections')}}</label>
                                </div>

                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <select name="section_id" class="form-control SlectBox">
                                        <option value="" disabled>-- {{ trans('dashboard/doctors_trans.Select') }} --</option>
                                        @foreach($sections as $section)
                                            <option value="{{$section->id}}" {{$section->id == $doctor->section_id ? 'selected':"" }}>{{$section->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">
                                        {{trans('dashboard/doctors_trans.Appointments')}}</label>
                                </div>

                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <select multiple="multiple" class="testselect2" name="appointments[]">
                                        @foreach($appointments as $appointment)
                                            <option @foreach($DoctorAppioment as $appointmentDOC) {{ $appointmentDOC == $appointment->id ? 'selected' : "" }} @endforeach value="{{$appointment->id}}">{{$appointment->name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">
                                        {{trans('dashboard/doctors_trans.Price')}}</label>
                                </div>

                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="price" type="text" value="{{ old('price',$doctor->price) }}">
                                </div>
                            </div>


                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">
                                        {{ trans('dashboard/doctors_trans.photo') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input type="file" accept="image/*" name="photo" onchange="loadFile(event)">
                                    @if ($doctor->image)
                                        <img src="{{ asset('dashboard/img/doctors/'.$doctor->image->filename) }}" style="border-radius:50%" width="150px" height="150px" id="output"/>
                                    @else
                                        <img src="{{ asset('dashboard/img/no_image.jpg') }}" style="border-radius:50%" width="150px" height="150px" id="output"/>
                                    @endif
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info pd-x-30 mg-r-5 mg-t-5">{{ trans('dashboard/doctors_trans.Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>

    <!--Internal  Form-elements js-->
    <script src="{{ asset('dashboard/js/select2.js') }}"></script>
    <script src="{{ asset('dashboard/js/advanced-form-elements.js') }}"></script>

    <!--Internal Sumoselect js-->
    <script src="{{ asset('dashboard/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{asset('/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection
