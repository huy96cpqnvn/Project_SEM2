<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ProductDetail;
use App\News;
use App\Order;

class DashboardController extends Controller
{
    public function dashboard(){
        
        $lsUser = User::all();
        $lsProduct = ProductDetail::all();
        $lsNews = News::all();
        $lsOrder = Order::all();
        
        $lsLastestUser = User::where('level','user')->orderBy('created_at', 'DESC')->take(5)->get();
        $lsLastestNews = News::where('status','1')->orderBy('created_at', 'DESC')->take(5)->get();
        
        return view('dashboard')->with(['lsUser' => $lsUser,
            'lsProduct' => $lsProduct,
            'lsNews' => $lsNews,
            'lsOrder' => $lsOrder,
            'lsLastestUser' => $lsLastestUser,
            'lsLastestNews' => $lsLastestNews
                ]);
    }
}
