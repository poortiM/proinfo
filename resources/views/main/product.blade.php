@extends('main.default')

@section('content')

<div class="container-fluid" id="product-view">
    <div class="row" id="main">
        <div id="pb-left-column">
          @if(count($product_images) != 0)  
            <div id="main_area">
                <!-- Slider -->
                <div class="row">
                    <div class="col-xs-12" id="slider">
                        <!-- Top part of the slider -->
                        <div class="row">
                            <div class="col-sm-12" id="carousel-bounding-box">
                                <div class="carousel slide" id="myCarousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">

                                    @foreach($product_images as $key=>$pi)
                                    @if($key == 0)
                                        @php $active = 'active' @endphp
                                    @else
                                        @php $active = '' @endphp
                                    @endif
                                        <div class="{{$active}} item" data-slide-number="{{$key}}">
                                        <img src="{{url('uploads/product')}}/{{$pi->image}}"></div>
                                    @endforeach
                                 
                                    </div><!-- Carousel nav -->
                                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>                                       
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>                                       
                                    </a>                                
                                    </div>
                            </div>

                            <div class="col-sm-4" id="carousel-text"></div>                            
                        </div>
                    </div>
                </div><!--/Slider-->

                <div class="row hidden-xs" id="slider-thumbs">
                        <!-- Bottom switcher of slider -->
                    <ul class="hide-bullets">
                        @foreach($product_images as $key=>$pi)
                            <li class="col-sm-2">
                                <a class="thumbnail" id="carousel-selector-{{$key}}"><img src="{{url('uploads/product')}}/{{$pi->image}}"></a>
                            </li>
                        @endforeach
                    </ul>                 
                </div>
        	</div>
            @endif
        </div>

        <div id="pb-right-column">
            <div class="row">
                <div class="pinfo">
                    <!-- <button class="modal-post-like post-heart-filled-product" product-id="{{$id}}"><i class="fa fa-heart-o"></i></button> -->
                    <h1 itemprop="name" class="h3 product-name">{{$product->name}}</h1>
                    <div class="separator"></div>
                    <div class="product-price-info row">
                        <div class="price-block col-xs-12">
                            <!-- prices -->
                            <p class="price">
                                <span id="product-price" class="h3">
                                    Rs {{$product->price}}
                                </span>
                            </p>
                            

                            <div id="about">
                                <div class="desc">
                                    <p dir="ltr">{{$product->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- add to cart form-->
                    <!-- hidden datas -->
                    <div class="buy-wrap">
                        
                        <div class="delivery_info" style="">
                            <table class="table">
                                <tbody>
                                  <tr>
                                    <td><b>Product Code</b></td>
                                    <td>{{$product->product_code}}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Brand</b></td>
                                    <td>{{$product->brand}}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Length</b></td>
                                    <td>{{$product->length}}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Depth</b></td>
                                    <td>{{$product->depth}}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Material</b></td>
                                    <td>{{$product->material}}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Color</b></td>
                                    <td>{{$product->color}}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Assembly Required</b></td>
                                    <td>{{$product->assembly_required}}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Width</b></td>
                                    <td>{{$product->width}}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Published on</b></td>
                                    <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($product->created_at))->diffForHumans()}}</td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
<!-- </div> -->

<section id="overview">
    <div class="container">
        <div class="row">
            <div class="overview-wrap-left">
                <div id="about">
                    <div class="desc">
                        <p dir="ltr">{{$product->description}}</p>
                    </div>
                </div>

                <div id="info">
                    <h3 class="info-heading">Product Services</h3>
                    <div class="row">
                        <div class="product-info">
                            <div class="spec">
                                <span class="">
                                @foreach($product_subcategories as $ps)
                                    <span class="">{{$ps->service}},</span>
                                @endforeach
                                </span>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="overview-wrap-right"></div>
        </div>
    </div>
</section>

<section id="faqs">
    <div class="container">
        <div class="row">
            <div class="faq">
                <h2 class="sub-head">FAQ'S</h2>
                <div class="faq-wrap">
                    <div class="">
                        <div class="faq-item">
                            <h5>Can I choose and change the colors of any product that I wish to buy?</h5>
                            <p>Yes. Propisor caters to every customer’s style and individuality. We offer a wide range of interior decor and furniture selection for customizing fabric color, wood finish, material, and other optional features. Simply select from the options available from our product categories.</p>
                        </div>
                        <div class="faq-item">
                            <h5>Does Propisor send and deliver orders?</h5>
                            <p>
                                Yes. Propisor wants you to have the most convenient furniture and home interior shopping experience. We deliver to all points of Delhi, Mumbai and Bangalore. Stand by for more updates on other delivery destinations by continuing to visit our website.
                            </p>
                        </div>
                        <div class="faq-item">
                            <h5>Is there any delivery cost involved for my purchases?</h5>
                            <p>
                                No. We do not charge a fee for sending and delivering your orders.
                            </p>
                        </div>
                        <div class="faq-item">
                            <h5>How long will it take for my order to arrive?</h5>
                            <p>
                                Propisor aims to deliver all orders within 8-10 weeks upon order confirmation.
                            </p>
                        </div>
                        <div class="faq-item">
                            <h5>What if I received a damaged product upon delivery? What should I do?</h5>
                            <p>
                                Propisor only wants the best for you and that is why we make sure that you receive your orders in good shape. However, should there be any instance where you receive any damaged item, it must be immediately flagged by calling us at +91 8039 512 060 or mail us at care@Propisor.com. Propisor will honor furniture returns/exchanges for items delivered with factory damages only. Please see the full scope of our return/exchange policy for more information.
                            </p>
                        </div>
                        <div class="faq-item">
                            <h5>How can I return or exchange the damaged furniture delivered to me?</h5>
                            <p>
                                Propisor will organize the collection and re-delivery of your order to reassure your satisfaction and experience shopping with us. For more assistance call us at +91 8039 512 060 or mail us at care@Propisor.com.
                            </p>
                        </div>
                        <div class="faq-item">
                            <h5>What are your return policies?</h5>
                            <p>
                                We are more than happy to exchange the product for you if it is damaged. However, if that is not the case, any product once sold cannot be exchanged or returned.
                            </p>
                        </div>
                        <div class="faq-item">
                            <h5>Why should I buy from Propisor?</h5>
                            <p>
                                At Propisor, we strive to redefine how you design and decorate your home with our exquisite furniture, fittings and accessories. We also bring with us the expertise of some of the best designers from across the world to you online, which makes designing, decorating and furnishing your dream home personal and easy.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop