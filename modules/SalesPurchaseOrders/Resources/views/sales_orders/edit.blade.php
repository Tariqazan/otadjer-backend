@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('sales-purchase-orders::general.sales_orders', 1)]))

@section('content')
    <x-documents.form.content
        :type="$type"
        :document="$salesOrder"
        contact-type="customer"
        hide-recurring
        hide-due-at
    />
@endsection

@push('scripts_start')
    <x-documents.script :items="$salesOrder->items()->get()" :document="$salesOrder" />
@endpush
