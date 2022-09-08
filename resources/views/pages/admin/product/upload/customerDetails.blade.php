@extends('layouts.admin_layout')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col">
                    <h2 style="font-size: 30px;" class="mb-2">Customer Details</h2>
                </div>
                <div class="col text-right">
                    <a href="{{ route('product.upload.view') }}" class="btn btn-success"><i class="fa-solid fa-list"></i>
                        Product List</a>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <form {{-- action="{{ route('product.upload.bid.store',$data->id) }}" method="POST"
                                    enctype="multipart/form-data" --}}>
                                    @csrf
                                    <div class="">
                                      <div class="">
                                    <div class="card text-center">
                                      <div class="card-body p-3">
                                        <img style="height: 250px; width:500px;" src="{{(!empty($data->image))?url('admin/prf_img/'.$data->image): url('admin/img/no_img.png')}}"  srcset=""></td>
                                        <h3 style="font-size:20px; font-weight:500; margin-top:10px; margin-bottom:10px;"><b>TITTLE</b> : {{$data->tittle}}</h3> <hr>
                                        <p style="font-size:15px; font-weight:400; margin-top:10px; margin-bottom:10px;">{{$data->description}}</p> <hr>
                                        <span style="margin-top:10px;margin-bottom:10px;"><b>Asking Price :</b> {{$data->price}} Taka</span><hr>
                                        <span style="margin-top:10px;margin-bottom:10px;"><b>Category :</b>  {{$data['category_show']['category']}}</span><hr>
                                        <h5 style="margin-top:10px;margin-bottom:10px;"><b>Deadline :</b>  {{$data->deadline}} </h5><hr>
                                        <h5 style="margin-top:10px;margin-bottom:10px;"><b>Highest Bid :</b> {{$data->bidding_price}} </h5><hr> <br>
                                      </div>
                                    </div>
                                  </div>
                                    </div>

                                    </form>
                                    </div>
                                    <div class="col-md-4">

                                    </div>

                                    {{-- New Colm Start Here --}}

                                    <div style="margin-top: 100px;" class="col-md-4">
                                     <h1 style="text-align:Center;font-size:25px; font-weight:600; margin-bottom:10px;">Customer Details</h1>
                                      <div class="">
                                        <div class="">
                                      <div class="card text-center">
                                        <div class="card-body p-3">
                                          <div style="text-align: center !important;">
                                            <img class="hover" style="height: 150px; width:150px; border: 2px solid #3DA3E5; border-radius: 100%; display: inline-block;" src="{{(!empty($data->prf_img))?url('admin/prf_img/'.$data->prf_img): url('admin/img/customer_img.jpg')}}"  srcset="">
                                          </div>

                                          <h3 style="font-size:20px; font-weight:500; margin-top:10px; margin-bottom:10px;"><b>Name</b> : {{$data->customer_name}}</h3> <hr>
                                          <span style="margin-top:10px;margin-bottom:10px;"><b>Email Address :</b> {{$data->customer_email}}</span><hr>
                                          <h5 style="margin-top:10px;margin-bottom:10px;"><b>Phone Number :</b>  {{$data->customer_mobile}} </h5><hr>
                                          <h5 style="margin-top:10px;margin-bottom:10px;"><b>Home Town :</b> {{$data->customer_addr}} </h5><hr> <br>

                                            <div class="col-md-12 text-center">
                                             <a class="btn btn-danger btn-block" href="mailto:{{$data->customer_email}}">CONTACT MAIL DIRECTLY</a>
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
    </section>

    </div>
@endsection
