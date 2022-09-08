@extends('layouts.admin_layout')
@section('content')


            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Manage Product</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                {{--   <div class="row">
                    <div class="col text-right mb-3">
                         <a href="{{route('product.upload.add')}}" class="btn btn-success"><i class="fa-solid fa-plus"></i>Add Product</a>
                    </div>
                  </div> --}}
                    
                  <table id="example1" class="table table-bordered table-striped">
                    
                    <thead>
                    <tr>
                      <th>SL.</th>
                      <th>B.Name</th>
                      <th>B.Price</th>
                      <th>Tittle</th>
                      <th>Category</th>
                      <th>A.Price</th>
                      <th>Deadline</th>
                      <th>Approve</th>
                      <th>Image</th>
                      <th>Report</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @if (is_countable($data) > 0)
                      @foreach ($data as $key => $value)
                    <tr>
                      <td>#{{$key+1}}</td>
                      <td style="color: rgb(238, 20, 30);font-weight:600;text-transform: uppercase; font-size:12px;">{{$value->customer_name}}</td>
                      <td style="color: red;font-weight:600;text-transform: uppercase; font-size:12px;">{{$value->bidding_price}}</td>
                      <td>{{$value->tittle}}</td>
                      <td>{{$value['category_show']['category']}}</td>
                      <td>{{$value->price}}</td>
                      <td>{{$value->deadline}}</td>
                      <td>{{(@$value->approve==1)?'Approved':'Pending'}}</td>
                      <td><img style="height: 80px; width:70px;" src="{{(!empty($value->image))?url('admin/prf_img/'.$value->image): url('admin/img/no_img.png')}}"  srcset=""></td>
                      <td>{{$value->report}}</td>
                      <td>
                        <a href="{{route('product.upload.Aedit' ,$value->id)}}" title="Edit" type="button" class="btn btn-success btn-sm"><i class="fa-solid fa-edit"></i></a>
                        
                        <a href="{{route('product.upload.delete' ,$value->id)}}" title="Delete" id="delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>

                        <a href="{{route('product.upload.customer.details' ,$value->id)}}" title="view" type="button" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>

                        @if (Auth::user()->usertype=='admin' || Auth::user()->usertype=='Customer')
                          <a href="{{route('product.upload.bid.view' ,$value->id)}}" title="view" id="view" class="btn btn-dark btn-sm"><i class="fa fa-gavel" aria-hidden="true"></i></a>
                          @endif
                      </td>
                    </tr>
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