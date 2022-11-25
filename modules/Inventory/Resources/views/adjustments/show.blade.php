@extends('layouts.admin')

@section('title', $adjustment->adjustment_number)

@section('new_button')
    <div class="dropup header-drop-top">
        <button type="button" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-chevron-down"></i>&nbsp; {{ trans('general.more_actions') }}
        </button>

        <div class="dropdown-menu" role="menu">
            <a class="dropdown-item" href="{{ route('inventory.adjustments.edit', $adjustment->id) }}">
                {{ trans('general.edit') }}
            </a>
            <div class="dropdown-divider"></div>

            <a class="dropdown-item" href="{{ route('inventory.adjustments.print', $adjustment->id) }}" target="_blank">
                {{ trans('general.print') }}
            </a>

            <a class="dropdown-item" href="{{ route('inventory.adjustments.download', $adjustment->id) }}">
                {{ trans('general.download_pdf') }}
            </a>

            <div class="dropdown-divider"></div>

            {!! Form::deleteLink($adjustment, 'inventory.adjustments.destroy') !!}
        </div>
    </div>

    <a href="{{ route('inventory.adjustments.create') }}" class="btn btn-white btn-sm">
        {{ trans('general.add_new') }}
    </a>
@endsection

@section('content')
    <div class="card" style="padding: 0; padding-left: 15px; padding-right: 15px; border-radius: 0; box-shadow: 0 4px 16px rgba(0,0,0,.2);">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="text">
                        <h3>
                            {{ trans_choice('inventory::general.adjustments', 1) }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="row border-bottom-1">
                <div class="col-md-7">
                    <div class="text company">
                        <img  class="d-logo" src="{{ $logo }}" alt="{{ setting('company.name') }}" />
                    </div>
                </div>

                <div class="col-md-5">
                    <div>
                        <strong>{{ setting('company.name') }}</strong><br>
                        <p>{!! nl2br(setting('company.address')) !!}</p>
                        <p>
                            @if (setting('company.phone'))
                                {{ setting('company.phone') }}
                            @endif
                        </p>
                        <p>{{ setting('company.email') }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="text company">
                        <br>
                            <strong>
                                {{ trans_choice('inventory::general.warehouses', 1) . ':' }}
                            </strong>
                            <span class="float-right">{{ $adjustment->warehouse->name }}</span><br><br>

                            <strong>
                                {{ trans('general.description') . ':' }}
                            </strong>
                            <span class="float-right">{{ $adjustment->description }}</span><br><br>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text company">
                        <br>
                        <strong>
                            {{ trans('inventory::adjustments.adjustment_number') . ':' }}
                        </strong>
                        <span class="float-right">{{ $adjustment->adjustment_number }}</span><br><br>
                        <strong>
                            {{ trans('inventory::transferorders.reason') . ':' }}
                        </strong>
                        <span class="float-right">{{ $adjustment->reason }}</span><br><br>
                        <strong>
                            {{ trans_choice('inventory::general.adjustments', 1) . ' ' . trans('general.date') . ':' }}
                        </strong>
                        <span class="float-right">@date($adjustment->date)</span><br><br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="text">
                        <table class="lines">
                            <thead style="background-color:{{ setting('invoice.color', '#55588b') }} !important; -webkit-print-color-adjust: exact;">
                                <tr>
                                    <th class="item text-left text-white">{{ trans_choice('general.items', 2) }}</th>

                                    <th class="quantity text-white">{{ trans('inventory::general.quantity') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($adjustment->adjustment_items as $item)
                                    <tr>
                                        <td class="item">{{ $item->item->name }}</td>
                                        <td class="quantity">{{ $item->adjusted_quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts_start')
    <link rel="stylesheet" href="{{ asset('public/css/print.css?v=' . version('short')) }}" type="text/css">
    <script src="{{ asset('modules/Inventory/Resources/assets/js/adjustments.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
