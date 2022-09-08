<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UploadProduct;
use App\Models\Category;
use App\Models\BidNotice;
use App\Models\Checkout;

class DashboardController extends Controller
{
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $maxValue = UploadProduct::orderBy('bidding_price', 'desc')->value('bidding_price');
        $categorys = Category::all()->count();
        $products = UploadProduct::where('status','1')->count();
        $users = User::where('status','1')->count();
        $notice = BidNotice::all();
        $noticeCustomer = UploadProduct::all();
        $checkout = Checkout::all();
        return view('pages.admin.dashboard',compact('users','products','categorys','maxValue','notice','noticeCustomer','checkout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        $data = BidNotice::find($id);
        $data->delete();
        return redirect()->route('admin.dashboard');
    }
}
