@extends('main.default')

@section('content')
<div class="main">
       <div class="container">
            <div class="col-md-12">
                <div class="row"><!-- 
                    <div class="col-md-12 col-sm-12 ">
                        <div class="contaniner-fluid">
                            <div class="col-md-12 info-box">
                                <img src="images/profile-proper.png" width="100%">
                            </div>
                       </div>
                    </div>  -->


                    <div class="col-md-12 col-sm-12 info-box">
                        <div class="row"> 
                            <div class="col-md-8 col-sm-12 col-md-offset-2">
                                <div class="col-md-12">
                                    <a href="#" class="col-md-6 btn btn-info"> Project Info </a>
                                    <a href="#" class="col-md-6 btn btn-default"> Project Photos </a>
                                </div>
                            </div>


                            {!! Form::open(['url' => 'pro/addProject', 'files' => 'true']) !!} 
                                <div class="col-md-8 col-sm-12 col-md-8 col-sm-12 col-md-offset-2">
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
                                    <div class="col-md-12">
                                        <div class="spacer-20"></div>
                                        <label>Project Title</label>
                                        
                                        {!! Form::text('title',null,['class' => 'form-control','placeholder' => 'Enter Title']) !!}
                                        <div class="spacer-10"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <label>Project Location</label>
                                        <div class="radio">
                                            {!! Form::text('location',null,['class' => 'form-control','id' => 'autocomplete']) !!}
                                        </div>
                                        
                                        <div class="spacer-10"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <label>Client Name</label>
                                        <div class="radio">
                                            {!! Form::text('client_name',null,['class' => 'form-control',]) !!}
                                        </div>
                                        
                                        <div class="spacer-10"></div>
                                    </div>


                                    <div class="col-md-12">
                                        <label>Area(Sq Ft)</label>
                                        <div class="radio">
                                            {!! Form::text('area',null,['class' => 'form-control',]) !!}
                                        </div>
                                        
                                        <div class="spacer-10"></div>
                                    </div>


                                    <div class="col-md-4">
                                            <label>Currency</label>
                                            <div class="radio">
                                                <select class="form-control" name="currency">
                                                    <option value="">Select Currency</option>
                                                    <option>INR</option>
                                                    <option>USR</option>
                                                    <option>AUD</option>
                                                </select>
                                            </div>
                                    </div>
                                        
                                    <div class="col-md-4">
                                        <label>From</label>
                                        <div class="radio">
                                            <input class="form-control" placeholder="Minimum Cost" name="min_cost" type="number">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>To</label>
                                        <div class="radio">
                                            <input class="form-control" placeholder="Maximum Cost" name="cost" type="number">
                                        </div>
                                    </div>
                                    
                                    <div class="spacer-10"></div>
                                    

                                    <div class="col-md-12">
                                        <label>Project Year</label>
                                        <div class="radio">
                                            <select class="form-control" name="date">
                                                <option value="">Project Year</option>
                                                @for($i=1940;$i<2020;$i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        
                                        <div class="spacer-10"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <label>Select type of project</label>
                                        {!! Form::select('type_of_project', [
                                                                   '' => 'Select type of project',
                                                                   'Residential' => 'Residential',
                                                                   'Commerical' => 'Commerical',
                                                                   'Industrial' => 'Industrial',
                                                                   'Retail' => 'Retail',
                                                                   'Hospitality' => 'Hospitality',
                                                                   'Institutional' => 'Institutional',
                                                                   'Recreational' => 'Recreational',
                                                                   'Restoration' => 'Restoration',
                                                                   'Public Buildings' => 'Public Buildings'], null, ['class' => 'form-control']) !!}

                                        
                                        <div class="spacer-10"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <label>Select project status</label>
                                        {!! Form::select('project_status', [
                                                                   '' => 'Select project status',
                                                                   'Progress' => 'Progress','Completed' => 'Completed',], null, ['class' => 'form-control project_status']) !!}
                                        
                                        <div class="spacer-10"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <label>Select scope of work</label>
                                        {!! Form::select('scope_of_work', [
                                                                   '' => 'Select scope of work',
                                                                   'Consultation Only' => 'Consultation Only','Complete Solution' => 'Complete Solution'], null, ['class' => 'form-control']) !!}
                                        
                                        <div class="spacer-10"></div>
                                    </div>
                                    
                                    <div class="col-xs-12">
                                        <label>Project Description</label>  
                                        {!! Form::textarea('description',null,['class' => 'form-control','placeholder' => 'Enter Description']) !!}
                                        <div class="spacer-10"></div>
                                    </div>
                                   
                                    <div class="col-xs-12">
                                        <label>Youtube Video</label>  
                                        {!! Form::text('youtube_videos',null,['class' => 'form-control','placeholder' => 'Youtube Link']) !!}
                                        <div class="spacer-10"></div>
                                    </div>
                                   
                                    <input type="hidden" name="id" value="{{ Auth::guard('web')->user()->id }}">

                                    <div class="col-xs-12">
                                        <input type="submit" class="pull-right btn btn-info" value="Add New Project">
                                        <div class="spacer-50"></div>
                                    </div>
                                   
                                </div>
                            {!! Form::close() !!}  
                        </div>
                    </div>       
                </div>
            </div>
            
        </div>
    <!-- </div> -->


@stop