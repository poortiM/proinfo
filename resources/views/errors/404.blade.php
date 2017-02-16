<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Page not found - Propisor </title>
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
<meta name="theme-color" content="#ffffff">

<link href="{{url('assets/fonts/nunito.css')}}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/libraries/owl.carousel/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('assets/libraries/colorbox/example1/colorbox.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('assets/libraries/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="{{ asset('assets/libraries/bootstrap-fileinput/fileinput.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/superlist.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('assets/css/headline.css') }}" rel="stylesheet" type="text/css" >

<style type="text/css">

</style>
</head>

<body>

<div class="page-wrapper">
    
    <div class="ui-loader-background"> </div>

    @include('main.menu')

<style type="text/css">
.input-field-superpros::-webkit-input-placeholder {
    color: black;
}
</style>


<div class="main">
    <div class="main-inner">
        <div class="content">
            <div class="mt-80">
                <div class="super-pro-review">
                      
                    <div class="row">
                        <div class="col-md-10 col-md-offset-3" style=" text-align: justify;">
                            <img src="{{url('assets/images/404.png')}}">
                        </div>  
                    </div>   
                </div>
            </div>   
        </div><!-- /.content -->
    </div><!-- /.main-inner -->
</div><!-- /.main -->

@include('main.footer')

</div><!-- /.page-wrapper -->
</body>
</html>