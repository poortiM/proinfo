@extends('main.default')

@section('content')
<div class="main">
   <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 col-sm-12  info-box">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-md-offset-2">
                            <div class="col-md-12">
                                <a href="#" class="col-md-6 btn btn-default"> Project Info </a>
                                <a href="#" class="col-md-6 btn btn-info"> Project Photos </a>
                            </div>
                        </div>



                        <div class="col-md-8 col-sm-12 col-md-offset-2">
                             
                                <div class="spacer-10"></div>
                                <div>
                                    @if($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            <li> {{ $error }} </li>
                                        @endforeach
                                    @endif
                                    </ul>

                                    @if(Session::has('info'))
                                    <div class="alert alert-info" role="alert">
                                        {{ Session::get('info') }}
                                    </div>
                                    @endif
                                </div>

                                    

                                <div class="spacer-30"></div>

                                <!-- {!! Form::open(['url' => 'pro/dashboard', 'method' => 'GET' ,'id' => 'project-image']) !!}
                                    <div class="col-xs-12">
                                        <label>Image Upload</label>  
                                        <input type="file" id="featured_image" name="featured_image[]" multiple/>
                                    </div>

                                    <div class="spacer-10"></div>
                                    <input type="hidden" name="projectId" id="projectImageId" value="{{$projectId}}">

                                    <div class="project-photos-container create-project-image">
                                        <div class="col-md-offset-5 project-loader" style="display: none;"><img src="{{url('images/uploading.gif')}}"></div>
                                    </div>

                                    <input type="submit" value="Upload" class="pure-button pure-button-primary">

                                   </div>
                                {!! Form::close() !!} -->

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

                                <div class="col-xs-12">
                                    <a href="{{url('pro/edit/project')}}/{{Request::get('projectId')}}" type="submit" class="pull-right btn btn-info">View Project</a>
                                    <div class="spacer-50"></div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
