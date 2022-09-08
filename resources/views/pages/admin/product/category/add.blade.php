@extends('layouts.admin_layout')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col">
                    <h2 style="font-size: 30px;" class="mb-2">Manage Product Category</h2>
                </div>
                <div class="col text-right">
                    <a href="{{ route('product.category.view') }}" class="btn btn-success"><i class="fa-solid fa-list"></i>
                        Category List</a>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <h3 class="mb-3">
                                    @if (!empty($data))
                                        Edit Product Category
                                    @else
                                        Add Product Category
                                    @endif

                                </h3>
                                <form action="{{ (@$data)?route('product.category.update',$data->id):route('product.category.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <input value="{{(@$data)?$data->category:''}}" name="category" type="text" class="form-control"
                                                placeholder="Category Enter Here">
                                            <font style="color: red;">
                                                {{ $errors->has('category') ? $errors->first('category') : '' }}</font>
                                        </div>
                                        <div class="col">

                                            <button type="submit" class="btn btn-info">{{(@$data)?'Update Category':'Add Category'}}</button>

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
