@extends('main.default') 
@section('content')

<div class="main">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="spacer-20"></div>
                <div class="col-md-12 col-sm-12">
                    <div class="col-sm-3 col-md-3 sidebar">
                        <div class="trht-card">
						    <div class="trht-title">Trending tags</div>
						    <div class="trht-wr">
						        <div class="rp-repeater">
						            <div class="row">
						            @foreach($allhashtag as $key => $value)
						            	@if(!empty($value->hashtag) && $key<30)
						                <div class="renderer-item"><a class="trht" title="{{$value->hashtag}}" href="#">{{$value->hashtag}}</a></div>
						                @endif
						            @endforeach
						            </div>
						        </div>
						    </div>
						</div>
                    </div>

                    <div class="col-md-6 background-white">
                       	<div class="cont-col-home cfx">
                            <div id="featuredContainer">
                                <div class="post project">
                                    <header>
                                        <figure class="user-post">
                                            <a href="{{url('profile')}}/{{$data['getvendorinfo']['username']}}"><img src="{{url('uploads/avatar')}}/{{$data['getvendorinfo']['avatar']}}" class="photo-user"></a>
                                            <figcaption>
                                                <a href="{{url('profile')}}/{{$data['getvendorinfo']['username']}}" class="author-post">
                                                	@if($data['getvendorinfo']['type'] == 'user')
                                                    {{$data['getvendorinfo']['name']}}
                                                    @else
                                                    {{$data['getvendorinfo']['business_name']}}
                                                    @endif
                                                </a>
                                                <span class="action-post">published {{\Carbon\Carbon::createFromTimeStamp(strtotime($data['blog']['created_at']))->diffForHumans()}}</span>
                                            </figcaption>
                                        </figure>
                                    </header>

                                   @php $redirectUrl = url('/').$_SERVER['REQUEST_URI']; @endphp
                                   @if(Auth::guard('web')->check())
                                   	@php
					                  $auth = 1;
					                  $auth_id = Auth::guard('web')->user()->id;
					                  $avatar = url('uploads/avatar').'/'.Auth::guard('web')->user()->avatar;
					                @endphp
                                   @else
                                   	@php
					                  $auth = 0;
					                  $auth_id = '';
					                  $avatar = url('uploads/avatar').'/avatar.png';
					                @endphp
                                   @endif
                                    <div class="project-featured" auth={{$auth}} redirect-url="{{rawurlencode($redirectUrl)}}" auth-id="{{$auth_id}}" stories-id="{{$data['blog']['id']}}">
                                        
                                        <figure>
                                            <figcaption>                                   
                                                <h3 class="title">{{$data['blog']['title']}} 
                                                <span class="location">{{$data['blog']['location']}} </span>
                                                </h3>

                                                @if(count($data['hashtag']))
                                                @foreach($data['hashtag'] as $value) 
                                                <a href="#">{{$value->hashtag}}</a>
                                                @endforeach
                                                @endif                                                
                                                <div>{!!$data['blog']['description']!!} </div>
                                            </figcaption>

                                           

                                            @if(count($data['images']))
                                            <div id="productContainer" class="product-productpage-container">

									            <div id="productContent float-none">
									            	<div class="">
									                	<div class="row">
										            		@foreach($data['images'] as $key => $value)
										                    <div class="gallery-img col-md-6">

										                        <img src="{{url('uploads/blog')}}/{{$value->image}}" alt="img{{$key+1}}" style="width:100%;height: 166px;">

										                        <div class="data-desc">
										                        	
										                        	
										                        	<figcaption class="author-info rel">
										                        	@if(Auth::guard('web')->check())
											                        	<button class="modal-post-like post-heart-filled-{{$value->id}}" data-toggle="modal" data-target="#myModal-{{$value->id}}">
											                        		<i class="fa fa-heart-o"></i>
											                        	</button>
											                        @else
											                        	<button class="modal-post-like" data-toggle="modal" data-target="#sigUp-Login">
											                        		<i class="fa fa-heart-o"></i>
											                        	</button>
											                        @endif

										                        		<a href="#" class="author-avatar"><img src="{{url('uploads/avatar')}}/{{$data['getvendorinfo']['avatar']}}" class="photo-user"></a>
										                        		
					                                                    <a href="{{url('profile')}}/{{$data['getvendorinfo']['username']}}" class="author-post">{{$data['getvendorinfo']['name']}}</a>
					                                                    
					                                                    <!-- Follow -->
					                                                    
					                                                    <div class="action-post">published {{\Carbon\Carbon::createFromTimeStamp(strtotime($data['blog']['created_at']))->diffForHumans()}}</div>

					                                                    <span>
					                                                        <h3 class="title">{{$value->image_description}}</h3>
					                                                    </span>
					                                                </figcaption>

					                                                

										                        </div>
										                    </div>
									               	 		@endforeach
									                	 </div>
										            </div>
									            </div>
									        </div>
									        @endif

									        <div class="clearfix"></div>
                                        </figure>
                                    </div>
                                    <footer>
                                       <div class="rp-social-card">
										    <div class="cont">
										        <div class="counts mt10 mb10">
										        	<span class="views">
										        		<span class="like-count">{{$data['liked']}}</span> Likes
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
										        			<a href="https://www.facebook.com/sharer/sharer.php?u={{$redirectUrl}}" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;"><i class="fa fa-facebook"></i> Facebook</a>

										        			<a href="https://twitter.com/home?status={{$redirectUrl}}" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;"><i class="fa fa-google-plus"></i> Google plus</a>

										        			<a href="https://plus.google.com/share?url={{$redirectUrl}}" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;"><i class="fa fa-twitter"></i> Twitter</a>

										        			<a href="https://pinterest.com/pin/create/button/?url={{$redirectUrl}}" target="_blank" OnClick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false;"><i class="fa fa-pinterest"></i> Pinterest</a>
										        		</div>
										        	</span>
										        	
										        	<span class="r-icon r-icon-repost repost-stories">
										        		<i class="fa fa-exchange" aria-hidden="true"></i> <span class="t hidden-xs">Repost</span>
										        	</span>
										        	
										        </div>
										        
										        <div class="comments-wrapper jsCommentsWrapper" tabindex="1">
										            
										            <div class="bt">
												        <div class="comments-container">
												            <div class="com-t">
												            	<span class="comment-area">
												            	@if(count($data['commented']) != 0)
												            	@foreach($data['commented'] as $comment)
												            		<div class="s-cmt-card">
												            			<div class="img">
												            				<a class="rp-p-img" title="{{$comment->name}}" rel="author" href="{{url('profile')}}/{{$comment->username}}">
												            					<div class="rp-p-img-cont">
												            						<div class="rp-p-img-src" style="background-image: url({{url('uploads/avatar')}}/{{$comment->avatar}});">
												            							
												            						</div>
												            					</div>
												            				</a>
												            			</div>
												            			<div class="txt-a">
												            				<!-- <a class="n fw400" title="{{$comment->name}}" rel="author" href="{{url('profile')}}/{{$comment->username}}">{{$comment->name}}</a> -->
												            				<div class="tx fw300">{{$comment->comment}}</div>
												            				<span class="r-icon r-icon-dots del-c link"></span>
												            			</div>
												                	</div>
												                @endforeach
												            	@endif
												                </span>
												            </div>
												        </div>
												    </div>

												    <div class="wr-cmt-card">
												        <div class="img">
												            <a class="rp-p-img" title="sandeep kumar" rel="author" href="#">
												                <div class="wr">
												                    <div class="rp-p-img-cont">
									            						<div class="rp-p-img-src" style="background-image: url({{$avatar}});">
									            							
									            						</div>
									            					</div>
												                </div>
												            </a>
												        </div>
												        <div class="mk-c">
												            <input type="text" class="input comment-input" placeholder="Write a comment...">
												            <button class="comment-button comment-pusher"><i class="fa fa-send"></i></button>
												        </div>
												    </div>
												</div>
											</div>
										</div>
                                    </footer>
                                </div>
                            </div>
                       	</div>

                       	<div class="mt-40"></div>
                    </div>



                    <div class="col-md-3">
                        <div class="col-md-12">
	                       	<div class="rp-right-pane">
							    <div class="sm-usrs">
							        <div class="rp-title">
							            <h3>Similar Users</h3>
							        </div>
							        <div class="rl-usr">
							            <div class="rp-repeater">
							                <div class="row">
							                 @foreach($suggestion_users as $su)
							                    <div class="renderer-item rpc">
							                        <div class="usb-card">
							                            <div class="uinfo">
							                                <div class="img">
							                                    <div class="i">
							                                        <a class="rp-p-img" title="{{$su['name']}}" rel="author" href="{{url('profile')}}/{{$su['username']}}">
							                                            <div class="rp-p-img-cont">
							                                                <img src="{{url('uploads/avatar')}}/{{$su['avatar']}}" />
							                                            </div>
							                                        </a>
							                                    </div>
							                                </div>
							                                <div class="dtls">
							                                    <div class="info"><a class="title pd" rel="author" href="{{url('profile')}}/{{$su['username']}}"><span class="n">{{$su['name']}} </span></a>
							                                        <div class="h">
							                                        @if(strlen($su['username']) > 11)
							                                        {{"@"}}{{substr($su['username'],0,11)}}
							                                        @else
							                                        {{"@"}}{{$su['username']}}
							                                        @endif
							                                        </div>

							                                        @if($su['is_followed'] == 1)
							                                        @php $status = 'Following' @endphp
							                                        @else
							                                        @php $status = 'Follow' @endphp
							                                        @endif
							                                        <div class="fbtn">
							                                            <div class="tb">
							                                                <div class="w">
							                                                    <div class="rp-follow-btn follow-user" auth_id="{{$auth_id}}" following_id="{{$su['id']}}"><span class="t flw follow-response-{{$su['id']}}">{{$status}}</span></div>
							                                                </div>
							                                            </div>
							                                        </div>
							                                    </div>
							                                </div>
							                            </div>
							                        </div>
							                    </div>
							                 @endforeach
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

    </div>
	
	@foreach($data['images'] as $key => $value)
	<div class="modal fade" id="myModal-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title" id="myModalLabel">Save to Scrapbook</h4>
	      		</div>
	      		<form action="{{url('user/ajax/saveScrapbook')}}" id="add-to-scrapbook" method="POST">
	      			{{csrf_field()}}
				    <div class="modal-body">
					    	<div class="form-group">
					        	<img src="{{url('uploads/blog')}}/{{$value->image}}" class="scrapbook-image" />
					        </div>

					        <input type="hidden" name="image_id" value="{{$value->id}}">
					        <div class="form-group">
					            <label for="recipient-name" class="control-label">Select a Scrapbook</label>
					            <select class="form-control select-scrapbook" name="scrapbook_id">
					            @foreach($scrapbook as $s)
					            	<option value="{{$s->id}}">{{$s->scrapbook}}</option>
					            @endforeach
					            	<option value="0new-scrapbook0">New Scrapbook</option>
					            </select>
					        </div>
					        <div class="form-group new-scrapbook" style="display: none;">
					            <input class="form-control" id="message-text" name="new_scrapbook_name" placeholder="New Scrapbook">
					        </div>
					        <div class="form-group">
					            <label for="message-text" class="control-label">Comment</label>
					            <textarea class="form-control" id="message-text" name="comment"></textarea>
					        </div>
					    
				    </div>
				    <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <input type="submit" class="btn btn-primary" id="add-to-scrapbook" value="Save">
				    </div>
			    </form>
			</div>
	  	</div>
	</div>
	@endforeach
@stop