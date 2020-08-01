@extends('layouts.header')

@section('content')
    <form method="post" action="otpVrf">
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
                    <p style="font-size: 40px;">OTP </p>
                </div>
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter OTP *" name="otp"
                                       required/>
                            </div>
                        </div>
                    </div>
                    <input type="Submit" name="login" class="otp" value="Submit">
                </div>
            </div>
    </form>
    <script>
        $(".alert-success").fadeTo(3000, 500).slideUp(1000, function () {
            $(".alert-success").slideUp(500);
        });
    </script>
@endsection
