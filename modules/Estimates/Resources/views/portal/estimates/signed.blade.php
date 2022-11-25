@extends('layouts.signed')

@section('title', trans_choice('estimates::general.estimates', 1) . ': ' . $estimate->document_number)

@section('new_button')
    @stack('button_print_start')
    <a href="{{ $printAction }}" target="_blank" class="btn btn-white btn-sm">
        {{ trans('general.print') }}
    </a>
    @stack('button_print_end')

    @stack('button_pdf_start')
    <a href="{{ $pdfAction }}" class="btn btn-white btn-sm">
        {{ trans('general.download') }}
    </a>
    @stack('button_pdf_end')

    @if($estimate->status !== 'expired')
        @if($estimate->status !== 'approved')
            <a href="{{  $approveAction }}"
               class="btn btn-success btn-sm">
                {{ trans('estimates::general.approve') }}
            </a>
        @endif
        @if($estimate->status !== 'refused')
            <a href="{{ $refuseAction }}"
               class="btn btn-danger btn-sm">
                {{ trans('estimates::general.refuse') }}
            </a>
        @endif
    @endif

    @stack('button_dashboard_start')
    <a href="{{ route('portal.dashboard') }}" class="btn btn-white btn-sm">
        {{ trans('estimates::general.all_estimates') }}
    </a>
    @stack('button_dashboard_end')
@endsection

@section('content')
    <x-documents.show.header
        :type="$type"
        :document="$estimate"
        hide-header-contact
        hide-header-due-at
        class-header-status="col-md-8"
    />
    <x-documents.show.document
        :type="$type"
        :document="$estimate"
        document-template="{{ setting('estimates.estimate.template') }}"
        hide-due-at
    />
@endsection

@push('footer_start')
    <link rel="stylesheet" href="{{ asset('public/css/print.css?v=' . version('short')) }}" type="text/css">
@endpush
