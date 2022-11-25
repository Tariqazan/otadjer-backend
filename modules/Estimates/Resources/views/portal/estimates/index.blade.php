@extends('layouts.portal')

@section('title', trans_choice('estimates::general.estimates', 2))

@section('content')
    <x-documents.index.content
        :type="$type"
        :documents="$estimates"
        hide-bulk-action
        hide-contact-name
        hide-due-at
        hide-actions
        hide-empty-page
        form-card-header-route="portal.estimates.estimates.index"
        route-button-show="portal.estimates.estimates.show"
        class-document-number="col-xs-4 col-sm-4 col-md-3 disabled-col-aka"
        class-amount="col-xs-4 col-sm-2 col-md-2 text-right"
        class-issued-at="col-sm-3 col-md-3 d-none d-sm-block"
        class-due-at="col-md-2 d-none d-md-block"
        class-status="col-xs-4 col-sm-3 col-md-2 text-center"
        search-string-model="portal-estimates"
    />
@endsection
