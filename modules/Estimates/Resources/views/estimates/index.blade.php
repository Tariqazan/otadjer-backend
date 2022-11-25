@extends('layouts.admin')

@section('title', trans_choice('estimates::general.estimates', 2))

@section('new_button')
    <x-documents.index.top-buttons :type="$type" />
@endsection

@section('content')
    <x-documents.index.content
        :type="$type"
        :documents="$estimates"
        hide-due-at
        hide-button-cancel
        class-document-number="col-md-2 col-lg-1 col-xl-1 d-none d-md-block"
    />
@endsection

@push('scripts_start')
    <x-documents.script />
@endpush
