<div class="content vendor-banner">
    <div class="mt-80">
       
        <div class="detail-banner" id="backgroundCover" style="background-image: url({{asset('uploads/cover')}}/{{$user->cover}}););">

            <div class="container">
                <div class="detail-banner-left ">
                    <div class="vendor-avatar-container">
                        @if(!empty($user->avatar))
                        <!-- <center> -->
                        @if(!empty($user->avatar))
                            <center><img class="vendor-avatar img-circle profileView" src="{{ asset('uploads/avatar/') }}/{{ $user->avatar }}" align="middle"></center>
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

                    <h3 class="vendor-name">
                        <span class="vendor-business">{{ Auth::guard('web')->user()->name }}</span>
                    </h3>

                    <div class="vendor-address">
                        <span class="vendor_category">

                          {{$user->location}}
                        </span>
                    </div>

                </div>
                <!-- /.detail-banner-left -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.detail-banner -->
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

<div id="editbusinesstype" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12">
                        <div class="spacer-30"></div>
                        <button class="btn btn-primary pull-right edit_category" vendor_id="{{Auth::guard('web')->user()->id}}" style="margin-left:10px;">Save</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>