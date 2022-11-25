@extends('layouts.admin')

@section('title', trans_choice('sales-purchase-orders::general.purchase_orders', 2))

@section('new_button')
    <x-documents.index.top-buttons :type="$type" />
@endsection

@section('content')
    <x-documents.index.content
        :type="$type"
        :documents="$purchaseOrders"
        hide-due-at
    />
@endsection

@push('scripts_start')
    <x-documents.script />
@endpush
