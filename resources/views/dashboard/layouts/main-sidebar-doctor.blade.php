<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . $page='index') }}"><img src="{{asset('dashboard/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img src="{{asset('dashboard/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img src="{{asset('dashboard/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img src="{{asset('dashboard/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                @php
                    $image = auth()->user()->image->filename;
                @endphp
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround" src="{{asset('dashboard/img/doctors/'.$image)}}"><span class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ auth()->user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ auth()->user()->email }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">{{ trans('dashboard/main_sidebar.MAIN') }}</li>

            <li class="slide">
                <a class="side-menu__item" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">{{ trans('dashboard/main_sidebar.HOME') }}</span></a>
            </li>

            <li class="side-item side-item-category">{{ trans('dashboard/main_sidebar.General') }}</li>

            <!--------------------------------------------------------------------------------------------->

            {{-- <li class="slide">
                <a class="side-menu__item" href="{{ route('section.index') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0V0z" fill="none"></path><path d="M5 5h4v4H5zm10 10h4v4h-4zM5 15h4v4H5zM16.66 4.52l-2.83 2.82 2.83 2.83 2.83-2.83z" opacity=".3"></path><path d="M16.66 1.69L11 7.34 16.66 13l5.66-5.66-5.66-5.65zm-2.83 5.65l2.83-2.83 2.83 2.83-2.83 2.83-2.83-2.83zM3 3v8h8V3H3zm6 6H5V5h4v4zM3 21h8v-8H3v8zm2-6h4v4H5v-4zm8-2v8h8v-8h-8zm6 6h-4v-4h4v4z"></path></svg><span class="side-menu__label">{{ trans('dashboard/main_sidebar.Sections') }}</span>
                    <span class="badge badge-success side-badge">{{ App\Models\Section::count() }}</span>
                </a>
            </li> --}}

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/><path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg><span class="side-menu__label">{{ trans('dashboard/doctors_trans.Statements') }}</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('invoices.index') }}">{{ trans('dashboard/Invoices.New_statements') }}</a><span class="badge badge-danger side-badge">{{ App\Models\Invoice::where('doctor_id',auth()->user()->id)->where('invoice_status', 1)->count() }}</span></li>
                    <li><a class="slide-item" href="{{route('reviewInvoices')}}">{{ trans('dashboard/Invoices.List_of_reviews') }}</a><span class="badge badge-warning side-badge">{{ App\Models\Invoice::where('doctor_id',auth()->user()->id)->where('invoice_status', 2)->count() }}</span></li>
                    <li><a class="slide-item" href="{{route('completedInvoices')}}">{{ trans('dashboard/Invoices.Completed_Statements') }}</a><span class="badge badge-success side-badge">{{ App\Models\Invoice::where('doctor_id',auth()->user()->id)->where('invoice_status', 3)->count() }}</span></li>
                </ul>
            </li>

            {{-- <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"></path><path d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"></path></svg><span class="side-menu__label">{{ trans('dashboard/Services_trans.Services') }}</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('service.index') }}">{{ trans('dashboard/Services_trans.Single_Services') }}</a></li>
                    <li><a class="slide-item" href="{{ route('Add_GroupServices') }}">{{ trans('dashboard/Services_trans.Services_group') }}</a></li>
                    <li><a class="slide-item" href="{{ route('insurance_companies.index') }}">{{ trans('dashboard/Insurance_companies.Insurance_companies') }}</a></li>
                    <li><a class="slide-item" href="{{ route('ambulance.index') }}">{{ trans('dashboard/Services_trans.Ambulance') }}</a></li>
                    <li><a class="slide-item" href="#">{{ trans('dashboard/Services_trans.Ambulance_calls') }}</a></li>
                </ul>
            </li> --}}

            {{-- <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3"></path><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z"></path></svg><span class="side-menu__label">{{ trans('dashboard/Patient.Patients') }}</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('Patients.index') }}">{{ trans('dashboard/Patient.Patient_list') }}</a>
                        <span class="badge badge-info side-badge">{{ App\Models\Patient::count() }}</span>
                    </li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3"></path><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"></path></svg><span class="side-menu__label">{{ trans('dashboard/Invoices.Invoices') }}</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('single_invoices') }}">{{ trans('dashboard/Invoices.Single_Service_Bill') }}</a></li>
                    <li><a class="slide-item" href="{{ route('group_invoices') }}">فاتورة مجموعة خدمات</a></li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3"></path><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"></path></svg><span class="side-menu__label">{{ trans('dashboard/Receipt.Accounts') }}</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('Receipt.index') }}">{{ trans('dashboard/Receipt.Catch_Receipt') }}</a></li>
                    <li><a class="slide-item" href="{{ route('Payment.index') }}">{{ trans('dashboard/Payment.Catch_Payment') }}</a></li>
                </ul>
            </li> --}}

        </ul>
    </div>
</aside>
<!-- main-sidebar -->
