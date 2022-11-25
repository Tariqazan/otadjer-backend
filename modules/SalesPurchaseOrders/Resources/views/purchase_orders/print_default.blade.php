@extends('layouts.print')

@section('title', trans_choice('sales-purchase-orders::general.purchase_orders', 1) . ': ' . $document->document_number)

@section('content')
    <x-documents.template.ddefault
        :type="$type"
        :document="$document"
    />
@endsection
