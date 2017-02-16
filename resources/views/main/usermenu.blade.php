@if(Request::segment(3) == '' || Request::segment(3) == 'stories')
	@php $newsfeed = 'background: #f9b412;color: white;' @endphp
@else
	@php $newsfeed = '' @endphp
@endif

@if(Request::segment(3) == 'following')
	@php $following = 'background: #f9b412;color: white;' @endphp
@else
	@php $following = '' @endphp
@endif

@if(Request::segment(3) == 'followers')
	@php $follower = 'background: #f9b412;color: white;' @endphp
@else
	@php $follower = '' @endphp
@endif

@if(Request::segment(3) == 'collections')
	@php $collections = 'background: #f9b412;color: white;' @endphp
@else
	@php $collections = '' @endphp
@endif

<div class="col-md-3">
    <div class="row p-10">
        <div class="background-white box-shadow sidemenu p-10">
            <h3 class="text-center">{{ucwords($user->name)}}</h3>
            <div class="col-xs-6">
                <h5 class="text-center">{{$total_follower}}</h5>
                <h4  class="text-center">Follower</h4>
            </div>                          
            <div class="col-xs-6">
                <h5 class="text-center">{{$total_following}}</h5>
                <h4 class="text-center">Following</h4>
            </div>
            
            <div class="row">
                <div class="col-xs-12">
                    <div class="submenu-link">
            		    <a href="{{url('profile')}}/{{$user->username}}" style="{{$newsfeed}}">Newsfeed</a>
            		    <a href="{{url('profile')}}/{{$user->username}}/following" style="{{$following}}">Following</a>
            		    <a href="{{url('profile')}}/{{$user->username}}/followers" style="{{$follower}}">Followers</a>
            		    <a href="{{url('profile')}}/{{$user->username}}/collections" style="{{$collections}}">Collections</a>
            		</div>
                </div>
            </div>
        </div>
    </div>   
</div>