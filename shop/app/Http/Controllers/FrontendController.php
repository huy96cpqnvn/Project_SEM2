<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductDetail;
use App\Comment;
use Gloudemans\Shoppingcart\Cart;
use App\News;
use App\Subscribe;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function welcom(){
        $lsProductdt = ProductDetail::where('status', '1')->orderBy('created_at', 'ASC')->take(3)->get();
        $arrProductdt = ProductDetail::where('status', '1')->orderBy('created_at', 'ASC')->take(12)->get();
        $saleProductdt = ProductDetail::where('status', '1')->orderBy('created_at', 'ASC')->take(12)->get();
        $comment = Comment::orderBy('created_at', 'DESC')->take(3)->get();
        $new = News::where('status', '1')->orderBy('created_at', 'ASC')->take(6)->get();
        

        return view('welcome')->with(['lsProductdt' => $lsProductdt, 'arrProductdt' => $arrProductdt, 
                                        'saleProductdt' => $saleProductdt, 'comment' => $comment,
                                        'new' => $new]);
    }

    public function subscribe(Request $request){
        $s = new Subscribe();
        $s -> email = $request->email;
        $s -> save();
    // Gửi mail
        $objDemo = new \stdClass();
        // $objDemo->demo_one = 'Demo One Value';
        // $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'Shop Write';
        $objDemo->receiver = $s -> email;
    
        Mail::to($s->email)->send(new DemoEmail($objDemo));
    
        return redirect()->back();
    }
}
