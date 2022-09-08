<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\UploadProduct;
use App\Models\Category;
use App\Models\User;
use App\Models\BidNotice;

class ProductUpload extends Controller
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
    public function view()
    {

        $data = UploadProduct::where('user_id',Auth::user()->id)->get();
        return view('pages.admin.product.upload.view',compact('data'));
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Aview()
    {

        $data = UploadProduct::all();
        return view('pages.admin.product.upload.Aview',compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customerView()
    {
        $data = UploadProduct::all();
        return view('pages.admin.product.upload.customer_view',compact('data'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bidList()
    {
        $data = UploadProduct::all();
        return view('pages.admin.product.upload.bid_list',compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bidView(Request $request , $id)
    {
        $user = User::all();
        $data = UploadProduct::find($id);
        return view('pages.admin.product.upload.bid',compact('data','user'));
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customerdetails(Request $request , $id)
    {
        $user = User::all();
        $data = UploadProduct::find($id);
        return view('pages.admin.product.upload.customerDetails',compact('data','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $data['allData'] = UploadProduct::all();
        $data['category'] = Category::all();
        return view('pages.admin.product.upload.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $code = rand(0000,9999);
        $data = new UploadProduct;
        $data->user_id = Auth::user()->id;
        $data->tittle = $request->tittle;
        $data->category_id = $request->category_id;
        $data->price = $request->price;
        $data->bidding_price = $request->price;
        $data->deadline = $request->deadline;
        $data->description = $request->description;
        $data->order_id = $code;
        $data->name = Auth::user()->name;
        $data->email = Auth::user()->email;
        $data->mobile = Auth::user()->mobile;
        $data->address = Auth::user()->address;

        //For Image
        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('admin/prf_img'),$filename);
            $data['image'] = $filename;
        }
        $data->save();
        notify()->success('Insert Successfully !');
        return redirect()->route('product.upload.view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bidStore(Request $request,$id)
    {

        $data = UploadProduct::find($id);
        $data->bidding_price = $request->bidding_price;
        $data->report = $request->report;
        $data->customer_name = Auth::user()->name;
        $data->customer_email = Auth::user()->email;
        $data->customer_mobile = Auth::user()->mobile;
        $data->customer_addr = Auth::user()->address;
        $data->save();

        $notice = new BidNotice;
        $notice->user_id = Auth::user()->id;
        $notice->customer_name = Auth::user()->name;
        $notice->customer_email = Auth::user()->email;
        $notice->customer_mobile = Auth::user()->mobile;
        $notice->bidding_price = $request->bidding_price;
        $notice->tittle = $data->tittle;
        $notice->save();
        notify()->success('Bid Addedd Successfully !');
        return redirect()->route('product.upload.bid.list');
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bidReport(Request $request,$id)
    {

        $data = UploadProduct::find($id);
        $data->report = $request->report;
        $data->save();
        notify()->success('Report Addedd Successfully. Admin will check this report !');
        return redirect()->route('product.upload.bid.list');
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
        $data ['allData'] = UploadProduct::find($id);
        return view('pages.admin.product.upload.edit',$data);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Aedit($id)
    {
        $data ['allData'] = UploadProduct::find($id);
        return view('pages.admin.product.upload.Aedit',$data);
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

        $data = UploadProduct::find($id);
        $data->tittle = $request->tittle;
        $data->price = $request->price;
        $data->deadline = $request->deadline;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->approve = $request->approve;
         //For Image
         if($request->file('image')){
            $file = $request->file('image');
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('admin/prf_img'),$filename);
            $data['image'] = $filename;
        }
        $data->save();
        notify()->success('Update Successfully !');
        return redirect()->route('product.upload.view');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Aupdate(Request $request, $id)
    {

        $data = UploadProduct::find($id);
        $data->tittle = $request->tittle;
        $data->price = $request->price;
        $data->deadline = $request->deadline;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->approve = $request->approve;

         //For Image
         if($request->file('image')){
            $file = $request->file('image');
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('admin/prf_img'),$filename);
            $data['image'] = $filename;
        }
        $data->save();
        notify()->success('Update Successfully !');
        return redirect()->route('product.upload.Aview');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = UploadProduct::find($id);
        $data->delete();
        notify()->success('Delete Successfully !');
        return redirect()->route('product.upload.view');
    }
}
