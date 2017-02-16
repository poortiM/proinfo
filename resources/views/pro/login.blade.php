@extends('main.default')

@section('content')
<div class="main" style="background-image: url({{url('images/login.jpg')}});background-size: cover;background-repeat: no-repeat;">
    <div class="main-inner">
        <div class="container">
            <div class="content">

                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4 ">
                        <div class="col-md-12 info-box background-white">
                            <div class="page-title">
                                <h1 class="text-center">Log in to Propisor</h1>
                                <h4 class="text-center">Don't have an account?  <a href="{{ url('register') }}">Sign Up</a></h4>
                            </div>
                            <!-- /.page-title -->
                            @if(Session::has('info'))
                            <div class="alert alert-info" role="alert">
                                {{ Session::get('info') }}
                            </div>
                            @endif

                            @if($errors->any())
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            @endif
                            </ul>

                            <form method="post" action="{{ url('pro/login') }}">
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="login-form-email">E-mail</label>
                                    <input type="email" class="form-control" name="email" id="login-form-email" value="{{ Request::old('email') }}">
                                    @if($errors->has('email'))
                                        <span class="help-block">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="login-form-password">Password</label>
                                    <input type="password" class="form-control" name="password" id="login-form-password">
                                    @if($errors->has('password'))
                                        <span class="help-block">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form group" style="float:right;float: right;margin-bottom: 12px;">
                                    <a href="{{ url('forgot-password') }}">Forgot password</a>
                                </div>

                                <input type="hidden" name="redirect" value="{{Request::get('redirect')}}">
                                <!-- /.form-group -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>

                            </form> 
                        </div> 
                         
                    </div>
                    <!-- /.col-sm-4 -->
                </div>

                 <div class="spacer-50"></div>
                <!-- /.row -->

            </div>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.main-inner -->
<!-- /.main -->
@stop