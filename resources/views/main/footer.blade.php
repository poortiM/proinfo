<div class="modal fade" id="sigUp-Login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog account-modal">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h4 class="modal-title" id="myModalLabel">
                    Login/SignUp</h4>
            </div> -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-xs-10 col-xs-offset-1">
                            <div class="row">
                                <ul class="nav switch-acc">
                                    <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                                    <li><a href="#Registration" data-toggle="tab">SignUp</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Login">

                                <div class="col-xs-10 col-xs-offset-1">
                                    <div class="row">
                                        <h4 class="mt-20 text-center font-light">Login To Your Account</h4>
                                        <hr>
                                    </div>
                                    
                                </div>
                                <form class="form-horizontal userLoginProcessform" action="{{url('user/ajax/login')}}" method="POST">
                                <div class="col-xs-10 col-xs-offset-1">
                                    <div class="validation_error" id="login-error"><span></span></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-10 col-xs-offset-1">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1 mb-20">
                                        <a href="javascript:;" class="pull-right font-u">Forgot your password?</a>
                                        <button type="submit" class="btn btn-primary btn-sm m-0 font-u"> Login To Account</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="Registration">
                                <div class="col-xs-10 col-xs-offset-1">
                                    <div class="row">
                                        <h4 class="mt-20 text-center font-light">Create New Account</h4>
                                        <hr>
                                    </div>
                                </div>
                                <form class="form-horizontal userSignUpProcessform" action="{{url('user/ajax/register')}}" method="POST">
                                    <div class="form-group">
                                        <div class="col-xs-10 col-xs-offset-1">
                                            <label for="email">Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Name" />
                                            <div class="validation_error" id="reg-name-error"><span></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-xs-10 col-xs-offset-1">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Email" />

                                            <div class="validation_error" id="reg-email-error"><span></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-xs-offset-1">
                                            <label for="mobile">Mobile</label>
                                            <input type="number" name="mobile_number" class="form-control" placeholder="Mobile" />

                                            <div class="validation_error" id="reg-mobile_number-error"><span></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-10 col-xs-offset-1">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                            <div class="validation_error" id="reg-password-error"><span></span></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-10 col-xs-offset-1 mb-20">
                                            <input type="submit" name="submit" value="Create My Account" class="btn btn-primary btn-sm font-u">
                                        </div>
                                    </div>
                                </form>

                                <form class="form-horizontal userSignUpOTP" action="{{url('user/ajax/register')}}" method="POST" style="display: none;">
                                    <div class="form-group">
                                        <div class="col-xs-10 col-xs-offset-1">
                                            <label for="email">OTP</label>
                                            <input type="text" name="otp" id="user-otp" class="form-control" placeholder="OTP" />
                                        
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-offset-1 mb-20">
                                            <input type="submit" name="submit" value="Verify" class="btn btn-primary btn-sm font-u verify-otp-button">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="footer-top">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-sm-3">
                    <h3>Professionals by type</h3>
                    <div class="limitedH" id="byPro" target-state="close">
                        @foreach(App::make('App\Http\Controllers\MainController')->getCategory('professional') as $c)
                        <p><a href="{{url('search')}}?type=listing&element=category&keyword={{$c->category}}">{{$c->category}}</a></p>
                        @endforeach
                    </div>
                    <p><a href="#" class="lm seeMore" target="#byPro">See More</a></p>
                </div>

                <div class="col-sm-3">
                    <h3>Professionals by area</h3>
                    <div class="limitedH" id="byCity" target-state="close">
                        @foreach(App::make('App\Http\Controllers\MainController')->getCity() as $s)
                        <p><a href="{{url('search/pros')}}?type=listing&element=category&keyword=&location={{$s->city}}&budget=&property_type=&select_pros=&kms=&pincode=">{{$s->city}}</a></p>
                        @endforeach
                    </div>
                    <p><a href="#" class="lm seeMore" target="#byCity">See More</a></p>
                </div>

                <div class="col-sm-2">
                    <h3>Popular Categories</h3>
                    <div class="limitedH" id="byCat" target-state="close">
                        @foreach(App::make('App\Http\Controllers\MainController')->getCategory('popular') as $c)
                        <p><a href="{{url('search')}}?type=listing&element=category&keyword={{$c->category}}">{{$c->category}}</a></p>
                        @endforeach
                    </div>
                    <p><a href="#" class="lm seeMore" target="#byCat">See More</a></p>
                </div>

                <div class="col-sm-2">
                    <h3>Business</h3>
                    <p><a href="{{url('pro/register')}}">Pro SignUp</a></p>
                    <p><a href="{{url('pro/login')}}">Pro Login</a></p>
                </div>

                <div class="col-sm-2">
                    <h3>Other Resources</h3>
                    <p><a href="{{url('blog')}}">Blog</a></p>
                    <!-- <p><a href="{{url('about-us')}}">About Us</a></p> -->
                </div>
            </div>
        </div><!-- /.row -->
    </div>

    <div class="footer-bottom" style="background-color: #F0F7FD;padding: 25px 0px;color:#363636;">
        <div class="container">
            <!-- <div >
                <ul class="social-links nav nav-pills" style="float: right;">
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
            </div> -->
            <!-- <div class="pull-left">
                <p><span><b>Get help finding a professional </b></span>1800-3322-4453 </p>
            </div> -->
        </div>
    </div>
    <div class="footer-bottom" style="background-color: #fff;">
        <div class="container">
            <div class="footerMainLink">

                <a href="#">&copy; Propisor.com {{date("Y")}} &nbsp;&nbsp;</a>
                <!-- <a href="{{url('about-us')}}">About us</a> -->
                <!-- <a href="#">Careers</a> -->
                <a href="{{url('tandc')}}">Terms and Conditions</a>
                <!-- <a href="#">Help</a> -->
                <a href="{{url('faq')}}">FAQ</a>
            
            </div>
        </div>
    </div>
</footer>
