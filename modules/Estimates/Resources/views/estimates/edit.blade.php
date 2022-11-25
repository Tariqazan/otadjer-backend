@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('estimates::general.estimates', 1)]))

@section('content')
    <x-documents.form.content
        :type="$type"
        :document="$estimate"
        contact-type="customer"
        hide-recurring
        hide-order-number
        hide-due-at
    />
@endsection

@push('scripts_start')
    <x-documents.script :items="$estimate->items()->get()" :document="$estimate" />
@endpush
