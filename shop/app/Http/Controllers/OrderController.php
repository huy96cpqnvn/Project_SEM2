<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cart as Cart;
use App\Product;
use App\ProductDetail ;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        //
    }
    public function cart() {
        //thêm sản phẩm mới vào giỏ hàng
    if (Request::isMethod('post')) {
        $product_id = Request::get('product_id');
        $product = Product::find($product_id);
        Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));
    }
    if (Request::get('product_id') && (Request::get('increment')) == 1) {
        $rowId = Cart::search(array('id' => Request::get('product_id')));
        $item = Cart::get($rowId[0]);

        Cart::update($rowId[0], $item->qty + 1);
    }
    if (Request::get('product_id') && (Request::get('decrease')) == 1) {
        $rowId = Cart::search(array('id' => Request::get('product_id')));
        $item = Cart::get($rowId[0]);

        Cart::update($rowId[0], $item->qty - 1);
    }

    $cart = Cart::content();

    return view('cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
}
public function addCart($id,Request $request){
        $product = ProductDetail::find($id)->attributesToArray();

        if ($request->qty){

            $qty = $request->qty;
        }else{
            $qty =1 ;
        }
        if ($product['discount_id'] >0){
            $price = $product['discount_id'];
        }else{
            $price = $product['price'];
        }
        $cart[] = [
            'id'=>$id,
            'name'=>$product['name'],
            'qty'=>$qty,
            'price'=>$product['price'],
            'weight'=>$product['amount'],
            'options'=>[
                'img'=>$product['cover']
            ],

        ];
    Cart::add($cart);
    return redirect()->back()->with('success', 'Thêm'.$product['name'].'Vào Giỏ Hàng Thành Công');
}}
