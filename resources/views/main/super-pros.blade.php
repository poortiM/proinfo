@extends('main.default')

@section('content')

<style type="text/css">
.input-field-superpros::-webkit-input-placeholder {
    color: black;
}
</style>


<div class="main">
    <div class="main-inner">
        <div class="content">
            <div class="mt-80" style="background:linear-gradient(to top, rgb(16, 16, 16), rgba(0, 0, 0, 0.73)),url({{url('images/super-pros-banner.jpg')}});background-size: cover;">
                <div class="super-pro-review">
                    <div class="text-center pt-30" style="padding-top: 137px;">
                        <img src="{{url('images/superpros-lg-icon.png')}}">
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <h1>" Being a superpro,basically means exposure to quality leads !"</h1>
                            <h2><i>Claudia, SuperPro</i></h2>
                        </div>

                        <div style="display:block;margin-top:200px;clear: both;"></div>
                        <div class="col-sm-6">
                            <div class="superpro-feature"></div>
                        </div>

                        <div class="col-sm-6">
                            <div class="superpro-bpro">
                                <center><a href="#become-super-pros">Become A SuperPro</a></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="superpro-status"> </div>
                </div>
            </div>

            <div id="become-super-pros" class="fullwidth" style="background:#f9b412;margin-top: 18px;">
                <div class="container">
                    <h1 class="text-center" style="margin-bottom: 15px;margin-top: 45px;">Become A Superpro</h1>
                    <h1 class="text-center" style="font-style: italic;">All We Need From You</h1>
                    <div class="row">
                    @if(!empty(Auth::guard('web')->user()->name))
                        @php $name = Auth::guard('web')->user()->name; @endphp
                    @else
                        @php $name = ''; @endphp
                    @endif

                    @if(!empty(Auth::guard('web')->user()->business_name))
                        @php $business_name = Auth::guard('web')->user()->business_name; @endphp
                    @else
                        @php $business_name = ''; @endphp
                    @endif

                    @if(!empty(Auth::guard('web')->user()->category))
                        @php $category = Auth::guard('web')->user()->category; @endphp
                    @else
                        @php $category = ''; @endphp
                    @endif

                    @if(!empty(Auth::guard('web')->user()->mobile_number))
                        @php $mobile_number = Auth::guard('web')->user()->mobile_number; @endphp
                    @else
                        @php $mobile_number = ''; @endphp
                    @endif

                    @if(!empty(Auth::guard('web')->user()->email))
                        @php $email = Auth::guard('web')->user()->email; @endphp
                    @else
                        @php $email = ''; @endphp
                    @endif
                    @if(Session::has('info'))
                        <div class="spacer-20"></div>
                        <div class="col-md-12 col-sm-12 col-md-offset-3 alert alert-success">
                            {{ Session::get('info') }}
                        </div>
                    @endif

                    <form action="{{url('pro/ajax/superPros')}}" id="superPros" method="POST">
                        {{csrf_field()}}
                        <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12" style="margin-bottom: 45px;">
                            <div class="col-md-6 col-sm-6">

                            </div>
                            <div class="col-md-6 col-sm-6">

                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="whyUsPoints">
                                    <input type="text" name="name" class="form-control input-field-superpros" style="background: #f9b412;border: 2px solid black;color: black;" placeholder="Name" value="{{ $name }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="whyUsPoints">
                                    <input type="text" name="position" class="form-control input-field-superpros" style="background: #f9b412;border: 2px solid black;color: black;" placeholder="Position" required>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="whyUsPoints">
                                    <input type="text" name="company_name" class="form-control input-field-superpros" style="background: #f9b412;border: 2px solid black;color: black;" placeholder="Company Name" value="{{ $business_name }}" required>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="whyUsPoints">
                                    <select name="category" class="form-control input-field-superpros" style="background: #f9b412;border: 2px solid black;color: black;" required>
                                        <option value="">Select category</option>
                                        @foreach($categories as $c)
                                            <option value="{{$c->category}}">{{$c->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="whyUsPoints">
                                    <input type="text" name="mobile_number" class="form-control input-field-superpros" style="background: #f9b412;border: 2px solid black;color: black;" placeholder="Phone Number" value="{{ $mobile_number }}" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="whyUsPoints">
                                    <input type="text" name="" class="form-control" style="background: #f9b412;border: 2px solid #f9b412;color: black;" placeholder="" disabled="true">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="whyUsPoints">
                                    <input type="text" name="email" class="form-control input-field-superpros" style="background: #f9b412;border: 2px solid black;color: black;" placeholder="Email" value="{{ $email }}" required>
                                </div>
                            </div>

                            @if(Auth::guard('web')->check())
                            <div class="col-md-6 col-sm-6">
                                <div class="whyUsPoints" style="width: 54%;">
                                    <input type="submit" name="" class="form-control" style="background: #f9b412;border: 2px solid black;color: black;">
                                </div>
                            </div>
                            @else
                            <div class="col-md-6 col-sm-6">
                                <div class="whyUsPoints" style="width: 54%;">
                                    <a href="{{url('pro/login?redirect')}}={{Request::url()}}" type="submit" name="" class="form-control" style="background: #f9b412;border: 2px solid black;color: black;">Submit</a>
                                </div>
                            </div>
                            @endif

                        </div>
                    </form>
                    </div>
                </div>
            </div>



    </div><!-- /.content -->
</div><!-- /.main-inner -->



@stop
