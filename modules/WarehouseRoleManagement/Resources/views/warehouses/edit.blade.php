@can('create-warehouse-role-management')
    <div class="card">
        <div class="card-header with-border">
            <h3 class="card-title mb-0">{{ trans('inventory::warehouses.role_management') }}</h3>
        </div>

        <div class="card-body">
            <div class="form-group col-md-12" :class="[{'has-error': {{ 'form.errors.get("users")' }} }]">
                <div class="row mt-2">
                    @foreach($users as $user)
                        @if ($user->can('update-warehouse-role-management'))
                            <div class="col-md-3 role-list">
                                <div class="custom-control custom-checkbox">
                                    {{ Form::checkbox('users', $user->id, 1, ['id' => 'users-' . $user->id, 'class' => 'custom-control-input', 'v-model' => 'form.users', 'disabled' => 'true']) }}
                                    <label class="custom-control-label" for="users-{{ $user->id }}">
                                        {{ $user->name }}
                                    </label>
                                </div>
                            </div>
                        @else
                            <div class="col-md-3 role-list">
                                <div class="custom-control custom-checkbox">
                                    {{ Form::checkbox('users', $user->id, null, ['id' => 'users-' . $user->id, 'class' => 'custom-control-input', 'v-model' => 'form.users']) }}
                                    <label class="custom-control-label" for="users-{{ $user->id }}">
                                        {{ $user->name }}
                                    </label>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="invalid-feedback d-block" v-if="{{ 'form.errors.has("users")' }}" v-html="{{ 'form.errors.get("users")' }}"></div>
            </div>
        </div>
    </div>
@endcan

@cannot('update-warehouse-role-management')
    @foreach ($users as $user)
        @if ($user->can('update-warehouse-role-management'))
            {{ Form::checkbox('users', $user->id, 1, ['id' => 'users-' . $user->id, 'class' => 'custom-control-input d-none', 'v-model' => 'form.users', 'disabled' => 'true']) }}
        @endif
    @endforeach

    {{ Form::checkbox('users', user_id(), 1, ['id' => 'users-' . user_id(), 'class' => 'custom-control-input d-none', 'v-model' => 'form.users', 'disabled' => 'true']) }}
@endcannot      
