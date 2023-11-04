

<div class="table-responsive">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info" wire:click="show_form_add">
        <i class="fa fa-file-text-o" aria-hidden="true"></i> {{ trans('dashboard/Invoices.Add_new_invoice') }}
    </button><br><br>

    <table class="table text-md-nowrap" id="example1" data-page-length="50"style="text-align: center">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ trans('dashboard/Invoices.Service_Name') }}</th>
            <th>{{ trans('dashboard/Invoices.Patient_Name') }}</th>
            <th>{{ trans('dashboard/Invoices.invoice_date') }}</th>
            <th>{{ trans('dashboard/Invoices.Doctor_Name') }}</th>
            <th>{{ trans('dashboard/Invoices.section') }}</th>
            <th>{{ trans('dashboard/Invoices.service_price') }}</th>
            <th>{{ trans('dashboard/Invoices.discount_value') }}</th>
            <th>{{ trans('dashboard/Invoices.tax_rate') }}</th>
            <th>{{ trans('dashboard/Invoices.tax_value') }}</th>
            <th>{{ trans('dashboard/Invoices.total_with_tax') }}</th>
            <th>{{ trans('dashboard/Invoices.invoice_type') }}</th>
            <th>{{ trans('dashboard/Invoices.Processes') }}</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($single_invoices as $single_invoice)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $single_invoice->Service->name }}</td>
                    <td>{{ $single_invoice->Patient->name }}</td>
                    <td>{{ $single_invoice->invoice_date }}</td>
                    <td>{{ $single_invoice->Doctor->name }}</td>
                    <td>{{ $single_invoice->Section->name }}</td>
                    <td>{{ number_format($single_invoice->price, 2) }}</td>
                    <td>{{ number_format($single_invoice->discount_value, 2) }}</td>
                    <td>{{ $single_invoice->tax_rate }}%</td>
                    <td>{{ number_format($single_invoice->tax_value, 2) }}</td>
                    <td>{{ number_format($single_invoice->total_with_tax, 2) }}</td>
                    <td>
                        @if($single_invoice->type == 1)
                            {{ trans('dashboard/Invoices.Monetary') }}
                        @else
                            {{ trans('dashboard/Invoices.Deferred') }}
                        @endif
                    </td>
                    <td>
                        <button wire:click="print({{ $single_invoice->id }})" class="btn btn-sm btn-secondary"><i class="fas fa-print"></i></button>
                        <button wire:click="edit({{ $single_invoice->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteGroup{{$single_invoice->id}}"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                @include('livewire.single_invoices.show_delete_modal')
            @endforeach
        </tbody>
    </table>
</div>
