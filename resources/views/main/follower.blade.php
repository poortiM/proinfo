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

                    <div class="col-md-9 background-white">
                        <div class="rp-right-pane">
						    <div class="sm-usrs">
						        
						        <div class="rl-usr">
						            <div class="rp-repeater">
						                <div class="row">
						                @if(count($follower) != 0)
							            <div class="col-md-12">
							                <div class="rp-title">
									            <h3>Follower</h3>
									        </div>
									    </div>
						                @foreach($follower as $su)
						                 	<div class="col-md-4">
						                 		<div class="renderer-item rpc">
							                        <div class="usb-card">
							                            <div class="uinfo">
							                                <div class="img">
							                                    <div class="i">
							                                        <a class="rp-p-img" title="{{$su->name}}" rel="author" href="{{url('profile')}}/{{$su->username}}">
							                                            <div class="rp-p-img-cont">
							                                                <img src="{{url('uploads/avatar')}}/{{$su->avatar}}" />
							                                            </div>
							                                        </a>
							                                    </div>
							                                </div>
							                                <div class="dtls">
							                                    <div class="info"><a class="title pd" rel="author" href="{{url('profile')}}/{{$su->username}}"><span class="n">{{$su->name}} </span></a>
							                                        <div class="h">
							                                        @if(strlen($su->username) > 11)
							                                        {{"@"}}{{substr($su->username,0,11)}}
							                                        @else
							                                        {{"@"}}{{$su->username}}
							                                        @endif
							                                        </div>
							                                        @if(Auth::guard('web')->check())
																		@php
																		  $auth = 1;
																		  $auth_id = Auth::guard('web')->user()->id;
																		  $auth_type = Auth::guard('web')->user()->type;
																		@endphp
																	@else
																		@php
																		  $auth = 0;
																		  $auth_id = '';
																		  $auth_type = '';
																		@endphp
																	@endif
							                                       
							                                        <div class="fbtn">
							                                            <div class="tb">
							                                                <div class="w">
							                                                    <div class="rp-follow-btn follow-user" auth_id="{{$auth_id}}" following_id="{{$su->id}}"><span class="t flw follow-response-{{$su->id}}">Follower</span></div>
							                                                </div>
							                                            </div>
							                                        </div>
							                                    </div>
							                                </div>
							                            </div>
							                        </div>
							                    </div>
						                 	</div>
						                 @endforeach
						                @else
						                	<div class="col-md-12">
						                		<h2>No followers</h2>
						                	</div>
						                @endif
						                </div>
						            </div>
						        </div>
						    </div>
						</div>    
                    </div>

                </div>

            </div>
        </div>

    </div>
    @stop