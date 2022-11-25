@extends('layouts.print')

@section('title', trans_choice('sales-purchase-orders::general.sales_orders', 1) . ': ' . $document->document_number)

@section('content')
    <x-documents.template.modern
        :type="$type"
        :document="$document"
    />
@endsection
