@extends('layouts.admin_layout')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col">
                    <h2 style="font-size: 30px;" class="mb-2">Manage User</h2>
                </div>
                <div class="col text-right">
                    <a href="{{ route('setups.user.view') }}" class="btn btn-success"><i class="fa-solid fa-list"></i>
                        User List</a>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <h3 class="mb-3">
                                        Add User
                                </h3>
                                <form action="{{ route('setups.user.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="">Select Status</label>
                                            <select required name="status" id="status" class="form-control">
                                                <option>Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Deactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="full">Name</label>
                                            <input required type="text" name="name" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="pass">Email</label>
                                            <input required type="email" name="email" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="pass">Mobile</label>
                                            <input required type="number" name="mobile" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="pass">Address</label>
                                            <input required type="text" name="address" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Select UserType</label>
                                            <select required name="usertype" id="usertype" class="form-control" aria-label="Default select example">
                                                <option>Select UserType</option>
                                                    <option value="Seller">Seller</option>
                                                    <option value="Customer">Customer</option>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="col">

                                            <button type="submit" class="btn btn-info">Add User</button>

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
