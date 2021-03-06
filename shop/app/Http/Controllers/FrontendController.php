<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductDetail;
use App\Comment;
use Gloudemans\Shoppingcart\Cart;
use App\News;
use App\Tag;
use App\Subscribe;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
use App\Category;
use App\Product;
use DB;
use App\OrderDetail;
use App\PriceFilter;
use App\Order;
use App\User;
use App\NewsCategory;
use App\Author;
use App\Message;

class FrontendController extends Controller {

    public function welcom() {
        $lsProductdt = ProductDetail::where('status', '1')->orderBy('created_at', 'DESC')->take(3)->get();
        $arrProductdt = ProductDetail::where('status', '1')->orderBy('created_at', 'DESC')->take(12)->get();
        $saleProductdt = ProductDetail::where('status', '1')->orderBy('created_at', 'DESC')->take(12)->get();
        $comment = Comment::where('status', '1')->orderBy('created_at', 'DESC')->take(3)->get();
        $new = News::where('status', '1')->orderBy('created_at', 'DESC')->take(6)->get();
        $allCategory = Category::all();
        $allNewcate = NewsCategory::all();
        $lsUser = User::all();
        $lsProduct = ProductDetail::all();
        $lsNews = News::all();
        $lsOrder = Order::all();
        return view('welcome')->with(['lsProductdt' => $lsProductdt, 'arrProductdt' => $arrProductdt,
                    'saleProductdt' => $saleProductdt, 
                    'comment' => $comment,
                    'new' => $new,
                    'allCategory' => $allCategory,
                    'lsUser' => $lsUser,
                    'lsProduct' => $lsProduct,
                    'lsNews' => $lsNews,
                    'lsOrder' => $lsOrder,
                    'allNewcate' => $allNewcate]);
    }

    public function single($id, $discount = null) {




        $allCategory = Category::all();
        $prodetail = ProductDetail::find($id);
        $pro = $prodetail->product_id;
        $prorelate = ProductDetail::where('product_id', $pro)->take(6)->get();

        $total = null;

        if($prodetail->discount > 0){
            $total = $prodetail->price - (($prodetail->discount * $prodetail->price)/ 100);
        }

        return view('single')->with(['prodetail' => $prodetail, 'allCategory' => $allCategory, 'prorelate' => $prorelate, 'total' => $total]);
    }


    public function detail_comment(Request $request) {
        $comment = new \App\Comment();
        $comment->productDetails_id = $request->productDetails_id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->content = $request->content;
        $comment->status = 1;
        $comment->save();
        return redirect()->back();
      }


    public function subscribe(Request $request) {
        $s = new Subscribe();
        $s->email = $request->email;
        $s->save();
        // Gửi mail
        $objDemo = new \stdClass();
        $objDemo->sender = 'Shop Write';
        $objDemo->receiver = $s->email;

        Mail::to($s->email)->send(new DemoEmail($objDemo));

        return redirect()->back();
    }

    public function category($id = null, $product_id = null) {

        $allCategory = Category::all();
        $curentCate = Category::find($id);
        $curentProdut = Product::find($product_id);

        $allProduct = Product::where('category_id', $id)->get();
        $saleProductdt = ProductDetail::where('status', '1')->orderBy('created_at', 'DESC')->take(2)->get();
        $cate_name = "";
        $product_name = "";
        if ($product_id != null) {
            $data = DB::table(DB::raw('product_details'))
            ->select('product_details.*')
            ->join('products', 'products.id', '=', 'product_details.product_id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('products.id', $product_id)
            ->orderBy('created_at', 'DESC')
            ->paginate(9);
        } else {
            $data = DB::table(DB::raw('product_details'))
                    ->select('product_details.*')
                    ->join('products', 'products.id', '=', 'product_details.product_id')
                    ->join('categories', 'categories.id', '=', 'products.category_id')
                    ->where('categories.id', $id)
                    ->orderBy('created_at', 'DESC')
                    ->paginate(9);
        }

        return view('category')->with(['allCategory' => $allCategory, 'curentProdut' => $curentProdut, 'curentCate' => $curentCate, 'allProduct' => $allProduct, 'data' => $data, 'saleProductdt' => $saleProductdt]);
    }

    public function about() {
        $allCategory = Category::all();
        return view('about')->with(['allCategory' => $allCategory]);
    }

    public function filterPriceCate($id = null, $product_id = null, Request $request) {
        $price = $request->price;
        $cate = $request->category;
        $allCategory = Category::all();
        $curentCate = Category::find($id);
        $curentProdut = Product::find($product_id);

        $allProduct = Product::where('category_id', $id)->get();
        $saleProductdt = ProductDetail::where('status', '1')->orderBy('created_at', 'DESC')->take(2)->get();
        $cate_name = "";
        $product_name = "";
        if ($price == 0 && $cate != 'Category') {
            $data = DB::table(DB::raw('product_details'))
                    ->select('product_details.*')
                    ->join('products', 'products.id', '=', 'product_details.product_id')
                    ->join('categories', 'categories.id', '=', 'products.category_id')
                    ->where('categories.name', $cate)
                    ->paginate(9);
        }
        if ($price == 0 && $cate == 'Category') {
            $data = DB::table(DB::raw('product_details'))
                    ->select('product_details.*')
                    ->join('products', 'products.id', '=', 'product_details.product_id')
                    ->join('categories', 'categories.id', '=', 'products.category_id')
                    ->paginate(9);
//            dd($data->toArray());

        }
        if ($price == 1 && $cate != 'Category') {
            $data = DB::table(DB::raw('product_details'))
                    ->select('product_details.*')
                    ->join('products', 'products.id', '=', 'product_details.product_id')
                    ->join('categories', 'categories.id', '=', 'products.category_id')
                    ->where('categories.name', $cate)
                    ->where('product_details.price', '<=', '50000')
                    ->paginate(9);
        }
        if ($price == 2 && $cate != 'Category' ) {
            $data = DB::table(DB::raw('product_details'))
                    ->select('product_details.*')
                    ->join('products', 'products.id', '=', 'product_details.product_id')
                    ->join('categories', 'categories.id', '=', 'products.category_id')
                    ->where('categories.name', $cate)
                    ->where('product_details.price', '<=', '200000')
                    ->where('product_details.price', '>', '50000')
                    ->paginate(9);
        }
        $product_name = "";
        if ($price == 3 && $cate != 'Category') {
            $data = DB::table(DB::raw('product_details'))
                    ->select('product_details.*')
                    ->join('products', 'products.id', '=', 'product_details.product_id')
                    ->join('categories', 'categories.id', '=', 'products.category_id')
                    ->where('categories.name', $cate)
                    ->where('product_details.price', '>', '200000')
                    ->paginate(9);
        }
        if ($cate == 'Category' && $price != 0 ) {
            if ($price == 1) {
                $data = DB::table(DB::raw('product_details'))
                        ->select('product_details.*')
                        ->join('products', 'products.id', '=', 'product_details.product_id')
                        ->join('categories', 'categories.id', '=', 'products.category_id')
                        ->where('product_details.price', '<=', '50000')
                        ->paginate(9);
            }
            if ($price == 2) {
                $data = DB::table(DB::raw('product_details'))
                        ->select('product_details.*')
                        ->join('products', 'products.id', '=', 'product_details.product_id')
                        ->join('categories', 'categories.id', '=', 'products.category_id')
                        ->where('product_details.price', '>', '50000')
                        ->where('product_details.price', '<=', '200000')
                        ->paginate(9);
            }
            if ($price == 3) {
                $data = DB::table(DB::raw('product_details'))
                        ->select('product_details.*')
                        ->join('products', 'products.id', '=', 'product_details.product_id')
                        ->join('categories', 'categories.id', '=', 'products.category_id')
                        ->where('product_details.price', '>', '200000')
                        ->paginate(9);
            }
        }


        return view('category')->with(['allCategory' => $allCategory, 'curentProdut' => $curentProdut, 'curentCate'
        => $curentCate, 'allProduct' => $allProduct, 'data' => $data, 'saleProductdt' => $saleProductdt,'flag'=>true,
        'price'=>$price , 'category'=>$cate
        ]);
    }

    public function search(Request $request) {
        $allCategory = Category::all();
        $search = $request->search;
        $lsProduct = ProductDetail::where('status', '1')->where('name', 'like', '%' . $search . '%')->paginate(9);
        return view('search')->with(['lsProduct' => $lsProduct, 'allCategory' => $allCategory, 'search' => $search]);
    }

    public function contact() {
        $allCategory = Category::all();
        return view('contact')->with(['allCategory' => $allCategory]);
    }

    public function post_message(Request $request) {
        $message = new \App\Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->content = $request->content;
        $message->save();
        return redirect()->back();
    }

    public function news($id = null){
        $allCategory = Category::all();
        $allNews = News::all();
        $allNewsCategory = NewsCategory::all();
        $curentNewcate = NewsCategory::find($id);

        $allTag = Tag::all();
        $saleProductdt = ProductDetail::where('status', '1')->orderBy('created_at', 'DESC')->take(2)->get();
        if($id != null) {
            $data = DB::table(DB::raw('news'))
            ->select('news.*')
            ->join('news_categories', 'news_categories.id', '=', 'news.category_id')
            ->where('news.category_id', $id)
            ->orderBy('created_at', 'DESC')
            ->paginate(9);
        } else {
            $data = DB::table(DB::raw('news'))->orderBy('created_at', 'DESC')->paginate(9);
        }



        return view('news')->with(['curentNewcate' => $curentNewcate,
                                    'allCategory' => $allCategory,
                                    'allNews' => $allNews,
                                    'allNewsCategory' => $allNewsCategory,
                                    'allTag' => $allTag,
                                    'saleProductdt' => $saleProductdt,
                                    'data' => $data]);
    }

    public function snew($id) {


        $allNews = News::find($id);
        $pro = $allNews->category_id;
        $newrelate = News::where('category_id', $pro)->take(6)->get();
        $allCategory = Category::all();
        return view('snew')->with(['allNews' => $allNews, 'allCategory' => $allCategory, 'newrelate' => $newrelate]);
    }


}
