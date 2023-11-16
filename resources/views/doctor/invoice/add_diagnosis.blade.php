<!-- Modal -->
<div class="modal fade" id="add_diagnosis{{ $invoice->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard/Invoices.Add_Diagnosis') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('diagnosis.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                    <input type="hidden" name="patient_id" value="{{$invoice->patient_id}}">
                    <input type="hidden" name="doctor_id" value="{{$invoice->doctor_id}}">

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('dashboard/Invoices.Diagnosis') }}</label>
                        <textarea name="diagnosis" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('dashboard/Invoices.pharmaceutical') }}</label>
                        <textarea name="medicine" class="form-control" rows="3"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/sections_trans.Close')}}</button>
                    <button type="submit" class="btn btn-info">{{trans('dashboard/doctors_trans.Submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
