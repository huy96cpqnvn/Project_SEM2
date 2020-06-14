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
use App\Category;
use App\Product;
use DB;

class FrontendController extends Controller
{
    public function welcom(){
        $lsProductdt = ProductDetail::where('status', '1')->orderBy('created_at', 'ASC')->take(3)->get();
        $arrProductdt = ProductDetail::where('status', '1')->orderBy('created_at', 'ASC')->take(12)->get();
        $saleProductdt = ProductDetail::where('status', '1')->orderBy('created_at', 'ASC')->take(12)->get();
        $comment = Comment::orderBy('created_at', 'DESC')->take(3)->get();
        $new = News::where('status', '1')->orderBy('created_at', 'ASC')->take(6)->get();
        $allCategory = Category::all();
        

        return view('welcome')->with(['lsProductdt' => $lsProductdt, 'arrProductdt' => $arrProductdt, 
                                        'saleProductdt' => $saleProductdt, 'comment' => $comment,
                                        'new' => $new,
                                        'allCategory' => $allCategory]);
    }

    public function single($id, $qty = null, $dk = null){
        if ($dk=='up') {
            $qt = $qty+1;
            Cart::update($id, $qt);
        } elseif ($dk=='down') {
            $qt = $qty-1;
            Cart::update($id, $qt);
        }
        $allCategory = Category::all();
        $prodetail = ProductDetail::find($id);
        return view('single')->with(['prodetail' => $prodetail, 'allCategory' => $allCategory]);
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

    public function category($id = null, $product_id = null){

        $allCategory = Category::all();
        $allProduct = Product::where('category_id', $id)->get();

        $cate_name = "";
        $product_name = "";
        if($product_id != null) {
            $data = DB::table(DB::raw('product_details')) 
            ->select('product_details.*')
            ->join('products', 'products.id', '=', 'product_details.product_id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('product_details.id', $product_id)
            ->paginate(9);
        } else {
            $data = DB::table(DB::raw('product_details')) 
            ->select('product_details.*')
            ->join('products', 'products.id', '=', 'product_details.product_id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('categories.id', $id)
            ->paginate(9);
        }

        return view('category')->with(['allCategory' => $allCategory, 'allProduct' => $allProduct,  'data' => $data]);
    }
}
