@extends('layouts.header')

@section('content')
<form method="post" action="updPswd">
    @csrf
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{ Session::get('message') }}
                    </div>
                    {{Session::forget('message')}}
                @endif
            </div>
        </div>
    </div>
    <div class="container register-form">
        <div class="form">
            <div class="note">
                <p style="font-size: 40px;">Login Here </p>
            </div>
            <input type="hidden" name="userId" value="{{$userId}}">
            <div class="form-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" id='password' class="form-control"
                                   placeholder="Enter your Password" name="password"
                                   required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" id='confirm_password' class="form-control"
                                   placeholder="Enter Conform Password *"
                                   required/>
                        </div>
                    </div>
                    <input type="Submit" style="margin: 0px 0px 0px 18px !important;" name="login" class="otp"
                           value="Submit">
                    {{--<a href="signup" class="btnSubmit" id="register">Registeration</a>--}}
                </div>
            </div>
        </div>
</form>
<script>
    $(".alert-success").fadeTo(3000, 500).slideUp(1000, function () {
        $(".alert-success").slideUp(500);
    });

    var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirm_password");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
@endsection
