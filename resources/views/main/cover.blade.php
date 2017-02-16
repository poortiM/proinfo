<div class="content vendor-banner">
    <div class="mt-80">
       
        <div class="detail-banner" id="backgroundCover" style="background-image: url({{asset('uploads/cover')}}/{{$user->cover}}););">

            <div class="container">
                <div class="detail-banner-left ">
                    <div class="vendor-avatar-container">
                        @if(!empty($user->avatar))
                            <center><img class="vendor-avatar img-circle profileView" src="{{ asset('uploads/avatar/') }}/{{ $user->avatar }}" align="middle"></center>
                        @endif

                    </div>
                    
                    @if(Auth::guard('web')->check())
                        @if(App::make('App\Http\Controllers\MainController')->is_followed(Auth::guard('web')->user()->id,$user->id) == 0)
                            @php $status = 'Following' @endphp
                            @php $auth_id = Auth::guard('web')->user()->id; @endphp
                        @else
                            @php $status = 'Follow' @endphp
                            @php $auth_id = '' @endphp
                        @endif
                    @else
                        @php $status = 'Follow' @endphp
                        @php $auth_id = '' @endphp
                    @endif

                    @php $redirectUrl = url('/').$_SERVER['REQUEST_URI']; @endphp

                    <div class="project-featured" redirect-url="{{rawurlencode($redirectUrl)}}""></div>
                    
                    <h3 class="vendor-name">
                        <span class="vendor-business">{{ $user->name }} 
                        @if(Auth::guard('web')->check())
                         @if(Auth::guard('web')->user()->id  != $user->id)
                            <button class="btn btn-sm btn-primary follow-user" auth_id="{{$auth_id}}" following_id="{{$user->id}}">Follow s</button>
                         @endif
                        @endif
                        </span>
                    </h3>


                </div>
                <!-- /.detail-banner-left -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.detail-banner -->
    </div>
</div>