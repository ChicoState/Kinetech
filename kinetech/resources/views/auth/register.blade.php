@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Register</h4></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/register">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('registerEmail') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('registerEmail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('registerEmail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('registerPassword') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"  required>

                                @if ($errors->has('registerPassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('registerPassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" onchange="confirmPassword()" required>
                            </div>
                        </div>

                        <h4> Shipping Information </h4>
                        <!-- Address -->
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- Apt Number -->
                        <div class="form-group{{ $errors->has('aptNumber') ? ' has-error' : '' }}">
                            <label for="aptNumber" class="col-md-4 control-label">Apartment Number</label>

                            <div class="col-md-6">
                                <input id="aptNumber" type="text" class="form-control" name="aptNumber">

                                @if ($errors->has('aptNumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aptNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- City -->
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="city">

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- State -->
                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">State</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state">

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- Zip Code -->
                        <div class="form-group{{ $errors->has('zipCode') ? ' has-error' : '' }}">
                            <label for="zipCode" class="col-md-4 control-label">Zip Code</label>

                            <div class="col-md-6">
                                <input id="zipCode" type="text" class="form-control" name="zipCode">

                                @if ($errors->has('zipCode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zipCode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="registerButton">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
