@extends('main.default') 
@section('content')

@include('userdashboard.cover')

<div class="main">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="spacer-20"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="col-sm-3 col-md-3 sidebar">
                        @include('userdashboard.submenu')
                    </div>

                    <div class="col-md-9">
                        <div class="row background-white p-10">
                            @if(Session::has('info'))
                            <div class="alert alert-info" role="alert">
                                {{ Session::get('info') }}
                            </div>
                            @endif @if($errors->any())
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                <li> {{ $error }} </li>
                                @endforeach @endif
                            </ul>

                            <form action="{{url('user/ajax/editBlogAction')}}" id="edit-blog-form" method="POST" enctype="multipart/form-data">

                                {{csrf_field()}}
                                <h3>Edit Blog - {{$blog->title}}</h3>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Title</label>
                                            <input type="text" class="form-control" name="title" value="{{$blog->title}}">
                                            <div class="validation_error" id="title_error"></div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Location</label>
                                            <input type="text" class="form-control" name="location" value="{{$blog->location}}">
                                            <div class="validation_error" id="location_error"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <textarea class="form-control" name="description" rows="10" id="description" >{{$blog->description}}</textarea>
                                            <div class="validation_error" id="description_error"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Hashtag</label>
                                            <input type="text" class="form-control" name="hashtag" value="{{$hashtag}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label for="exampleInputPassword1">Image</label>
                                          <input type="file" id="blog_image" name="blog_image[]" multiple/>
                                        </div>
                                    </div>


                                    <div class="project-photos-container blog-image">
                                    @foreach($blog_images as $bi)
                                    <div class="blog-image-container-{{$bi->id}}">
                                        <input type="hidden" name="image_data_image[]" value="set">
                                        <input type="hidden" name="image_id[]" value="{{$bi->id}}">
                                        <div class="project-photos-container stories-image-section{{$bi->id}}">
                                            <div class="photo-pod col-xs-4 project-image-section-1">
                                                <div class="photo-actions-container"><span class="delete-stories-image" image-id="{{$bi->id}}"><i class="fa fa-trash"></i></span> </div>
                                                <div class="project-image-status-container">
                                                    <img class="project-photo" src="{{url('uploads/blog/')}}/{{$bi->image}}">
                                                    <textarea class="form-control" placeholder="Write a caption" name="image_description[]">{{$bi->image_description}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    @endforeach
                                    </div>

                                    <input type="hidden" name="stories_id" value="{{$id}}">

                                    <div class="col-md-12 mt-40">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary edit-story">Submit</button>
                                        </div>
                                    </div>

                                    <div class="spacer-20"></div>
                                </div>
                            </form>
                        </div>    
                    </div>

                </div>

            </div>
        </div>

    </div>
    @stop