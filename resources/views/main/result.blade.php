@extends('main.default')

@section('content')

<div class="page-wrapper">

    <!-- <div class="spacer-50"></div> -->

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <h2>{{$data['vendor']->total()}} professionals found</h2>
                    <div class="content">
                        <!-- <form class="filter" method="post" action="url('')"> -->
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="form-group">
                                        @php $hypen_category = trim(str_replace("-", " ", $data['keyword'])) @endphp
                                        @php $hypen_location = trim(str_replace("-", " ", $data['location'])) @endphp

                                        <input type="text"  class="form-control category" value="{{Request::get('keyword')}}" placeholder="Category" id="search-demo">
                                    </div>
                                    <div class="service-result">
                                    </div>
                                </div>

                                <input type="hidden" id="hidden_keyword" value="{{Request::get('keyword')}}">
                                <input type="hidden" id="hidden_location" value="{{Request::get('location')}}">
                                <input type="hidden" id="hidden_budget" value="{{Request::get('budget')}}">
                                <input type="hidden" id="hidden_property_type" value="{{Request::get('property_type')}}">
                                <input type="hidden" id="hidden_select_pros" value="{{Request::get('select_pros')}}">
                                <input type="hidden" id="hidden_kms" value="{{Request::get('kms')}}">


                                <div class="col-sm-12 col-md-1">
                                    <p style="margin-top: 7px; font-size: 16px;">Near</p>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">

                                        <input type="text" placeholder="Location" class="form-control" name="location" id="zipcode" value="{{Request::get('location')}}">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-2">
                                    <button type="submit" class="btn btn-block btn-primary redefine_search" keyword="{{Request::get('keyword')}}" location="{{Request::get('location')}}" style="margin-top:2px;">Go</button>
                                </div>
                            </div>

                            <!-- <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">

                                        @php $property_type = array('Residential','Commerical','Industrial','Retail','Hospitality','Institutional','Recreational','Restoration','Public Buildings') @endphp
                                        <select class="form-control frproperty-type">
                                        <option value=""> Property Type</option>
                                        @foreach($property_type as $pt)
                                        @if($pt == Request::get('property_type'))
                                        <option value="{{$pt}}" selected>{{$pt}}</option>
                                        @else
                                        <option value="{{$pt}}">{{$pt}}</option>
                                        @endif
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="service-result">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        @php $kms = array('5','10','25','50','100','200','300','400','500') @endphp
                                        <select class="form-control frkms" >
                                        <option value=""> Distance</option>
                                        @foreach($kms as $d)
                                        @if($d == Request::get('kms'))
                                            <option value="{{$d}}" selected>{{$d}} km</option>
                                        @else
                                            <option value="{{$d}}">{{$d}} km</option>
                                        @endif
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-3">
                                 @php $budget = array('0-50000','50000-100000','100000-500000','500000-more') @endphp
                                    <select class="form-control frbudget" >
                                        <option value=""> Budget</option>
                                        @foreach($budget as $s)
                                        @if($s == Request::get('budget'))
                                            <option value="{{$s}}" selected>{{$s}}</option>
                                        @else
                                            <option value="{{$s}}">{{$s}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-sm-12 col-md-3">
                                @php $type_of_professional = array('Super Pros','See all the vendors') @endphp
                                    <select class="form-control frpro">
                                        <option value="">Type of Professional</option>
                                        @foreach($type_of_professional as $s)

                                        @if(Request::get('select_pros') == 'Super Pros')
                                            @if($s == Request::get('select_pros'))
                                                <option value="{{$s}}" selected>{{Request::get('select_pros')}}</option>
                                            @else
                                                <option value="{{$s}}">{{$s}}</option>
                                            @endif
                                        @else
                                            @if($s == Request::get('select_pros'))
                                                <option value="{{$s}}" selected>{{Request::get('select_pros')}}</option>
                                            @else
                                                <option value="{{$s}}">{{$s}}</option>
                                            @endif
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div> -->
                        <!-- </form> -->

                    @if(count($data['vendor']) != 0)
                       @foreach($data['vendor'] as $vendor)

                       @php $overall = ($vendor->efficiency+$vendor->quality+$vendor->helpfulness+$vendor->effectiveness+$vendor->experience)/25*100 @endphp

                        <div class="col-md-12 col-sm-12 col-xs-12 filter">
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <div class="card-row-image-container">
                                    <img src="{{url('uploads/avatar')}}/{{$vendor->avatar}}" class="card-row-image img-circle-result">
                                </div>
                            </div>

                            <div class="col-md-8 col-sm-8 col-xs-7">
                                <div class="col-md-12 listed-company-name">
                                    <h4><a href="{{ url('/') }}/profile/{{ $vendor->username }}">{{ $vendor->business_name }} @if(!empty($vendor->distance)) ,{{round($vendor->distance)}} km away @endif</a></h4>
                                    <span class="category-desc">{{ App::make('App\Http\Controllers\MainController')->get_subcategory_limit($vendor->id,2) }} <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $vendor->zipcode }}</span>
                                </div>
                                <div class="col-md-12">
                                    <div class="star-rating-container small-size">
                                        <div class="star-rating" style="width:{{$overall}}%">
                                        </div>
                                    </div>
                                    <span style=" position: relative; top: 0px; color:#333;">({{ App::make('App\Http\Controllers\MainController')->countReview($vendor->id) }})</span>
                                  @if(!empty($vendor->founding_year))
                                    <span style="position: relative;left: 11px;">
                                        <span style="font-weight: lighter;">
                                          <strong>
                                              {{ date("Y")-$vendor->founding_year }}
                                          </strong>
                                        </span>
                                        <span style="font-size:11px;"> Years Experience</span>
                                    </span>
                                  @endif

                                    <p>{{ strip_tags(substr($vendor->about_us,0,110))}}...<a href="{{ url('/') }}/profile/{{ $vendor->username }}" class="read-more">Read More</a></p>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-2 col-xs-3 ratings card-row-rating">
                                <div class="row">
                                    <center>
                                         @if(!empty($vendor->super_pros=='1'))
                                         <img style="width:48px;display:block;" src="{{url('images/superpro.png')}}">
                                         @endif
                                    </center>

                                     <button class="contact_vendor" redirectUrl="{{ url('/') }}/profile/{{ $vendor->username }}?openMsg=1">Request Quote</button>
                                </div>
                            </div>
                        </div>
                       @endforeach
                      
                        <div class="pager">
                            <center>
                                @if ($data['vendor']->lastPage() > 1)
                                <ul class="pagination">
                                    <li class="{{ ($data['vendor']->currentPage() == 1) ? ' disabled' : '' }}">
                                        <a href="{{url('search')}}?type=listing&element=category&keyword={{Request::get('keyword')}}&budget={{Request::get('budget')}}&property_type={{Request::get('property_type')}}&select_pros={{Request::get('select_pros')}}&kms={{Request::get('kms')}}&pincode={{Request::get('pincode')}}&latitude={{Request::get('latitude')}}&longitude={{Request::get('longitude')}}&page={{Request::get('page')-1}}&location={{Request::get('location')}}"><<</a>
                                     </li>
                                    @for ($i = 1; $i <= $data['vendor']->lastPage(); $i++)
                                        <?php
                                        $half_total_links = floor(10 / 2);
                                        $from = $data['vendor']->currentPage() - $half_total_links;
                                        $to = $data['vendor']->currentPage() + $half_total_links;
                                        if ($data['vendor']->currentPage() < $half_total_links) {
                                           $to += $half_total_links - $data['vendor']->currentPage();
                                        }
                                        if ($data['vendor']->lastPage() - $data['vendor']->currentPage() < $half_total_links) {
                                            $from -= $half_total_links - ($data['vendor']->lastPage() - $data['vendor']->currentPage()) - 1;
                                        }
                                        ?>
                                        @if ($from < $i && $i < $to)
                                            <li class="{{ ($data['vendor']->currentPage() == $i) ? ' active' : '' }}">
                                                <a href="{{url('search')}}?type=listing&element=category&keyword={{Request::get('keyword')}}&budget={{Request::get('budget')}}&property_type={{Request::get('property_type')}}&select_pros={{Request::get('select_pros')}}&kms={{Request::get('kms')}}&pincode={{Request::get('pincode')}}&latitude={{Request::get('latitude')}}&longitude={{Request::get('longitude')}}&page={{$i}}&location={{Request::get('location')}}">{{ $i }}</a>
                                            </li>
                                        @endif
                                    @endfor
                                    <li class="{{ ($data['vendor']->currentPage() == $data['vendor']->lastPage()) ? ' disabled' : '' }}">
                                        <a href="{{url('search')}}?type=listing&element=category&keyword={{Request::get('keyword')}}&budget={{Request::get('budget')}}&property_type={{Request::get('property_type')}}&select_pros={{Request::get('select_pros')}}&kms={{Request::get('kms')}}&pincode={{Request::get('pincode')}}&latitude={{Request::get('latitude')}}&longitude={{Request::get('longitude')}}&page={{Request::get('page')+1}}&location={{Request::get('location')}}">>></a>
                                    </li>
                                </ul>
                            @endif
                            </center>
                        </div>
                        <div class="faq" style="font-size: 11px;">
                            <h3>Questions you should ask professionals</h3>
                            <h4 style="font-size: 14px;">Are any permits required for the project?</h4>
<p>As per your project requirement, ask your service professional about all permits that are needed. Make sure to have all the permits prior to the project as this is the responsibility of the home owner.</p>                  


<h4 style="font-size: 14px;">Are the service professionals Licensed, Bonded and Insured? </h4>
<p>Before finalising any project you should feel encouraged to ask your pros about their legal authentication. This would avoid any further misconceptions.</p>

<h4 style="font-size: 14px;">What if I want to do some parts of the project myself?</h4>
<p>DIY (Do It Yourself) component always exists for tasks like painting and plumbing. Read our DIY blogs to get some ideas and insights.</p>

<h4 style="font-size: 14px;">Define the scope of the project?</h4>
<p>Although a professional will always be available to assist you throughout the project, setting and understanding the requirements and estimates of the project will help evaluate the results and performance of your chosen project. </p>

<h4 style="font-size: 14px;">Do I need to be involved in the project?</h4>
<p>It’s a personal choice. Few home owners love doing things on their own while few of them prefer a professional. So if you have time and skills to do some of the work, that would surely be great but if not, the service professionals are always there for help.</p>


<h4 style="font-size: 14px;">Do the pros warranty their work? Also what is the scope of maintenance programs and incentives?</h4>
<p>As a client it becomes your right to get all project dealings done on papers so you can refer back later. The time limitation of project parts and equipment should also be clearly mentioned. </p>
<p>
Before hiring a professional and purchasing any home equipment or appliance, make sure their company provides you with pricing incentives or maintenance services. Usually home appliance companies offer special discounts so as to attract the customers.</p>

<h4 style="font-size: 14px;">What preparations do I need to do for the project?</h4>
<p>Depending on the scale and type of the project, it’s preferable to have proper risk assessment and be well prepared with all legal permissions prior to the conduction of the project.</p>

<h4 style="font-size: 14px;">How much will the project cost?</h4>
<p>Prior budget planning needs to be done. Streamline all the requirements and other line items clearly. According to the budget and time availability, discuss the possible options and alternatives for the project.</p>



<h4 style="font-size: 14px;">Enquire about the Pro’s previous projects?</h4>
 <p>Before hiring any service provider, research about their previous work. Also look at the client ratings for that specific professional in order to analyse client satisfaction.</p>

<h4 style="font-size: 14px;">Questions that can be helpful in attaining details of a service professional</h4>
<p>Have you previously worked on any project similar to that of mine?</p>
<p>Do you hold any licence(s), registrations, certifications?</p>
<p>Along with you who all will be working on the project? Are they employees or subcontractors?
<p>Related to my project requirement, what all references can you provide me?
<p>Mention your other trainings and affiliations, if any.
<p>Will you do all the project dealings on paper or virtually?
<p>Can you provide me a list of all your services?
<p>What is your charging procedure?
<p>How long will the project completion take?</p>
<p>Will the project be accomplished according to my budget?</p>
<p>Is there anything you would want to suggest about my project?</p>
<p>Can you guide me with some cost-saving ideas?</p>
<p>What is the scope of using eco-friendly methods for the renovation of my house?</p>
<p>Do your services include any warranty?</p>
<p>Does the project accomplishment require us to be out of the house? If so, then for how long?</p>
<p>Who all are your suppliers? Can you provide me with their details?</p>
                        </div>
                       @else

                       <div class="col-md-12 col-sm-12 col-xs-12 filter">

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-12 listed-company-name">
                                    <h4>Well, that's not good.It looks like this page is broken. To find a pro for your project, please return to the homepage.</h4>

                                </div>
                            </div>


                        </div>

                    @endif


                        <div class="spacer-50"></div>
                    </div><!-- /.content -->
                </div><!-- /.col-* -->

                <div class="spacer-50"></div>


                <div class="col-md-4 col-lg-3 hidden-xs">
                    <div class="">
                        <div class="background-white p-30">
                            <div class="guaranteed-banner-sidebar first-page">
                                <div class="guaranteed-badge" style="background: url({{url('images/superpro.png')}}) no-repeat; background-size: 100%; width: 75px; height: 58px; margin: 10px auto 0;"></div>
                                <h3 class="search-results-subheading text-center" style="margin-bottom: 23px;">Super Pro</h4>

                                <div class="col-md-12 text-center">
                                    <img src="{{url('images/propisor badge-01.png')}}" style="width: 34px;">
                                    <p style="font-size: 11px;">Super Reviews</p>
                                </div>

                                <div class="col-md-12 text-center">
                                    <img src="{{url('images/propisor badge-02.png')}}" style="width: 34px;">
                                    <p style="font-size: 11px;">Transparency</p>
                                </div>

                                <div class="col-md-12 text-center">
                                    <img src="{{url('images/propisor badge-03.png')}}" style="width: 34px;">
                                    <p style="font-size: 11px;">Verified Vendors</p>
                                </div>

                                <div class="col-md-12 text-center">
                                    <img src="{{url('images/propisor badge-04.png')}}" style="width: 34px;">
                                    <p style="font-size: 11px;">Commitment</p>
                                </div>
                                
                                <button class="write-review-btn btn-block"><a href="{{url('super-pros')}}">Know More</a></button>
                            </div>
                        </div><!-- /.sidebar -->
                    </div>

                    <div class="spacer-50"></div>

                    <div class="">
                        <div class="background-white p-30">
                            <div class="guaranteed-banner-sidebar first-page">

                                <h4 class="search-results-subheading text-center">Trusted Professionals</h4>
                            </div>
                        </div><!-- /.sidebar -->
                    </div>
                    <div class="col-md-12 sponsored-projects" style="margin-bottom: 25px;">
                        <h4 class="text-center">Trending Projects</h4>
                        @foreach($data['project'] as $p)
                            <div class="project-section  project-section{{$p['id']}} col-md-12 mb-30" project_id="{{$p['id']}}">
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

                                            <div class="col-md-12 col-sm-12 col-xs-12 project-details hr">
                                                <center><a href="{{url('/project')}}/{{$p['id']}}/{{str_slug($p['title'],'-')}}" class="project-link" id="project-view-{{$p['id']}}">View Project</a></center>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="spacer-50"></div>
                    </div>
                </div><!-- /.col-* -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.main -->

@stop
