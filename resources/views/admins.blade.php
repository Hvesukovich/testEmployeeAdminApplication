@extends('layouts.app')

@section('content')
    {{--<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />--}}
    <div class="container">
        <div class="row text-center">
            <div class="col-8 form-group"><h3>All users</h3></div>
            <div class="col-4 form-group"><a href="/admins/edit" class="btn btn-success">Add admin</a></div>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date Of Birth</th>
                    <th>Editing</th>
                </tr>
                </thead>
                <tbody>
                @if(count($admins))
                    @foreach($admins as $value)
                <tr>
                    <th scope="row">{{ $value['id'] }}</th>
                    <td>{{ $value['firstName'] }}</td>
                    <td>{{ $value['lastName'] }}</td>
                    <td>{{ $value['DateOfBirth'] }}</td>
                    <td>
                        <a href="/admins/edit/{{ $value['id'] }}" class='cursor-pointer text-info' title='Редактировать'><i class='fa fa-pencil'></i></a>
                        <a href="/admins/del/{{ $value['id'] }}" class='btn btn-success cursor-pointer text-danger' title='Удалить'><i class='fa fa-trash'></i></a>
                    </td>
                </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection