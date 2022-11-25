@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('sales-purchase-orders::general.purchase_orders', 1)]))

@section('content')
    <x-documents.form.content
        :type="$type"
        :document="$purchaseOrder"
        contact-type="vendor"
        hide-recurring
        hide-due-at
    />
@endsection

@push('scripts_start')
    <x-documents.script :items="$purchaseOrder->items()->get()" :document="$purchaseOrder" />
@endpush
