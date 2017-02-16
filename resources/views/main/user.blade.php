@extends('main.default') 

@section('content')

@include('main.cover')

<div class="main">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="spacer-20"></div>
                <div class="col-md-12 col-sm-12">
                    
                    @include('main.usermenu')

                    <div class="col-md-9">
                        <div class="row p-10">
                            <section class="column-center">
                                <div class="masonry cont-col-home cfx">
                                @foreach($data['userblog'] as $ub)
                                    <div class="">
                                        <div class="item">
                                            <div id="featuredContainer">
                                                <div class="post project">
                                                    <header>
                                                        <figure class="user-post">
                                                            <a href="#"><img src="{{url('uploads/avatar')}}/{{$ub['getvendorinfo']['avatar']}}" class="photo-user"></a>
                                                            <figcaption>
                                                                <a href="#" class="author-post">{{$ub['getvendorinfo']['name']}}</a>
                                                                <span class="action-post">published {{$ub['time']}}</span>
                                                            </figcaption>
                                                        </figure>
                                                    </header>
                                                    <div class="project-featured">
                                                        <a href="{{url('stories')}}/{{$ub['id']}}/{{str_slug($ub['title'])}}">
                                                            <figure>
                                                                <figcaption>
                                                                    <span>
                                                                        <h3 class="title">{{$ub['title']}} 
                                                                        <span class="location">{{$ub['location']}}</span>
                                                                        </h3>
                                                                    </span>
                                                                    <span>
                                                                        @if(strlen($ub['description']) > 373)
                                                                        {!!substr($ub['description'],0,372)!!}...
                                                                        @else
                                                                        {!!$ub['description']!!}
                                                                        @endif
                                                                    </span>
                                                                </figcaption>
                                                                @if(count($ub['images']) > 0)
                                                                @if(count($ub['images']) == 1)
                                                                <span>

                                                                    <img src="{{url('uploads/blog')}}/{{$ub['images'][0]->image}}"></span>
                                                                @else
                                                                <span>
                                                                    <img src="{{url('uploads/blog')}}/{{$ub['images'][0]->image}}">
                                                                </span>
                                                                
                                                                <ul>
                                                                    @foreach($ub['images'] as $key => $img)
                                                                    @if($key != 0)
                                                                        <li><img src="{{url('uploads/blog')}}/{{$img->image}}"></li>
                                                                    @endif
                                                                    @endforeach
                                                                </ul>
                                                                @endif
                                                                @endif
                                                            </figure>
                                                        </a>
                                                    </div>
                                                    
                                                    <a href="{{url('stories')}}/{{$ub['id']}}/{{str_slug($ub['title'])}}">
                                                        <footer>
                                                            <div class="rp-social-card">
                                                                <div class="cont">
                                                                    <div class="counts mt10 mb10">
                                                                        <span class="views">
                                                                            <span class="like-count">{{$ub['total_liked']}}</span> Likes
                                                                        </span>
                                                                    </div>
                                                                    <div class="line">
                                                                        <hr class="hr-line">
                                                                    </div>
                                                                    <div class="action-btns mt10">

                                                                        <span class="r-icon r-icon-heart-filled like-stories">
                                                                            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span class="t hidden-xs">Like</span>
                                                                        </span>

                                                                        <span class="r-icon r-icon-comment comment-stories">
                                                                            <i class="fa fa-comment-o" aria-hidden="true"></i> <span class="t hidden-xs">Comment</span>
                                                                        </span>

                                                                        <span class="r-icon r-icon-share comment-share">
                                                                            <i class="fa fa-share-alt" aria-hidden="true"></i> <span class="t hidden-xs">Share</span>
                                                                            <div class="share-tab">
                                                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{url('stories')}}/{{$ub['id']}}/{{str_slug($ub['title'])}}" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;"><i class="fa fa-facebook"></i> Facebook</a>

                                                                                <a href="https://twitter.com/home?status={{url('stories')}}/{{$ub['id']}}/{{str_slug($ub['title'])}}" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;"><i class="fa fa-google-plus"></i> Google plus</a>

                                                                                <a href="https://plus.google.com/share?url={{url('stories')}}/{{$ub['id']}}/{{str_slug($ub['title'])}}" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;"><i class="fa fa-twitter"></i> Twitter</a>

                                                                                <a href="https://pinterest.com/pin/create/button/?url={{url('stories')}}/{{$ub['id']}}/{{str_slug($ub['title'])}}" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;"><i class="fa fa-pinterest"></i> Pinterest</a>
                                                                            </div>
                                                                        </span>

                                                                        <span class="r-icon r-icon-repost repost-stories">
                                                                            <i class="fa fa-exchange" aria-hidden="true"></i> <span class="t hidden-xs">Repost</span>
                                                                        </span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </footer>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </section> 
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
    @stop