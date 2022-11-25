@extends('layouts.print')

@section('title', trans_choice('estimates::general.estimates', 1) . ': ' . $document->document_number)

@section('content')
    <x-documents.template.ddefault
        :type="$type"
        :document="$document"
        hide-due-at
    />
@endsection
