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

                            <form action="{{url('userdashboard/addBlogAction')}}" id="blog-form" method="POST" enctype="multipart/form-data">

                                {{csrf_field()}}
                                <h3>Add New Blog</h3>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Title</label>
                                            <input type="text" class="form-control" name="title">
                                            <div class="validation_error" id="title_error"></div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Location</label>
                                            <input type="text" class="form-control" name="location" id="autocomplete" autocomplete="off">
                                            <div class="validation_error" id="location_error"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <textarea class="form-control" name="description" rows="10" id="description"></textarea>
                                            <div class="validation_error" id="description_error"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Hashtag</label>
                                            <input type="text" class="form-control" name="hashtag">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label for="exampleInputPassword1">Image</label>
                                          <input type="file" id="blog_image" name="blog_image[]" multiple/>
                                        </div>
                                    </div>


                                    <div class="project-photos-container blog-image">
                                        
                                    </div>

                                    <div class="col-md-12 mt-40">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary add-story">Submit</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>    
                        <div class="mt-10"></div>
                    </div>

                </div>

            </div>
        </div>

    </div>
    @stop