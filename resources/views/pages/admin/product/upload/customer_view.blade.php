@extends('layouts.admin_layout')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col">
                    <h2 style="font-size: 30px;" class="mb-2">Bidding Product</h2>
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
                                        <img style="height: 250px; width:500px;" src="{{(!empty($value->image))?url('admin/prf_img/'.$value->image): url('admin/img/no_img.png')}}"  srcset=""></td>
                                        <h3 style="font-size:20px; font-weight:500; margin-top:10px; margin-bottom:10px;"><b>TITTLE</b> : {{$value->tittle}}</h3> <hr>
                                        <p style="font-size:15px; font-weight:400; margin-top:10px; margin-bottom:10px;">{{$value->description}}</p> <hr>
                                        <span style="margin-top:10px;margin-bottom:10px;"><b>Asking Price :</b> {{$value->price}} Taka</span><hr>
                                        <span style="margin-top:10px;margin-bottom:10px;"><b>Category :</b>  {{$value['category_show']['category']}}</span><hr>
                                        <h5 style="margin-top:10px;margin-bottom:10px;"><b>Deadline :</b>  {{$value->deadline}} </h5><hr>
                                        <h5 style="margin-top:10px;margin-bottom:10px;"><b>Highest Bid :</b> {{$value->bidding_price}} </h5><hr>
                                        <h5 style="margin-top:10px;margin-bottom:10px;"><b>Bid Status : </b>{{($value->status==1)?'Open':'Closed'}}</h5><hr><br>

                                        @if($value->status==1 || Auth::user()->usertype=='admin')

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

    </div>
@endsection
