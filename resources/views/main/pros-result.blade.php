@extends('main.default')

@section('content')

<?php
$slider=array("slider1.jpg", "slider2.jpg", "slider3.jpg");
$random = array_rand($slider, 1);
$slider_name = $slider[$random];
//echo "<p>$winner_name</p>";
$text = array('Bringing dream homes to life','From House to Home','Your Projects Done right','Home is where every story begins','No home was built in a day','Let all that you do, be done at home');
$random_text = array_rand($text,1);
?>

<div class="main">
    <div class="main-inner">
        <div class="content">
            <div class="mt-80">
                
                <div class="hero-video">
                    <div class="hero-image-inner" style="background-image: url({{url('assets/img')}}/{{$slider_name}});">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                                    <h1 style="display:block;text-align:center;margin:0px;margin-bottom:20px;">
                                       {{$text[$random_text]}}

                                    </h1>

                                    <p>We bridge the gap between you and the pro you need.</p>

                                    <div class="input-group">
                                        <input type="text"  class="form-control search-keyword col-xs-12" placeholder="WHATS YOUR PROJECT?" id="search-demo">
                                        <input type="hidden" id="formatted_location">
                                        <span class="input-group-btn">
                                            <!-- <button style="background: #333;" class="btn btn-primary uppercase search_result" type="button">Search</button> -->
                                            <button style="background: #f9b412;font-weight: bolder;" class="btn btn-primary search_result" type="button" data-location="{{Request::get('location')}}">Search</button>
                                        </span>
                                        
                                    </div><!-- /.input-group -->
                                </div>

                                <div class="col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                                    <p style="margin-top:0px;font-size: 13px;color:">{{Request::get('location')}}</span></p>
                                </div>

                            </div>
                        </div>
                    </div><!-- /.hero-video -->
                </div>
            </div>

            <div class="block background-white fullwidth">
                 <div class="container ">
                    <div class="page-header">
                        <h1>What’s your vision?</h1>
                        <p>Get linked with the right pro, so you can bring your dream home to life.</p>
                    </div><!-- /.page-header -->

                    <div class="cards-wrapper">
                        <div class="row">
                            @foreach($category as $c)
				            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
				                <a class="thumbnail" href="{{url('search')}}?type=listing&element=category&keyword={{$c->category}}&location={{Request::get('location')}}">
				                    <img style="border: 8px solid #f7b330;" class="img-circle" src="{{url('images/tiles-icons')}}/{{$c->refine_image}}" alt="">
                                    <div class="pro-result-heading">{{$c->category}}</div>
				                </a>
				            </div>
				            @endforeach
				            
                        </div>
                    </div><!-- /.cards-wrapper -->
                </div>
            </div>

    </div><!-- /.content -->
</div><!-- /.main-inner -->

@stop
