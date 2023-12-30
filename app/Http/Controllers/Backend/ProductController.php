<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ProductController extends Controller
{
    public function productDetail($id){
        $detail=Product::find($id);
        return view('product-detail',compact('detail'));
    }
}
