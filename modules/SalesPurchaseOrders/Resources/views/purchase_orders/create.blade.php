@extends('layouts.admin')

@section('title', trans('general.title.new', ['type' => trans_choice('sales-purchase-orders::general.purchase_orders', 1)]))

@section('content')
    <x-documents.form.content
        :type="$type"
        contact-type="vendor"
        hide-recurring
        hide-due-at
        is-purchase-price
    />
@endsection

@push('scripts_start')
    <x-documents.script />
@endpush
