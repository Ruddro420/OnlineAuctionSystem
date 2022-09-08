@extends('layouts.admin_layout')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col">
                    <h2 style="font-size: 30px;" class="mb-2">Manage Product</h2>
                </div>
                <div class="col text-right">
                    <a href="{{ route('product.upload.view') }}" class="btn btn-success"><i class="fa-solid fa-list"></i>
                        Product List</a>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <h3 class="mb-3">
                                        Add Product
                                </h3>
                                <form action="{{ route('product.upload.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                      <div class="form-group col-md-4">
                                            <label for="full">Product Tittle</label>
                                            <input required type="text" name="tittle" class="form-control">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Select Category</label>
                                            <select required name="category_id" id="category_id" class="form-control">
                                                <option>Select Category</option>
                                                @foreach ($category as $categorys)
                                                    <option value="{{$categorys->id}}">{{$categorys->category}}</option>
                                                    @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="pass">Asking Price</label>
                                            <input required type="number" name="price" class="form-control">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="pass">Bid Ending</label>
                                            <input class="form-control" name="deadline" type="datetime-local">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="pass">Product Image</label>
                                            <input class="form-control" name="image" type="file">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" type="text" name="description" id="description"></textarea>
                                        </div>
                                    </div>
                                        <div class="col">

                                            <button type="submit" class="btn btn-info">Add Product</button>

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
