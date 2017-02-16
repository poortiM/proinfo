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
                                    <a href="{{url('pro/edit')}}//product" class="col-md-6 btn btn-info"> Product Info </a>
                                    <a href="{{url('pro/edit-image')}}/{{$product->id}}/product" class="col-md-6 btn btn-default"> Product Photos </a>
                                </div>
                            </div>


                            {!! Form::model($product,['url' => 'pro/postEditProduct', 'files' => 'true']) !!} 
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
                                        <label>Product Name</label>
                                        
                                        {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Enter Name','required'=>true]) !!}
                                        <div class="spacer-10"></div>
                                    </div>

                                    <div class="col-xs-12">
                                        <label>Product Description</label>  
                                        {!! Form::textarea('description',null,['class' => 'form-control','placeholder' => 'Enter Description','required'=>true]) !!}
                                        <div class="spacer-10"></div>
                                    </div>

                                    <div class="col-xs-12">
                                        <label>Product Brand</label>  
                                        {!! Form::text('brand',null,['class' => 'form-control','placeholder' => 'Youtube Product Brand','required'=>true]) !!}
                                        <div class="spacer-10"></div>
                                    </div>

                                    <div class="col-xs-12">
                                        <label>Product Price</label>  
                                        {!! Form::text('price',null,['class' => 'form-control','placeholder' => 'Product Price','required'=>true]) !!}
                                        <div class="spacer-10"></div>
                                    </div>

                                    <div class="col-xs-12">
                                        <label>Category</label>  
                                        <select name="category" class="form-control category" required>
                                            <option value="">Select Category</option>
                                            @foreach($category as $c)
                                                <option value="{{$c->category}}">{{$c->category}}</option>
                                            @endforeach
                                        </select>
                                        <div class="spacer-10"></div>
                                    </div>

                                    <div class="col-xs-12">
                                        <label>Subcategory</label>  
                                        <select name="subcategory" class="form-control subcategory" required>
                                            <option value="">Select Subcategory</option>
                                            @foreach($category as $c)
                                                <option value="{{$c->id}}">{{$c->category}}</option>
                                            @endforeach
                                        </select>
                                        <div class="spacer-10"></div>
                                    </div>

                                    <div class="col-xs-3">
                                        <label>Product Length</label>  
                                        {!! Form::text('length',null,['class' => 'form-control','placeholder' => 'Product Length','required'=>true]) !!}
                                        <div class="spacer-10"></div>
                                    </div>

                                    <div class="col-xs-3">
                                        <label>Product Width</label>  
                                        {!! Form::text('width',null,['class' => 'form-control','placeholder' => 'Product Width','required'=>true]) !!}
                                        <div class="spacer-10"></div>
                                    </div>

                                    <div class="col-xs-3">
                                        <label>Product Depth</label>  
                                        {!! Form::text('depth',null,['class' => 'form-control','placeholder' => 'Product Depth','required'=>true]) !!}
                                        <div class="spacer-10"></div>
                                    </div>

                                    <div class="col-xs-3">
                                        <label>Product Weight</label>  
                                        {!! Form::text('weight',null,['class' => 'form-control','placeholder' => 'Product Weight','required'=>true]) !!}
                                        <div class="spacer-10"></div>
                                    </div> 

                                    <div class="col-xs-4">
                                        <label>Product Material</label>  
                                        {!! Form::text('material',null,['class' => 'form-control','placeholder' => 'Product Material','required'=>true]) !!}
                                        <div class="spacer-10"></div>
                                    </div>

                                    <div class="col-xs-4">
                                        <label>Product Color</label>  
                                        {!! Form::text('color',null,['class' => 'form-control','placeholder' => 'Product Color','required'=>true]) !!}
                                        <div class="spacer-10"></div>
                                    </div>

                                    <div class="col-xs-4">
                                        <label>Assembly Required</label>  
                                        {!! Form::text('assembly_required',null,['class' => 'form-control','placeholder' => 'Assembly Required','required'=>true]) !!}
                                        <div class="spacer-10"></div>
                                    </div>                                    
                                    
                                    <input type="hidden" name="product_id" value="{{$product->id}}">

                                    <div class="col-xs-12">
                                        <input type="submit" class="pull-right btn btn-info" value="Edit Product">
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