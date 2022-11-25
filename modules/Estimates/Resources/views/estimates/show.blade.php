@extends('layouts.admin')

@section('title', trans_choice('estimates::general.estimates', 1) . ': ' . $estimate->document_number)

@section('new_button')
    <x-documents.show.top-buttons
        :type="$type"
        :document="$estimate"
        hide-button-cancel
    />
@endsection

@section('content')
    <x-documents.show.content
        :type="$type"
        :document="$estimate"
        hide-header-due-at
        hide-due-at
        hide-button-received
        hide-button-paid
        hide-timeline-paid
        hide-footer-transactions
        hide-timeline-sent
    />
@endsection

@push('scripts_start')
    <link rel="stylesheet" href="{{ asset('public/css/print.css?v=' . version('short')) }}" type="text/css">

    <x-documents.script />
@endpush
