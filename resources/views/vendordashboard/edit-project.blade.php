@extends('main.default')

@section('content')

    @if(!empty($project->featured_image))
        @php
            $featured_image = url('uploads/project').'/'.$project->featured_image;
        @endphp
    @else
        @php
            $featured_image = url('uploads/project/default-project.png');
        @endphp
    @endif


    <div class="content vendor-banner">
        <div class="mt-80">
            <div class="detail-banner project-feature-image" style="background-image: linear-gradient(to top, rgb(0, 0, 0), rgba(0, 0, 0, 0.1)),url({{$featured_image}});">
                <div class="container">
                    <div class="detail-banner-left ">
                        <div class="vendor-avatar-container">
                            <!-- <center><img class="vendor-avatar img-circle" src="http://cdn.porch.com/bootstrap/0web/landingpages/desktop/porch_assist_plumber1_opt.jpg" align="middle"></center> -->
                        </div>
                        <button style="z-index:1;" class="pull-right btn btn-xs play-btn btn-primary" data-toggle="modal" data-target="#projectvideo">&nbsp;&nbsp;&nbsp;<i class="fa fa-play"></i></button>

                        <div id="crop-cover">
                            <div class="cover-view">
                                <span class="btn btn-info btn-xs btn-file-2 pull-right" style="z-index:1;    position: absolute;bottom: 35px;right: 39px;"> <i class="fa fa-pencil"></i> Cover</span>
                            </div>
                            <div class="modal fade" id="cover-modal" aria-hidden="true" aria-labelledby="cover-modal-label" role="dialog" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="avatar-body">

                                              <form action="#" class="cover-upload">
                                                <div class="image-editor" id="image-editor">
                                                  <input type="file" class="cropit-image-input">
                                                  <div class="cropit-preview"></div>



                                                  <div class="row">
                                                      <div class="col-md-6 col-md-offset-3">
                                                          <div class="image-size-label">
                                                            Resize image
                                                          </div>
                                                          <input type="range" class="cropit-image-zoom-input">
                                                          <input type="hidden" name="imagedata" class="hidden-image-data" />
                                                          <input type="hidden" name="projectId" class="projectId" value="{{$projectId}}">
                                                          <button type="submit" class="btn btn-block btn-info">Save</button>
                                                      </div>
                                                  </div>

                                                </div>
                                              </form>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="vendor-name" style="position: relative;left: 38px;">
                            <span class="project_title">{{$project->title}}</span> <a href="#" class="edit-btn" data-toggle="modal" data-target="#projectnameModal" style="color:#fff"><i class="fa fa-pencil"></i></a>
                        </h3>

                        <div class="vendor-address" style="position: relative;left: 38px;">
                            <span class="project_location">{{$project->location}}</span> <a href="#" class="edit-btn" data-toggle="modal" data-target="#projectlocationModal" style="color:#fff"> Add Location <i class="fa fa-pencil"></i></a>
                        </div>
                        <!-- /.detail-banner-address -->

                    </div>
                    <!-- /.detail-banner-left -->
                </div>


                <!-- /.container -->
            </div>
        </div>
    </div>

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
                                            
                                            <tr>
                                                <td>Project Year </td>
                                                <td> <strong><span class="project_date">{{$project->date}}</span></strong> <a href="#" class="edit-btn" data-toggle="modal" data-target="#projectdateModal" style="color:#ada3a3;"><i class="fa fa-pencil"></i></a></td>
                                            </tr>

                                            <tr>
                                                <td>Project Type</td>
                                                <td><strong><span class="project_type">{{$project->type_of_project}}</span></strong> <a href="#" class="edit-btn" data-toggle="modal" data-target="#projecttypeModal" style="color:#ada3a3;"><i class="fa fa-pencil"></i></a></td>
                                            </tr>

                                            <tr>
                                                <td>Area(Sq Ft)</td>
                                                <td><strong><span class="area_type">{{$project->area}}</span> </strong><a href="#" class="edit-btn" data-toggle="modal" data-target="#areaSquareModal" style="color:#ada3a3;"><i class="fa fa-pencil"></i></a></td>
                                            </tr>

                                            <tr>
                                                <td>Cost</td>
                                                <td><strong><span class="min_cost_type">{{$project->currency}} {{$project->min_cost}}-{{$project->cost}}</span></strong> <a href="#" class="edit-btn" data-toggle="modal" data-target="#minCostModal" style="color:#ada3a3;"><i class="fa fa-pencil"></i></a></td>
                                            </tr>

                                        </table>
                                    </div>

                                    <div class="col-md-12">
                                        <h4 class="text-center">Share</h4>
                                        <div class="center" style="margin-top:20px;">
                                            <a href="#" style="color:#fff; background: #444; border-radius: 50%; padding: 10px 15px; text-align: center; margin-left: 10px;"><i class="fa fa-facebook"></i></a>
                                            <a href="#" style="color:#fff; background: #444; border-radius: 50%; padding: 10px 12px; text-align: center;margin-left: 10px;"><i class="fa fa-twitter"></i></a>
                                            <a href="#" style="color:#fff; background: #444; border-radius: 50%; padding: 10px 13px; text-align: center;margin-left: 10px;"><i class="fa fa-google-plus"></i></a>
                                        </div>
                                    </div>



                                    <div class="col-md-12 hr">
                                    </div>

                                    @if(!empty($project->avatar))
                                        {{--*/ $avatar = asset('uploads/avatar/').'/'.$project->avatar /*--}}
                                   @else
                                        {{--*/ $avatar = 'http://shops4u.in/images/default.png' /*--}}
                                   @endif

                                </div>
                            </div>

                            <div class="col-md-9 col-sm-8">
                                <div class="col-md-12 info-box">
                                    <h3>Project Description <a href="#" class="edit-btn" data-toggle="modal" data-target="#projectDescriptionModal" style="color:#fff"><i class="fa fa-pencil" style="color: #929898;"></i></a></h3>

                                    <p> 
                                        <span class="project_description">
                                        @if(!empty($project->description))
                                        {{$project->description}}
                                        @else
                                        Here you can give a detailed description of the project,it's scope of work and finally the results achieved.
                                        @endif
                                        </span>
                                    </p>

                                    <h3>Project Photos</h3>
                                    
                                    <div class="detail-gallery">

                                        <!-- <form id="upload" method="post" action="{{url('pro/ajax/projectImage')}}" enctype="multipart/form-data">
                                            <div id="drop">
                                                <input type="file" name="featured_image" multiple />
                                            </div>
                                            {{csrf_field()}}
                                            <input type="hidden" name="projectId" id="projectImageId" value="{{$projectId}}">

                                            <div class="project-photos-container create-project-image">
                                               
                                            </div>
                                        </form> -->

                                        <div class="col-xs-12">
                                            <div class="progress" style="display: none;">
                                                <div class="bar"></div>
                                                <div class="percent">0%</div>
                                            </div>
                                        </div>
                
                                        <form id="form" action="{{url('pro/ajax/projectImage')}}" method="post" enctype="multipart/form-data" class="pure-form">
                                            <div class="col-xs-9">
                                            <input type="file" name="files[]"  class="form-control" multiple="multiple" id="files"></div>
                                            <input type="hidden" name="projectId" id="projectImageId" value="{{$projectId}}">
                                            <div class="col-xs-3">
                                            <input type="submit" value="Upload" class="btn btn-block btn-primary">
                                            </div>
                                        </form>
                                        

                                        <div class="project-photos-container create-project-image">
                                            
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


    <div class="modal fade" id="projectnameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Project Name:</label>
                <input type="text" class="form-control" id="editable" value="{{$project->title}}">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary saveProjectName" project-id="{{$projectId}}" edit-type="title">Save</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="projectDescriptionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Project Description:</label>

                <textarea class="form-control" id="project-description" style="height: 143px;">{{$project->description}}</textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary saveDescription" project-id="{{$projectId}}" edit-type="description">Save</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="projectlocationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Location:</label>
                <input type="text" class="form-control" id="autocomplete" value="{{$project->location}}">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary saveLocation" project-id="{{$projectId}}" edit-type="location">Save</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="projectcostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Cost:</label>
                <input type="text" class="form-control" id="project-cost" value="{{$project->cost}}">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary saveCost" project-id="{{$projectId}}" edit-type="cost">Save</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="projectdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Date:</label>
                <input type="number" name="" id="project-date" class="form-control" maxlength="4">
                
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary saveDate" project-id="{{$projectId}}" edit-type="date">Save</button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="projecttypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Type of Project:</label>
                <select class="form-control" name="type_of_project" id="project-type">
                    <option value="" selected="selected">Select type of project</option>
                    <option value="Residential">Residential</option>
                    <option value="Commerical"="">Commerical</option>
                    <option value="Industrial">Industrial</option>
                    <option value="Retail">Retail</option>
                    <option value="Hospitality">Hospitality</option>
                    <option value="Institutional">Institutional</option>
                    <option value="Recreational">Recreational</option>
                    <option value="Restoration">Restoration</option>
                    <option value="Public Buildings">Public Buildings</option>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary saveType" project-id="{{$projectId}}" edit-type="type">Save</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="areaSquareModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Area (Sq Ft):</label>
                <input class="form-control" name="area" id="area-sq-ft" type="number" value="{{$project->area}}">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary areaSquare" project-id="{{$projectId}}" edit-type="area">Save</button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="projectvideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Video:</label>
                <input type="text" class="form-control" id="project-video" value="{{$project->youtube_videos}}">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary saveVideo" project-id="{{$projectId}}" edit-type="video">Save</button>
          </div>
        </div>
      </div>
    </div>

    

    <div class="modal fade" id="minCostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">


          <!-- <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="control-label">From:</label>
                <input class="form-control" placeholder="Minimum Cost" name="min_cost" type="number"> <input class="form-control" placeholder="Maximum Cost" name="cost" type="number">
              </div>
          </div> -->
          <div class="modal-body">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-4">
                      <label for="recipient-name" class="control-label">Currency</label>
                        <select class="form-control" name="currency" id="currency">
                            <option value="">Select Currency</option>
                            <option>INR</option>
                            <option>USR</option>
                            <option>AUD</option>
                        </select>
                  </div>
                  <div class="col-md-4">
                      <label for="recipient-name" class="control-label">From:</label>
                        <input class="form-control" placeholder="Minimum Cost" id="from" type="number" value="{{$project->min_cost}}"> 
                  </div>
                  <div class="col-md-4">
                     <label for="recipient-name" class="control-label">To:</label>
                        <input class="form-control" placeholder="Maximum Cost" id="to" type="number" value="{{$project->cost}}">
                  </div>
                </div>
                
              </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary saveCost" project-id="{{$projectId}}" edit-type="cost">Save</button>
          </div>
        </div>
      </div>
    </div>

    <!-- </div> -->

@stop
