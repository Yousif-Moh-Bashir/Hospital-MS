@extends('Dashboard.layouts.master')
@section('title')
    {{ trans('dashboard/Invoices.Invoices') }}
@stop
@section('css')
<link href="{{asset('css/invoice/style.css')}}" rel="stylesheet">
<style>
    .invoice-content h1,.invoice-content, h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
        font-family: 'Cairo';
    }
</style>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('dashboard/Invoices.Invoices') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('dashboard/Services_trans.Single_Services') }}</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@include('dashboard.layouts.messages_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Invoice 8 start -->
                        <div class="invoice-8 invoice-content" id="print-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="invoice-inner clearfix">
                                            <div class="invoice-info clearfix" id="invoice_wrapper">
                                                <div class="invoice-headar border-shadow-bg">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="invoice-logo">
                                                                <!-- logo started -->
                                                                <div class="logo">
                                                                    <img src="{{asset ('dashboard/img/brand/logo.png') }}" alt="logo">
                                                                </div>
                                                                <!-- logo ended -->
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="invoice-contact-us">
                                                                <h1>{{ trans('dashboard/Payment.Contact_Us') }}</h1>
                                                                <ul class="link">
                                                                    <li>
                                                                        <i class="fa fa-map-marker"></i> {{ trans('dashboard/Payment.H_I_Hospital') }}
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-envelope"></i> <a href="mailto:sales@hotelempire.com">info@themevessel.com</a>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-phone"></i> <a href="tel:+55-417-634-7071">+00 123 647 840</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="invoice-top border-shadow-bg">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h1 class="invoice-name">{{ trans('dashboard/Invoices.Single_Service_Bill') }}</h1>
                                                        </div>
                                                        <div class="col-sm-6 mb-30">
                                                            <div class="invoice-number-inner">
                                                                <h2 class="name">{{ trans('dashboard/Payment.Invoice_No') }} : {{ Request::get('invoice_id') }}</h2>
                                                                <p class="mb-0">{{ trans('dashboard/Payment.Invoice_Date') }} : <span>{{ Request::get('invoice_date') }}</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 mb-30">
                                                            <div class="invoice-number">
                                                                <h4 class="inv-title-1">{{ trans('dashboard/Payment.Invoice_To') }}</h4>
                                                                <h2 class="name mb-10">{{ Request::get('pation_name') }}</h2>
                                                                <p class="invo-addr-1 mb-0">
                                                                    {{ Request::get('pation_email') }} <br/>
                                                                    {{ Request::get('pation_address') }} <br/>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 mb-30">
                                                            <div class="invoice-number">
                                                                <div class="invoice-number-inner">
                                                                    <h4 class="inv-title-1">{{ trans('dashboard/Payment.Invoice_From') }}</h4>
                                                                    <h2 class="name mb-10">{{ auth()->user()->name }}</h2>
                                                                    <p class="invo-addr-1 mb-0">
                                                                        {{ auth()->user()->email }}<br/>
                                                                        Bandara Internasional Hamad, Qatar<br/>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @php
                                                    $LaravelLocalization = LaravelLocalization::setLocale();
                                                @endphp

                                                <div class="invoice-center border-shadow-bg">
                                                    <div class="order-summary">
                                                        <div class="table-outer">
                                                            <table class="default-table invoice-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th @if($LaravelLocalization == 'ar') style="text-align: right" @endif>#</th>
                                                                        <th class="tx-right">{{ trans('dashboard/Invoices.Service_Name') }}</th>
                                                                        <th class="tx-right">{{ trans('dashboard/Invoices.invoice_type') }}</th>
                                                                        <th class="tx-right">{{ trans('dashboard/Invoices.service_price') }}</th>
                                                                        <th class="tx-right">{{ trans('dashboard/Invoices.discount_value') }}</th>
                                                                        <th class="tx-right">{{ trans('dashboard/Invoices.tax_value') }}</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <tr>
                                                                        <td @if($LaravelLocalization == 'ar') style="text-align: right" @endif>1</td>
                                                                        <td class="tx-12">{{ Request::get('Service_name') }}</td>
                                                                        <td class="tx-right">{{Request::get('type') == 1 ? 'نقدي' : 'اجل'}}</td>
                                                                        <td class="tx-center">{{ number_format(Request::get('price'),2) }}</td>
                                                                        <td class="tx-center">{{  number_format(Request::get('discount_value'),2) }}</td>
                                                                        <td class="tx-center">% {{Request::get('tax_rate')}}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="invoice-center border-shadow-bg">
                                                    <div class="order-summary">
                                                        <div class="table-outer">
                                                            <table class="default-table invoice-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th @if($LaravelLocalization == 'ar') style="text-align: right" @endif>{{ trans('dashboard/GroupServices_trans.Total') }}</th>
                                                                        <td class="tx-center">{{number_format(Request::get('price'), 2)}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th @if($LaravelLocalization == 'ar') style="text-align: right" @endif>{{ trans('dashboard/Invoices.total_with_tax') }}</th>
                                                                        <td class="tx-center"><h5 class="tx-primary tx-bold">{{number_format(Request::get('total_with_tax'), 2)}}</h5></td>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="invoice-bottom border-shadow-bg bsb2">
                                                    <div class="row">
                                                        <div class="col-lg-7 col-md-7 col-sm-7">
                                                            <div class="terms-conditions mb-30">
                                                                <h3 class="inv-title-1 mb-10">Terms & Conditions</h3>
                                                                <i style="width: 20px; color: #11bbb0;" class="fa fa-user"></i> {{ Request::get('doctor_name') }} <br>
                                                                <i style="width: 20px; color: #11bbb0;" class="fa fa-envelope"></i> {{ Request::get('doctor_email') }} <br>
                                                                <i style="width: 20px; color: #11bbb0;" class="fa fa-plus-circle"></i> {{ Request::get('section_name') }} <br>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="col-lg-7 col-md-7 col-sm-7">
                                                            <div class="payment-method mb-30">
                                                                <div class="invoice-contact-us">
                                                                    <h3 class="inv-title-1 mb-10">{{ trans('dashboard/doctors_trans.Doctors_data') }}</h3>
                                                                    <ul class="payment-method-list-1 text-14 link">
                                                                        <li><i class="fa fa-user"></i> {{ Request::get('doctor_name') }}</li>
                                                                        <li><i class="fa fa-envelope"></i> {{ Request::get('doctor_email') }}</li>
                                                                        <li><i class="fa fa-plus-circle"></i> {{ Request::get('section_name') }}</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-lg-5 col-md-5 col-sm-5">
                                                            <div class="payment-method mb-30">
                                                                <h3 class="inv-title-1 mb-10">{{ trans('dashboard/Payment.Payment_Method') }}</h3>
                                                                <ul class="payment-method-list-1 text-14">
                                                                    <li><strong>{{ trans('dashboard/Payment.Account_No') }} -</strong> 00 123 647 840</li>
                                                                    <li><strong>{{ trans('dashboard/Payment.Account_Name') }} -</strong> Jhon Doe</li>
                                                                    <li><strong>{{ trans('dashboard/Payment.Branch_Name') }} -</strong> xyz</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="invoice-btn-section clearfix d-print-none">
                                                <a href="#" class="btn btn-secondary print-btn">
                                                    <i class="fa fa-print"></i> {{ trans('dashboard/Payment.Print_Invoice') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Invoice 8 end -->
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->


    </div>
    <!-- row closed -->
@endsection
@section('js')
<!--Internal  Notify js -->
<script src="{{asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{asset('dashboard/plugins/notify/js/notifit-custom.js')}}"></script>
<script src="{{ asset('dashboard/js/printThis.js') }}"></script>
<script>
    //print order
    $(document).on('click', '.print-btn', function() {
        $('#print-area').printThis({
        // importCSS: true,
        loadCSS: 'admin-assets/css/my-custom.css',
        });
    });//end of click function
</script>
@endsection
