@extends('layouts.header')

@section('content')
    <form method="post" action="logdata">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Your Password *"
                                       name="password"
                                       required/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group buttons">
                                <input type="Submit" name="login" class="allbutton" value="Login">
                                <a href="/rst" id="fogetpsd" >Forget Password</a>
                                <input type="Submit" id="register" name="Registeration" class="allbutton" value="Registeration">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    <script>
        $(".alert-success").fadeTo(3000, 500).slideUp(1000, function () {
            $(".alert-success").slideUp(500);
        });
    </script>
@endsection
