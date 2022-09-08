<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UploadProduct;
use DB;


class UserController extends Controller
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
        $data = User::all();
        return view('pages.admin.user.view_user',compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Pview()
    {
        $data = User::where('id',Auth::user()->id)->get();
        return view('pages.admin.user.Pview_user',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $data = User::all();
        return view('pages.admin.user.add_user',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users,email'
        ]);
        $code = rand(0000,9999);
        $data = new User;
        $data->usertype = $request->usertype;
        $data->status = $request->status;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->password =  bcrypt($code);
        $data->code = $code;
        $data->save();
        notify()->success('User Insert Successfully !');
        return redirect()->route('setups.user.view');
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
        $data = User::find($id);
        return view('pages.admin.user.edit_user',compact('data'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Pedit($id)
    {
        $data = User::find($id);
        return view('pages.admin.user.Pedit_user',compact('data'));
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

        User::where('email',$id)->delete();


        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->status = $request->status;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->save();
        notify()->success('User Update Successfully !');
        return redirect()->route('setups.user.view');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Pupdate(Request $request, $id)
    {

        User::where('email',$id)->delete();


        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->save();
        notify()->success('User Update Successfully !');
        return redirect()->route('setups.user.Pview');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $data =DB::table('users')
                   ->leftJoin('upload_products','users.id', '=','upload_products.user_id')
                   ->where('users.id', $id);
       DB::table('upload_products')->where('user_id', $id)->delete();
       $data->delete();
        notify()->success('Delete Successfully !');
        return redirect()->route('setups.user.view');
    }
}
