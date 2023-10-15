<!-- Modal -->
<div class="modal fade" id="update_password{{ $doctor->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ trans('dashboard/doctors_trans.Change_Password') }} - {{$doctor->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('update_password') }}" method="post" autocomplete="off">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="{{ trans('dashboard/doctors_trans.new_password') }}">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="{{ trans('dashboard/doctors_trans.confirm_password') }}">
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
