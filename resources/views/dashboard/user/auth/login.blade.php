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
												<h2>Welcome back!</h2>

                                                <div class="form-group">
                                                    <label>تحديد طريقه الدخول</label>
                                                    <select id="sectionChooser" name="somename" class="form-control SlectBox SumoUnder" onclick="console.log($(this).val())" onchange="console.log('change is firing')" tabindex="-1">
                                                        <!--placeholder-->
                                                        <option title="Volvo is a car" value="">-- اختر --</option>
                                                        <option value="user">دخول كمريض</option>
                                                        <option value="admin">دخول كأدمن</option>
                                                    </select>
                                                </div>

                                                <div class="panel" id="user">
                                                    <h5 class="font-weight-semibold mb-4">دخول كمريض</h5>
                                                    <form action="{{ route('login.user') }}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control" placeholder="Enter your email" type="email" name="email" autofocus>
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input class="form-control" placeholder="Enter your password" type="password" name="password" autofocus>
                                                            @error('password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div><button class="btn btn-main-primary btn-block">Sign In</button>
                                                        <div class="row row-xs">
                                                            <div class="col-sm-6">
                                                                <button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
                                                            </div>
                                                            <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                                <button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="main-signin-footer mt-5">
                                                        <p><a href="">Forgot password?</a></p>
                                                        <p>Don't have an account? <a href="{{ url('/' . $page='signup') }}">Create an Account</a></p>
                                                    </div>
                                                </div>

                                                <div class="panel" id="admin">
                                                    <h5 class="font-weight-semibold mb-4">دخول كادمن</h5>
                                                    <form action="{{ route('login.admin') }}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control" placeholder="Enter your email" type="email" name="email" autofocus>
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input class="form-control" placeholder="Enter your password" type="password" name="password" autofocus>
                                                            @error('password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div><button class="btn btn-main-primary btn-block">Sign In</button>
                                                        <div class="row row-xs">
                                                            <div class="col-sm-6">
                                                                <button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
                                                            </div>
                                                            <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                                <button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="main-signin-footer mt-5">
                                                        <p><a href="">Forgot password?</a></p>
                                                        <p>Don't have an account? <a href="{{ url('/' . $page='signup') }}">Create an Account</a></p>
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