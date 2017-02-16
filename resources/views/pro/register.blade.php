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
                    @if(Session::has('info'))
                    <div class="col-sm-8 col-md-offset-2 alert alert-info" role="alert">
                        {{ Session::get('info') }}
                    </div>
                    @endif

                    <div class="col-sm-4 col-sm-offset-4 registerform">
                        <div class="col-md-12 background-white" style="margin-bottom: 50px">
                            <h3 class="text-center" style="font-weight: 500;font-size: 20px;">Join Propisor today to start getting more business.</h3>
                            <div class="spacer-30"></div>
                            <div id="register">
                                <div class="form-group" id="name">
                                    <input type="text" class="form-control" name="name" id="register-form-name" value="" placeholder="Name" required>

                                    <span class="help-block" id="name_error"></span>

                                </div>
                                <!-- /.form-group -->

                                <div class="form-group" id="email">
                                    <input type="email" class="form-control" name="email" id="register-form-email" value="" placeholder="Email" required>

                                    <span class="help-block" id="email_error"></span>

                                </div>

                                <!-- /.form-group -->

                                <div class="form-group" id="mobile_number">
                                    <input type="text" class="form-control" name="mobile_number" id="register-form-mobile_number" placeholder="Mobile Number" maxlength="10" required>

                                    <span class="help-block" id="mobile_number_error"></span>
                                </div>


                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <!-- /.form-group -->

                                <button type="submit" class="btn btn-primary btn-block get_started">Next</button>
                            

                                <!-- <div id="loading" style="display: none;">
                                    <div class="spacer-20"></div>
                                    <img src="{{ url('images/loading.gif') }}" class="img-responsive center-block">
                                </div> -->

                                <div class="spacer-10"></div>

                                <div class="alert alert-success response_message" style="display: none;" role="alert"></div>

                                <div class="spacer-30"></div>

                                <!-- <div class="modal fade registerModal" role="dialog">
                                    <div class="modal-dialog">

                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Message</h4>
                                        </div>
                                        <div class="modal-body">
                                          <p><strong>Thank you for Signing Up with Propisor!.verification mail has been sent to your registered mail id. .</strong>Please complete the verification process to activate your account. <a href="{{url('login')}}">Login into your account</a></p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>

                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-sm-offset-4 otpform" style="display: none;">
                        <div class="col-md-12 background-white" style="margin-bottom: 50px">
                            <h3 class="text-center" style="font-weight: 500;font-size: 20px;"><i class="fa fa-arrow-left back_field" style="cursor: pointer;" aria-hidden="true"></i> Verify Your Phone.</h3>
                            <div class="spacer-30"></div>
                            <div id="register">

                                <div class="form-group" id="otp">
                                    <input type="text" class="form-control" name="otp" id="register-form-otp" placeholder="OTP" required>

                                    <span class="help-block" id="otp_error"></span>
                                </div>
                                <!-- /.form-group -->



                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <!-- /.form-group -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary btn-block resend">Resend OTP</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary btn-block create_account">Submit</button>
                                    </div>
                                </div> 


                                <!-- <div id="loading" style="display: none;">
                                    <div class="spacer-20"></div>
                                    <img src="{{ url('images/loading.gif') }}" class="img-responsive center-block">
                                </div> -->

                                <div class="spacer-10"></div>

                                <div class="alert alert-success response_message" style="display: none;" role="alert"></div>

                                <div class="spacer-30"></div>

                               

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-sm-offset-4 signupshow"  style="display:none;">
                        <div class="col-md-12 background-white" style="margin-bottom: 50px">
                            <h3 class="text-center" style="font-weight: 500;font-size: 2em;padding: 32px;">Thank you for signing up. An email verification has been sent to your email ID. <br><br>

                            <a class="btn btn-info" href="{{url('login')}}">Login Here</a></h3>
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
