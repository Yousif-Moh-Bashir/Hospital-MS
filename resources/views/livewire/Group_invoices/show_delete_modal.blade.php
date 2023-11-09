
<!-- Modal -->
<div class="modal fade" id="deleteGroup{{$group_invoice->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard/Invoices.Delete_Invoices') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <div class="modal-body">
                    <h5>{{trans('Dashboard/sections_trans.Warning')}}</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/sections_trans.Close')}}</button>
                    <button type="button" class="btn btn-danger" wire:click="delete({{ $group_invoice->id }})">{{trans('dashboard/doctors_trans.Submit')}}</button>
                </div>
        </div>
    </div>
</div>
