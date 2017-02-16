@extends('main.default')

@section('content')



@if(!empty($vendor->cover))
    {{--*/ $cover = asset('uploads/cover/').'/'.$vendor->cover /*--}}
@endif

<div class="main">
   <div class="container">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                  <div class="contaniner-fluid" style="margin-top: 39px;">
                    <table class="table table-bordered table-striped">
                      <colgroup>
                        <col class="col-md-6">
                        <col class="col-md-6">
                      </colgroup>
                      <tbody>
                        <tr>
                          <td align="center" style="background: white;"><a href="{{url('pro/analytics')}}"><h4>Views <span class="badge">{{(count($data['search_view']))+(count($data['profile_view'])+(count($data['project_view'])))}}</span></h4></a></td>
                          <td align="center" style="background: #f9b412;"><a href="{{url('pro/contact-analytics')}}"><h4>Contacts <span class="badge">{{(count($data['email']))+(count($data['email']))}}</span></h4></a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="row"> </div>

                  <div class="btn-group btn-group-justified" role="group" aria-label="...">
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default">Search Result Views <span class="label label-success">{{count($data['email'])}}</span></button>
                      </div>
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default">Contact Views <span class="label label-success">{{count($data['contact'])}}</span></button>
                      </div>  
                  </div>

                  <div class="row hr"> </div>

                  <div class="col-md-12">
                      <div id="container" ></div>
                  </div>

                  <div class="row hr"> </div>

                  <div class="col-md-12">
                      <div id="container-graph" ></div>
                  </div>
                  
                </div>

                <div class="row hr"> </div>
            </div>
        </div>
    </div>
@stop
