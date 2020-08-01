@extends('layouts.header')

@section('content')
    <form method="post" action="emailVrf">
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
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email *" name="email"
                                       required/>
                            </div>
                        </div>
                        {{--<a href="signup" class="btnSubmit" id="register">Registeration</a>--}}
                    </div>
                    <input type="Submit" name="login" class="otp" value="send OTP">
                </div>
            </div>
    </form>
    <script>
        $(".alert-success").fadeTo(3000, 500).slideUp(1000, function () {
            $(".alert-success").slideUp(500);
        });
    </script>
@endsection
