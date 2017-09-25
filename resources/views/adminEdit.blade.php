@extends('layouts.app')

@section('content')
    <div class="container">
        <form enctype="multipart/form-data" method="post" action="/admins/adminEditSave">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>
            @if(isset($admin))
                <input type="hidden" name="id" value="{{ $admin['id'] }}"/>
            @endif
            <div class="row">
                <div class="col-12 form-group text-center">
                    <h3>Admin edit</h3>
                </div>
                <div class="col-12 col-sm-5 text-center form-group">
                    <label for="upload" class="cursor-pointer">
                        <div class="container-fluid">
                            <div class="row ">
                                <div class="text-center">
                                    <img id="editImgPhoto" class="img-fluid"
                                         @if(isset($admin)) src="{{ $admin['img'] }}" @endif
                                         alt="Click to select a photo"
                                         @if(isset($admin)) title="{{ $admin['firstName'] }} {{ $admin['lastName'] }}" @endif>
                                </div>
                            </div>
                        </div>
                    </label>
                    <input hidden name="upload" id="upload" type="file"
                           onchange="document.getElementById('editImgPhoto').src = window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="col-12 col-sm-7">
                    <div class="col-12 form-group">
                        <div class="input-group">
                            <label for="firstName" class="input-group-addon cursor-pointer">First Name</label>
                            <input name="firstName" id="firstName" type="text" class="form-control"
                                   placeholder="First Name" required
                                   @if(isset($admin)) value="{{ $admin['firstName'] }}" @endif
                                   onchange="document.getElementById('editImgPhoto').title = this.value + ' ' + document.getElementById('lastName').value">
                        </div>
                    </div>
                    <div class="col-12 form-group">
                        <div class="input-group">
                            <label for="lastName" class="input-group-addon cursor-pointer">Last Name</label>
                            <input name="lastName" id="lastName" type="text" class="form-control"
                                   placeholder="Last Name" required
                                   @if(isset($admin)) value="{{ $admin['lastName'] }}" @endif
                                   onchange="document.getElementById('editImgPhoto').title = document.getElementById('firstName').value + ' ' + this.value">
                        </div>
                    </div>
                    <div class="col-12 form-group">
                        <div class="input-group">
                            <label for="dateOfBirth" class="input-group-addon cursor-pointer">Date of
                                birth</label>
                            <input name="dateOfBirth" id="dateOfBirth" type="text" class="form-control"
                                   placeholder="Date of birth" required
                                   @if(isset($admin)) value="{{ $admin['DateOfBirth'] }}" @endif>
                        </div>
                    </div>
                    <div class="col-12 form-group">
                        <div class="input-group">
                            <label for="email" class="input-group-addon cursor-pointer">Email</label>
                            <input name="email" id="email" type="email" class="form-control"
                                   placeholder="Email" required
                                   @if(isset($admin)) value="{{ $admin['email'] }}" @endif>
                        </div>
                    </div>
                    <div class="col-12 form-group">
                        <div class="input-group">
                            <label for="password" class="input-group-addon cursor-pointer">Password</label>
                            <input name="password" id="password" type="text" class="form-control"
                                   placeholder="Password" required
                                   @if(isset($admin)) value="{{ $admin['password'] }}" @endif>
                        </div>
                    </div>
                    <div class="col-12 form-group">
                        <div class="form-group">
                            <label for="adress" class="adres-label text-center cursor-pointer">Adress:</label>
                            <textarea name="adress" id="adress" class="form-control" rows="3"
                                      placeholder="Adress" required>@if(isset($admin)){{ $admin['adress'] }}@endif</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center form-group">
                    <input type="submit" class="btn btn-success cursor-pointer" value="Save changes"/>
                </div>
            </div>
        </form>
    </div>
@endsection