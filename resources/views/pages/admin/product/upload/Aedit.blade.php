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
                    <a href="{{ route('product.upload.Aview') }}" class="btn btn-success"><i class="fa-solid fa-list"></i>
                        Product List</a>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <form action="{{ route('product.upload.Aupdate',$allData->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                              <label for="full">Product Tittle</label>
                                              <input value="{{$allData->tittle}}" required type="text" name="tittle" class="form-control">
                                          </div>

                                          <div class="form-group col-md-5">
                                              <label for="pass">Asking Price</label>
                                              <input value="{{$allData->price}}" required type="number" name="price" class="form-control">
                                          </div>
                                          <div class="form-group col-md-2">
                                            <label for="bid">Bid Status</label>
                                            <select required name="status" id="status" class="form-control">
                                                <option value="">Select Status</option>

                                                    <option value="1" {{($allData->status=="1")?"selected":""}} >Active</option>
                                                    <option value="0" {{($allData->status=="0")?"selected":""}}>Closed</option>

                                            </select>
                                        </div>

                                          <div class="form-group col-md-5">
                                              <label for="pass">Bid Ending</label>
                                              <input value="{{$allData->deadline}}" class="form-control" name="deadline" type="datetime-local">
                                          </div>
                                          <div class="form-group col-md-5">
                                              <label for="pass">Product Image</label>
                                              <input class="form-control" name="image" type="file">
                                          </div>

                                          @if(Auth::user()->usertype=="admin")
                                          <div class="form-group col-md-2">
                                            <label for="bid">Product Approval</label>
                                            <select required name="approve" id="approve" class="form-control">
                                                <option value="">Select Approval</option>

                                                    <option value="1" {{($allData->approve=="1")?"selected":""}} >Approve</option>
                                                    <option value="0" {{($allData->approve=="0")?"selected":""}}>Discard</option>

                                            </select>
                                        </div>
                                        @endif

                                          <div class="form-group col-md-12">
                                              <label for="description">Description</label>
                                              <textarea value="" class="form-control" type="text" name="description" id="description">{{$allData->description}}</textarea>
                                          </div>
                                      </div>
                                        <div class="col">

                                            <button type="submit" class="btn btn-info">Update Product</button>

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
