@extends('layouts.admin_layout')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col">
                    <h2 style="font-size: 30px;" class="mb-2">Update Profile</h2>
                </div>
                <div class="col text-right">
                    <a href="{{ route('setups.user.Pview') }}" class="btn btn-success"><i class="fa-solid fa-list"></i>
                        User List</a>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <form action="{{ route('setups.user.Pupdate',$data->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="full">Name</label>
                                            <input required type="text" name="name" class="form-control" value="{{$data->name}}">
                                            <font style="color: red;">
                                                {{ $errors->has('name') ? $errors->first('name') : '' }}</font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="pass">Mobile</label>
                                            <input required type="number" name="mobile" class="form-control" value="{{$data->mobile}}">
                                            <font style="color: red;">
                                                {{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="pass">Address</label>
                                            <input required type="text" name="address" class="form-control" value="{{$data->address}}">
                                            <font style="color: red;">
                                                {{ $errors->has('address') ? $errors->first('address') : '' }}</font>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Select UserType</label>
                                            <select required name="usertype" id="" class="form-control">
                                                <option>Select Usertype</option>
                                                <option value="admin" {{($data->usertype=="admin")?"selected":""}} >Admin</option>
                                                    <option value="Seller" {{($data->usertype=="Seller")?"selected":""}} >Seller</option>
                                                    <option value="Customer" {{($data->usertype=="Customer")?"selected":""}}>Customer</option>

                                            </select>
                                        </div>
                                    </div>
                                        <div class="col">

                                            <button type="submit" class="btn btn-info">Update Profile</button>

                                           {{--  @if (!empty($data))
                                                <input name="submit" type="submit" class="btn btn-primary"
                                                    value="Edit Class">
                                            @else
                                                <input name="submit" type="submit" class="btn btn-primary"
                                                    value="Add Class">
                                            @endif --}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    </div>
@endsection
