@extends('main.default')

@section('content')

<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="content">
                
                <div id="Projects">
                    <div class="col-md-12">
                        <h2>{{count($product_array)}} projects</h2>
                        <div class="row">
                           
                            @if(count($product_array) != 0)
                            @foreach($product_array as $p)
                            <div class="col-md-3 project-section">
                                <div class="row p-15">
                                    <div class="col-md-12 background-white box-shadow">
                                        <div class="row">

                                        @if(!empty(Auth::guard('web')->user()->id))
                                            @if(Auth::guard('web')->user()->id == $user_id)
                                            <a href="#"><i class="fa fa-times delete-product" product-id="{{$p['id']}}"></i></a>
                                            @endif
                                        @endif
                                            
                                            <div class="block" style="background-image: url({{$p['image']}}); background-size:cover; background-repeat:no-repeat; width:100%; height:160px;    background-position: center;"></div>

                                            <div class="project-name">
                                                <p><b>{{substr($p['name'],0,25)}}...</b></p>
                                                <p>{{substr($p['description'],0,93)}}...<a href="{{url('product')}}/{{$p['id']}}/{{str_slug($p['name'])}}" target="_blank" class="lm">Read more</a></p>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12 project-details hr">
                                                <div class="project-pricing">
                                                    <p>Rs {{$p['price']}}</p>
                                                    <span class="small-txt">Product Cost</span>
                                                </div>
                                                <div class="project-timing">
                                                    <p>2017-01-04</p>
                                                    <span class="small-txt">Product Date</span>
                                                </div>
                                            </div>

                                            @if(!empty(Auth::guard('web')->user()->id))
                                                @if(Auth::guard('web')->user()->id == $user_id)
                                                <div class="col-md-12 col-sm-12 col-xs-12 project-details hr">
                                                    <center><a href="{{url('pro/edit')}}/{{$p['id']}}/product" class="project-link">Edit Product</a></center>
                                                </div>
                                                @endif
                                            @else
                                                <div class="col-md-12 col-sm-12 col-xs-12 project-details hr">
                                                    <center><a href="{{url('/product')}}/{{$p['id']}}/{{str_slug($p['name'],'-')}}">View Product</a></center>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        
                    </div>
                </div>

            </div>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.main-inner -->

@stop