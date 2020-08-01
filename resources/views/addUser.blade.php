@extends('layouts.header')

@section('content')
<div class="container">
    @if (count($errors) > 0)@endif
    <form method="post" action="add" name="regform">
        @csrf
        <div class="container register-form">
            <div class="form">
                <div class="note">
                    <p style="font-size: 40px;">Register Here </p>
                </div>
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name*" name="fname"/>
                                {{$errors->first('fname')}}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="LastName *" name="lname"/>
                                {{$errors->first('lname')}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your UserName *" name="uname"/>
                                {{$errors->first('uname')}}

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Email *" name="email"/>
                                {{$errors->first('email')}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter MobileNumber *"
                                       maxlength="10"
                                       onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                       name="mobile"/>
                                {{$errors->first('mobile')}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password *" name="password"
                                       id="pass"/>
                                {{$errors->first('password')}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="ConformPassword *"
                                       name="cpassword"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Your Address*" name="address"
                                          required> </textarea>
                                {{$errors->first('address')}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-control">
                                    <label>Role:- </label>
                                    <input type="radio" class="form-group" name="role" value="1"/>
                                    Admin
                                    <input type="radio" class="form-group" name="role" value="2"/> User
                                </div>
                                {{$errors->first('role')}}

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-control">
                                    <label>status:- </label>
                                    <input type="radio" class="form-group" name="status"
                                           value="active"/> Active
                                    <input type="radio" class="form-group" name="status"
                                           value="inactive"/>
                                    Inactive
                                </div>
                                {{$errors->first('status')}}
                            </div>
                        </div>

                        <input type="submit" name="register" class="btnSubmit" value="Submit" id="submit">
                        <a href="signin" class="btnSubmit">Login here</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
