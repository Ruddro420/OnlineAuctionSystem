@extends('layouts.app')

@section('content')



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
crossorigin="anonymous" referrerpolicy="no-referrer" />
 <!-- Theme style -->
 <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
 <!-- overlayScrollbars -->
 <link rel="stylesheet" href="{{ asset('admin/css/OverlayScrollbars.min.css') }}">
 <!-- DataTables -->
 <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">Present your business in a whole new way</h1>
                            <p class="lead text-white-50 mb-4">An auction is a sales event wherein potential buyers place competitive bids on assets or services either in an open or closed format. Auctions are popular </p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{route('login')}}">Get Started</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="{{route('register')}}">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section style="width: 100%" class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col text-center">
                        <h2 style="font-size: 30px; margin-top:50px; magin-bottom:50px" class="mb-2 fw-bolder">Bidding Product</h2>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{-- {{ route('product.upload.bid.store',$data->id) }} --}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            @if (is_countable($data) > 0)
                                            @foreach ($data as $key => $value)
                                            @if($value->approve==1)
                                          <div class="form-group col-md-4">
                                        <div class="card text-center">
                                          <div class="card-body p-3">
                                            <img style="height: 250px; width:400px;" src="{{(!empty($value->image))?url('admin/prf_img/'.$value->image): url('admin/img/no_img.png')}}"  srcset=""></td>
                                            <h3 style="font-size:20px; font-weight:500; margin-top:10px; margin-bottom:10px;"><b>TITTLE</b> : {{$value->tittle}}</h3> <hr>
                                            <p style="font-size:15px; font-weight:400; margin-top:10px; margin-bottom:10px;">{{$value->description}}</p> <hr>
                                            <span style="margin-top:10px;margin-bottom:10px;"><b>Asking Price :</b> {{$value->price}} Taka</span><hr>
                                            <span style="margin-top:10px;margin-bottom:10px;"><b>Category :</b>  {{$value['category_show']['category']}}</span><hr>
                                            <h5 style="margin-top:10px;margin-bottom:10px;"><b>Deadline :</b>  {{$value->deadline}} </h5><hr>
                                            <h5 style="margin-top:10px;margin-bottom:10px;"><b>Highest Bid :</b> {{$value->bidding_price}} </h5><hr>
                                            <h5 style="margin-top:10px;margin-bottom:10px;"><b>Bid Status : </b>{{($value->status==1)?'Open':'Closed'}}</h5><hr><br>

                                            @if($value->status==1)

                                            <div class="row">
                                              <div class="col-md-12 text-center">
                                                <a href="{{route('product.upload.bid.view' ,$value->id)}}" title="view" id="view" class="btn btn-info btn-block"><i class="fa fa-gavel" aria-hidden="true"></i> Bid Now</a>
                                              </div>
                                            </div>
                                            @endif
                                          </div>
                                        </div>
                                      </div>
                                      @endif
                                      @endforeach

                                      @endif
                                        </div>
                                        </form>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        @endsection
