<!-- Modal -->
<div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('dashboard/sections_trans.Edit_section')}} - {{ $section->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('section.update', 'test') }}" method="post" autocomplete="off">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $section->id }}">
                    </div>
                    <div class="form-group">
                    <input type="text" name="name" class="form-control" value="{{ $section->name }}" placeholder="{{ trans('dashboard/sections_trans.Enter_section_name') }}">
                        </div>
                    <textarea name="describtion" class="form-control" cols="30" rows="10">{{ $section->describtion }}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{trans('dashboard/sections_trans.Close')}}</button>
                    <button type="submit" class="btn btn-info btn-sm">{{trans('dashboard/sections_trans.Submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
