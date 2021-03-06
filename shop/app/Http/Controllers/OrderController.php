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
use App\Category;

class OrderController extends Controller
{
    public function getdetail($id)
    {
        $oder = Order::where('id',$id)->first();
        $data= DB::table('order_details')->select('order_details.*', 'product_details.name',
            'product_details.product_id','product_details.cover','product_details.review',
            'product_details.detail','product_details.price','product_details.status','product_details.status'
            ,'product_details.author_id','product_details.user_id','product_details.discount','product_details.created_at')
            ->join('product_details','order_details.productDetail_id','=', 'product_details.id')
            ->where('order_id',$id)
            //   ->groupBy('order_details.id','order_details.productDetail_id')
            ->get();
        return view('order.detail')->with(['data'=>$data,'oder'=>$oder,'orderId'=>$id]);
    }
    public function postdetail($id)
    {
        $oder = Order::find($id);

        $oder->status = 1;
        $oder->save();
        return redirect('order')
            ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã xác nhận đơn hàng thành công !']);

    }

    public function confirm(Request $request)
    {
//        $oder = Order::where('id',$id)->first();
        $allCategory = Category::all();

        $id = $_GET['user_id'];
        $totalPrice =doubleval($_GET['totalPrice']);
        $note = $_GET['txtnote'];
        $oder = new Order();
        $total = 0;

//        DB::table('orders')->insert(
//           ['note' => $note ,'date'=> new datetime ,'paymentMethod'=>'COD','status'=>1,'user_id'=>$id,'totalprice'=>$totalPrice]
//        );
        foreach (Cart::content() as $row){
            $total = $total +( $row->qty *$row->price);
        }
        $oder->user_id=Auth::user()->id;
        $oder->date =  new datetime;
        $oder->note = $note;
        $oder->paymentMethod = 'COD';
        $oder->status = 0;
        $oder->totalprice = $total;
        $oder->save();

        $od_id = $oder->id;
//        dd($od_id);

        foreach (Cart::content() as $row){
            $orderDetail = new OrderDetail();
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

        return view('order.confirm')->with(['data'=>$data,'flash_level'=>'result_msg','flash_massage'=>' Đơn hàng của bạn đã được gửi đi !', 'allCategory' => $allCategory]);
    }
    public function getdelOrder($id){

        $order = Order::find($id);
//        if ($order['status'] ==1){
//            return redirect('order')->with(['flash_level'=>'result_msg','flash_massage'=>
//                " Không thể hủy  đơn hàng số: $id vì đã được xác nhận!'"]);


            $order->delete();
            return redirect('order')->with(['flash_level'=>'result_msg','flash_massage'=>" Đã hủy hủy  đơn hàng số: $id !"]);



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

    } public function changeStatus($order_id , Request $request )
    {


        $status = $request->selectStatus;
    $oder = Order::where('id',$order_id)->first();
    $oder->status = $status;
    $oder->save();
    $data = DB::table('order_details')
        ->join('product_details','product_details.id','=','order_details.productDetail_id')
        ->where('order_id',$order_id)
        //   ->groupBy('order_details.id','order_details.productDetail_id')
        ->get();

    if($status == 4) {
        $orderDetails =  OrderDetail::where('order_id',$order_id)->first();
        if ( $orderDetails != null){
                $prodetai = ProductDetail::where('id',$orderDetails['productDetail_id'])->first();

                $prodetai['amount'] =  $prodetai['amount'] -   $orderDetails['orderAmount'];

                $prodetai->save();

        }
    }

    return view('order.detail')->with(['data'=>$data,'oder'=>$oder,'curentStatus'=>$status]);
    }

public function user($id_user){
    $orders = Order::where('user_id',$id_user)->get();
    $allCategory = Category::all();

    foreach ($orders as $key => $oder){
        $orderDetail = OrderDetail::where('order_id',$oder['id'])->get();
    }
    return view('order.user.list')->with([
        'orders'=>$orders,
        'allCategory'=>$allCategory,
    ]);
}
public function userDetail($oderId,$userId,$orderStatus){
    $orders = Order::where('user_id',$userId)->get();
    $allCategory = Category::all();

    foreach ($orders as $key => $oder){
        $orderDetail = OrderDetail::where('order_id',$oder['id'])->get();
        $datas[$key] = DB::table('order_details')->select('order_details.*', 'product_details.name',
            'product_details.product_id','product_details.cover','product_details.review',
            'product_details.detail','product_details.price','product_details.status','product_details.status'
            ,'product_details.author_id','product_details.user_id','product_details.discount','product_details.created_at')
            ->join('product_details','order_details.productDetail_id','=', 'product_details.id')
            ->where('order_id',$oder['id'])
            //   ->groupBy('order_details.id','order_details.productDetail_id')
            ->get();
    }
    return view('order.user.detail_user')->with([
        'orders'=>$orders,
        'allCategory'=>$allCategory,
        'datas'=>$datas,
        'orderStatus'=>$orderStatus
    ]);

}
public function userDelOrder($orderId){
        $order = Order::find($orderId);
        $order->delete();
    return redirect()->back();
}
}
