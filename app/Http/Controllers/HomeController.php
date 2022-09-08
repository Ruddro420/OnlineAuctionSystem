<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadProduct;
use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = UploadProduct::all();
        return view('index',compact('data'));
    }
}
