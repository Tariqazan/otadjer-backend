@extends('layouts.admin')

@section('title', trans_choice('general.invoices', 2))

@section('content')
<div class="container my-5">
    <div class="row my-3">
        <div class="col-2 mx-0">
            <label for="floatingInput">Filter Serial No</label>
        </div>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="col-4">
            <input type="email" class="form-control" id="floatingInput" placeholder="Serial...">
        </div>
        <div class="col-3"></div>
        <div class="col-3"></div>
    </div>
    <table class="table mt-2">
        <thead class="thead-light">
            <tr>
                <th width="50px"><input type="checkbox" id="master"></th>
                <th scope="col">#</th>
                <th scope="col">Serial no</th>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $j=0; $serials = App\Models\Common\Serial::get(); @endphp
            @foreach($serials as $serial)
            @php $alls = explode(',', $serial->serial_no) @endphp
            @for ($i = 0; $i < count($alls); $i++)
            <tr id="tr_{{$serial->id}}">
                <td><input type="checkbox" class="sub_chk" data-id="{{$serial->id}}"></td>
                <th scope="row">{{++$j}}</th>
                <td>
                    {{$alls[$i]}}  </td>
                <td>{{$serial->status==1 ?'Avaiable' :'Deleted'}}</td>
                <td>{{\Carbon\Carbon::parse($serial->created_at)->format('d/m/Y')}}</td>
                <td><button class="btn btn-sm btn-secondary"><i class="fa fa-trash"></i></button></td>
            </tr>
            @endfor
            @endforeach
        </tbody>
    </table>
    <!-- <div class="float-right"> 
        <a type="button" class="btn btn-sm btn-success float right" href="{{route('add.serial_list')}}">Add serial</a>
    </div> -->
    <form method="post" action="{{route('inventory.add.serial_no')}}">
        @csrf
        <div class="form-row align-items-center">
            <div class="col-6">
                <label class="sr-only" for="inlineFormInput">Name</label>
                <textarea type="text" name="serial_no" class="form-control mb-2" id="inlineFormInput" rows="3" placeholder="Add serial no by comma seperate"></textarea>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-outline-secondary mb-2">Add Serial</button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts_start')
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
@endpush