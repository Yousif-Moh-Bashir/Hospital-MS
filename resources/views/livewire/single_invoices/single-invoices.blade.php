
<div class="card-body">

    @if ($InvoiceSaved)
        <div class="alert alert-info">{{ trans('dashboard/GroupServices_trans.saved_successfully') }}</div>
    @endif

    @if ($InvoiceUpdated)
        <div class="alert alert-info">{{ trans('dashboard/GroupServices_trans.updated_successfully') }}</div>
    @endif

    @if($show_table)
        @include('livewire.single_invoices.show_table')
    @else
        <form wire:submit.prevent="store" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col">
                    <label>{{ trans('dashboard/Invoices.Patient_Name') }}</label>
                    <select wire:model="patient_id" class="form-control" required>
                        <option value=""  >-- {{ trans('dashboard/login_trans.choose') }} --</option>
                        @foreach($Patients as $Patient)
                            <option value="{{ $Patient->id }}">{{ $Patient->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col">
                    <label>{{ trans('dashboard/Invoices.Doctor_Name') }}</label>
                    <select wire:model="doctor_id"  wire:change="get_section" class="form-control"  id="exampleFormControlSelect1" required>
                        <option value="" >-- {{ trans('dashboard/login_trans.choose') }} --</option>
                        @foreach($Doctors as $Doctor)
                            <option value="{{$Doctor->id}}">{{$Doctor->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col">
                    <label>{{ trans('dashboard/Invoices.section') }}</label>
                    <input wire:model="section_id" type="text" class="form-control" readonly >
                </div>

                <div class="col">
                    <label>{{ trans('dashboard/Invoices.invoice_type') }}</label>
                    <select wire:model="type" class="form-control" {{ $updateMode == true ? 'disabled' : '' }} >
                        <option value="" >-- {{ trans('dashboard/login_trans.choose') }} --</option>
                        <option value="1">{{ trans('dashboard/Invoices.Monetary') }}</option>
                        <option value="2">{{ trans('dashboard/Invoices.Deferred') }}</option>
                    </select>
                </div>


            </div><br>

            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0"></h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap" style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('dashboard/Invoices.Service_Name') }}</th>
                                        <th>{{ trans('dashboard/Invoices.service_price') }}</th>
                                        <th>{{ trans('dashboard/Invoices.discount_value') }}</th>
                                        <th>{{ trans('dashboard/Invoices.tax_rate') }}</th>
                                        <th>{{ trans('dashboard/Invoices.tax_value') }}</th>
                                        <th>{{ trans('dashboard/Invoices.total_with_tax') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <select wire:model="Service_id" class="form-control" wire:change="get_price" id="exampleFormControlSelect1">
                                                <option value="">-- {{ trans('dashboard/login_trans.choose') }} --</option>
                                                @foreach($Services as $Service)
                                                    <option value="{{$Service->id}}">{{$Service->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input wire:model="price" type="text" class="form-control" readonly></td>
                                        <td><input wire:model="discount_value" type="text" class="form-control"></td>
                                        <th><input wire:model="tax_rate" type="text" class="form-control"></th>
                                        <td><input type="text" class="form-control" value="{{$tax_value}}" readonly ></td>
                                        <td><input type="text" class="form-control" readonly value="{{$subtotal + $tax_value }}"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div><!-- bd -->
                        </div><!-- bd -->
                    </div><!-- bd -->
                </div>
            </div>

            <input class="btn btn-info" type="submit" value="{{ trans('dashboard/doctors_trans.Submit') }}">
        </form>
    @endif

</div>

