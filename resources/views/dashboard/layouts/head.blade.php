
@livewireStyles

@if (App::getLocale() == 'ar')
    <!-- Title -->
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('dashboard/img/brand/favicon.png')}}" type="image/x-icon"/>
    <!-- Icons css -->
    <link href="{{asset('dashboard/css/icons.css')}}" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="{{asset('dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
    <!--  Sidebar css -->
    <link href="{{asset('dashboard/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{asset('dashboard/css-rtl/sidemenu.css')}}">
    <!--- Style css -->
    <link href="{{asset('dashboard/css-rtl/style.css')}}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{asset('dashboard/css-rtl/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{asset('dashboard/css-rtl/skin-modes.css')}}" rel="stylesheet">

@else
    <!-- Title -->
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('dashboard/img/brand/favicon.png')}}" type="image/x-icon"/>
    <!-- Icons css -->
    <link href="{{asset('dashboard/css/icons.css')}}" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="{{asset('dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
    <!--  Right-sidemenu css -->
    <link href="{{asset('dashboard/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{asset('dashboard/css/sidemenu.css')}}">
    <!-- Maps css -->
    <link href="{{asset('dashboard/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
    <!-- style css -->
    <link href="{{asset('dashboard/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/css/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{asset('dashboard/css/skin-modes.css')}}" rel="stylesheet" />
@endif

<!-- Internal Data table css -->
<link href="{{asset('dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{asset('dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

<!---fonts--->
<link rel="stylesheet" href="{{ asset('dashboard/fonts/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/fonts/feather/iconfont.css') }}">
<!---fonts--->
<link rel="stylesheet" href="{{ asset('dashboard/fonts/Cairo/stylesheet.css') }}">
<style>
    body, h1, h2, h3, h4, h5, h6, .main-logo1, .fab ,.badge ,.invoice-content {
        font-family: 'Cairo';
    }
</style>

@yield('css')



