

<button class="btn btn-info" wire:click="show_form_add" type="button">{{ trans('dashboard/GroupServices_trans.Add_Service_Group') }}</button><br><br>
<div class="table-responsive">
    <table class="table text-md-nowrap" id="example1" data-page-length="50"style="text-align: center">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ trans('dashboard/sections_trans.Name') }}</th>
                <th>{{ trans('dashboard/GroupServices_trans.Total_offer_tax') }}</th>
                <th>{{ trans('dashboard/GroupServices_trans.Note') }}</th>
                <th>{{ trans('dashboard/doctors_trans.Processes') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groups as $group)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $group->name }}</td>
                    <td>{{ number_format($group->Total_with_tax, 2) }}</td>
                    <td>{{ \Str::limit($group->notes,50) }}</td>
                    <td>
                        <button wire:click="edit({{ $group->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{ trans('dashboard/doctors_trans.Edit') }}</button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteGroup{{ $group->id }}"><i class="fa fa-trash"></i> {{ trans('dashboard/doctors_trans.Delete') }}</button>
                    </td>
                </tr>
                @include('livewire.GroupServices.show_delete_modal')
            @endforeach
        </tbody>
    </table>
</div>
