@extends('main.default')

@section('content')

<div class="container-fluid" id="product-view">
    <div class="row" id="main">
        <div id="pb-left-column">
            
            <div id="coverImageSliderWrap">
                <div id="coverImageSlider" class="carousel carousel-fade thumb-carousel" data-ride="carousel" data-interval="false">
                    <div class="carousel-outer">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div id="cover-0" class="cover-image big-image">
                                    <div class="product-big-image">
                                        <img src="http://imgs.livspace.com/168457-thickbox/classical-sofa-1v2.jpg" alt="" class="cover-image img-responsive img-lazy hide-image" height="600px" />
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="item ">
                                <div id="cover-1" class=" big-image">
                                    <div class="product-big-image">
                                        <img src="http://imgs.livspace.com/165450-thickbox/classical-sofa-1v2.jpg" alt="" class="cover-image img-responsive img-lazy hide-image" height="600px" />
                                        <a href="http://imgs.livspace.com/165450-thickbox/classical-sofa-1v2.jpg" class="zoom">
                                            <img src="http://imgs.livspace.com/165450-thickbox/classical-sofa-1v2.jpg" alt="" class="cover-image img-responsive img-lazy show-image" height="600px" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="customization-panel" style="display:none;position:relative"></div>
                        </div>
                        
                    </div>
                    <ol class='carousel-indicators mCustomScrollbar'>

                        <li data-target='#coverImageSlider' data-slide-to='0' class='active'>
                            <img id="thumb_" src="http://imgs.livspace.com/168457-small/classical-sofa-1v2.jpg" alt="" class="img-responsive image-thumbs" data-image-id="cover-0" width="120px" height="72px" />
                        </li>

                        <li data-target='#coverImageSlider' data-slide-to='1' class='active'>
                            <img id="thumb_" src="http://imgs.livspace.com/165450-small/classical-sofa-1v2.jpg" alt="" class="img-responsive image-thumbs" data-image-id="cover-1" width="120px" height="72px" />
                        </li>

                        <li data-target='#coverImageSlider' data-slide-to='2' class='active'>
                            <img id="thumb_" src="http://imgs.livspace.com/165451-small/classical-sofa-1v2.jpg" alt="" class="img-responsive image-thumbs" data-image-id="cover-2" width="120px" height="72px" />
                        </li>

                        <li data-target='#coverImageSlider' data-slide-to='3' class='active'>
                            <img id="thumb_" src="http://imgs.livspace.com/165452-small/classical-sofa-1v2.jpg" alt="" class="img-responsive image-thumbs" data-image-id="cover-3" width="120px" height="72px" />
                        </li>

                        <li data-target='#coverImageSlider' data-slide-to='4' class='active'>
                            <img id="thumb_" src="http://imgs.livspace.com/165453-small/classical-sofa-1v2.jpg" alt="" class="img-responsive image-thumbs" data-image-id="cover-4" width="120px" height="72px" />
                        </li>

                        <li data-target='#coverImageSlider' data-slide-to='5' class='active'>
                            <img id="thumb_" src="http://imgs.livspace.com/165454-small/classical-sofa-1v2.jpg" alt="" class="img-responsive image-thumbs" data-image-id="cover-5" width="120px" height="72px" />
                        </li>

                        <li data-target='#coverImageSlider' data-slide-to='6' class='active'>
                            <img id="thumb_" src="http://imgs.livspace.com/165455-small/classical-sofa-1v2.jpg" alt="" class="img-responsive image-thumbs" data-image-id="cover-6" width="120px" height="72px" />
                        </li>

                        <li data-target='#coverImageSlider' data-slide-to='7' class='active'>
                            <img id="thumb_" src="http://imgs.livspace.com/165456-small/classical-sofa-1v2.jpg" alt="" class="img-responsive image-thumbs" data-image-id="cover-7" width="120px" height="72px" />
                        </li>

                        <li data-target='#coverImageSlider' data-slide-to='8' class='active'>
                            <img id="thumb_" src="http://imgs.livspace.com/165457-small/classical-sofa-1v2.jpg" alt="" class="img-responsive image-thumbs" data-image-id="cover-8" width="120px" height="72px" />
                        </li>

                    </ol>
                </div>
            </div>
        </div>

        <div id="pb-right-column">
            <div class="row">
                <div class="pinfo">
                    <h1 itemprop="name" class="h3 product-name">Marjorie 3 Seater Sofa
                    </h1>
                    <div class="separator"></div>
                    <div class="product-price-info row">
                        <div class="price-block col-xs-12">
                            <!-- prices -->
                            <p class="price">
                                <span id="product-price" class="h3">
                                        Rs 44,790
                                    </span>
                            </p>
                            <div id="disable_msg" class="cart" style="color: #F99;font-weight: bold; display:none;">
                                Out of stock
                            </div>
                        </div>
                    </div>
                </div>

                <!-- add to cart form-->
                <form id="buy_block" class="clearfix " action="http://www.livspace.com/cart" method="post">
                    <!-- hidden datas -->
               
                    <div style="padding:0px 0px">
                        <div id="fields-list">

                            <div class="field clearfix">
                                <div class="panel-heading" role="tab" id="heading-1">
                                    <div class="panel-title selected-swatch">
                                        <h4 class="text-muted">Legs</h4>
                                        <div class="sel-swatch-image" id="selected-material-panel-56880">
                                            <a href="/img/materials/big_images/1451.jpg" class="zoom-small">
                                                <img class="material-pic" src="http://cdn.livspace.com//img/materials/big_images/1451.jpg" />
                                                <!--
                                                                        --><span class="text-center material-name">Coco walnut finish</span>
                                            </a>
                                            <div id="selected-material-composition" class="material-composition"></div>
                                        </div>
                                        <div class="" id="customization_options_panel">

                                            <ul class="mat-list mat-list-1">
                                                <li class="material-swatch" id="" data-component-id="56880" data-option-id="970246" data-material-id="1452" data-material-name="Warm cedar finish" data-price="0" data-composition="" data-container="body" data-toggle="popover" data-placement="top" data-content="
                                                                            <img src='http://cdn.livspace.com//img/materials/big_images/1452.jpg' class='material_mouseover' height='145' width='100'/>
                                                                            <span class='material_mouseover_span'>
                                                                                <h6>Warm cedar finish</h6>
                                                                                <p>Solid wood stained to Warm cedar finish</p>
                                                                            </span>
                                                                            ">

                                                    <img src="http://cdn.livspace.com//img/materials/big_images/1452.jpg" />
                                                </li>
                                                <li class="material-swatch active" id="" data-component-id="56880" data-option-id="970245" data-material-id="1451" data-material-name="Coco walnut finish" data-price="0" data-composition="" data-container="body" data-toggle="popover" data-placement="top" data-content="
                                                                            <img src='http://cdn.livspace.com//img/materials/big_images/1451.jpg' class='material_mouseover' height='145' width='100'/>
                                                                            <span class='material_mouseover_span'>
                                                                                <h6>Coco walnut finish</h6>
                                                                                <p>Solid wood stained to Coco walnut finish</p>
                                                                            </span>
                                                                            ">

                                                    <img src="http://cdn.livspace.com//img/materials/big_images/1451.jpg" />
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field clearfix">
                                <div class="panel-heading" role="tab" id="heading-2">
                                    <div class="panel-title selected-swatch">
                                        <h4 class="text-muted">Upholstery</h4>
                                        <div class="sel-swatch-image" id="selected-material-panel-56881">
                                            <a href="/img/materials/big_images/1351.jpg" class="zoom-small">
                                                <img class="material-pic" src="http://cdn.livspace.com//img/materials/big_images/1351.jpg" />
                                                <!--
                                                                        --><span class="text-center material-name">Ash Grey</span>
                                            </a>
                                            <div id="selected-material-composition" class="material-composition"></div>
                                        </div>
                                        <div class="" id="customization_options_panel">

                                            <ul class="mat-list mat-list-2">
                                                <li style="margin-top:12px;width:210px;clear:both">Cotton Collection</li>
                                                <li class="material-swatch" id="" data-component-id="56881" data-option-id="970252" data-material-id="1350" data-material-name="Slate Grey" data-price="0" data-composition="" data-container="body" data-toggle="popover" data-placement="top" data-content="
                                                                        <img src='http://cdn.livspace.com//img/materials/big_images/1350.jpg' class='material_mouseover' height='145' width='100'/>
                                                                        <span class='material_mouseover_span'>
                                                                            <h6>Slate Grey</h6>
                                                                            <p>Medium weight, thick and soft cotton fabric reflecting relaxed lifestyle</p>
                                                                        </span>
                                                                        ">

                                                    <img src="http://cdn.livspace.com//img/materials/big_images/1350.jpg" />
                                                </li>
                                                <li class="clearfix" style="margin-top:15px;"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="buy-wrap">
                        <div class="buy">
                            
                            <div class="cart" style="" id="add_to_cart">
                                <input class="btn btn-primary" type="submit" name="Submit" value="ADD TO CART" />
                            </div>

                        </div>
                        <div class="delivery_info" style="">
                            <span><i class="icon ls-icon-shipping"></i></span>
                            <span style="margin: 0px 5px;">Free Delivery</span>
                            <span style="margin: 0px 5px;">|</span>
                            <span style="margin: 0px 5px;">Estimated delivery: Feb 14</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<section id="overview">
    <div class="container">
        <div class="row">
            <div class="overview-wrap-left">
                <div id="about">
                    <div class="desc">
                        <p dir="ltr">The artfully designed Marjorie three-seater, with its generously padded seat mounted on splayed legs, takes its inspiration from the 1960s. A blind tufted back is coupled with rolled shoulders that end in gentle swoop arms, all features together lending this piece a quiet majestic appeal. Blending in easily in transitional themes, this chair promises to make long hours of entertaining or lounging a comfortable experience.</p>
                        <p> </p>

                        <li dir="ltr">
                            <p dir="ltr">Beautifully crafted solid wood frame</p>
                        </li>
                        <li dir="ltr">
                            <p dir="ltr">Available in two finishes and multiple upholstery options</p>
                        </li>
                        <li dir="ltr">Well supported on splayed wooden legs</li>

                    </div>
                </div>

                <div id="info">
                    <h3 class="info-heading">Product Information</h3>
                    <div class="row">
                        <div class="product-info">
                            <div class="spec">
                                <span class="value">
                                                <span class="dimension-name">Product code</span>
                                <span class="dimension-value">SF3SCLS8167</span>
                                </span>
                                <span class="value">
                                                <span class="dimension-name">Armrest</span>
                                <span class="dimension-value">Yes</span>
                                </span>
                                <span class="value">
                                                <span class="dimension-name">Brand</span>
                                <span class="dimension-value">Livspace</span>
                                </span>
                                <span class="value">
                                                <span class="dimension-name">Cushion Type</span>
                                <span class="dimension-value">Soft</span>
                                </span>
                                <span class="value">
                                                <span class="dimension-name">Delivery within (weeks)</span>
                                <span class="dimension-value">5</span>
                                </span>
                                <span class="value">
                                                <span class="dimension-name">Leg Material</span>
                                <span class="dimension-value">Solid Wood</span>
                                </span>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="spec">
                                <span class="value">
                                                <span class="dimension-name">Primary Room</span>
                                <span class="dimension-value">Living</span>
                                </span>
                                <span class="value">
                                                <span class="dimension-name">Seating Capacity</span>
                                <span class="dimension-value">3</span>
                                </span>
                                <span class="value">
                                                <span class="dimension-name">Style</span>
                                <span class="dimension-value">Classical</span>
                                </span>
                                <span class="value">
                                                <span class="dimension-name">Upholstery Material</span>
                                <span class="dimension-value">Fabric</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="">
                    <div class="row">
                        <div class="" style="width: 100%;">
                            <div class="shipping-wrap col-xs-12">
                                <h3 class="title">Warranty &amp; Service</h3>
                                <div class="media">
                                    <div class="media-left" style="font-size:18px">
                                        <i class="media-object icon ls-icon-warranty"></i>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <p>We have got you covered. Livspace offers 3-year warranty on the sofa structure and 2-year warranty on the foam and cushion materials against any manufacturing defects, from the date of delivery. There is no warranty on the fabric used. The warranty does not cover natural wear and tear or damage caused by rough handling or using the product beyond its intended use. Natural wood characteristics such as variations in grain, color, mineral streaks and knots are not considered as defects. Reading care instructions is strongly recommended to ensure longevity. Report any defects to Livspace customer care, via phone or e-mail, within 10 days of the defect first coming into notice.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="shipping">
                    <div class="row">
                        <div class="shipping" style="width: 100%;">
                            <div class="shipping-wrap col-xs-12 col-md-6">
                                <h3 class="title">Shipping &amp; Installation</h3>
                                <div class="media">
                                    <div class="media-left">
                                        <i class="media-object icon ls-icon-shipping"></i>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">Free Shipping</h5>
                                        <span>Delivered in 8 weeks</span>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <i class="media-object icon ls-icon-whiteglove"></i>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">White glove delivery</h5>
                                        <span>Installation by Livspace trained professionals</span>
                                    </div>
                                </div>
                            </div>
                            <div class="shipping-wrap col-xs-12 col-md-6">
                                <h3 class="title">Cancellations &amp; Returns</h3>
                                <div class="media">
                                    <div class="media-left">
                                        <i class="media-object icon icon-undo"></i>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">Easy returns &amp; replacements</h5>
                                        <span>30 day hassle free returns. <a href="/service#returns">(Know more)</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="">
                    <div class="row">
                        <div class="shipping" style="width: 100%;">
                            <div class="shipping-wrap" style="width:100%">
                                <h3 class="title">Care &amp; Cleaning</h3>
                                <div class="media">
                                    <div class="media-left" style="font-size:3em">
                                        <i class="media-object icon ls-icon-flatpacked"></i>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <ul>
                                                <li dir="ltr">
                                                    <p dir="ltr">Avoid outdoor use and prolonged exposure to direct sunlight and moisture to prevent fading.</p>
                                                </li>
                                                <li dir="ltr">
                                                    <p dir="ltr">Dust and vacuum regularly using the upholstery attachment.</p>
                                                </li>
                                                <li dir="ltr">
                                                    <p dir="ltr">Periodic professional cleaning is recommended.</p>
                                                </li>
                                                <li dir="ltr">
                                                    <p dir="ltr">Flip, rotate and fluff cushions and pillows on a regular basis to allow even distribution of wear.</p>
                                                </li>
                                                <li dir="ltr">
                                                    <p dir="ltr">Keep sharp objects away that can potentially damage the upholstery.</p>
                                                </li>
                                                <li dir="ltr">
                                                    <p dir="ltr">In case of any stains or spillage on the upholstery, use a mild fabric cleaner. Testing on a hidden area first is recommended. Do not apply cleaner directly onto upholstery.</p>
                                                </li>
                                                <li dir="ltr">
                                                    <p dir="ltr">In case of stains on the wooden surfaces, gently rub the area with a solution of water and a mild cleaning agent. Wipe dry immediately. Avoid ammonia and alcohol-based cleaning products.</p>
                                                </li>
                                                <li dir="ltr">
                                                    <p dir="ltr">For durability and to protect against stains, use of Scotchgard fabric and upholstery protector is recommended.</p>
                                                </li>
                                                <li dir="ltr">
                                                    <p dir="ltr">For cleaning metallic surfaces, if any, clean with a damp cloth and wipe dry immediately. To renew shine, gently polish with oil. Testing on a hidden area first is recommended.</p>
                                                </li>
                                                <li dir="ltr">
                                                    <p dir="ltr">Avoid acidic, abrasive and corrosive cleaning products of all kinds.</p>
                                                </li>
                                                <li dir="ltr">
                                                    <p dir="ltr">Any hardware or hinges can be dusted with a soft brush.</p>
                                                </li>
                                                <li dir="ltr">
                                                    <p dir="ltr">Wood may nominally expand and contract with seasonal humidity changes. Although, we take strict precautions to make sure the wood is duly sealed.</p>
                                                </li>
                                                <li dir="ltr">
                                                    <p dir="ltr">Air and sunlight may change the color of natural wood. Occasionally rotating the items placed on your wood furniture will allow a more uniform color to develop.</p>
                                                </li>
                                                <li dir="ltr">For retouching of any kind, do not use polish or paint products on your own — only professional services recommended, which can however void warranty.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>

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
                            <p>Yes. Livspace caters to every customer’s style and individuality. We offer a wide range of interior decor and furniture selection for customizing fabric color, wood finish, material, and other optional features. Simply select from the options available from our product categories.</p>
                        </div>
                        <div class="faq-item">
                            <h5>Does Livspace send and deliver orders?</h5>
                            <p>
                                Yes. Livspace wants you to have the most convenient furniture and home interior shopping experience. We deliver to all points of Delhi, Mumbai and Bangalore. Stand by for more updates on other delivery destinations by continuing to visit our website.
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
                                Livspace aims to deliver all orders within 8-10 weeks upon order confirmation.
                            </p>
                        </div>
                        <div class="faq-item">
                            <h5>What if I received a damaged product upon delivery? What should I do?</h5>
                            <p>
                                Livspace only wants the best for you and that is why we make sure that you receive your orders in good shape. However, should there be any instance where you receive any damaged item, it must be immediately flagged by calling us at +91 8039 512 060 or mail us at care@livspace.com. Livspace will honor furniture returns/exchanges for items delivered with factory damages only. Please see the full scope of our return/exchange policy for more information.
                            </p>
                        </div>
                        <div class="faq-item">
                            <h5>How can I return or exchange the damaged furniture delivered to me?</h5>
                            <p>
                                Livspace will organize the collection and re-delivery of your order to reassure your satisfaction and experience shopping with us. For more assistance call us at +91 8039 512 060 or mail us at care@livspace.com.
                            </p>
                        </div>
                        <div class="faq-item">
                            <h5>What are your return policies?</h5>
                            <p>
                                We are more than happy to exchange the product for you if it is damaged. However, if that is not the case, any product once sold cannot be exchanged or returned.
                            </p>
                        </div>
                        <div class="faq-item">
                            <h5>Why should I buy from Livspace?</h5>
                            <p>
                                At Livspace, we strive to redefine how you design and decorate your home with our exquisite furniture, fittings and accessories. We also bring with us the expertise of some of the best designers from across the world to you online, which makes designing, decorating and furnishing your dream home personal and easy.
                            </p>
                        </div>
                    </div>
                    <a href="javascript:void($zopim.livechat.say('Hi, I need some help!'))" class="help btn btn-default"><i class="icon-comments"></i>More Questions?</a>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
