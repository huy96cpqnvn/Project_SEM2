<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductDetail;
use App\Product;
use App\Author;
use App\Language;
use App\Publisher;
use App\PriceFilter;
use App\Discount;

class ProductDetailController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $lsPrd = ProductDetail::paginate(6);
        return view('productDetail.list')->with(['lsProductDetail' => $lsPrd]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $allProduct = Product::all();
        $allAuthor = Author::all();
        $allLanguage = Language::all();
        $allPublisher = Publisher::all();
        $allPriceFilter = PriceFilter ::all();
        $allDiscount = Discount::all();
        return view('productDetail.create')->with(['allProduct' => $allProduct,
                    'allAuthor' => $allAuthor,
                    'allLanguage' => $allLanguage,
                    'allPublisher' => $allPublisher,
                    'allPriceFilter' => $allPriceFilter,
                    'allDiscount' => $allDiscount]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate(
                [
                    'name1' => 'required|max:255|min:3',
                    'review1' => 'required|max:255|min:3',
                    'detail1' => 'required',
                    'price1' => 'required',
                    'amount1' => 'required'
                ]
        );


        $prd = new ProductDetail();
        $prd->name = $request->name1;
        $prd->review = $request->review1;
        $prd->detail = $request->detail1;
        $prd->price = $request->price1;
        $prd->amount = $request->amount1;
        $prd->status = $request->status1;
        $prd->type = $request->type1;

        $prd->product_id = $request->product_id1;
        $prd->author_id = $request->author_id1;
        $prd->language_id = $request->language_id1;
        $prd->priceFilter_id = $request->priceFilter_id1;
        $prd->discount_id = $request->discount_id1;
        $prd->publisher_id = $request->publisher_id1;

        $file = $request->file1;
        $upload_image = '';
        if ($file != null) {
            $image_name = $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
            $image_name = time() . "_" . $image_name;
            $image_public_path = public_path("images");
            $file->move($image_public_path, $image_name);
            $upload_image = "images/" . $image_name;
        }
        $prd->cover = $upload_image;

        $user = auth()->user();
        $prd->user_id = $user->id;

        $prd->save();

        $request->session()->flash('success', 'ProductDetail was successfull');
        return redirect()->route("proDetail_management.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $prd = ProductDetail::find($id);
        $allProduct = Product::all();
        $allAuthor = Author::all();
        $allLanguage = Language::all();
        $allPublisher = Publisher::all();
        $allPriceFilter = PriceFilter ::all();
        $allDiscount = Discount::all();
        return view('productDetail.edit')->with(['allProduct' => $allProduct,
                    'allAuthor' => $allAuthor,
                    'allLanguage' => $allLanguage,
                    'allPublisher' => $allPublisher,
                    'allPriceFilter' => $allPriceFilter,
                    'allDiscount' => $allDiscount,
                    'prd' => $prd]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate(
                [
                    'name1' => 'required|max:255|min:3',
                    'review1' => 'required|max:255|min:3',
                    'detail1' => 'required',
                    'price1' => 'required',
                    'amount1' => 'required'
                ]
        );


        $prd = ProductDetail::find($id);
        $prd->name = $request->name1;
        $prd->review = $request->review1;
        $prd->detail = $request->detail1;
        $prd->price = $request->price1;
        $prd->amount = $request->amount1;
        $prd->status = $request->status1;
        $prd->type = $request->type1;

        $prd->product_id = $request->product_id1;
        $prd->author_id = $request->author_id1;
        $prd->language_id = $request->language_id1;
        $prd->priceFilter_id = $request->priceFilter_id1;
        $prd->discount_id = $request->discount_id1;
        $prd->publisher_id = $request->publisher_id1;

        $file = $request->file1;
        
        if ($file != null) {
            $image_name = $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
            $image_name = time() . "_" . $image_name;
            $image_public_path = public_path("images");
            $file->move($image_public_path, $image_name);
            $upload_image = "images/" . $image_name;
            $prd->cover = $upload_image;
        }


        $user = auth()->user();
        $prd->user_id = $user->id;

        $prd->save();

        $request->session()->flash('success', 'ProductDetail was updated');
        return redirect()->route("proDetail_management.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request) {
        $prd = ProductDetail::find($id);
        $prd->delete();
        $request->session()->flash('success', 'ProductDetail was deleted');
        return redirect()->route("proDetail_management.index");
    }

    public function change($id, Request $request) {
        $prd = ProductDetail::find($id);
        if ($prd->status == 1) {
            $prd->status = 0;
        } else {
            $prd->status = 1;
        }
        $prd->save();
        $request->session()->flash('success', 'ProductDetail was changed');
        return redirect()->route("proDetail_management.index");
    }

}
