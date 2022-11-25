@extends('layouts.print')

@section('content')
    @if(! empty(setting('inventory.barcode_print_template')))
        @include('inventory::partials.print_barcode.templates.' . setting('inventory.barcode_print_template'))
    @else
        @include('inventory::partials.print_barcode.templates.single')
    @endif
@endsection
