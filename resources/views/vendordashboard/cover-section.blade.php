<div class="content vendor-banner">
    <div class="mt-80">
        

        <div class="detail-banner" id="backgroundCover" style="background-image: url({{asset('uploads/cover')}}/{{$vendor->cover}}););">
            @if($vendor->status=="Suspend")
        <div class="proSignup"><span class="proSignup-heading">Your account is temporily suspended.Please contact us at support@propisor.com. </span>
        </div>
        @elseif($vendor->superpros == 0)
        <div class="proSignup"><span class="proSignup-heading">Become A Super Pro </span><a href="{{url('super-pros')}}" class="btn btn-primary" style="border-radius: 4px;"> Know More</a> </div>
        @endif

            <div class="container">
                <div class="detail-banner-left ">
                    <div class="vendor-avatar-container">
                        @if(!empty($vendor->avatar))
                        <!-- <center> -->
                             @if(!empty($vendor->avatar))
                            <center><img class="vendor-avatar img-circle-profile profileView" src="{{ asset('uploads/avatar/') }}/{{ $vendor->avatar }}" align="middle"></center>
                            @endif
                            <div class="" id="crop-avatar">
                                <div class="avatar-view">
                                   <center> <span class="btn btn-info btn-xs btn-file"> <i class="fa fa-pencil"></i></span> </center>
                                </div>

                                <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="avatar-body">

                                                    <form action="#" id="avatar-upload">
                                                      <div class="image-editor">
                                                        <input type="file" class="cropit-image-input">
                                                        <div class="cropit-preview"></div>



                                                        <div class="row">
                                                            <div class="col-md-6 col-md-offset-3">
                                                                <div class="image-size-label">
                                                                  Resize image
                                                                </div>
                                                                <input type="range" class="cropit-image-zoom-input">
                                                                <input type="hidden" name="imagedata" class="hidden-image-data" />
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
                        <!-- </center> -->
                        @else
                        <div class="" id="crop-avatar">
                            <div class="avatar-view">
                                <center> <span class="btn btn-info btn-xs btn-file"> <i class="fa fa-pencil"></i></span> </center>
                            </div>
                        </div>

                        @endif

                    </div>

                    <div id="crop-cover">
                        <div class="cover-view">
                            <span class="btn btn-info btn-xs btn-file-2 pull-right" style="z-index:1; margin-top: 61px;"> <i class="fa fa-pencil"></i> Cover</span>
                        </div>
                        <div class="modal fade" id="cover-modal" aria-hidden="true" aria-labelledby="cover-modal-label" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" id="cover-modal-label">Change Cover</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="cover-body">
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

                    <button style="z-index:1; margin-top: 61px;" class="pull-right btn btn-xs btn-primary" data-toggle="modal" data-target="#vendorvid">&nbsp;<i class="fa fa-play"></i> Add Video</button>

                    @if(!empty($vendor->youtube))
                    <a href="#" style="z-index:1;margin-right: 3px;" class="pull-right btn btn-primary play-btn" data-toggle="modal" data-target="#play_later">&nbsp;<i class="fa fa-play"></i></a>
                    @endif

                    <h3 class="vendor-name">
                        <span class="vendor-business">{{ $vendor->business_name }}</span>
                        <a href="#" class="edit-btn" data-toggle="modal" data-target="#editbusinessname" style="color:#fff"><i class="fa fa-pencil"></i></a>
                    </h3>


                    <div class="vendor-address">
                        <span class="vendor_category">
                          {{$vendor->location}}
                        </span>
                    </div>

                </div><!-- /.detail-banner-left -->
            </div><!-- /.container -->
            <div class="gradient hidden-xs"></div>
        </div><!-- /.detail-banner -->
    </div>
</div>

<div id="play_later" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content background-drakgrey">

            <div class="modal-body">
               <embed width="100%" height="315" src="{{$vendor->youtube}}">
            </div>
        </div>
    </div>
</div>

<div id="vendorvid" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="col-md-12">
                <h4>Update Youtube Embed Link</h4>
            </div>
            <div class="modal-body">
               <input type="text" id="youtube_link" class="form-control" value="{{ $vendor->youtube }}" placeholder="https://www.youtube.com/watch?v=7QA6lUe5h94">
            </div>
            <div class="modal-body">
               <button class="form-control btn-primary update_youtube" vendor_id="{{ $vendor->id }}">Update</button>
            </div>
            <div class="modal-body">
               <p id="youtubeMessage" style="color: green;font-size: 14px;"></p>
            </div>
        </div>
    </div>
</div>

<div id="editbusinessname" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <!-- <form> -->
                    <div class="col-md-12">
                        <h4>Company Name</h4>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="business_name" class="form-control" placeholder="" value="{{ $vendor->business_name }}" id="business_name">
                        <div class="spacer-10"></div>
                    </div>

                    <div class="col-md-12">
                        <div class="spacer-30"></div>
                        <button class="btn btn-primary pull-right business_name_save" style="margin-left:10px;">Save</button>
                    </div>
                   <!--  </form> -->
                </div>
            </div>
        </div>
    </div>
</div>


<!---------------------- Form Modal -------------------->
<div id="formMessagePopup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Changes Saved</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="profilePicPopup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Image successfully uploaded</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!---------------------- Form Modal -------------------->


<div class="page-wrapper">
    <header class="header vendor-header">
        <div class="header-wrapper">
            <div class="container post-detail">
                <div class="post-meta-tags">
                    <ul class="vendors-nav">
                        <li class=""><a href="#Overview">Overview</a></li>
                        <li class=""><a href="#Projects">Projects</a></li>
                        <!-- <li class=""><a href="{{url('vendor/create-product')}}">Product</a></li> -->
                        <li class=""><a href="{{url('pro/analytics')}}">Analytics</a></li>
                        <li class=""><a href="{{url('user/dashboard/newsfeed')}}">Stories</a></li>
                    </ul>


                    <ul class="social-links nav nav-pills pull-right">
                        @if(!empty($vendor->facebook))
                        <li class="fb-link">
                            <a href="{{$vendor->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                        </li>
                        @endif

                        @if(!empty($vendor->twitter))
                        <li class="twitter-link">
                            <a href="{{$vendor->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                        </li>
                        @endif

                        @if(!empty($vendor->googleplus))
                        <li class="googleplus-link">
                            <a href="{{$vendor->googleplus}}" target="_blank"><i class="fa fa-google-plus"></i></a>
                        </li>
                        @endif

                        @if(!empty($vendor->instagram))
                        <li class="instagram-link">
                            <a href="{{$vendor->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                        </li>
                        @endif

                        @if(!empty($vendor->linkedin))
                        <li class="linkedin-link">
                            <a href="{{$vendor->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </li>
                        @endif

                        @if(!empty($vendor->tumblr))
                        <li class="tumblr-link">
                            <a href="{{$vendor->tumblr}}" target="_blank"><i class="fa fa-tumblr"></i></a>
                        </li>
                        @endif

                        <li><a style="color: white;position: relative;top: 4px;" href="{{ url('/') }}/profile/{{ $vendor->username }}">View own profile</a></li>
                    </ul>

                </div>
            </div><!-- /.container -->
        </div><!-- /.header-wrapper -->
    </header>
</div>