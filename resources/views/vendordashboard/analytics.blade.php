@extends('main.default')

@section('content')

@include('vendordashboard.cover-section')

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
                    <!-- <tr>
                      <td align="center" style="background: white;"><a href="{{url('pro/analytics')}}"><h4>Views <span class="badge">{{(count($data['search_view']))+(count($data['profile_view'])+(count($data['project_view'])))}}</span></h4></a></td>
                      <td align="center" style="background: #f9b412;"><a href="{{url('pro/contact-analytics')}}"><h4>Contacts <span class="badge">{{(count($data['email']))+(count($data['email']))}}</span></h4></a></td>
                    </tr> -->
                  </tbody>
                </table>
              </div>

              <div class="row"> </div>

              <div class="btn-group btn-group-justified" role="group" aria-label="...">
                  <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default">Search Result Views <span class="label label-success">{{count($data['search_view'])}}</span></button>
                  </div>
                  <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default">Profile Views <span class="label label-success">{{count($data['profile_view'])}}</span></button>
                  </div>
                  <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default">Project Views <span class="label label-success">{{count($data['project_view'])}}</span></button>
                  </div>
               </div>

               <div class="row hr"> </div>

               <div class="col-md-9">
                  <div id="container" ></div>
               </div>
              
               <div class="col-md-3">
                <div class="bs-example">
                    <ul class="nav nav-tabs">
                        <li><a data-toggle="tab" href="#7Day">7 Days</a></li>
                        <li class="active"><a data-toggle="tab" href="#30Day">30 Days</a></li>
                        <li><a data-toggle="tab" href="#All">All</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="7Day" class="tab-pane fade in active">
                            <div class="bs-example" data-example-id="list-group-custom-content">
                                <div class="list-group">
                                    <center>
                                      <a href="#" class="list-group-item active">
                                          <h4 class="list-group-item-heading">Search Results</h4>
                                          <p class="list-group-item-text">{{count($data['search_view'])}}</p>
                                      </a>
                                      <a href="#" class="list-group-item">
                                          <h4 class="list-group-item-heading">Profile View</h4>
                                          <p class="list-group-item-text">{{count($data['profile_view'])}}</p>
                                      </a>
                                      <a href="#" class="list-group-item">
                                          <h4 class="list-group-item-heading">Project View</h4>
                                          <p class="list-group-item-text">{{count($data['project_view'])}}</p>
                                      </a>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div id="30Day" class="tab-pane fade">
                            <div class="bs-example" data-example-id="list-group-custom-content">
                                <div class="list-group">
                                    <center>
                                      <a href="#" class="list-group-item active">
                                          <h4 class="list-group-item-heading">Search Results</h4>
                                          <p class="list-group-item-text">{{count($data['search_view'])}}</p>
                                      </a>
                                      <a href="#" class="list-group-item">
                                          <h4 class="list-group-item-heading">Profile View</h4>
                                          <p class="list-group-item-text">{{count($data['profile_view'])}}</p>
                                      </a>
                                      <a href="#" class="list-group-item">
                                          <h4 class="list-group-item-heading">Project View</h4>
                                          <p class="list-group-item-text">{{count($data['project_view'])}}</p>
                                      </a>
                                    </center>
                                </div>
                            </div>
                        </div>

                        <div id="All" class="tab-pane fade">
                            <div class="bs-example" data-example-id="list-group-custom-content">
                                <div class="list-group">
                                  <center>
                                    <a href="#" class="list-group-item active">
                                        <h4 class="list-group-item-heading">Search Results</h4>
                                        <p class="list-group-item-text">{{count($data['search_view'])}}</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <h4 class="list-group-item-heading">Profile View</h4>
                                        <p class="list-group-item-text">{{count($data['profile_view'])}}</p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <h4 class="list-group-item-heading">Project View</h4>
                                        <p class="list-group-item-text">{{count($data['project_view'])}}</p>
                                    </a>
                                  </center>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
               </div>

            </div>

            <div class="row hr"> </div>
          </div>
      </div>
    </div>
@stop
