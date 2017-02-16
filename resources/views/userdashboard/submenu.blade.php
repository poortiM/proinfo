@if(Request::segment(3) == 'newsfeed')
	@php $newsfeed = 'background: #f9b412;color: white;' @endphp
@else
	@php $newsfeed = '' @endphp
@endif

@if(Request::segment(3) == 'add-blog')
	@php $addblog = 'background: #f9b412;color: white;' @endphp
@else
	@php $addblog = '' @endphp
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

@if(Request::segment(3) == 'wishlist')
	@php $wishlist = 'background: #f9b412;color: white;' @endphp
@else
	@php $wishlist = '' @endphp
@endif

@if(Request::segment(3) == 'enquiry')
	@php $enquiry = 'background: #f9b412;color: white;' @endphp
@else
	@php $enquiry = '' @endphp
@endif

<div class="submenu-link">
    <a href="{{url('user/dashboard/newsfeed')}}" style="{{$newsfeed}}">Newsfeed</a>
    <a href="{{url('user/dashboard/add-blog')}}" style="{{$addblog}}">Add Blog</a>
    <a href="{{url('user/dashboard/following')}}" style="{{$following}}">Following</a>
    <a href="{{url('user/dashboard/followers')}}" style="{{$follower}}">Followers</a>
    <a href="{{url('user/dashboard/collections')}}" style="{{$collections}}">Collections</a>
    <a href="{{url('user/dashboard/wishlist')}}" style="{{$wishlist}}">Wishlist</a>
    <a href="{{url('user/dashboard/enquiry')}}" style="{{$enquiry}}">Enquiry</a>
</div>