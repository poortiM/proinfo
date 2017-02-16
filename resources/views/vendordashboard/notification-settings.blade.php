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
                <div class="col-md-12 col-sm-12">
                    <div class="col-sm-4 col-md-4 sidebar">
                        <div class="mini-submenu">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </div>
                        <div class="list-group">
                            <a href="{{url('pro/notification-settings')}}" class="list-group-item active">
                                 Notifications settings
                            </a>
                            
                            <a href="{{url('pro/change-password')}}" class="list-group-item">
                                Change password
                            </a>
                        </div>        
                    </div>

                    <div class="col-md-8">
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
                      <div class="spacer-20"></div>
                      <form action="{{url('pro/postNotificationSettings')}}" method="POST">

                        {{csrf_field()}}
                        
                        <table class=table>
          						    <h3>Email Notifications</h3>
          						    
          						    <tbody>
          						        <tr>
          						            
          						            <td><h4>Weekly inspiration digest</h4></td>
          						            <td><input type="checkbox" name="" style="display: block;"></td>
          						        </tr>
          						        <tr>
          						            <td><h4>My home updates</h4></td>
          						            <td><input type="checkbox" name="" style="display: block;"></td>
          						        </tr>

          						        <tr>
          						            <td><h4>Recommended for me</h4></td>
          						            <td><input type="checkbox" name="" style="display: block;"></td>
          						        </tr>

          						        <tr>
          						            <td><h4>Please send me emails</h4></td>
          						            <td><input type="checkbox" name="" style="display: block;"></td>
          						        </tr>
          						        

          						    </tbody>
          						</table>


                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                      
                    </div>
                  
                </div>

                <div class="row hr"> </div>
            </div>
        </div>
    </div>
  
@stop
