@extends('main.default')

@section('content')


@foreach($vendor as $vendor)

<style type="text/css">
    .lm{
        color: dodgerblue;
    }
</style>

<div class="page-wrapper">

    <div class="content vendor-banner">
        <div class="mt-80">
            @if($vendor->claim_status == 0)
            <div class="proSignup">
                <span class="proSignup-heading" style="color: #fff;">
                    Is this your business? Claim your profile now 
                </span>
                <button style="z-index:1;" class="btn btn-xs btn-primary claimyourprofile" data-toggle="modal" data-target="#claimyourprofile" data-username="{{$vendor->username}}">CLAIM THIS PROFILE</button>
            </div>
            @endif
            <div class="detail-banner" style="background-image: url({{asset('uploads/cover')}}/{{$vendor->cover}});">

                <div class="container">
                    <div class="detail-banner-left ">
                        <div class="vendor-avatar-container">
                            @if(!empty($vendor->avatar))
                            <center><img class="vendor-avatar img-circle-profile profileView" src="{{ asset('uploads/avatar/') }}/{{ $vendor->avatar }}" align="middle"></center>
                            @endif
                        </div>
                        @if(!empty($vendor->youtube))
                        <button style="z-index:1;" class="pull-right btn btn-xs play-btn btn-primary" data-toggle="modal" data-target="#vendorvid">&nbsp;&nbsp;&nbsp;<i class="fa fa-play text-center"></i></button>
                        @endif

                        <h3 class="vendor-name">
                            {{$vendor->business_name}}
                        </h3>

                        <div class="vendor-address">
                            {{$vendor->location}}
                        </div><!-- /.detail-banner-address -->

                    </div><!-- /.detail-banner-left -->
                </div><!-- /.container -->
                <div class="gradient hidden-xs"></div>
            </div><!-- /.detail-banner -->
        </div>
    </div>

    <div id="contactVendor" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">

                            <div class="col-md-12">
                                <h3>Email {{$vendor->business_name}}</h3>
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

                            <div class="p-10"></div>
                            <div class="col-md-12">
                                <textarea class="form-control contactor_description" rows="7" placeholder="Provide a brief description of your project and include your preferred contact time, budget, and scheduling details."></textarea>
                                <span class="help-block" id="contactor_description_error"></span>
                                <div class="spacer-10"></div>
                            </div>

                            <div class="col-md-12">
                                <div class="spacer-10"></div>
                                <button class="btn btn-default btn-block  contact_profile" style="background:#ddd;" vendor_id="{{$vendor->id}}">SUBMIT</button>

                            </div>

                            <div class="col-md-12">
                                <div class="checkbox">
                                    <input type="checkbox" id="today"><label for="today"><p style="font-size:17px;">Compare quotes by connecting with more professionals in {{$vendor->location}}</p><p>By submitting this request, you agree to our <a href="" class="lm">Terms of Use</a>, which includes your consent to have <a href="" class="lm"><sup style="font-size:9px;">Propisor</sup></a>, companies who receive your request and service pros send you offers and information, including using automated phone technology <a href="" class="lm">Learn More.</a></p></label>
                                </div>
                                <span class="help-block" id="contactor_description_error"></span>
                                <div class="spacer-10"></div>
                            </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="writereview" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">

                            <div class="col-md-12">
                                <center><img class="vendor-review-avatar img-circle profileView" src="{{ asset('uploads/avatar/') }}/{{ $vendor->avatar }}" align="middle">

                                </center>

                                <center>
                                    <h4>{{$vendor->business_name}}</h4>
                                </center>
                                <div class="col-md-6">
                                    <center>
                                        <h5>Efficiency</h5>
                                        <div id="stars-efficiency" class="starrr"></div>
                                        <span class="help-block" id="efficiency_error"></span>
                                    </center>
                                </div>

                                <div class="col-md-6">
                                    <center>
                                        <h5>Quality</h5>
                                        <div id="stars-quality" class="starrr"></div>
                                        <span class="help-block" id="quality_error"></span>
                                    </center>
                                </div>

                                <div class="col-md-6">
                                    <center>
                                        <h5>Helpfulness</h5>
                                        <div id="stars-helpfulness" class="starrr"></div>
                                        <span class="help-block" id="helpfulness_error"></span>
                                    </center>
                                </div>

                                <div class="col-md-6">
                                    <center>
                                        <h5>Cost Effectiveness</h5>
                                        <div id="stars-effectiveness" class="starrr"></div>
                                        <span class="help-block" id="effectiveness_error"></span>
                                    </center>
                                </div>

                                <div class="col-md-6 col-md-offset-3">
                                    <center>
                                        <h5>Over All Experience</h5>
                                        <div id="stars-experience" class="starrr"></div>
                                        <span class="help-block" id="experience_error"></span>
                                    </center>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <input class="form-control reviewer_name" placeholder="Enter your name"/>
                                <span class="help-block" id="reviewer_name_error"></span>
                                <div class="spacer-10"></div>
                            </div>

                            <div class="col-md-6">
                                <input class="form-control reviewer_phone" placeholder="Enter your phone"/>
                                <span class="help-block" id="reviewer_phone_error"></span>
                                <div class="spacer-10"></div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control reviewer_email" placeholder="Enter your email"/>
                                <span class="help-block" id="reviewer_email_error"></span>
                                <div class="spacer-10"></div>
                            </div>



                            <div class="col-md-12">
                                <textarea class="form-control review_description" placeholder="Enter your description"></textarea>
                                <span class="help-block" id="review_description_error"></span>
                                <div class="spacer-10"></div>
                            </div>

                            <div class="col-md-12">
                                <div class="spacer-30"></div>
                                <button class="btn btn-primary pull-right submit_review" style="margin-left:10px;" efficiency="" quality="" helpfulness="" effectiveness="" experience="" vendorid="{{ $vendor->id }}">Review</button>

                            </div>

                            <div class="col-md-12">
                                <span class="help-block" id="review_result" style="font-size: 18px;color: #47c100;font-weight: bold;display:none">Reviewed Successfully...</span>
                                <div class="spacer-10"></div>
                            </div>
                       <!--  </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="vendorvid" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content background-drakgrey">

                <div class="modal-body">
                   <embed width="100%" height="315" src="{{$vendor->youtube}}">
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="modal fade" id="claimyourprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Claim your profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Enter your code:</label>
                <input type="text" class="form-control" id="claim-code">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary verify-claim-otp" data-username="{{$vendor->username}}">Verify OTP</button>
          </div>
        </div>
      </div>
    </div> -->

    <div class="modal fade" id="claimyourprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Claim your profile</h5>
            </button>
          </div>
          <div class="modal-body">
            <p>A verification email has been sent to {{$vendor->email}}. Please enter the CODE here: </p>
            <form>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Enter your code:</label>
                <input type="text" class="form-control" id="claim-code">
              </div>
               <span class="clearfix" style="color: "><input type="checkbox" class="form-control" name="terms" id="claim-form-terms" style="display:inline-block;width:auto;height:auto;" required> I have read and accepted the <a href="{{url('tandc')}}" target="_blank" style="color: #337ab7;">terms &amp; conditions</a> of Propisor.</span>
            </form>
            <div class="mt-10"></div>
            <p>If this is not the email you are using currently, please reach out to us at <a href="mailto:help@propisor.com">help@propisor.com</a>.</p>

            
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary verify-claim-otp" data-username="{{$vendor->username}}" disabled="true">Verify OTP</button>
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
                            <div class="col-md-3 col-sm-4 ">
                                @if(!empty($vendor->super_pros=='1'))
                                <div class="col-md-12 info-box">
                                    <div class="center">
                                        <h3>SUPER PRO</h3>
                                        
                                        <img src="{{url('images/superpro.png')}}" style="width:85px;">
                                        <p>Backed by Propisor Guarantee</p>

                                    </div>
                                    <button class="write-review-btn btn-block"><a href="{{url('super-pros')}}">Know More</a></button>
                                </div>
                                @endif

                                

                                <div class="col-md-12 info-box">
                                    <h4>Professional information</h4>
                                    <div class="row hr"> </div>
                                        <div class="col-md-12">

                                            <div class="row">
                                                @if(!empty($vendor->location))
                                                <p class="professional_information_p">Address : </p>
                                                <span>{{ $vendor->location }}</span><hr>
                                                @endif
                                                
                                                @if(!empty($vendor->founding_year))
                                                <p class="professional_information_p">Experience : </p>
                                                <span>{{ date('Y')-$vendor->founding_year }} Years</span><hr>
                                                @endif
                                                
                                                @if(!empty($vendor->type_of_property))
                                                <p class="professional_information_p">Type of Property : </p>
                                                <span>{{ $vendor->type_of_property }}</span><hr>
                                                @endif
                                                
                                                @if(!empty($vendor->scope_of_work))
                                                <p class="professional_information_p">Scope of Work : </p>
                                                <span>{{ $vendor->scope_of_work}}</span><hr>
                                                @endif

                                                <p class="professional_information_p">Location : </p>
                                                <span><a style="color: #337ab7;" href="https://www.google.co.in/maps/place/{{ $vendor->street}} {{ $vendor->area}} {{ $vendor->zipcode}}" target="_blank">{{ $vendor->street}} {{ $vendor->area}} {{ $vendor->zipcode}}</a></span>

                                                <hr>

                                                @if(!empty($vendor->area_served))
                                                <p class="professional_information_p">Areas Served : </p>
                                                <span class="scope-value">{!! $vendor->area_served !!}</span><hr>
                                                @endif

                                                @if(!empty($vendor->accreditation))
                                                <p class="professional_information_p">Licenses and Accreditions : </p>
                                                <span class="">{!! $vendor->accreditation !!}</span><hr>
                                                @endif
                                            </div>

                                            <!-- <center><a href="http://maps.google.com/maps?q={{$vendor->latitude}},{{$vendor->longitude}}&z=15&output=embed&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU" target="_blank">View On Map</a></center> -->
                                        </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-8">
                                <div class="visible-sm visible-xs">
                                    <div class="col-md-12 info-box">
                                        <h4>{{$vendor->business_name}}</h4>
                                        <div class="row hr"> </div>
                                        <button class="write-review-btn btn-block" data-toggle="modal" data-target="#contactVendor">Request Quote</button>
                                        <div class="row hr"> </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-block view_phone" phone="{{ $vendor->mobile_number }}" vendor_id="{{$vendor->id}}">Show Contact</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 info-box">
                                        <h4>Professional information</h4>
                                        <div class="row hr"> </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    @if(!empty($vendor->location))
                                                    <p class="professional_information_p">Address : </p>
                                                    <span>{{ $vendor->location }}</span><hr>
                                                    @endif
                                                    
                                                    @if(!empty($vendor->founding_year))
                                                    <p class="professional_information_p">Experience : </p>
                                                    <span>{{ date('Y')-$vendor->founding_year }} Years</span><hr>
                                                    @endif
                                                     
                                                    @if(!empty($vendor->type_of_property))
                                                    <p class="professional_information_p">Type of Property : </p>
                                                    <span>{{ $vendor->type_of_property }}</span><hr>
                                                    @endif
                                                     
                                                    @if(!empty($vendor->scope_of_work))
                                                    <p class="professional_information_p">Scope of Work : </p>
                                                    <span>{{ $vendor->scope_of_work}}</span><hr>
                                                    @endif

                                                    <p class="professional_information_p">Location : </p>
                                                    <span>{{ $vendor->street}} {{ $vendor->area}} {{ $vendor->zipcode}}</span><hr>
                                                </div>

                                                <!-- <center><a href="http://maps.google.com/maps?q={{$vendor->latitude}},{{$vendor->longitude}}&z=15&output=embed&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU" target="_blank">View On Map</a></center> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 info-box">
                                    <h4>About Us</h4>
                                    <p>
                                        @if(!empty($vendor->about_us))
                                            <span class="about_us_show">{!! substr($vendor->about_us,0,483) !!}</span> <span class="about_us_hide" style="display:none;">{!!$vendor->about_us!!}</span> <span class="description_read_more" status="0" style="cursor: pointer;color: #396d9a;">Show more</span>
                                        @elseif(empty($vendor->about_us))
                                            No overview
                                        @endif
                                    </p>

                                    @if(!empty($vendor->website))
                                    <h4>Website</h4>
                                    <p><a href="{{$vendor->website}}" target="_blank">{{$vendor->website}}</a></p>
                                    @endif
                                    
                                    @if(!empty($vendor->facebook))
                                    <h4>Social Media</h4>
                                    <ul class="social-links nav nav-pills">
                                    @if(!empty($vendor->facebook))
                                        <li><a href="{{$vendor->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    @endif

                                    @if(!empty($vendor->twitter))
                                        <li><a href="{{$vendor->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    @endif

                                    @if(!empty($vendor->linkedin))
                                        <li><a href="{{$vendor->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                    @endif

                                    @if(!empty($vendor->googleplus))
                                        <li><a href="{{$vendor->googleplus}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                    @endif

                                    @if(!empty($vendor->instagram))
                                        <li><a href="{{$vendor->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                    @endif

                                    @if(!empty($vendor->tumblr))
                                        <li><a href="{{$vendor->tumblr}}" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                                    @endif

                                    @if(!empty($vendor->pinterest))
                                        <li><a href="{{$vendor->pinterest}}" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                    @endif

                                    @if(!empty($vendor->youtube_channel))
                                        <li><a href="{{$vendor->youtube_channel}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                    @endif

                                    </ul>
                                    @endif

                                    @if(!empty($vendor->category))
                                    <br>
                                    <h4>Services Provided</h4>
                                    {!!$vendor->category!!}
                                    @endif

                                    @if(!empty($vendor->awards))
                                    <br>
                                    <h4>Awards Won</h4>
                                    <p>{!!$vendor->awards!!}</p>
                                    @endif

                                    <div class="row hr"> </div>
                                    <h4>Tags</h4>
                                        {{ $services }}
                                    <!-- <div class="col-md-6">
                                      <h4>Licenses and Accreditions</h4>
                                      <ul class="vendor-info-list">
                                      @if(!empty($vendor->accreditation))
                                        <li class="accreditation">{!!$vendor->accreditation!!}</li>
                                      @else
                                        <li>Information has not been provided yet.</li>
                                      @endif
                                      </ul>
                                    </div> -->

                                </div>
                            </div>

                            <div class="col-md-3 col-sm-3 hidden-xs hidden-sm">
                                <div class="sidebar sidebar-nav-fixed ">
                                    <div class="col-md-12 info-box">
                                        <h4>{{$vendor->business_name}}</h4>
                                        <div class="row hr"> </div>
                                        
                                        <button class="write-review-btn btn-block" data-toggle="modal" data-target="#contactVendor">Request Quote</button>

                                        <div class="row hr"> </div>
                                        
                                        <button class="btn btn-block write-review-btn view_phone" phone="{{ $vendor->mobile_number }}" vendor_id="{{$vendor->id}}" style="border: 1px solid #fbbb04;">Show Contact</button>
                                    </div>
                                    <div class="col-md-12 info-box">
                                        @if(count($star_review) != 0)
                                            @php $overall = ($star_review[0]->efficiency+$star_review[0]->quality+$star_review[0]->helpfulness+$star_review[0]->effectiveness+$star_review[0]->experience)/5 @endphp
                                            @else
                                            @php $overall = 0 @endphp
                                        @endif
                                        <div class="center">

                                            <span style="display: block;position: relative;top: 9px;left: 57px;">({{round($overall,1)}})</span>

                                            <div class="star-rating-container" style="position:relative;top: -11px;left: -11px;">
                                                <div class="star-rating" style="width:{{ $overall/5*100 }}%"></div>
                                            </div>

                                        </div>
                                        <button class=" write-review-btn btn-block" data-toggle="modal" data-target="#writereview">write a review</button>
                                    </div>
                                </div>
                            </div>


                            <div class="spacer-10"></div>

                            <div class="col-md-12" id="Projects">
                                
                                @if(count($project) != 0)
                                <h2>Projects</h2>
                                @foreach($project as $p)
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
                                                <div class="col-md-12 col-sm-12 col-xs-12 project-details hr">
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
                                @endif
                                @if($countproject >= 4)
                                <div class="clearfix">
                                    <div class="spacer-30" style="display:block;"></div>
                                    <center><a href="{{url('profile')}}/{{$vendor->username}}/projects" class="text-center btn btn-primary uppercase" style="margin:30px 0;">View More Project</a></center>
                                </div>
                                @endif    
                            </div>
                            

                        </div>
                    </div>

                    @if($overall != 0)
                    <div class="col-md-12 col-sm-12" id="Reviews">
                        <div class="row">
                            <div class="col-md-12 col-sm-12"><h2>Reviews</h2></div>
                            <div class="col-md-3 col-sm-3">
                                <div class="col-md-12 info-box">

                                   <div class="center">

                                        <span style="display:block;color:#FDB714;font-size:33px; position: relative;top: 3px;">{{round($overall,1)}}</span>
                                        <p>
                                        <div class="star-rating-container">
                                            <div class="star-rating" style="width:{{ $overall/5*100 }}%"></div>
                                        </div>
                                        <!-- <span style="position: relative;top:-6px;">({{count($star_review)}})</span> -->
                                        </p>
                                    </div>
                                    <button class=" write-review-btn btn-block" data-toggle="modal" data-target="#writereview">write a review</button>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                @foreach($reviews as $r)
                                <div class="col-md-12 info-box">

                                    <div class="comment">
                                        <div class="comment-inner">
                                            <div class="comment-image">
                                                <img src="{{url('uploads/cover/avatar.png')}}" alt="">
                                            </div>
                                            <div class="comment-header">
                                                <h2>{{$r->name}} </h2>

                                                <div class="star-rating-container small-size">
                                                    <div class="star-rating" style="width:{{ ($r->efficiency+$r->quality+$r->helpfulness+$r->effectiveness+$r->experience)/30*100 }}%">
                                                    </div>
                                                </div>
                                                <!-- <p style="display: block;margin-left: 10px;margin-top: -5px;" class="comment-date">23/06/2016</p> -->
                                            </div>

                                        </div><!-- /.comment-header -->

                                        <div class="comment-content-wrapper">
                                            <div class="comment-content">
                                                <p style="margin: 0 0 -8px;">{{ substr($r->description,0,210) }} <span class="click-reviews" status="0" id="comment-read-more-{{$r->id}}" review-id="{{$r->id}}" style="cursor:pointer;color:blue;">Read more</span></p>

                                            </div><!-- /.comment-content -->
                                        </div><!-- /.comment-content-wrapper -->


                                        <div class="show-review-{{$r->id}}" style="display:none;">
                                            <div class="rating-div">
                                                <p class="text-center">Efficiency</p>
                                                <center style="margin-top:-10px;">
                                                    <div class="star-rating-container small-size">
                                                        <div class="star-rating" style="width:{{ $r->efficiency/5*100 }}%">
                                                        </div>
                                                    </div>
                                                    <span style="display:block;position:relative;top:-3px;font-weight:bolder;color:#FDB714;">({{ $r->efficiency }})</span>
                                                </center>
                                            </div>
                                            <div class="rating-div">
                                                <p class="text-center">Quality</p>
                                                <center style="margin-top:-10px;">
                                                    <div class="star-rating-container small-size">
                                                        <div class="star-rating" style="width:{{ $r->quality/5*100 }}%">
                                                        </div>
                                                    </div>
                                                    <span style="display:block;position:relative;top:-3px;font-weight:bolder;color:#FDB714;">({{ $r->quality }})</span>
                                                </center>
                                            </div>
                                            <div class="rating-div">
                                                <p class="text-center">Helpfulness</p>
                                                <center style="margin-top:-10px;">
                                                    <div class="star-rating-container small-size">
                                                        <div class="star-rating" style="width:{{ $r->helpfulness/5*100 }}%">
                                                        </div>
                                                    </div>
                                                    <span style="display:block;position:relative;top:-3px;font-weight:bolder;color:#FDB714;">({{ $r->helpfulness }})</span>
                                                </center>
                                            </div>
                                            <div class="rating-div">
                                                <p class="text-center">Cost Effectiveness</p>
                                                <center style="margin-top:-10px;">
                                                    <div class="star-rating-container small-size">
                                                        <div class="star-rating" style="width:{{ $r->effectiveness/5*100 }}%">
                                                        </div>
                                                    </div>
                                                    <span style="display:block;position:relative;top:-3px;font-weight:bolder;color:#FDB714;">({{ $r->effectiveness }})</span>
                                                </center>
                                            </div>
                                            <div class="rating-div overall-rating">
                                                <p class="text-center">Over all</p>
                                                <center style="margin-top:-10px;">
                                                    <div class="star-rating-container small-size">
                                                        <div class="star-rating" style="width:{{ $r->experience/5*100 }}%">
                                                        </div>
                                                    </div>
                                                    <span style="display:block;position:relative;top:-3px;font-weight:bolder;color:#FDB714;">({{ $r->experience }})</span>
                                                </center>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    @endif


                    @if(count($project) != 0)
                    <!-- <div class="col-md-12 col-sm-12" id="Project-Overview">
                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <h2>Project Overview</h2>
                            </div>
                        </div>
                        <div class="col-md-4" style="position: relative;left: -10px;">
                            <div class="col-md-12 info-box">
                                <h4>Project Cost</h4>
                                <div class="project-overview">
                                    @foreach($oneK as $ok)
                                    @if($ok->id !=0)

                                    <div class="graph-units">
                                        <p><i class="fa fa-inr"></i>1- <i class="fa fa-inr"></i>10k</p>
                                    </div>
                                    <div class="graph-bars">
                                        <span class="graphbar-grill-counter">({{count($project)}})</span>
                                        <div class="graphbar-grill" style="width:{{ $ok->id/count($project)*100 }}%"></div>
                                    </div>
                                    @endif
                                    @endforeach


                                    @foreach($twoK as $ok)
                                    @if($ok->id !=0)
                                    <div class="graph-units">
                                        <p><i class="fa fa-inr"></i>10k- <i class="fa fa-inr"></i>More</p>
                                    </div>
                                    <div class="graph-bars">
                                        <span class="graphbar-grill-counter">({{count($project)}})</span>
                                        <div class="graphbar-grill" style="width:44%;"></div>
                                    </div>
                                    @endif
                                    @endforeach


                                </div>
                                </div>
                        </div>
                    </div> -->
                    @endif


                </div>
            </div>

        </div>
    </div>

@endforeach

@stop
