<?php

namespace App\Http\Controllers;

use App\ProductDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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
    public function update()
    {

    }
public  function updateCart($id=null,$qty=null,$dk=null){
    if ($dk=='up') {
        $qt = $qty+1;
        Cart::update($id, $qt);
    } elseif ($dk=='down') {
        $qt = $qty-1;
        Cart::update($id, $qt);
    } else {
    }
    return redirect()->back();
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Cart::search(function ($cart, $key) use($id) {
            return $cart->id == $id;
        })->first();
        Cart::remove($item->rowId);
        return redirect()->back();

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
    return redirect()->back()->with('success', 'Thêm '.$product['name'].' Vào Giỏ Hàng Thành Công');
}
        //

}
