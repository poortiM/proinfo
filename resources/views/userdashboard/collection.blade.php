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

                    <div class="col-md-9 background-white p-10">
                    @if(count($scrapbook)!=0)
                        @foreach($scrapbook as $s)    
                            <div class="col-md-4">
                                <span><i class="fa fa-times delete-whole-collection" collection-id="{{$s['id']}}"></i></span>
                                <a href="{{url('user/dashboard')}}/{{$s['id']}}/scrapbook">

                                    <div class="scrap-item" style="background-image: url({{$s['featured_image']}});">
                                        <div class="col-xs-12 scrap-item-text">
                                            <div class="col-xs-9">
                                                <h3 class="m-0">{{$s['scrapbook']}}</h3>
                                            </div>
                                            <div class="col-xs-3 proimgno">
                                                <h4 class="pull-right m-0"><i class="fa fa-file-image-o"></i> {{$s['total_image']}}</h4>            
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </a>
    					    </div>
                        @endforeach
                    @else
                    <div class="col-md-12">
                        <h2>No Scrapbook</h2>
                    </div>
                    @endif
                    </div>

                </div>

            </div>
        </div>

    </div>
    @stop