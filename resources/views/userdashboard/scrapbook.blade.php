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
                        
                        @if(count($data) != 0)
                        <div id="productContainer" class="product-productpage-container">

                            <div id="productContent float-none">
                                <div class="">
                                    <div class="row">
                                    @foreach($data as $key => $value)
                                        <div class="gallery-img col-md-6">

                                            <img src="{{url('uploads/blog')}}/{{$value->image}}" alt="img{{$key+1}}" style="width:100%;height: 260px;">

                                            <div class="data-desc">

                                                <figcaption class="author-info rel">
                                                    <button class="modal-post-like" onclick="removetoscrapbook({{$value->image_id}})">
                                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                                    </button>

                                                    
                                                    <a href="{{url('profile')}}/{{$value->username}}" class="author-avatar"><img src="{{url('uploads/avatar')}}/{{$value->avatar}}" class="photo-user"></a>
                                                    
                                                    <a href="{{url('profile')}}/{{$value->username}}" class="author-post">{{$value->name}}</a>
                                                    
                                                    <!-- Follow -->
                                                    
                                                    <div class="action-post">published {{\Carbon\Carbon::createFromTimeStamp(strtotime($value->created_at))->diffForHumans()}}</div>

                                                    <span>
                                                        <a href="{{url('stories')}}/{{$value->id}}/{{str_slug($value->title)}}"><h3 class="title">{{$value->image_description}}</h3></a>
                                                    </span>

                                                </figcaption>

                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <h3>No scrapbook added</h3>
                        @endif
                    </div>

                </div>

            </div>
        </div>

    </div>
@stop