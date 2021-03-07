<?php

namespace App\Http\Controllers;

use Session;
use App\Order;
use App\OrderProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset(auth()->user()->user_id)) {
            return view('public.checkout');
        } else {
            return redirect('login');
        }
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
        $userId = auth()->user()->user_id;
        $total = 0;
        $order = new Order;
        $order->user_id = $userId;
        $orderSaved = false;
        $total = 0;
        foreach (session('cart') as $key => $value){
            $total += $value['price'];
        }
        foreach (session('cart') as $key => $value) {
            if(!$orderSaved) {
//                $order->product_id = $value['id'];
                $order->total = $total;
                $order->location = $request->input('location');
                $order->phone = $request->input('phone');
                $order->ship_date = $request->input('date');
                $order->user_id = $userId;
                $order->save();
                $lastOrder = DB::table('orders')->latest('created_at')->first()->order_id;
                $orderSaved = true;
            }
            $orderPro = new OrderProduct();
            $orderPro->delivered = false;
            $orderPro->order_id = $lastOrder;
            $orderPro->vendor_id = $value['vendor_id'];
            $orderPro->product_id = $value['id'];
            $orderPro->save();
        };
        session()->forget('cart');
//        return back()->with('Success', 'Order has been placed');
        $notification = array(
            'message'=>'Purchase is completed successfully!',
            'alert-type'=>'success'
        );
        return redirect('shop')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
}
