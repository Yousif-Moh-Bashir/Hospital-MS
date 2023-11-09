@extends('dashboard.layouts.master2')
@section('css')

<style>
    .panel {display: none;}
</style>

<!-- Sidemenu-respoansive-tabs css -->
<link href="{{asset('dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{asset('dashboard/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{asset('dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>{{ trans('dashboard/login_trans.Welcome_back') }} !</h2>

                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif

                                                <div class="form-group">
                                                    <label>{{ trans('dashboard/login_trans.entry_method') }}</label>
                                                    <select id="sectionChooser" name="somename" class="form-control SlectBox SumoUnder" onclick="console.log($(this).val())" onchange="console.log('change is firing')" tabindex="-1">
                                                        <!--placeholder-->
                                                        <option selected disabled>-- {{ trans('dashboard/login_trans.choose') }} --</option>
                                                        <option value="admin">{{ trans('dashboard/login_trans.log_admin') }}</option>
                                                        <option value="doctor">{{ trans('dashboard/login_trans.log_doctor') }}</option>
                                                        <option value="user">{{ trans('dashboard/login_trans.log_patient') }}</option>
                                                    </select>
                                                </div>

                                                <div class="panel" id="user">
                                                    <form action="{{ route('login.user') }}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard/login_trans.Email') }}</label>
                                                            <input class="form-control" placeholder="Enter your email" type="email" name="email" autofocus>
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard/login_trans.Password') }}</label>
                                                            <input class="form-control" placeholder="Enter your password" type="password" name="password" autofocus>
                                                            @error('password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div><button class="btn btn-main-primary btn-block">{{ trans('dashboard/login_trans.Sign_In') }}</button>
                                                        <div class="row row-xs">
                                                            <div class="col-sm-6">
                                                                <button class="btn btn-block"><i class="fa fa-facebook"></i> {{ trans('dashboard/login_trans.Facebook') }}</button>
                                                            </div>
                                                            <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                                <button class="btn btn-info btn-block"><i class="fa fa-twitter"></i> {{ trans('dashboard/login_trans.Twitter') }}</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="main-signin-footer mt-5">
                                                        <p><a href="">{{ trans('dashboard/login_trans.Forgot_password') }}</a></p>
                                                        <p>{{ trans('dashboard/login_trans.Dont_have') }} <a href="{{ url('/' . $page='signup') }}">{{ trans('dashboard/login_trans.Create_Account') }}</a></p>
                                                    </div>
                                                </div>

                                                <div class="panel" id="admin">
                                                    <form action="{{ route('login.admin') }}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard/login_trans.Email') }}</label>
                                                            <input class="form-control" placeholder="Enter your email" type="email" name="email" autofocus>
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard/login_trans.Password') }}</label>
                                                            <input class="form-control" placeholder="Enter your password" type="password" name="password" autofocus>
                                                            @error('password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div><button class="btn btn-main-primary btn-block">{{ trans('dashboard/login_trans.Sign_In') }}</button>
                                                        <div class="row row-xs">
                                                            <div class="col-sm-6">
                                                                <button class="btn btn-block"><i class="fa fa-facebook"></i> {{ trans('dashboard/login_trans.Facebook') }}</button>
                                                            </div>
                                                            <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                                <button class="btn btn-info btn-block"><i class="fa fa-twitter"></i> {{ trans('dashboard/login_trans.Twitter') }}</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="main-signin-footer mt-5">
                                                        <p><a href="">{{ trans('dashboard/login_trans.Forgot_password') }}</a></p>
                                                        <p>{{ trans('dashboard/login_trans.Dont_have') }} <a href="{{ url('/' . $page='signup') }}">{{ trans('dashboard/login_trans.Create_Account') }}</a></p>
                                                    </div>
                                                </div>

                                                <div class="panel" id="doctor">
                                                    <form action="{{ route('login.doctor') }}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard/login_trans.Email') }}</label>
                                                            <input class="form-control" placeholder="Enter your email" type="email" name="email" autofocus>
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard/login_trans.Password') }}</label>
                                                            <input class="form-control" placeholder="Enter your password" type="password" name="password" autofocus>
                                                            @error('password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div><button class="btn btn-main-primary btn-block">{{ trans('dashboard/login_trans.Sign_In') }}</button>
                                                        <div class="row row-xs">
                                                            <div class="col-sm-6">
                                                                <button class="btn btn-block"><i class="fa fa-facebook"></i> {{ trans('dashboard/login_trans.Facebook') }}</button>
                                                            </div>
                                                            <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                                <button class="btn btn-info btn-block"><i class="fa fa-twitter"></i> {{ trans('dashboard/login_trans.Twitter') }}</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="main-signin-footer mt-5">
                                                        <p><a href="">{{ trans('dashboard/login_trans.Forgot_password') }}</a></p>
                                                        <p>{{ trans('dashboard/login_trans.Dont_have') }} <a href="{{ url('/' . $page='signup') }}">{{ trans('dashboard/login_trans.Create_Account') }}</a></p>
                                                    </div>
                                                </div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
    <script>
        $('#sectionChooser').change(function(){
            var myID = $(this).val();
            $('.panel').each(function(){
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection
