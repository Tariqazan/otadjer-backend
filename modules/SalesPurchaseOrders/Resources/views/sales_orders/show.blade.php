@extends('layouts.admin')

@section('title', setting('sales-orders.title', trans_choice('sales-purchase-orders::general.sales_orders', 1)) . ': ' . $salesOrder->document_number)

@section('new_button')
    <x-documents.show.top-buttons :type="$type" :document="$salesOrder" />
@endsection

@section('content')
    <x-documents.show.content
        :type="$type"
        :document="$salesOrder"
        hide-header-due-at
        hide-due-at
        hide-button-sent
        hide-button-received
        hide-button-paid
        hide-button-share
        hide-timeline-paid
        hide-footer-transactions
    />
@endsection

@push('scripts_start')
    <link rel="stylesheet" href="{{ asset('public/css/print.css?v=' . version('short')) }}" type="text/css">

    <x-documents.script />
@endpush
