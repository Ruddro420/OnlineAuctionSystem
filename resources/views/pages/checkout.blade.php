@extends('layouts.admin_layout')
@section('content')
    <!-- Main content -->

    <div class="container">
      <div class="row">
        <div class="col">
            <!--Main layout-->
  <main class="pt-4">
    <div class="container wow fadeIn">
      <hr><hr>
      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Checkout Form</h2>

      <form action="{{ route('checkout.store',$data->id) }}" method="POST" enctype="multipart/form-data" >
      @csrf
      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            
<div class="card-body">


              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--firstName-->
                  <div class="md-form mb-3">
                    <input required type="text" id="firstName" name="firstName" class="form-control">
                    <label for="firstName" class="">First name</label>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <div class="md-form ">
                    <input required type="text" id="lastName" name="lastName" class="form-control">
                    <label for="lastName" class="">Last name</label>
                  </div>

                </div>
                <!--Grid column-->

              </div>
            
              <!--Grid row-->

              <!--email-->
              <div class="md-form mb-3">
                <input required type="text" id="email" class="form-control" name="email" placeholder="youremail@example.com">
                <label for="email" class="">Email (optional)</label>
              </div>

              <!--address-->
              <div class="md-form mb-3">
                <input required type="text" id="address" class="form-control" name="address" placeholder="1234 Main St">
                <label for="address" class="">Address</label>
              </div>

              <!--address-2-->
              <div class="md-form mb-3">
                <input type="text" id="address-2" class="form-control" name="address2" placeholder="Apartment or suite">
                <label for="address-2" class="">Address 2 (optional)</label>
              </div>

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4">

                  <label for="country">Country</label>
                  <select name="country" class="custom-select d-block w-100" id="country" required>
                    <option value="">Choose...</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="United States">United States</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid country.
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                  <label for="state">State</label>
                  <select name="state" class="custom-select d-block w-100" id="state" required>
                    <option value="">Choose...</option>
                    <option class="Rangpur">Rangpur</option>
                    <option class="California">California</option>
                  </select>
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                  <label for="zip">Zip</label>
                  <input name="zip" type="text" class="form-control" id="zip" placeholder="" required>
                  <div class="invalid-feedback">
                    Zip code required.
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

              <hr>

              <div class="custom-control custom-checkbox mt-3 mb-3">
                <input name="shipping_address" type="checkbox" class="custom-control-input" id="same-address">
                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
              </div>

              <hr>

              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="cashon" name="cashon" type="radio" class="custom-control-input" required>
                  <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                </div>
              </div>
              <hr class="mb-4">
              
            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">1</span>
          </h4>

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 style="text-transform: uppercase" class="my-0">{{$data->tittle}}</h6>
                <small class="text-muted">{{$data->description}}</small>
              </div>
              <span class="text-muted">{{$data->bidding_price}} Taka</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Vat 1% </h6>
                <small class="text-muted">Website Cost</small>
              </div>
              <span class="text-muted">{{$data->bidding_price * 0.01}} Taka</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (TAKA)</span>
              <strong>{{($data->bidding_price * 0.01) + ($data->bidding_price)}}</strong>
            </li>
          </ul>
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          <!-- Cart -->
        </div>
        <!--Grid column-->
      </form>
      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->
        </div>
      </div>
    </div>
  
    </section>

    <script>
    // Animations initialization
    new WOW().init();
    </script>

    </div>
@endsection
