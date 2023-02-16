@extends('webadmin.layouts.login_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="register-box">
                    <div class="register-logo">
                        <a href="../../index2.html"><b>Admin</b>LTE</a>
                    </div>
                    <div class="card">
                        <div class="card-body register-card-body">
                            {{-- <form method="POST" action="{{ route('webadmin.register') }}"> --}}
                                {{ Form::open(['route' => ["webadmin.create"],'method' => 'POST', 'data-parsley-validate' => true, "data-parsley-trigger" => "change", 'autocomplete' => 'off' ]) }}

                                <p class="login-box-msg">Register a new membership</p>
                                {{-- <form action="../../index.html" method="post"> --}}
                                    <div class="input-group mb-3">
                                        {{-- <input type="text" class="form-control" placeholder="Full name"> --}}
                                        {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => "Name", 'required' => 'true', 'autofocus' => true]) }}
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        {{-- <input type="email" class="form-control" placeholder="Email"> --}}
                                        {{ Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => "Email", 'required' => 'true', 'autofocus' => true]) }}
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        {{-- <input type="password" class="form-control" placeholder="Password"> --}}
                                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => "Password", 'required' => 'true', 'data-parsley-minlength' => 8 	]) }}
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="input-group mb-3">
                                        <input type="password" class="form-control" placeholder="Retype password">

                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                                <label for="agreeTerms">
                                                    I agree to the <a href="#">terms</a>
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-4">
                                            {{-- <button type="submit" class="btn btn-primary btn-block">Register</button> --}}
                                            {{ Form::submit('Register', [ 'class' => 'btn btn-primary btn-block' ]) }}
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                                {{-- <a href="" class="text-center">I already have a membership</a> --}}
                                <a href="{{ route('webadmin.login') }}"
                                class="text-center">I already have a membership</a>
                        </div>
                        <!-- /.form-box -->
                    </div><!-- /.card -->
                </div>
            </div>
        </div>
    </div>
@endsection
