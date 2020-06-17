<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use App\ProductDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
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
        $price = $product['price']-$product['price'] *$product['discount'];

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
    public function getdelDetail($idDetai ,$oderStatus)
    {
        $oder = OrderDetail::where('id',$idDetai)->first();
        if ($oder['status'] ==1 || $oderStatus ==1) {
            return redirect()->back()
                ->with(['flash_level'=>'result_msg','flash_massage'=>'Không thể hủy sản phẩm số  $idDetai vì đã được xác nhận!']);
        } else {
            if ($oder !=null){
                $oder->delete();
            }
            return redirect('order')
                ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã hủy bỏ sản phẩm số:  '.$idDetai.' !']);
        }

    }
}
