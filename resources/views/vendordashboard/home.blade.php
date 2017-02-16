@extends('main.default')

@section('content')

@include('vendordashboard.cover-section')

<div class="main">
   <div class="container">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        @if(Session::has('info'))
                        <div class="spacer-20"></div>
                        <div class="col-md-12 col-sm-12 alert alert-success">
                            {{ Session::get('info') }}
                        </div>
                        @endif

                        <div class="col-md-3 col-sm-4 ">

                            <div class="col-md-12 info-box">
                                <div class="center">
                                    <h3>SUPER PRO</h3>
                                    @if(!empty($vendor->super_pros=='1'))
                                    <img src="{{url('images/superpro.png')}}" style="width:85px;">
                                    <p>Backed by Propisor Guarantee</p>
                                    @else
                                    <img src="{{url('images/nsp.png')}}" style="width:85px;">
                                    <p>Not Backed By Propisor Guarantee.</p>
                                    @endif
                                </div>
                                <button class="write-review-btn btn-block"><a href="{{url('super-pros')}}">Know More</a></button>
                            </div>

                        </div>

                        <div class="col-md-6 col-sm-8">
                           <div class="contaniner-fluid">

                                <div class="visible-sm visible-xs">
                                    <div class="col-md-12 info-box">
                                        <h4>Contact <span class="vendor-business">{{ $vendor->business_name }}</span></h4>
                                        <div class="row hr"> </div>
                                        <button class="btn btn-block btn-primary btn-radius-3">Request Callback</button>
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
                                                <span>{{ $vendor->founding_year }} Years</span><hr>
                                                @endif
                                                 
                                                <p class="professional_information_p">Type of Property : </p>
                                                <span>{{ $vendor->type_of_property }}</span><hr>
                                                 
                                                <p class="professional_information_p">Scope of Work : </p>
                                                <span>{{ $vendor->scope_of_work}}</span><hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 info-box" id="business-section">
                                    <button class="edit-btn action-btn pull-right" data-href="#edit-business-section"><i class="fa fa-pencil"></i></button>
                                    <h4>About Us</h4>
                                    <p class="about_us" style="color:#8d9aa7;">
                                        @if(count($vendor->about_us) > 622 && !empty($vendor->about_us))
                                            {!! substr($vendor->about_us,0,622) !!}
                                        @elseif(empty($vendor->about_us))
                                            Write about your company,link your profile to your Social Media handles pen down any Awards & Certification and list your Services Provided.
                                        @else
                                            {!! $vendor->about_us !!}
                                        @endif
                                    </p>

                                    @if(!empty($vendor->website))
                                    <h4>Website</h4>
                                    <p class="website-link"><a href="{{$vendor->website}}" target="_blank">{{$vendor->website}}</a></p>
                                    @endif

                                    <!-- <h4>Social Media</h4> -->
                                    <ul class="social-links nav nav-pills social-media-link">
                                        
                                        <li class="fb-link">
                                        @if(!empty($vendor->facebook))
                                            <a href="{{$vendor->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                        @endif
                                        </li>
                                        
                                        <li class="twitter-link">
                                        @if(!empty($vendor->twitter))
                                            <a href="{{$vendor->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                                        @endif
                                        </li>
                                        
                                        <li class="googleplus-link">
                                        @if(!empty($vendor->googleplus))
                                            <a href="{{$vendor->googleplus}}" target="_blank"><i class="fa fa-google-plus"></i></a>
                                        @endif
                                        </li>
                                        

                                        <li class="instagram-link">
                                        @if(!empty($vendor->instagram))
                                            <a href="{{$vendor->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                                        @endif
                                        </li>

                                        <li class="linkedin-link">
                                        @if(!empty($vendor->linkedin))
                                            <a href="{{$vendor->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                        @endif
                                        </li>
                                        
                                        <li class="tumblr-link">
                                        @if(!empty($vendor->tumblr))
                                           <a href="{{$vendor->tumblr}}" target="_blank"><i class="fa fa-tumblr"></i></a>
                                        @endif
                                        </li>

                                        <li class="pinterest-link">
                                        @if(!empty($vendor->pinterest))
                                           <a href="{{$vendor->pinterest}}" target="_blank"><i class="fa fa-pinterest"></i></a>
                                        @endif
                                        </li>

                                        <li class="youtube-link">
                                        @if(!empty($vendor->youtube_channel))
                                           <a href="{{$vendor->youtube_channel}}" target="_blank"><i class="fa fa-youtube"></i></a>
                                        @endif
                                        </li>
                                        
                                    </ul>

                                    <div class="row hr"> </div>

                                    <h4>Services Provided</h4>
                                    <ul class="social-links nav nav-pills">
                                        <li class="service-provide">
                                             {!!$vendor->category!!}
                                        </li>
                                    </ul>

                                    @if(!empty($vendor->awards))
                                    <div class="row hr"> </div>

                                    <h4>Awards Won</h4>
                                    <ul class="social-links nav nav-pills">
                                        <li class="award-area">
                                             {!!$vendor->awards!!}
                                        </li>
                                    </ul>
                                    @endif

                                    <div class="row hr"> </div>

                                    <div class="col-md-6" id="service-section">
                                        <button class="edit-btn action-btn pull-right" data-href="#edit-service-section"><i class="fa fa-pencil"></i></button>
                                        <h4>Tags</h4>
                                        <ul class="vendor-info-list vendor-services">
                                        @foreach($services as $service)
                                            <li>{{ $service_name }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                    <!-- Edit Service Section -->
                                    <div class="col-md-12 edited-section" id="edit-service-section">
                                        <button class="edit-btn action-btn pull-right" data-href="#service-section"><i class="fa fa-times"></i></button>
                                        <h4>Edit Services</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div style="position: relative; height: 80px;">
                                                    <input type="text" name="country" id="autocomplete-ajax" style="position: absolute; z-index: 2; background: transparent;" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="spacer-20"></div>

                                            <div class="background-white p20 mb10">
                                                <p class="servicelist">
                                                @foreach($services as $service)
                                                    <button class="btn btn-sm" type="button">
                                                        {{ $service_name }} <i class="fa fa-times delete_service" deleteid="{{ $service->id }}" csrf="{{csrf_token()}}"></i>
                                                    </button>
                                                @endforeach
                                                </p>
                                            </div>

                                            <div class="col-md-12">
                                                <button class="btn btn-primary pull-right service_Add save-info" style="margin-left:10px;" data-href="#service-section" parent-href="#edit-service-section">Save</button>
                                                    
                                                    <div class="spacer-30"></div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="spacer-20"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6" id="license-section">
                                        <button class="edit-btn action-btn pull-right" data-href="#edit-license-section"><i class="fa fa-pencil"></i></button>
                                        <h4>Licenses and Accreditions</h4>
                                        <ul class="vendor-info-list">
                                          @if(!empty($vendor->accreditation))
                                            <li class="accreditation">{!!$vendor->accreditation!!}</li>
                                          @else
                                            <li>Information has not been provided yet.</li>
                                          @endif
                                        </ul>
                                    </div>
                                    <div class="col-md-12 edited-section" id="edit-license-section">
                                        <button class="edit-btn action-btn pull-right" data-href="#license-section"><i class="fa fa-times"></i></button>

                                        <h4>Licenses and Accreditions</h4>
                                        
                                        <div class="spacer-30"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <textarea class="form-control" name="accreditation" id="accreditation" placeholder="Here you can add any contact information and professional registration or membership information as required by law for your professional field.For example , if you are an interior designer,input your registration number with any applicable regulatory body for interior designers." cols="100" rows="5">{{strip_tags($vendor->accreditation)}}</textarea>
                                                <div class="spacer-10"></div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="spacer-20"></div>
                                                <button class="btn btn-primary pull-right save-info licenses_save" style="margin-left:10px;" data-href="#license-section" parent-href="#edit-license-section" >Save</button>
                                                <!-- <button class="btn pull-right save-info" onclick="refresh()">Cancel</button> -->
                                                <div class="spacer-30"></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="spacer-20"></div>
                                            </div>
                                            <div class="spacer-20"></div>
                                        </div>
                                    </div>
                                </div>                        

                                <div class="col-md-12 info-box edited-section " id="edit-business-section" >
                                    <button class="edit-btn action-btn pull-right" data-href="#business-section"><i class="fa fa-times"></i></button>
                                    <h4>About Your Business</h4>
                                    <span>Add a few sentences describing your company, background, areas of expertise, years in business, and anything else that helps you stand out.</span>
                                    <div class="spacer-10"></div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea name="about_us" id="about_us" class="form-control" rows="8">{{ strip_tags($vendor->about_us) }}</textarea>
                                            <div class="spacer-10"></div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Founded Year</label>
                                            <input type="text" name="founding_year" class="form-control" id="founding_year" placeholder="" value="{{ $vendor->founding_year }}">
                                            <div class="spacer-10"></div>
                                        </div>
                                        
                                        <div class="col-md-8">
                                            <label>Website</label>
                                            <input type="text" name="website" id="website" class="form-control" placeholder="" value="{{ $vendor->website }}">
                                            <div class="spacer-10"></div>
                                        </div>
                                        <!-- Social Link -->
                                        <div class="col-md-6">
                                            <label>Facebook</label>
                                            <input type="text" name="facebook" class="form-control" id="facebook" placeholder="" value="{{ $vendor->facebook }}">
                                            <div class="spacer-10"></div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label>Twitter</label>
                                            <input type="text" name="twitter" id="twitter" class="form-control" placeholder="" value="{{ $vendor->twitter }}">
                                            <div class="spacer-10"></div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Google Plus</label>
                                            <input type="text" name="googleplus" class="form-control" id="googleplus" placeholder="" value="{{ $vendor->googleplus }}">
                                            <div class="spacer-10"></div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label>Linkedin</label>
                                            <input type="text" name="linkedin" id="linkedin" class="form-control" placeholder="" value="{{ $vendor->linkedin }}">
                                            <div class="spacer-10"></div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Instagram</label>
                                            <input type="text" name="instagram" class="form-control" id="instagram" placeholder="" value="{{ $vendor->instagram }}">
                                            <div class="spacer-10"></div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label>Tumblr</label>
                                            <input type="text" name="tumblr" id="tumblr" class="form-control" placeholder="" value="{{ $vendor->tumblr }}">
                                            <div class="spacer-10"></div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Pinterest</label>
                                            <input type="text" name="pinterest" id="pinterest" class="form-control" placeholder="" value="{{ $vendor->pinterest }}">
                                            <div class="spacer-10"></div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Youtube Channel</label>
                                            <input type="text" name="youtube_channel" id="youtube_channel" class="form-control" placeholder="" value="{{ $vendor->youtube_channel }}">
                                            <div class="spacer-10"></div>
                                        </div>

                                        <div class="col-md-12">
                                            <label>Awards</label>
                                            <textarea name="award" id="award" class="form-control" placeholder="" cols="100" rows="5">{{strip_tags($vendor->awards)}}</textarea>
                                            <div class="spacer-10"></div>
                                        </div>

                                        <div class="col-md-12">
                                            <label>Services Provided</label>
                                            <textarea name="category" id="category" class="form-control" placeholder="" cols="100" rows="5">{{strip_tags($vendor->category)}}</textarea>
                                            <div class="spacer-10"></div>
                                        </div>
                                        <!-- Social Link -->
                                        <div class="col-md-12">
                                            <div class="spacer-30"></div>
                                            <button class="btn btn-primary pull-right save-info about_business_save" style="margin-left:10px;" data-href="#business-section" parent-href="#edit-business-section">Save</button>
                                            <!-- <button class="btn pull-right" onclick="refresh()">Cancel</button> -->
                                        </div>
                                    <!-- </form> -->
                                    </div>
                                </div>
                           </div>
                        </div>

                        <div class="col-md-3 col-sm-3 hidden-xs hidden-sm">
                            <div class="contaniner-fluid sidebar sidebar-nav-fixed ">
                                <div class="col-md-12 info-box">
                                    <h4>Contact <span class="vendor-business">{{ $vendor->business_name }}</span></h4>
                                    <div class="row hr"> </div>
                                    <button class="btn btn-block btn-primary btn-radius-3" disabled>Request Callback</button>

                                </div>

                                <!-- <div class="col-md-12 info-box">
                                    <button type="button" class="btn btn-block btn-primary btn-radius-3 changeCoordinates">Change Coordinates</button>
                                </div> -->

                                <div class="modal fade" id="changeCoordinates" role="dialog">
                                    <div class="modal-dialog">
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Change Business Location</h4>
                                        </div>
                                        <div class="modal-body">
                                          <div id="map_canvas" style="width:100%;height:400px;"></div>
                                          <script type="text/javascript">
                                    
                                        </script>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                      
                                    </div>
                                </div>

                                <div class="col-md-12 info-box" id="personal-section">
                                    <button class="edit-btn action-btn pull-right" data-href="#edit-personal-section"><i class="fa fa-pencil"></i></button>
                                    <h4>Professional information</h4>
                                    <div class="row hr"> </div>
                                    <div class="col-md-12">
                                        @if(strlen($vendor->location) > 18)

                                        {{--*/
                                            $location = substr($vendor->location,0,17);

                                        /*--}}

                                        @else
                                        {{--*/
                                            $location = $vendor->location;
                                        /*--}}
                                        @endif
                                        <div class="row">
                                            @if(!empty($vendor->location))
                                            <p class="professional_information_p">Address : </p>
                                            <span class="location-value">{{ $vendor->location }}</span><hr>
                                            @endif
                                            
                                            @if(!empty($vendor->founding_year))
                                            <p class="professional_information_p">Experience : </p>
                                            <span>{{ date("Y")-$vendor->founding_year }} Years</span><hr>
                                            @endif
                                             
                                            <p class="professional_information_p">Type of Property : </p>
                                            <span class="property-value">{{ $vendor->type_of_property }}</span><hr>
                                             
                                            <p class="professional_information_p">Scope of Work : </p>
                                            <span class="scope-value">{{ $vendor->scope_of_work}}</span><hr>

                                            <p class="professional_information_p">Areas Served : </p>
                                            <span class="area-served-value">{!! $vendor->area_served !!}</span><hr>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 info-box edited-section" id="edit-personal-section">
                                    <button class="edit-btn action-btn pull-right" data-href="#personal-section">
                                    <i class="fa fa-times"></i></button>
                                    <h4>Business Contact</h4>
                                    <span>Provide your company's contact info so your customers may easily get a hold of you.</span>
                                     <div class="spacer-30"></div>
                                        <div class="row">
                                            <!-- <form method="POST" id="professional_information"> -->
                                                <div class="col-md-12">
                                                    <label>Name</label>
                                                    <input type="text"  class="form-control" name="name" id="name" placeholder="Name" value="{{  $vendor->name }}">
                                                    <div class="spacer-10"></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Email</label>
                                                    <input type="text"  class="form-control" name="email" id="email"  placeholder="Email" value="{{  $vendor->email }}" disabled>
                                                    <div class="spacer-10"></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Contact No</label>
                                                    <input type="text"  class="form-control" name="mobile_number" placeholder="Contact No" id="mobile_number" value="{{ $vendor->mobile_number }}">
                                                    <div class="spacer-10"></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Street</label>

                                                    <input type="text"  class="form-control" name="street" placeholder="Street" id="street" value="{{ $vendor->street }}">
                                                    <div class="spacer-10"></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Area</label>
                                                    <input type="text" placeholder="Area" class="form-control area" name="area" id="autocomplete" value="{{  $vendor->area }}">
                                                    <div class="spacer-10"></div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label>Zipcode</label>
                                                    <input type="text"  class="form-control" name="zipcode" placeholder="Zipcode" id="zipcode" value="{{ $vendor->zipcode }}">
                                                    <div class="spacer-10"></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Type of property</label>
                                                    <!-- <select class="form-control selectpicker" id="type_of_property" > -->
                                                    <select class="form-control" id="type_of_property" >

                                                        @if(!empty($vendor->type_of_property))

                                                        {{--*/
                                                            $type_of_property = $vendor->type_of_property;
                                                            $type_of_property_value = $vendor->type_of_property;

                                                        /*--}}

                                                        @else
                                                        {{--*/
                                                            $type_of_property = 'Type of property';
                                                            $type_of_property_value = '';
                                                        /*--}}
                                                        @endif
                                                        
                                                        <option value="Residential">Residential</option>
                                                        <option value="Commerical"="">Commerical</option>
                                                        <option value="Industrial">Industrial</option>
                                                        <option value="Retail">Retail</option>
                                                        <option value="Hospitality">Hospitality</option>
                                                        <option value="Institutional">Institutional</option>
                                                        <option value="Recreational">Recreational</option>
                                                        <option value="Restoration">Restoration</option>
                                                        <option value="Public Buildings">Public Buildings</option>
                                                        <!-- <option value="Others">Others</option> -->
                                                    </select>
                                                    <div class="spacer-10"></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Scope of work</label>
                                                    <select class="form-control" id="scope_of_work">
                                                        @if(!empty($vendor->scope_of_work))
                                                            @php
                                                                $scope_of_work = $vendor->scope_of_work;
                                                                $scope_of_work_value = $vendor->scope_of_work;
                                                            @endphp
                                                        @else
                                                            @php
                                                                $scope_of_work = 'Scope of work';
                                                                $scope_of_work_value = '';
                                                            @endphp
                                                        @endif
                                                        <option value="{{ $scope_of_work_value }}">{{$scope_of_work}}</option>
                                                        <option value="Consultation Only">Consultation Only</option>
                                                        <option value="Complete Solution">Complete Solution</option>
                                                    </select>
                                                    <div class="spacer-10"></div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label>Area Served</label>
                                                    <textarea placeholder="Area served" class="form-control" name="area_served" id="area_served" cols="100" rows="5">{{ strip_tags($vendor->area_served) }}</textarea>
                                                    <div class="spacer-10"></div>
                                                </div>

                                                <input type="hidden" value="{{ $vendor->id }}" id="user_id">
                                                <div class="col-md-12">
                                                    <div class="spacer-20"></div>
                                                    <button class="btn btn-primary pull-right professional_information_save save-info" data-href="#personal-section" parent-href="#edit-personal-section" style="margin-left:10px;">Save</button>
                                                    <!-- <button class="btn pull-right" onclick="refresh()">Cancel</button> -->
                                                    <div class="spacer-30"></div>
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="spacer-20"></div>
                                                </div>
                                            <!-- </form>   -->
                                            <div class="spacer-20"></div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                
                <div id="Projects">
                    <div class="col-md-12">
                        <h2>Projects</h2>
                        <div class="row">
                            <div class="col-md-3 project-section">
                                <div class="row p-15">
                                    <div class="col-md-12 background-white box-shadow">
                                        <div class="row">
                                            <div class="block" style="width:100%; height:208px; line-height: 90px; font-size: 20px;text-align: center;">
                                                <i class="fa fa-camera"></i>
                                            </div>

                                            <div class="project-name">
                                                <p>Project Tilte</p>
                                                <p>Project Description</p>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12 project-details hr">
                                               <div class="project-pricing">
                                                    <p>Rs 0</p>
                                                    <span class="small-txt">Project Cost</span>
                                                </div>
                                                <div class="project-timing">
                                                    <p>dd/mm/yy</p>
                                                    <span class="small-txt">Project Date</span>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12 project-details hr">
                                                <center><a href="{{url('pro/add/project')}}" class="project-link">Create Project</a></center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(count($project) != 0)
                            @foreach($project as $p)
                            <div class="project-section  project-section{{$p['id']}} col-md-3">
                                <div class="row p-15">
                                    <div class="col-md-12 background-white box-shadow">
                                        <div class="row">
                                            <a href="#"><i class="fa fa-times delete-whole-project" project-id="{{$p['id']}}"></i></a>
                                            @if(!empty($p->featured_image))
                                                @php
                                                $featured_image = url('contentimage').'?file=uploads/project/'.$p->featured_image.'&l=243&w=160';
                                                @endphp
                                            @else
                                                @php
                                                $featured_image = url('images/no-image-default.png');
                                                @endphp
                                            @endif

                                            <div class="block" style="background:url('{{ $featured_image }}'); background-size:cover; background-repeat:no-repeat; width:100%; height:160px;    background-position: center;"></div>

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
                                                <!-- <a href="{{url('/project')}}/{{$p['id']}}/{{str_slug($p['title'],'-')}}" class="lm">Read more</a></p> -->
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12 project-details hr">
                                               <div class="project-pricing">
                                                    @if(!empty($p['date']))
                                                    <p>{{$p['date']}}</p>
                                                    @else
                                                    <p>-</p>
                                                    @endif
                                                    <span class="small-txt">Project Year</span>
                                                </div>
                                                <div class="project-timing">
                                                    @if(!empty($p['type_of_project']))
                                                        <p>{{ $p['type_of_project'] }}</p>
                                                    @else
                                                        <p>-</p>
                                                    @endif
                                                    <span class="small-txt">Project Type</span>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12 project-details hr">
                                                <center><a href="{{ url('/pro/edit/project') }}/{{ $p['id'] }}" class="project-link">Edit Project</a></center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        @if($countproject >= 4)
                        <div class="clearfix">
                            <div class="spacer-30" style="display:block;"></div>
                            <center><a href="{{url('profile')}}/{{$vendor->username}}/projects?action=edit" class="text-center btn btn-primary uppercase" style="margin:30px 0;">View More Project</a></center>
                        </div>
                        @endif
                    </div>
                </div>
                

            
                <div class="spacer-10"></div>

                
                <!-- <div id="Projects" style="margin-bottom: 4px;">
                    <div class="col-md-12">
                        <h2>Products</h2>
                        <div class="row">
                            <div class="col-md-3 project-section">
                                <div class="row p-15">
                                    <div class="col-md-12 background-white box-shadow">
                                        <div class="row">

                                            <div class="block" style="width:100%; height:278px; line-height: 90px; font-size: 20px;text-align: center;">
                                                <i class="fa fa-camera"></i>
                                            </div>

                                            <div class="project-name">
                                                <p>Product Title</p>
                                                <p>Product Description</p>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12 project-details hr">
                                                <center><a href="{{url('pro/add/product')}}" class="project-link">Create Product</a></center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(count($product) != 0)
                            @foreach($product as $p)
                            <div class="col-md-3 project-section">
                                <div class="row p-15">
                                    <div class="col-md-12 background-white box-shadow">
                                        <div class="row">

                                            <a href="#"><i class="fa fa-times delete-product" product-id="{{$p['id']}}"></i></a>

                                            <div class="block" style="background-image: url({{$p['image']}}); background-size:cover; background-repeat:no-repeat; width:100%; height:160px;    background-position: center;"></div>

                                            <div class="project-name">
                                                <p><b>{{substr($p['name'],0,25)}}...</b></p>
                                                <p>{{substr($p['description'],0,93)}}...<a href="{{url('product')}}/{{$p['id']}}/{{str_slug($p['name'])}}" target="_blank" class="lm">Read more</a></p>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12 project-details hr">
                                                <div class="project-pricing">
                                                    <p>Rs {{$p['price']}}</p>
                                                    <span class="small-txt">Product Cost</span>
                                                </div>
                                                <div class="project-timing">
                                                    <p>{{$p['product_code']}}</p>
                                                    <span class="small-txt">Product Code</span>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12 project-details hr">
                                                <center><a href="{{url('pro/edit')}}/{{$p['id']}}/product" class="project-link">Edit Product</a></center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>

                         <div class="spacer-10"></div>

                        @if($countproduct > 4)
                        <div class="clearfix">
                            <center><a href="{{url('profile')}}/{{$vendor->username}}/products" class="text-center btn btn-primary uppercase" style="margin:30px 0;">View More Product</a></center>
                        </div>
                        @endif
                    </div>
                </div> -->
                

                <div class="spacer-10"></div>

                <br>

            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
              <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
    </div>
@stop
