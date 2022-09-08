@extends('layouts.admin_layout')
@section('content')


            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Manage User</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">

                    <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Status</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Address</th>
                      <th>UserType</th>
                      <th>Code</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @if (is_countable($data) > 0)
                      @foreach ($data as $key => $value)
                    <tr>
                      <td>#{{$key+1}}</td>
                      <td style="color:red">{{(@$value->status==1)?'Active':'Deactive'}}</td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->mobile}}</td>
                      <td>{{$value->address}}</td>
                      <td>{{$value->usertype}}</td>
                      <td>{{$value->code}}</td>
                      <td>
                        <a href="{{route('setups.user.Pedit' ,$value->id)}}" title="Edit" type="button" class="btn btn-success btn-sm"><i class="fa-solid fa-edit"></i></a>
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
