@extends('layouts.print')

@section('title', trans_choice('inventory.general.adjustments', 1) . ': ' . $adjustment->adjustment_number)

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
                        <span class="float-right">{{ trans('inventory::adjustments.reason.' . $adjustment->reason) }}</span><br><br>
                        <strong>
                            {{ trans_choice('inventory::general.adjustments', 1) . ' ' . trans('general.date') . ':' }}
                        </strong>
                        <span class="float-right">{{ $adjustment->date }}</span><br><br>
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
