@extends('layouts.admin_layout')
@section('content')


            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Bidding List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <div class="row">
                    @if (Auth::user()->usertype=='admin' || Auth::user()->usertype=='Seller')
                    <div class="col text-right">
                    <a href="{{ route('product.upload.view') }}" class="btn btn-success"><i class="fa-solid fa-list"></i>
                        Product List</a>
                </div>
                @endif

                  </div>
                    <br>
                  <table id="example1" class="table table-bordered table-striped">

                    <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Bidder Name</th>
                      <th>Tittle</th>
                      <th>Category</th>
                      <th>Asking Price</th>
                      <th>Bidding Price</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @if (is_countable($data) > 0)
                      @foreach ($data as $key => $value)
                      @if($value->approve==1)
                    <tr>
                      <td>#{{$key+1}}</td>
                      <td style="color: red;font-weight:600;text-transform: uppercase;">{{$value->customer_name}}</td>
                      <td>{{$value->tittle}}</td>
                      <td>{{$value['category_show']['category']}}</td>
                      <td>{{$value->price}}</td>
                      <td>{{$value->bidding_price}}</td>
                      <td>
                        {{($value->status==1)?'Open':'Closed'}}
                      </td>
                      <td><a href="{{route('product.upload.bid.view' ,$value->id)}}" title="view" id="view" class="btn btn-info btn-block"><i class="fa fa-gavel" aria-hidden="true"></i></a></td>
                    </tr>
                    @endif
                    @endforeach

                      @endif
                    </tbody>

                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    @endsection
