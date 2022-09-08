@extends('layouts.admin_layout')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (Auth::user()->status=='0')
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 style="font-size:20px; font-weight:600;">Something Wrong!!</h1>
                            <br>
                            <p style="color:red; line-height:20px;">You account is Blocked</p>

                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if (Auth::user()->status=='1')
            <div classs="container p-5 text-center">
                <div class="row no-gutters">
                    <div class="col-lg-5 col-md-12">
                        <div class="alert alert-success fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="True">&times;</span>
                              </button>
                             <h4 class="alert-heading">Well done! <p>You Account Is Activate Now</p></h4>
                              
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- Small boxes (Stat box) -->
            <div class="row">
                
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3> {{$notice->count();}}
                            </h3>
                            <p>Notification</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3> {{$products}}
                                </h3>

                            <p>Total Product</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{$categorys}}</h3>

                            <p>Total Categories</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$maxValue}} Taka</h3>

                            <p>Highest Bidding price</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        
                    </div>
                </div>
            </div>

                <div class="row">
                    <div class="col">
            {{-- Notification --}}

            @if (Auth::user()->usertype=='admin' || Auth::user()->usertype=='Seller' && Auth::user()->status=='1')
            <h3 style="font-size: 20px; font-weight:600">Notification List</h3> <hr> <br>
            @if (is_countable($notice) > 0)
            @foreach ($notice as $key => $value)
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <a href="{{route('notice.delete' ,$value->id)}}" title="Delete" id="delete" class="btn btn-danger btn-sm mr-auto"><i class="far fa-trash-alt"></i></a>

                    <td><strong>{{$value->customer_name}}</strong> Bid <strong>{{$value->tittle}}</strong> Product <strong>{{$value->bidding_price}}</strong> Taka</td>
              </div>
              @endforeach
              @endif
              @endif
             </div>
                {{-- Notification End --}}
                <div class="col">
                {{-- Notification --}}

            @if (Auth::user()->usertype=='admin' || Auth::user()->usertype=='Seller' && Auth::user()->status=='1')
                    <h3 style="font-size: 20px; font-weight:600">Order List</h3> <hr> <br>
            @if (is_countable($checkout) > 0)
            @foreach ($checkout as $key => $value)
            <div class="alert alert-dark alert-dismissible fade show" role="alert">

               {{--  <a href="{{route('checkout.delete' ,$value->order_id)}}" title="Delete" id="delete" class="btn btn-success btn-sm mr-auto"><i class="fa fa-check"></i></a> --}}



            <form action={{route('checkout.delete' ,$value->order_id)}} method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" name="submit" value="Confirm" class="btn btn-success">
            </form>






                    <td><strong>{{$value->firstName}}</strong> Order Your Product <strong>AMTS{{$value->order_id}}</strong> Price <strong>{{$value->bidding_price}}</strong> Taka</td>
              </div>
              @endforeach
              @endif

              @endif
                    </div>
                </div>


              {{-- Notification for CUSTOMER  --}}

              @if (Auth::user()->usertype=='admin' || Auth::user()->usertype=='Customer' && Auth::user()->status=='1')

              @foreach ($noticeCustomer as $key => $value)
              
              @if($value->status==0 && $value->customer_email == Auth::user()->email)
              <div class="alert alert-warning alert-dismissible fade show w-100" role="alert">

                      <td><strong>Congratulations! You are the Winner !!  </strong> Product Name  (<strong style="text-transform: uppercase;">{{$value->tittle}}</strong> ) Bidding Price (<strong>{{$value->bidding_price}}</strong>) Taka , at {{$value->updated_at}}</strong></td> 
                      
                      <a href="{{route('checkout.index' ,$value->id)}}" title="view" id="view" class="btn btn-danger btn-sm mr-auto">Buy Now</a>
                      
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                @endif
                @endforeach
                @endif
  
              {{-- Notification End --}}







        </div>
    </section>

    </div>
@endsection
