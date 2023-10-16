<!-- Modal -->
<div class="modal fade" id="edit{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('dashboard/Services_trans.Edit_Service')}} - {{ $service->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('service.update', 'test') }}" method="post" autocomplete="off">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                @csrf
                <input type="hidden" name="id" value="{{ $service->id }}">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" value="{{ $service->name }}" placeholder="{{ trans('dashboard/Services_trans.Enter_Service_name') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" class="form-control" value="{{ $service->price }}" placeholder="{{ trans('dashboard/Services_trans.Enter_Service_Price') }}">
                    </div>
                    <div class="form-group">
                        <label for="status">{{trans('dashboard/doctors_trans.Change_Status')}}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option {{ $service->status == 1 ? 'selected' : '' }} value="1">{{trans('dashboard/doctors_trans.Enabled')}}</option>
                            <option {{ $service->status == 0 ? 'selected' : '' }} value="0">{{trans('dashboard/doctors_trans.Not_enabled')}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" cols="30" rows="10">{{ $service->description }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{trans('dashboard/Services_trans.Close')}}</button>
                    <button type="submit" class="btn btn-info btn-sm">{{trans('dashboard/Services_trans.Submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
