@extends('main.default')

@section('content')

<div class="main">
   <!-- <div class="overlay" style="width: 100%; min-height: 100%; background: rgba(25, 24, 24, 0.27); position: absolute;background-size: cover;overflow: visible;"></div>
 -->
    <div class="main-inner"  style="background-image: url({{url('images/signup.jpg')}});background-size: cover;background-repeat: no-repeat;">
        <!-- <h2 class="text-center" style="font-weight:bold;color:#fff;">Hurry before it's too late! There is still 1 spot available for Architects around 12220</h2> -->

        <div class="container">
            <div class="content">
                <div class="row">


                    <div class="col-sm-4 col-sm-offset-4 signupshow">
                        <div class="col-md-12 background-white" style="margin-bottom: 50px">
                            <h3 class="text-center" style="font-weight: 500;font-size: 2em;padding: 32px;">Thank you for signing up. An email verification has been sent to your email ID. <br><br>

                            <a class="btn btn-info" href="{{url('pro/login')}}">Login Here</a></h3>
                            <div class="spacer-30"></div>

                        </div>
                    </div>
                    <!-- /.col-sm-4 -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.content -->
        </div>

        <!-- /.container -->
    </div>
    <!-- /.main-inner -->

<!-- /.main -->
@stop
