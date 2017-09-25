@extends('layouts.app')

@section('content')
@if(isset($admin))
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-5 text-center form-group">
            <img id="ImgPhoto" class="img-fluid"
                src="{{ $admin['img'] }}"
                 alt="{{ $admin['firstName'] }} {{ $admin['lastName'] }}"
                 title="{{ $admin['firstName'] }} {{ $admin['lastName'] }}">
        </div>
        <div class="col-12 col-sm-7">
            <div class="form-group">
                <h5 class="">{{ $admin['firstName'] }} {{ $admin['lastName'] }}</h5>
            </div>
            <div class="form-group">
                <h5 class="">Date of birth: {{ $admin['DateOfBirth'] }}</h5>
            </div>
            <div class="form-group">
                <h5 class="">Adres: {{ $admin['adress'] }}</h5>
            </div>
            <div class="form-group">
                <h5 class="">Email: {{ $admin['email'] }}</h5>
            </div>
            <div class="form-group">
                <h5 class="">Password: {{ $admin['password'] }}</h5>
            </div>
        </div>
    </div>
</div>
@endif
@endsection