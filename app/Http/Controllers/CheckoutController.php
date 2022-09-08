<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UploadProduct;
use App\Models\Category;
use App\Models\BidNotice;
use App\Models\Checkout;
use DB;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = UploadProduct::find($id);
        return view('pages.checkout',compact('data'));
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function thankyou()
    {
        $product = UploadProduct::all();
        $data = Checkout::where('user_id',Auth::user()->id)->get();
        return view('pages.thankyou',compact('data','product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$id)
    {
        $data = New Checkout;
        $data->user_id = Auth::user()->id;
        $data->firstName = $request->firstName;
        $data->lastName = $request->lastName;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->address2 = $request->address2;
        $data->country = $request->country;
        $data->state = $request->state;
        $data->zip = $request->zip;
        $data->shipping_address = $request->shipping_address;
        $data->cashon = $request->cashon;

        $product = UploadProduct::find($id);
        $data->bidding_price = $product->bidding_price + $product->bidding_price * 0.01;
        $data->order_id = $product->order_id;
        $data->save();

        notify()->success('Product Order Successfully!');
        return redirect()->route('checkout.thankyou');

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($order_id)
    {
        $data =DB::table('checkouts')
        ->leftJoin('upload_products','checkouts.order_id', '=','upload_products.order_id')
        ->where('checkouts.order_id', $order_id);
        DB::table('upload_products')->where('order_id', $order_id)->delete();
        $data->delete();
        notify()->success('Order Confirm Successfully !');
        return redirect()->route('admin.dashboard');
    }
}
