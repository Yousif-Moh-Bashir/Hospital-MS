

<div class="card-body">

    @if ($ServiceSaved)
        <div class="alert alert-info">{{ trans('dashboard/GroupServices_trans.saved_successfully') }}</div>
    @endif

    @if ($ServiceUpdated)
        <div class="alert alert-info">{{ trans('dashboard/GroupServices_trans.updated_successfully') }}</div>
    @endif

    @if ($show_table)
        @include('livewire.GroupServices.show_table')
    @else
        <form wire:submit.prevent="saveGroup" autocomplete="off">
            @csrf
            <div class="form-group">
                <label>{{ trans('dashboard/GroupServices_trans.Group_Name') }}</label>
                <input wire:model="name_group" type="text" name="name_group" class="form-control" required>
            </div>

            <div class="form-group">
                <label>{{ trans('dashboard/GroupServices_trans.Note') }}</label>
                <textarea wire:model="notes" name="notes" class="form-control" rows="5"></textarea>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <div class="col-md-12">
                        <button class="btn btn-outline-primary" wire:click.prevent="addService">
                            {{ trans('dashboard/GroupServices_trans.Add_single_service') }}
                        </button>
                    </div>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="table-primary">
                                <th>{{ trans('dashboard/Services_trans.name_Service') }}</th>
                                <th width="200">{{ trans('dashboard/GroupServices_trans.number') }}</th>
                                <th width="200">{{ trans('dashboard/GroupServices_trans.Processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($GroupsItems as $index => $groupItem)
                                <tr>
                                    <td>
                                        @if($groupItem['is_saved'])
                                            <input type="hidden" name="GroupsItems[{{$index}}][service_id]" wire:model="GroupsItems.{{$index}}.service_id"/>
                                            @if($groupItem['service_name'] && $groupItem['service_price'])
                                                {{ $groupItem['service_name'] }}
                                                ({{ number_format($groupItem['service_price'], 2) }})
                                            @endif
                                        @else
                                            <select name="GroupsItems[{{$index}}][service_id]"
                                                    class="form-control{{ $errors->has('GroupsItems.' . $index) ? ' is-invalid' : '' }}" wire:model="GroupsItems.{{$index}}.service_id">
                                                <option value="">-- {{ trans('dashboard/Services_trans.Select') }} --</option>
                                                @foreach ($allServices as $service)
                                                    <option value="{{ $service->id }}">
                                                        {{ \App\Models\ServiceTranslation::where(['Service_id' => $service->id])->pluck('name')->first() }} ({{ number_format($service->price, 2) }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('GroupsItems.' . $index))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('GroupsItems.' . $index) }}
                                                </em>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if($groupItem['is_saved'])
                                            <input type="hidden" name="GroupsItems[{{$index}}][quantity]"
                                                wire:model="GroupsItems.{{$index}}.quantity"/>
                                            {{ $groupItem['quantity'] }}
                                        @else
                                            <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="GroupsItems[{{$index}}][quantity]"
                                                class="form-control" wire:model="GroupsItems.{{$index}}.quantity"/>
                                        @endif
                                    </td>
                                    <td>
                                        @if($groupItem['is_saved'])
                                            <button class="btn btn-sm btn-primary mr-1"
                                                wire:click.prevent="editService({{$index}})">
                                                {{ trans('dashboard/GroupServices_trans.Edit') }}
                                            </button>
                                        @elseif($groupItem['service_id'])
                                            <button class="btn btn-sm btn-success mr-1"
                                                wire:click.prevent="saveService({{$index}})">
                                                {{ trans('dashboard/GroupServices_trans.Submit') }}
                                            </button>
                                        @endif
                                        <button class="btn btn-sm btn-danger mr-1"
                                            wire:click.prevent="removeService({{$index}})">
                                            {{ trans('dashboard/GroupServices_trans.Delete') }}
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="col-lg-4 ml-autot">
                        <table class="table pull-right">
                            <tr>
                                <td style="color: red">{{ trans('dashboard/GroupServices_trans.Total') }}</td>
                                <td>{{ number_format($subtotal, 2) }}</td>
                            </tr>

                            <tr>
                                <td style="color: red">{{ trans('dashboard/GroupServices_trans.discoun_value') }}</td>
                                <td width="125">
                                    <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="discount_value" class="form-control w-75 d-inline" wire:model="discount_value">
                                </td>
                            </tr>

                            <tr>
                                <td style="color: red">{{ trans('dashboard/GroupServices_trans.Tax_rate') }}</td>
                                <td>
                                    <input type="number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="taxes" class="form-control w-75 d-inline" min="0" max="100" wire:model="taxes"> %
                                </td>
                            </tr>
                            <tr>
                                <td style="color: red">{{ trans('dashboard/GroupServices_trans.Total_with_tax') }}</td>
                                <td>{{ number_format($total, 2) }}</td>
                            </tr>
                        </table>
                        <br/>
                        <input class="btn btn-outline-success" type="submit" value="{{ trans('dashboard/GroupServices_trans.Confirm_data') }}">
                    </div>

                </div>
            </div>
        </form>
    @endif

</div>
