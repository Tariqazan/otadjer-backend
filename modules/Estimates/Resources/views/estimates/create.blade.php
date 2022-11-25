@extends('layouts.admin')

@section('title', trans('general.title.new', ['type' => trans_choice('estimates::general.estimates', 1)]))

@section('content')
    <x-documents.form.content
        :type="$type"
        contact-type="customer"
        hide-recurring
        hide-order-number
        hide-due-at
    />
@endsection

@push('scripts_start')
    <x-documents.script />
@endpush
