@extends('main.default')

@section('content')



@if(!empty($vendor->cover))
    {{--*/ $cover = asset('uploads/cover/').'/'.$vendor->cover /*--}}
@else
    {{--*/ $cover = 'http://hcn-vvs.dk/CustomerData/Files/Images/Gallery/varmesystemer-inspiration_574/1_244.jpg' /*--}}
@endif

<!---------------------- Form Modal -------------------->

<div class="main">
   <div class="container">
        <div class="col-md-12">
            <div class="row">
            <!--<div class="col-md-12 col-sm-12 ">
                    <div class="contaniner-fluid">
                        <div class="col-md-12 info-box">
                            <img src="images/profile-proper.png" width="100%">
                        </div>
                   </div>
                </div>  -->
                <div class="spacer-40"></div>
                <div class="col-md-12 col-sm-12 info-box">
                        <div class="row"> 
                            <div class="col-md-8 col-sm-12 col-md-offset-2">
                                <div class="col-md-12">
                                    <h3>Update your account password</h3>
                                </div>
                            </div>


                            {!! Form::open(['url' => 'pro/postUpdatePassword', 'files' => 'true']) !!} 
                                <div class="col-md-8 col-sm-12 col-md-8 col-sm-12 col-md-offset-2">
                                <div class="spacer-10"></div>
                                <div>
                                  @if($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li> {{ $error }} </li>
                                    @endforeach
                                @endif
                                </ul>
                                @if(Session::has('info'))
                                <div class="alert alert-info" role="alert">
                                    {{ Session::get('info') }}
                                </div>
                                @endif
                                </div>
                                    <div class="col-md-12">
                                        <div class="spacer-20"></div>
                                        <label>New Password</label>
                                        
                                        <input class="form-control" name="password" type="password">
                                        <div class="spacer-10"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="spacer-20"></div>
                                        <label>Confirm New Password</label>
                                        
                                        <input class="form-control" name="confirm_password" type="password">
                                        <div class="spacer-10"></div>
                                    </div>

                                    <input type="hidden" name="id" value="{{ Auth::guard('web')->user()->id }}">

                                    <div class="col-xs-12">
                                        <input type="submit" class="pull-right btn btn-info" value="Update Password">
                                        <div class="spacer-50"></div>
                                    </div>
                                   
                                </div>
                            {!! Form::close() !!}  
                        </div>
                    </div>  

                <div class="row hr"> </div>
            </div>
        </div>
    </div>
  
@stop
