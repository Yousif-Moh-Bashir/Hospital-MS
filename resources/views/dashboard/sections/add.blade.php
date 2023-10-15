<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> {{ trans('dashboard/sections_trans.Add_section') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- // autocomplete="off" -->
            <form action="{{ route('section.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    {{-- <label for="exampleInputPassword1">{{trans('dashboard/sections_trans.name_sections')}}</label> --}}
                    <input type="text" name="name" class="form-control" placeholder="{{ trans('dashboard/sections_trans.Enter_section_name') }}">
                    <textarea name="describtion" class="form-control" placeholder="{{ trans('dashboard/sections_trans.Enter_section_name') }}" cols="30" rows="10"></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ trans('dashboard/sections_trans.Close') }}</button>
                    <button type="submit" class="btn btn-info btn-sm">{{ trans('dashboard/sections_trans.Save') }}</button> </form>
                </div>
            </form>
        </div>
    </div>
</div>
