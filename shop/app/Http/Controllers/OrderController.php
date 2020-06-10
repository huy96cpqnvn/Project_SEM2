<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\ProductDetail;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getdetail($id)
    {
        $oder = Order::where('id',$id)->first();
        $data = DB::table('order_details')
            ->join('product_details','product_details.id','=','order_details.productDetail_id')
           ->where('order_id',$id)
//            ->groupBy('order_details.id')
            ->get();

        return view('order.detail')->with(['data'=>$data,'oder'=>$oder]);
    }
    public function postdetail($id)
    {
        $oder = Order::find($id);

        $oder->status = 1;
        $oder->save();
        return redirect('order')
            ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã xác nhận đơn hàng thành công !']);

    }
    public function getdel($id)
    {
        $oder = Order::where('id',$id)->first();
        if ($oder['status'] ==1) {
            return redirect()->back()
                ->with(['flash_level'=>'result_msg','flash_massage'=>'Không thể hủy đơn hàng số: '.$id.' vì đã được xác nhận!']);
        } else {
            $oder = Order::find($id);
            $oder->delete();
            return redirect('order')
                ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã hủy bỏ đơn hàng số:  '.$id.' !']);
        }
    }
    public function confirm(Request $request)
    {
//        $oder = Order::where('id',$id)->first();

        $id = $_GET['user_id'];
        $totalPrice =doubleval($_GET['totalPrice']);
        $note = $_GET['txtnote'];
        $oder = new Order();
        $orderDetail = new OrderDetail();
        $total = 0;

//        DB::table('orders')->insert(
//           ['note' => $note ,'date'=> new datetime ,'paymentMethod'=>'COD','status'=>1,'user_id'=>$id,'totalprice'=>$totalPrice]
//        );
        $oder->user_id=Auth::user()->id;
        $oder->date =  new datetime;
        $oder->note = $note;
        $oder->paymentMethod = 'COD';
        $oder->status = 0;
        $oder->totalprice = $totalPrice;
        $oder->save();

        $od_id = $oder->id;
        $total = 0;
        foreach (Cart::content() as $row){
            $total = $total +( $row->qty *$row->price);
        }
        foreach (Cart::content() as $row){
            $orderDetail->order_id = $od_id;
            $orderDetail->productDetail_id = $row->id;
            $orderDetail->orderAmount = $row->qty;
            $orderDetail->price = $row->price;
            $orderDetail->created_at = new datetime;
            $orderDetail->totalprice =doubleval($total);
            $orderDetail->save();
        }
        Cart::destroy();
        $data = Order::select()->where('user_id','=',$id);

        return view('order.confirm')->with(['data'=>$data,'flash_level'=>'result_msg','flash_massage'=>' Đơn hàng của bạn đã được gửi đi !']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::paginate(10);
        return view('order.list_great')->with(['data'=>$data]);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }




}
