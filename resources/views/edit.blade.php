@extends('layouts.header')

@section('content')
    <form method="post" action="/update/{{$editData->id}}" name="regform">
        @csrf
        <div class="container register-form">
            <div class="form">
                <div class="container bootstrap snippet">
                    <div class="row">

                    </div>
                </div>
                <div class="note">
                    <p style="font-size: 40px;">Edit Here </p>
                </div>

                <div class="form-content">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name*"
                                       value=" {{ $editData->firstName }} " id="fname" name="fname"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="LastName *"
                                       value="{{$editData->lastName}}" id="lname" name="lname"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your UserName *" id="uname"
                                       value="{{$editData->userName}}"
                                       name="uname"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email *" id="email"
                                       value="{{$editData->email}}"
                                       name="email"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="price_per_ticket" class="form-control"
                                       placeholder="Enter MobileNumber *" maxlength="10"
                                       value="{{$editData->contact_no}}"
                                       onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="mobile"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <textarea class="form-control" value="{{$editData->address}}" placeholder="Your Address*"
                                      name="address"
                                      id="add"> {{$editData->address}}</textarea>
                                <!-- <input type="text" class="form-control" placeholder="Your Address*" name="address" id="add"/> -->
                            </div>
                        </div>
                        @if( auth()->user()->role == '1' )
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *" id="pass"
                                           value="{{$editData->password}}"
                                           name="password" readonly/>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-control">
                                        <label>Role:- </label>
                                        <input type="radio" class="form-group" name="role"
                                               @if ($editData->role == '1') { checked } @endif
                                               value="1"/> Admin
                                        <input type="radio" class="form-group" name="role"
                                               @if ($editData->role == '2') { checked } @endif
                                               value="2"/> User
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-control">
                                        <label>status:- </label>
                                        <input type="radio" class="form-group" name="status" id="status"
                                               @if ($editData->status == 'active') { checked } @endif
                                               value="active"/> Active
                                        <input type="radio" class="form-group" name="status" id="status"
                                               @if ($editData->status == 'inactive'){ checked } @endif
                                               value="inactive"/>Inactive
                                    </div>
                                </div>
                            </div>
                        @endif
                        <input type="submit" name="Edit" class="btnSubmit" value="Submit" id="submit">
                        <a href="../allUser" class="btnSubmit">Back</a>
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
