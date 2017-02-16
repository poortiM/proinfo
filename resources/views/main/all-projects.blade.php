@extends('main.default')

@section('content')

<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="content">
                
                <div id="Projects">
                    <div class="col-md-12">
                        <h2>{{count($projects)}} projects</h2>
                        <div class="row">
                           
                            @if(count($projects) != 0)
                            @foreach($projects as $p)
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

                            <div class="pager">
                                <center>
                                    <ul>
                                    @for($i=1;$i<=ceil($projects->total()/$projects->perPage());$i++)
                                        @if($i == Request::get('page'))
                                            <li class="active"><a href="{{url('all-projects')}}?page={{$i}}">{{$i}}</a></li>
                                        @else
                                            <li class=""><a href="{{url('all-projects')}}?page={{$i}}">{{$i}}</a></li>
                                        @endif
                                    @endfor
                                    </ul>
                                </center>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.main-inner -->

@stop