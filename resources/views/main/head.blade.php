<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

<link rel="apple-touch-icon" sizes="57x57" href="{{url('images/favicon')}}/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="{{url('images/favicon')}}/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="{{url('images/favicon')}}/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="{{url('images/favicon')}}/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="{{url('images/favicon')}}/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="{{url('images/favicon')}}/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="{{url('images/favicon')}}/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="{{url('images/favicon')}}/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="{{url('images/favicon')}}/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="{{url('images/favicon')}}/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="{{url('images/favicon')}}/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="{{url('images/favicon')}}/favicon-96x96.png">
<meta name="msapplication-TileImage" content="{{url('images/favicon')}}/ms-icon-144x144.png">
<link href="{{url('assets/fonts/nunito.css')}}" rel="stylesheet" type="text/css">
<!-- <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<link href="{{ asset('assets/libraries/owl.carousel/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('assets/libraries/colorbox/example1/colorbox.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('assets/libraries/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="{{ asset('assets/libraries/bootstrap-fileinput/fileinput.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/superlist.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" >
<!-- <link href="{{ asset('assets/css/headline.css') }}" rel="stylesheet" type="text/css" > -->
<!-- <link href="{{ asset('assets/css/rock.css') }}" rel="stylesheet" type="text/css" > -->
<link href="{{ asset('assets/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css">
<!-- <link href="{{ asset('assets/css/content/styles.css') }}" rel="stylesheet" type="text/css"> -->
<!-- <link href="{{ asset('assets/css/map.css') }}" rel="stylesheet" type="text/css"> -->

<link href="{{ asset('assets/css/jquery.auto-home-complete.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/blueimp-gallery.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/blog.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="{{url('assets/css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{url('assets/css/SimpleSlider.css')}}">
<link rel="stylesheet" href="{{url('assets/css/stories.css')}}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<link href="{{url('assets/css/product.css')}}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="{{url('assets/css/progressbar.css')}}">
<style type="text/css">

#image-editor .cropit-preview {
/* You can specify preview size in CSS */
	width: 862px;
	height: 250px;
}

@if(Request::segment(1) == '/' || Request::segment(1) == 'home-page' || Request::segment(1) == 'stories')
/*.masonry {
    column-count: 3;
    -moz-column-count: 3;
    column-gap: 1em;
    -moz-column-gap: 1em;
}*/
@endif

@if(Request::segment(3) == 'newsfeed' )
.masonry-newsfeed { /* Masonry container */
    column-count: 2;
    -moz-column-count: 2;
    column-gap: 1em;
    -moz-column-gap: 1em;
}
@endif

</style>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-91743367-1', 'auto');
  ga('send', 'pageview');

</script>

<title>{{ $title }}</title>
