@extends('main.default')

@section('content')

@foreach($project as $project)

    @if(!empty($project->featured_image))

    @php
        $featured_image = url('uploads/project').'/'.$project->featured_image;
    @endphp

    <div class="content vendor-banner">
        <div class="mt-80">
            <div class="detail-banner" style="background-image: linear-gradient(to top, rgb(0, 0, 0), rgba(0, 0, 0, 0.1)),url({{$featured_image}});">
                <div class="container">
                    <div class="detail-banner-left ">
                        <div class="vendor-avatar-container">
                            <!-- <center><img class="vendor-avatar img-circle" src="http://cdn.porch.com/bootstrap/0web/landingpages/desktop/porch_assist_plumber1_opt.jpg" align="middle"></center> -->
                        </div>

                        @if(!empty($project->youtube_videos))
                        <button style="z-index:999;" class="pull-right btn btn-xs play-btn btn-primary" data-toggle="modal" data-target="#vendorvid">&nbsp;&nbsp;&nbsp;<i class="fa fa-play"></i></button>
                        @endif

                        <h3 class="vendor-name" style="position: relative;left: 38px;">
                            {{$project->title}}
                        </h3>

                        <div class="vendor-address" style="position: relative;left: 38px;">
                            {{$project->location}}
                        </div>
                        <!-- /.detail-banner-address -->

                    </div>
                    <!-- /.detail-banner-left -->
                </div>
                <!-- /.container -->
            </div>
        </div>
    </div>
    @endif
    <style type="text/css">
        .table th, .table td {
            border-top: none !important;
            border-left: none !important;
        }
        .request-btn
        {
            position: absolute;
            bottom: 0px;
            left: 0px;
        }
    </style>

    <div id="vendorvid" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content background-drakgrey">

                <div class="modal-body">
                    <embed width="100%" height="315" src="{{$project->youtube_videos}}">
                </div>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-12 col-sm-12" id="Overview">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 ">
                                <div class="col-md-12 info-box" class="position:relative;">
                                    <div class="col-md-12">
                                        <table class="table">
                                        @if(!empty($project->cost))
                                            <tr>
                                                <td style="width: 101px;"><strong>Cost : </strong></td>
                                                <td>
                                                   <strong>{{$project->currency}} {{$project->min_cost}}-{{$project->cost}}</strong>
                                                </td>
                                            </tr>
                                        @endif

                                        @if(!empty($project->date))
                                            <tr>
                                                <td style="width: 101px;"><strong>Year : </strong></td>
                                                <td><strong>{{$project->date}}</strong></td>
                                            </tr>
                                        @endif

                                        @if(!empty($project->type_of_project))
                                            <tr>
                                                <td style="width: 101px;"><strong>Type : </strong></td>
                                                <td><strong>{{$project->type_of_project}}</strong></td>
                                            </tr>
                                        @endif

                                        @if(!empty($project->location))
                                            <tr>
                                                <td style="width: 101px;"><strong>Location : </strong></td>
                                                <td><strong>{{$project->location}}</strong></td>
                                            </tr>
                                        @endif

                                        @if(!empty($project->client_name))
                                            <tr>
                                                <td style="width: 101px;"><strong>Client Name : </strong></td>
                                                <td><strong>{{$project->client_name}}</strong></td>
                                            </tr>
                                        @endif

                                        @if(!empty($project->area))
                                            <tr>
                                                <td style="width: 101px;"><strong>Area : </strong></td>
                                                <td><strong>{{$project->area}} Sq Ft</strong></td>
                                            </tr>
                                        @endif

                                        </table>
                                    </div>

                                    <div class="col-md-12">
                                        <h4 class="text-center">Share</h4>
                                        <div class="center" style="margin-top:20px;">
                                            
                                            <a target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;" href="https://www.facebook.com/sharer/sharer.php?u={{'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']}}&title={{$project->title}}&description={{$project->description}}" style="color:#fff; background: #444; border-radius: 50%; padding: 10px 15px; text-align: center; margin-left: 10px;"><i class="fa fa-facebook"></i></a>

                                            <a target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;" href="https://twitter.com/home?status={{'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']}}" style="color:#fff; background: #444; border-radius: 50%; padding: 10px 12px; text-align: center;margin-left: 10px;"><i class="fa fa-twitter"></i></a>

                                            <a target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;" href="https://plus.google.com/share?url={{'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']}}" style="color:#fff; background: #444; border-radius: 50%; padding: 10px 13px; text-align: center;margin-left: 10px;"><i class="fa fa-google-plus"></i></a>

                                        </div>
                                    </div>



                                    <div class="col-md-12 hr">
                                    </div>

                                    @if(!empty($project->avatar))
                                        @php $avatar = asset('uploads/avatar/').'/'.$project->avatar @endphp
                                   @else
                                        @php $avatar = 'http://shops4u.in/images/default.png' @endphp
                                   @endif


                                    <div class="col-md-12" >
                                        <h4>Completed By</h4>
                                        <center>
                                            <img alt="{{$project->business_name}}" class="img-circle" src="{{$avatar}}" style="width:60%;display: inline;">
                                            <h4><a href="{{ url('/') }}/profile/{{ $project->username }}">{{$project->business_name}}</a></h4>
                                            <!-- <h5 style="margin-bottom: 60px;">Company postion</h5> -->
                                        </center>

                                    </div>

                                    <div class="col-md-12" style="margin-top: 39px;">
                                        <button class="btn btn-primary btn-block request-btn" data-toggle="modal" data-target="#contactVendor">Request Quote</button>
                                    </div>


                                </div>
                            </div>

                            <div class="col-md-9 col-sm-8">
                                <div class="col-md-12 info-box">
                                @if(!empty($project->description))
                                    <h2>Project Description</h2>
                                     <p>{{$project->description}}</p>
                                @endif
                                   

                                    <!-- <h3>Project Photos</h3> -->
                                    <div class="detail-gallery">

                                        <div style="width: 100%; clear: both;">
                                        @if(count(App::make('App\Http\Controllers\MainController')->getprojectimage($project->id,'After')) != 0)
                                            <h4 style="width: 100%; clear: both;">After</h4>
                                            <div id="links" class="links">
                                            @foreach(App::make('App\Http\Controllers\MainController')->getprojectimage($project->id,'After') as $p)

                                            @php $image = url('contentimage?file=').'uploads/project/'.$p->image.'&l=150&w=120' @endphp
                                                <div class="project-image-container">
                                                    <a href="{{url('uploads/project')}}/{{$p->image}}" title="After Project Image by {{$project->business_name}}" class="project-image" style="background: url({{$image}});background-size: cover;" data-gallery="">
                                                    </a>
                                                </div>

                                            @endforeach
                                            </div>
                                        @endif

                                        @if(count(App::make('App\Http\Controllers\MainController')->getprojectimage($project->id,'Before')) != 0)

                                            <h4 style="width: 100%; clear: both;">Before</h4>
                                             <div id="links" class="links">
                                            @foreach(App::make('App\Http\Controllers\MainController')->getprojectimage($project->id,'Before') as $p)

                                                @php $image = url('contentimage?file=').'uploads/project/'.$p->image.'&l=150&w=120' @endphp
                                                <div class="project-image-container">
                                                    <a href="{{url('uploads/project')}}/{{$p->image}}" title="Before Project Image by {{$project->business_name}}" class="project-image" style="background: url({{$image}});background-size: cover;" data-gallery="">
                                                    </a>
                                                </div>

                                            @endforeach
                                            </div>
                                        @endif


                                        @if(count(App::make('App\Http\Controllers\MainController')->getprojectimage($project->id,'During')) != 0)

                                            <h4 style="width: 100%; clear: both;">During</h4>
                                             <div id="links" class="links">
                                            @foreach(App::make('App\Http\Controllers\MainController')->getprojectimage($project->id,'During') as $p)

                                                @php $image = url('contentimage?file=').'uploads/project/'.$p->image.'&l=150&w=120' @endphp
                                                <div class="project-image-container">
                                                    <a href="{{url('uploads/project')}}/{{$p->image}}" title="During Project Image by {{$project->business_name}}" class="project-image" style="background: url({{$image}});background-size: cover;" data-gallery="">
                                                    </a>
                                                </div>

                                            @endforeach
                                            </div>
                                        @endif


                                        @if(count(App::make('App\Http\Controllers\MainController')->getprojectimage($project->id,'')) != 0)

                                            <h4 style="width: 100%; clear: both;">Project Images</h4>
                                             <div id="links" class="links">
                                            @foreach(App::make('App\Http\Controllers\MainController')->getprojectimage($project->id,'') as $p)
                                                @php $image = url('contentimage?file=').'uploads/project/'.$p->image.'&l=150&w=120' @endphp
                                                <div class="project-image-container">
                                                    <a href="{{url('uploads/project')}}/{{$p->image}}" title="Project Image by {{$project->business_name}}" class="project-image" style="background: url({{$image}});background-size: cover;" data-gallery="">
                                                    </a>
                                                </div>
                                            @endforeach
                                            </div>
                                        @endif

                                        </div>



                                        <div id="blueimp-gallery" class="blueimp-gallery">
                                            <div class="slides"></div>
                                            <h3 class="title"></h3>
                                            <a class="prev">‹</a>
                                            <a class="next">›</a>
                                            <a class="close">×</a>
                                            <a class="play-pause"></a>
                                            <ol class="indicator"></ol>
                                        </div>
                                    </div>
                                    <!-- /.detail-gallery -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div id="contactVendor" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">

                                <div class="col-md-12">
                                    <h3>Email {{$project->business_name}}</h3>
                                </div>

                                <div class="col-md-12">
                                    <input class="form-control contactor_name" placeholder="Enter your name"/>
                                    <span class="help-block" id="contactor_name_error"></span>
                                    <div class="spacer-10"></div>
                                </div>

                                <div class="p-10"></div>
                                <div class="col-md-6">
                                    <input class="form-control contactor_email" placeholder="Enter your email"/>
                                    <span class="help-block" id="contactor_email_error"></span>
                                    <div class="spacer-10"></div>
                                </div>

                                <div class="col-md-6">
                                    <input class="form-control contactor_phone" placeholder="Enter your phone" maxlength ="10" />
                                    <span class="help-block" id="contactor_phone_error"></span>
                                    <div class="spacer-10"></div>
                                </div>

                                <div class="p-10"></div>
                                <div class="col-md-12">
                                    <input class="form-control contactor_address" placeholder="Enter your address" />
                                    <span class="help-block" id="contactor_address_error"></span>
                                    <div class="spacer-10"></div>
                                </div>
                                <div class="p-10"></div>

                                <!-- <div class="col-md-6">
                                    <input class="form-control contactor_phone" placeholder="Enter your phone" maxlength ="10" />
                                    <span class="help-block" id="contactor_phone_error"></span>
                                    <div class="spacer-10"></div>
                                </div>


                                <div class="col-md-3">
                                    <input class="form-control contactor_phone" placeholder="Enter your phone" maxlength ="10" />
                                    <span class="help-block" id="contactor_phone_error"></span>
                                    <div class="spacer-10"></div>
                                </div>


                                <div class="col-md-3">
                                    <input class="form-control contactor_phone" placeholder="Enter your phone" maxlength ="10" />
                                    <span class="help-block" id="contactor_phone_error"></span>
                                    <div class="spacer-10"></div>
                                </div> -->


                                <div class="p-10"></div>
                                <div class="col-md-12">
                                    <textarea class="form-control contactor_description" rows="7" placeholder="Provide a brief description of your project and include your preferred contact time, budget, and scheduling details."></textarea>
                                    <span class="help-block" id="contactor_description_error"></span>
                                    <div class="spacer-10"></div>
                                </div>

                                <div class="col-md-12">
                                    <div class="spacer-10"></div>
                                    <button class="btn btn-default btn-block  contact_profile" style="background:#ddd;" vendor_id="{{$project->vendor_id}}">SUBMIT</button>

                                </div>

                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <input type="checkbox" id="today"><label for="today"><p style="font-size:17px;">Compare quotes by connecting with more professionals </p><p>By submitting this request, you agree to our <a href="" class="lm">Terms of Use</a>, which includes your consent to have <a href="" class="lm"><sup style="font-size:9px;">Propisor</sup></a>, companies who receive your request and service pros send you offers and information, including using automated phone technology <a href="" class="lm">Learn More.</a></p></label>
                                    </div>
                                    <span class="help-block" id="contactor_description_error"></span>
                                    <div class="spacer-10"></div>
                                </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- </div> -->
@endforeach

@stop
