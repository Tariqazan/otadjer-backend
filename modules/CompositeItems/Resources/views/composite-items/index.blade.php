@extends('layouts.admin')

@section('title', trans_choice('composite-items::general.composite_items', 2))

@section('new_button')
    @can('create-composite-items-composite-items')
        <span><a href="{{ route('composite-items.composite-items.create') }}" class="btn btn-success btn-sm">{{ trans('general.add_new') }}</a></span>
    @endcan
@endsection

@section('content')
    @if ($composite_items->count() || request()->get('search', false))
        <div class="card">
            <div class="card-header border-bottom-0" :class="[{'bg-gradient-primary': bulk_action.show}]">
                {!! Form::open([
                    'method' => 'GET',
                    'route' => 'composite-items.composite-items.index',
                    'role' => 'form',
                    'class' => 'mb-0'
                ]) !!}
                    <div class="align-items-center" v-if="!bulk_action.show">
                        <x-search-string model="Modules\CompositeItems\Models\CompositeItem" />
                    </div>

                    {{ Form::bulkActionRowGroup('general.items', $bulk_actions, ['group' => 'composite-items', 'type' => 'composite-items']) }}
                {!! Form::close() !!}
            </div>

            <div class="table-responsive">
                <table class="table table-flush table-hover">
                    <thead class="thead-light">
                        <tr class="row table-head-line">
                            <th class="col-md-1 d-none d-sm-block">{{ Form::bulkActionAllGroup() }}</th>
                            <th class="col-md-2">@sortablelink('name', trans('general.name'), ['filter' => 'active, visible'], ['class' => 'col-aka', 'rel' => 'nofollow'])</th>
                            <th class="col-md-1 d-none d-lg-block">@sortablelink('category', trans_choice('general.categories', 1))</th>
                            <th class="col-md-2 text-center d-none d-lg-block">{{ trans('composite-items::general.estimate_stock') }}</th>
                            <th class="col-md-2 text-right d-none d-md-block">@sortablelink('sale_price', trans('items.sales_price'))</th>
                            <th class="col-md-2 text-right d-none d-lg-block">@sortablelink('purchase_price', trans('items.purchase_price'))</th>
                            <th class="col-md-1 text-center">@sortablelink('enabled', trans('general.enabled'))</th>
                            <th class="col-md-1 text-center"><a>{{ trans('general.actions') }}</a></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($composite_items as $item)
                            <tr class="row align-items-center border-top-1">
                                <td class="col-md-1 d-none d-sm-block">
                                    {{ Form::bulkActionGroup($item->item->id, $item->item->name) }}
                                </td>
                                <td class="col-md-2">
                                    <img src="{{ $item->item->picture ? Storage::url($item->item->picture->id) : asset('public/img/otadjer-logo-black.svg') }}" class="avatar image-style p-1 mr-3 item-img col-aka d-none d-md-inline" alt="{{ $item->item->name }}">
                                    <a href="{{ route('composite-items.composite-items.edit', $item->id) }}">{{ $item->item->name }}</a>
                                </td>
                                <td class="col-md-1 d-none d-lg-block long-texts">
                                    {{ $item->item->category->name }}
                                </td>
                                <td class="col-md-2 text-center d-none d-lg-block long-texts">
                                    {{ $item->estimate_stock }}
                                </td>
                                <td class="col-md-2 text-right d-none d-md-block">
                                    {{ money($item->item->sale_price, setting('default.currency'), true) }}
                                </td>
                                <td class="col-md-2 text-right d-none d-lg-block">
                                    {{ money($item->item->purchase_price, setting('default.currency'), true) }}
                                </td>
                                <td class="col-md-1 text-center">
                                    @if (user()->can('update-composite-items-composite-items'))
                                        {{ Form::enabledGroup($item->id, $item->item->name, $item->item->enabled) }}
                                    @else
                                        @if ($item->item->enabled)
                                            <badge rounded type="success" class="mw-60">{{ trans('general.yes') }}</badge>
                                        @else
                                            <badge rounded type="danger" class="mw-60">{{ trans('general.no') }}</badge>
                                        @endif
                                    @endif
                                </td>
                                <td class="col-md-1 text-center">
                                    <div class="dropdown">
                                        <a class="btn btn-neutral btn-sm text-light items-align-center p-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-muted"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('composite-items.composite-items.edit', $item->id) }}">{{ trans('general.edit') }}</a>
                                            @can('delete-composite-items-composite-items')
                                                <div class="dropdown-divider"></div>
                                                {!! Form::deleteLink($item, 'composite-items.composite-items.destroy') !!}
                                            @endcan
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer table-action">
                <div class="row align-items-center">
                    @include('partials.admin.pagination', ['items' => $composite_items])
                </div>
            </div>
        </div>
    @else
        <x-empty-page page="items" />
    @endif
@endsection

@push('scripts_start')
    <script src="{{ asset('modules/CompositeItems/Resources/assets/js/composite-items.min.js?v=' . module_version('composite-items')) }}"></script>
@endpush
