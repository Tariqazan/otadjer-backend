@extends('layouts.admin')

@section('title', trans_choice('general.invoices', 2))

@section('content')
<style>
    .trigger{
      text-align: center;
    padding: 7px 13px;
    background: #3e3e3e;
    color: #fff;
    font-size: 15px;
    outline: none;
    border: none;
    border-radius: 5px;
    font-family: cursive;
}

.modal {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    opacity: 0;
    visibility: hidden;
    transform: scale(1.1);
    transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
}
.modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 1rem 1.5rem;
    width: 24rem;
    border-radius: 0.5rem;
}
.close-button {
    float: right;
    width: 1.5rem;
    line-height: 1.5rem;
    text-align: center;
    cursor: pointer;
    border-radius: 0.25rem;
    background-color: lightgray;
}
.close-button:hover {
    background-color: darkgray;
}
.show-modal {
    opacity: 1;
    visibility: visible;
    transform: scale(1.0);
    transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
<table class="table mt-2">
    <thead class="thead-light">
        <tr>
            <th scope="col-4">ITEMS</th>
            <th scope="col-2">QUANTITY</th>
            <th scope="col-2">PRICE</th>
            <th scope="col-2">SERIAL NO</th>
            <th scope="col-2">AMOUNT</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td width="40%">
                <div class="row">
                    <div class="col-3">
                        item2
                    </div>
                    <div class="col-9">
                        <input class="form-control" value="description item2" />
                    </div>
                </div>
            </td>
            <td width="10%"><input class="form-control" value="4" /></td>
            <td width="10%"><input class="form-control" value="2,3434" /></td>
            <td width="20%">  <a type="button" class="btn btn-info btn-sm" href="{{route('seral_no_list')}}">Add serial no</a></td>
            <td width="20%"><input class="form-control" value="2,3434" /></td>
        </tr>
    </tbody>
</table>
@endsection

@push('scripts_start')
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
@endpush
