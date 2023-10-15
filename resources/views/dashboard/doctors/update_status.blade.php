<!-- Modal -->
<div class="modal fade" id="update_status{{ $doctor->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ trans('dashboard/doctors_trans.Change_Status') }} - {{ $doctor->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('update_status') }}" method="post" autocomplete="off">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="status">{{trans('dashboard/doctors_trans.Change_Status')}}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option {{ $doctor->status == 1 ? 'selected' : '' }} value="1">{{trans('dashboard/doctors_trans.Enabled')}}</option>
                            <option {{ $doctor->status == 0 ? 'selected' : '' }} value="0">{{trans('dashboard/doctors_trans.Not_enabled')}}</option>
                        </select>
                    </div>

                    <input type="hidden" name="id" value="{{ $doctor->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('dashboard/doctors_trans.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('dashboard/doctors_trans.Submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
