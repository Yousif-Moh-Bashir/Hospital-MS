<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> {{ trans('dashboard/Services_trans.Add_Service') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- // autocomplete="off" -->
            <form action="{{ route('service.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="{{ trans('dashboard/Services_trans.Enter_Service_name') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" class="form-control" placeholder="{{ trans('dashboard/Services_trans.Enter_Service_Price') }}">
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" placeholder="{{ trans('dashboard/Services_trans.Enter_Service_Describtion') }}" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ trans('dashboard/Services_trans.Close') }}</button>
                    <button type="submit" class="btn btn-info btn-sm">{{ trans('dashboard/Services_trans.Save') }}</button> </form>
                </div>
            </form>
        </div>
    </div>
</div>
