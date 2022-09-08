@extends('layouts.admin_layout')
@section('content')

    <!-- Main content -->

    <div class="container mt-5 mb-5">

      <div class="row d-flex justify-content-center">

          <div class="col-md-8">

              <div class="card">

                      <div class="invoice p-5">

                          <span class="font-weight-bold d-block mt-4">Hello, {{Auth::user()->name}}</span>

                          <span>We Will Contact You</span>

                          <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">

                              <table class="table table-borderless">
                                  
                                  <tbody>
                                    
                                    @foreach ($data as $key => $value)

                                    @foreach ($product as $keyproduct => $productvalue)

                                    @if($value->order_id == $productvalue->order_id)
                                    
                                    
                                      <tr>
                                          <td>
                                              <div class="py-2">

                                                  <span class="d-block text-muted">Order Date</span>
                                              <span>{{$value->created_at}}</span>
                                                  
                                              </div>
                                          </td>

                                          <td>
                                              <div class="py-2">

                                                  <span class="d-block text-muted">Order No</span>
                                              <span>AMTS{{$value->order_id}}</span>
                                                  
                                              </div>
                                          </td>

                                          <td>
                                              <div class="py-2">

                                                  <span class="d-block text-muted">Payment(Cash On)</span>
                                                  <span>{{$value->bidding_price}} Taka</span>
                                                  
                                              </div>
                                          </td>

                                          <td>
                                              <div class="py-2">

                                                  <span class="d-block text-muted">Shiping Address</span>
                                              <span>{{$value->address}}</span>
                                                  
                                              </div>
                                          </td>
                                        </tr> 
                                      @endif
                                            
                                      @endforeach
                                      
                                      @endforeach
                                      
                                  </tbody>

                              </table>
                              
                          </div>


      </div>
              
          </div>
          
      </div>
      
  </div>
    </div>

    <!-- Main content -->


@endsection
