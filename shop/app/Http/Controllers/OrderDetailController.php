<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\OrderDetail;
use App\ProductDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderDetailController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCategory = Category::all();

        return view('order.list')->with([
            'allCategory'=>$allCategory
        ]);
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
    public function getdelDetail($idDetai ,$oderStatus,$count,$orderId)
    {
        $id = $idDetai;

        $oder = OrderDetail::where('id',$idDetai)->first();
      //  dd($oder->toArray());
//        if ( $oderStatus ==1) {
//            return redirect()->back()
//                ->with(['flash_level'=>'result_msg','flash_massage'=>'Không thể hủy sản phẩm số  $idDetai vì đã được xác nhận!']);
//        }

            if ($oder !=null){
                $oder->delete();
            }
            if ($count ==0) {
                return redirect('order');
            }else {
                return redirect("admin/donhang/detail/$orderId")
                    ->with(['flash_level' => 'result_msg', 'flash_massage' => 'Đã hủy bỏ sản phẩm số:  ' . $id . ' !']);

            }
        }


    public function getDetailUser($orderDetaiId){
        $oderDetail = OrderDetail::where('id',$orderDetaiId)->first();
        $allCategory = Category::all();

            if ($oderDetail !=null){
                $oderDetail->delete();
            }
            return view('order.user.detail_user')
                ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã hủy bỏ sản phẩm số:  '.$orderDetaiId.' !',
                    'datas'=>[],'allCategory'=>$allCategory]);
        }


}
