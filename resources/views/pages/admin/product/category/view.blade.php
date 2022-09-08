@extends('layouts.admin_layout')
@section('content')


            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Category List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <div class="row">
                    <div class="col text-right mb-3">
                         <a href="{{route('product.category.add')}}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Add Category</a>
                    </div>
                  </div>
                    
                  <table id="example1" class="table table-bordered table-striped">
                    
                    <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Category Name</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @if (is_countable($data) > 0)
                      @foreach ($data as $key =>$value)
                          
                      
                      <tr>
                      <td>#{{$key+1}}</td>
                      <td style="text-transform: capitalize;">{{$value->category}}</td>
                      <td>
                        <a href="{{route('product.category.edit' ,$value->id)}}" title="Edit" type="button" class="btn btn-success"><i class="fa-solid fa-edit"></i></a>
                        
                        <a href="{{route('product.category.delete' ,$value->id)}}" title="Delete" id="delete" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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