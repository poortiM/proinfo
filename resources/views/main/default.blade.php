<!DOCTYPE html>
<html>
<head>
    @include('main.head')
</head>

@if(Auth::guard('web')->check())
	@php
	  $auth = 1;
	  $auth_id = Auth::guard('web')->user()->id;
	  $auth_type = Auth::guard('web')->user()->type;
	@endphp
@else
	@php
	  $auth = 0;
	  $auth_id = '';
	  $auth_type = '';
	@endphp
@endif

<body base-url="{{url('/')}}" auth="{{$auth}}" auth-id="{{$auth_id}}" auth-type="{{$auth_type}}" csrf-token="{{csrf_token()}}"  onload="getLocation(); initialize(); @if(Request::segment(2) == 'dashboard') initializedraggablemap(); @endif" segment1="{{Request::segment(1)}}" segment2="{{Request::segment(2)}}" segment3="{{Request::segment(3)}}">

<!-- <div class="loader-wrapper">
  	<div class="loader-center">
    	<div class="circle-load">
    	</div> 
  	</div>
</div> -->

<div class="page-wrapper">
	
	<div class="ui-loader-background"> </div>

    @include('main.menu')

    @yield('content')
</div><!-- /.main -->

@include('main.footer')

</div><!-- /.page-wrapper -->

@include('main.script')

</body>
</html>
