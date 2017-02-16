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
                    <div class="proSignup">
                        <span class="proSignup-heading" style="color: #fff;">
                            Are You A Skilled Home Improvement Expert? 
                        </span>
                        <a href="{{url('pro/register')}}" class="text-center signup-button-home" style="font-size: 14px;font-weight: bold;">SIGN UP NOW</a>
                    </div>
                    <div class="hero-image-inner" style="background-image: url('assets/img/<?php echo $slider_name; ?>');">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                                    <h1 style="display:block;text-align:center;margin:0px;margin-bottom:20px;">
                                       {{$text[$random_text]}}

                                    </h1>

                                    <p>We bridge the gap between you and the pro you need.</p>

                                    <div class="input-group">
                                        <input type="text"  class="form-control search-keyword col-xs-12" placeholder="SEARCH FOR PROFESSIONALS" id="search-demo">
                                        <input type="hidden" id="formatted_location">
                                        <span class="input-group-btn">
                                            <button style="background: #f9b412;font-weight: bolder;" class="btn btn-primary search_result" type="button">Search</button>
                                        </span>
                                        <!-- <span class="input-group-btn">
                                            <center><button style="background: #f9b412;" class="btn btn-primary smart-search"  data-toggle="modal" data-target="#smartSearch">Smart Search</button></center>
                                        </span> -->
                                    </div><!-- /.input-group -->
                                </div>

                                <div class="col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                                    <p style="margin-top:0px;font-size: 13px;color:"><span class="get-location"></span> <a href="#" style="color:#fff; font-weight: bolder;" data-toggle="modal" data-target="#changelocation">Change Location</a></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.hero-video -->
                </div>
            </div>

            <!-- <div class="container">
                <div class="block background-white fullwidth">
                        <h1 class="text-center">Are You A Skilled Home Improvement Expert?</h1>
                        <center><a href="{{url('register')}}" class="text-center btn btn-primary uppercase">SIGN UP NOW</a></center>
                </div>
            </div> -->

            <div class="block background-white fullwidth">
                <div class="container ">
                    <div class="page-header">
                        <h1>What’s your vision?</h1>
                        <p>Get linked with the right pro, so you can bring your dream home to life.</p>
                    </div><!-- /.page-header -->

                    <div class="cards-wrapper">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="category-section">
                                        @foreach($data['row_category'] as $c)
                                            <div class="col-sm-{{$c->section}}">
                                                <div class="card" data-background-image="{{url('uploads/category')}}/{{$c->image}}">

                                                    <div class="card-content">
                                                        <h2><a href="#">{{$c->category}}</a></h2>
                                                        <div class="card-actions">
                                                            <a href="{{url('search')}}/?type=listing&element=category&keyword={{str_replace(' ', '-', $c->category)}}&location=" class="btn btn-primary btn-radius-3">Explore pros nearby</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>


                                @if(count($data['more_category']) != 0)
                                    @foreach($data['more_category'] as $c)
                                    <div class="improve-section hide">

                                        <div class="col-sm-{{$c->section}}">
                                            <div class="card" data-background-image="{{url('uploads/category')}}/{{$c->image}}">

                                                <div class="card-content">
                                                    <h2><a href="#">{{$c->category}}</a></h2>
                                                    <div class="card-actions">
                                                        <a href="{{url('search')}}/?type=listing&element=category&keyword={{str_replace(" ", "-", $c->category)}}&location=''" class="btn btn-primary btn-radius-3">Explore pros nearby</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @endforeach
                                @endif
                                </div>
                            </div>


                        </div>
                    </div><!-- /.cards-wrapper -->

                    @if(count($data['more_category']) != 0)
                    <div class="visible-xs visible-sm">
                        <div class="spacer-20"></div>
                    </div>
                    <center><a href="{{url('search/pros')}}" class="btn btn-primary uppercase showmore" id="showmore">Show More</a></center>
                    <!--  <center><button class="btn btn-primary uppercase showmore" id="showmore">Show More</button></center>
                    <center><button class="btn btn-primary uppercase showless" id="showless" style="display:none;">Show Less</button></center> -->
                    @endif
                </div>
            </div>

            <!--UI-->
            <div class="fullwidth background-grey block">
                <h1 class="text-center">STORIES</h1>

                <div class="container">
                    <div class="row">
                        <div class="outer">
                            <section class="column-center">
                                <div class="masonry cont-col-home cfx">
                                @foreach($data['userblog'] as $ub)
                                    <div class="item">
                                        <div id="featuredContainer">
                                            <div class="post project">
                                                <header>
                                                    <figure class="user-post">
                                                        <a href="{{url('profile')}}/{{$ub['getvendorinfo']['username']}}"><img src="{{url('uploads/avatar')}}/{{$ub['getvendorinfo']['avatar']}}" class="photo-user"></a>
                                                        <figcaption>
                                                            <a href="{{url('profile')}}/{{$ub['getvendorinfo']['username']}}" class="author-post">
                                                                @if($ub['getvendorinfo']['type'] == 'user')
                                                                {{$ub['getvendorinfo']['name']}}
                                                                @else
                                                                {{$ub['getvendorinfo']['business_name']}}
                                                                @endif
                                                            </a>
                                                            <span class="action-post">published {{$ub['time']}}</span>
                                                        </figcaption>
                                                    </figure>
                                                </header>

                                                <a href="{{url('stories')}}/{{$ub['id']}}/{{str_slug($ub['title'])}}">
                                                    <div class="project-featured">
                                                        
                                                        <figure>
                                                            <figcaption>
                                                                <span>
                                                                    <h3 class="title">{{$ub['title']}} 
                                                                    <span class="location">{{$ub['location']}}</span>
                                                                    </h3>
                                                                </span>
                                                                
                                                            </figcaption>
                                                            @if(count($ub['images']) > 0)
                                                            @if(count($ub['images']) == 1)
                                                            <span>

                                                                <img src="{{url('uploads/blog')}}/{{$ub['images'][0]->image}}"></span>
                                                            @else
                                                            <span>
                                                                <img src="{{url('uploads/blog')}}/{{$ub['images'][0]->image}}">
                                                            </span>
                                                            
                                                            @endif
                                                            @endif
                                                        </figure>
                                                        
                                                    </div>

                                                    <footer>
                                                        <div class="rp-social-card">
                                                            <div class="cont">
                                                                <div class="counts mt10 mb10">
                                                                    <span class="views">
                                                                        <span class="like-count">{{$ub['total_liked']}}</span> Likes
                                                                    </span>
                                                                </div>
                                                                <div class="line">
                                                                    <hr class="hr-line">
                                                                </div>
                                                                <div class="action-btns mt10">

                                                                    <span class="r-icon r-icon-heart-filled like-stories">
                                                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span class="t hidden-xs">Like</span>
                                                                    </span>

                                                                    <span class="r-icon r-icon-comment comment-stories">
                                                                        <i class="fa fa-comment-o" aria-hidden="true"></i> <span class="t hidden-xs">Comment</span>
                                                                    </span>

                                                                    <span class="r-icon r-icon-share comment-share">
                                                                        <i class="fa fa-share-alt" aria-hidden="true"></i> <span class="t hidden-xs">Share</span>
                                                                        <div class="share-tab">
                                                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{url('stories')}}/{{$ub['id']}}/{{str_slug($ub['title'])}}" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;"><i class="fa fa-facebook"></i> Facebook</a>

                                                                            <a href="https://twitter.com/home?status={{url('stories')}}/{{$ub['id']}}/{{str_slug($ub['title'])}}" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;"><i class="fa fa-google-plus"></i> Google plus</a>

                                                                            <a href="https://plus.google.com/share?url={{url('stories')}}/{{$ub['id']}}/{{str_slug($ub['title'])}}" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;"><i class="fa fa-twitter"></i> Twitter</a>

                                                                            <a href="https://pinterest.com/pin/create/button/?url={{url('stories')}}/{{$ub['id']}}/{{str_slug($ub['title'])}}" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;"><i class="fa fa-pinterest"></i> Pinterest</a>
                                                                        </div>
                                                                    </span>

                                                                    <span class="r-icon r-icon-repost repost-stories">
                                                                        <i class="fa fa-exchange" aria-hidden="true"></i> <span class="t hidden-xs">Repost</span>
                                                                    </span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </footer>

                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

                <div class="visible-xs visible-sm">
                    <div class="spacer-20"></div>
                </div>
                <!-- <center><a href="{{url('stories')}}" class="btn uppercase">Show More</a></center> -->
                <center><a href="{{url('stories')}}" class="btn btn-primary">Show More</a></center>
            </div>
            <!--UI-->


            <div class="fullwidth background-white block">
                <h1 class="text-center" style="position: relative;top: -27px;">Look for the Super Pro Badge</h1>
                <!-- <p  class="text-center">Extraordinary hosts who meet these benchmarks have the Superhost Badge at the bottom of their listing.</p> -->
                <div class="container">
                    <div class="row">
                        <div class ="hidden-xs" style="width: 748px;height: 200px;margin:0px auto;position: relative;background-image:url({{url('images/badge.png')}});background-size: contain; background-position: center;background-repeat: no-repeat;">

                             <div class="col-md-6" style="position: absolute;top: 0px;left: -83px;text-align: center;font-size: 13px;">
                                <h3 class="superpros-badge-text" style="margin-bottom: 2px;">Super Reviews</h3>
                            </div>
                            <div class="col-md-6" style="position: absolute;top: 0px;right: -78px;text-align: center;font-size: 13px;">
                                <h3 class="superpros-badge-text" style="margin-bottom: 2px;">Transparency</h3>
                            </div>
                            <div class="col-md-6" style="position: absolute;bottom: 9px;left: -80px;text-align: center;font-size: 13px;">
                                <h3 class="superpros-badge-text" style="margin-bottom: 2px;">Verified Vendors</h3>
                            </div>
                            <div class="col-md-6" style="position: absolute;bottom: 11px;text-align: center;right: -71px;font-size: 13px;">
                                <h3 class="superpros-badge-text" style="margin-bottom: 2px;">Commitment</h3>
                            </div>
                        </div>

                        <div class="visible-xs ">
                            <div class="col-md-12">
                                <h3>Super Reviews</h3>
                                <p>SuperPros have a 4.0+ ratings.</p>
                            </div>
                            <div class="col-md-12">
                                <h3>Transparency</h3>
                                <p>SuperPros have a seamless transaction process right from the start.</p>
                            </div>
                            <div class="col-md-12">
                                <h3>Verified Vendors</h3>
                                <p>SuperPros are carefully selected after substantiation&amp; validation of their previous undertakings.</p>
                            </div>
                            <div class="col-md-12">
                                <h3>Commitment</h3>
                                <p>SuperPros go above &amp; beyond to ensure long term association with customers.</p>
                            </div>
                        </div>

                        <div class="mt-20"></div>
                        <center><a href="{{url('super-pros')}}" class="text-center btn btn-primary uppercase">Know More</a></center>
                    </div>
                </div>
            </div>

            <div class="fullwidth background-grey block">
                <h1 class="text-center">WHY US?</h1>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1 col-md-12 col-sm-12">
                            <div class="col-md-6 col-sm-6">
                                <div class="whyUsPoints">
                                    <h3>ZEALOUS</h3>
                                    <span class="point-highlight"></span>
                                    <p>We are enthusiastic and passionate about what we do.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="whyUsPoints">
                                    <h3>CUSTOMER SATISFACTION</h3>
                                    <span class="point-highlight"></span>
                                    <p>We care for the comfort and convenience of our customer.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="whyUsPoints">
                                    <h3>TRANSPARENT</h3>
                                    <span class="point-highlight"></span>
                                    <p>We empower home-owners.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="whyUsPoints">
                                    <h3>NO HACKS | CHEATS</h3>
                                    <span class="point-highlight"></span>
                                    <p>We believe hard work and diligence will take us to new heights.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            

            @if(count($data['project']) != 0)
            <div class="block background-white fullwidth">
                <div class="container ">
                    <div class="page-header">
                        <h1>TRENDING PROJECTS</h1>
                    </div><!-- /.page-header -->
                    <div class="col-md-12">
                        <div class="row">
                        @foreach($data['project'] as $p)
                            <div class="project-section  project-section{{$p['id']}} col-md-3" project_id="{{$p['id']}}">
                                <div class="row p-15">
                                    <div class="col-md-12 background-white box-shadow">
                                        <div class="row">
                                        

                                            @if(!empty($p['featured_image']))
                                                @php
                                                $featured_image = url('contentimage').'?file=uploads/project/'.$p->featured_image.'&l=243&w=160';
                                                @endphp
                                            @else
                                                @php
                                                $featured_image = url('images/no-image-default.png');
                                                @endphp
                                            @endif

                                            <div class="photo-gradient" style="background:url('{{ $featured_image }}'); background-size:cover; background-repeat:no-repeat; width:100%; height:160px;background-position: center;position: relative;"><div class="photo-number photo-number-{{$p['id']}}"><div class="photo-count">{{App::make('App\Http\Controllers\MainController')->getPhotoCount($p->id)}} photos</div></div></div>


                                            <div class="project-name">
                                                <p>
                                                @if(strlen($p->title) > 25)
                                                <b>{{substr($p->title,0,25)}}</b>
                                                @else
                                                <b>{{$p->title}}</b>
                                                @endif
                                                </p>
                                                <p>
                                                @if(strlen($p->description) > 88)
                                                {{substr($p->description,0,88)}}
                                                @else
                                                {{$p->description}}
                                                @endif
                                                <a href="{{url('/project')}}/{{$p['id']}}/{{str_slug($p['title'],'-')}}" class="lm">Read more</a></p>
                                            </div>

                                            @if(!empty($p['date']) && !empty($p['type_of_project']))
                                            <div class="col-md-12 col-sm-12 col-xs-12 project-details ">
                                                @if(!empty($p['date']))
                                                <div class="project-pricing">
                                                    <p><b>{{$p['date']}}</b></p>
                                                    <span class="small-txt">Project Year</span>
                                                </div>
                                                @endif

                                                @if(!empty($p['type_of_project']))
                                                <div class="project-timing">
                                                   <p><b>{{ $p['type_of_project'] }}</b></p>
                                                   <span class="small-txt">Project Type</span>
                                                </div>
                                                @endif
                                            </div>
                                            @elseif(!empty($p['date']) || !empty($p['type_of_project']))
                                            <div class="col-md-12 col-sm-12 col-xs-12 project-details hr">
                                                @if(!empty($p['date']))
                                                <div class="project-single">
                                                    <p><b>{{$p['date']}}</b></p>
                                                    <span class="small-txt">Project Year</span>
                                                </div>
                                                @endif

                                                @if(!empty($p['type_of_project']))
                                                <div class="project-single">
                                                   <p><b>{{ $p['type_of_project'] }}</b></p>
                                                   <span class="small-txt">Project Type</span>
                                                </div>
                                                @endif
                                            </div>
                                            @else
                                            <div class="col-md-12 col-sm-12 col-xs-12 project-details">
                                                
                                            </div>
                                            @endif

                                            <div class="col-md-12 col-sm-12 col-xs-12 project-details">
                                                <div class="row p-10">
                                                    <center style="margin-bottom: -20px;"><a href="{{url('/project')}}/{{$p['id']}}/{{str_slug($p['title'],'-')}}" class="project-link" id="project-view-{{$p['id']}}" style="padding: 13px;">View Project</a></center>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>

                <div class="visible-xs visible-sm">
                    <div class="spacer-20"></div>
                </div>
                <center style="margin-top: 21px;"><a href="{{url('all-projects')}}" class="btn btn-primary uppercase">View All</a></center>
            </div>
            @endif

            

    </div><!-- /.content -->
</div><!-- /.main-inner -->


<div id="smartSearch" class="modal fade" role="dialog">
    <div class="modal-dialog custom-width-1170">
        <div class="modal-content">
            <div class="modal-body" style="padding:0px;">
                <div class="row">
                    <div class="questions">

                        <div class="question-container" style="margin-bottom: 0px;padding: 67px 0 0;position:relative;">
                            <!-- <p style="position:fixed;right: 11px;top: 11px;">Scroll up</p> -->
                            <center class="" style="padding-top: 25px;padding-bottom: 120px;">
                                <h1 class="text-center" for="login-form-password">What service are you looking for?</h1>

                                <input type="text"  class="form-control question-center" placeholder="WHATS YOUR PROJECT?" id="smart-search-demo">
                                
                            </center>

                            <center class="hide"  style="padding-top: 25px;padding-bottom: 120px;" id="propertyType" >
                                <h1 class="text-center" for="login-form-password">Choose your property type</h1>
                                <div class="property_type option-div" value="Residential" id="residential"><span>Residential</span></div>
                                <div class="property_type option-div" value="Commercial" id="commercial"><span>Commercial</span></div>
                            </center>

                            <center class="hide"  style="padding-top: 25px;padding-bottom: 120px;" id="budget">
                                <h1 class="text-center">Budget</h1>

                                <div class="budget option-div" value="0-50000" id="budget"><span>Less than 50,000</span></div>
                                <div class="budget option-div" value="50000-100000" id="budget"><span>50,000-1,00,000</span></div>
                                <div class="budget option-div" value="100000-500000" id="budget"><span>1,00,000-5,00,000</span></div>
                                <div class="budget option-div" value="500000-more" id="budget"><span>> 5,00,000</span></div>
                            </center>

                            <!-- <center class="hide" style="padding-top: 25px;padding-bottom: 120px;" id="location">
                                <h1 class="text-center">Location</h1>
                                <input type="text" class="form-control location  question-center" name="location" >
                                    
                            </center> -->

                            <!-- <center class="hide"  style="padding-top: 25px;padding-bottom: 120px;" id="pincode">
                                <h1 class="text-center">Pincode</h1>
                                <input type="text" class="form-control question-center pincode" name="pincode" id="autocomplete" value="110059">
                                <div class="p-10"></div>
                                <button class="btn btn-primary getPincode">Continue</button>
                            </center> -->

                            <center class="hide"  style="padding-top: 25px;padding-bottom: 120px;" id="kms">
                                <h1 class="text-center">Within</h1>

                                <div class="kms option-div" value="5" id="kms"><span>5 Km</span></div>
                                <div class="kms option-div" value="10" id="kms"><span>10 Km</span></div>
                                <div class="kms option-div" value="25" id="kms"><span>25 Km</span></div>
                                <div class="kms option-div" value="50" id="kms"><span>50 Km</span></div>
                                <div class="kms option-div" value="100" id="kms"><span>100 Km</span></div>
                                <div class="kms option-div" value="200" id="kms"><span>200 Km</span></div>
                                <div class="kms option-div" value="300" id="kms"><span>300 Km</span></div>
                                <div class="kms option-div" value="400" id="kms"><span>400 Km</span></div>
                                <div class="kms option-div" value="500" id="kms"><span>500 Km</span></div>
                                <div class="kms option-div" value="700<" id="kms"><span>Beyond 50 Km</span></div>
                            </center>

                            <center class="hide"  style="padding-top: 25px;padding-bottom: 120px;" id="vendorType">
                                <h1 class="text-center">Looking for </h1>

                                <div class="select_pros option-div" value="superpros" id="select_pros"><span>Super Pros</span></div>
                                <div class="select_pros option-div" value="vendor" id="select_pros"><span>All Pros</span></div>

                                <div class="p-10"></div>
                                <button class="search btn btn-primary question-center searchbutton">Search</button>
                            </center>


                        </div>
                    </div>
                    <div class="question-change">
                        <p class="percent">0% Complete</p>
                        <div class="question-complete-percent" style="width: 0%">

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<div id="changelocation" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content background">
            <div class="col-md-12">
                <h3>Change your location</h3>
            </div>
            <div class="modal-body">
               <input type="text" placeholder="Location" class="form-control" name="location" id="autocomplete"><br><input type="submit" class ="form-control btn-info set-location" value="Set Location" style="background-color:#f9b412;">
            </div>
        </div>
    </div>
</div>

@stop
