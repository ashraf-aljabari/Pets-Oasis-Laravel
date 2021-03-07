<?php

namespace App\Http\Controllers;

use App\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VendorOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->user_id;
        $orders = DB::table('order_products')
            ->where('vendor_id', $user_id)
            ->join('orders', 'order_products.order_id', '=', 'orders.order_id')
            ->join('products', 'order_products.product_id', '=', 'products.product_id')
            ->join('users', 'orders.user_id', '=', 'users.user_id')
            ->get();
//        dd($orders);
        return view('public.orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = OrderProduct::find($id);

        if ($order->delivered == 0) {
            $order->delivered = true;
            $order->save();
            $notification = array(
                'message'=>'Order updated to Delivered successfully!',
                'alert-type'=>'success'
            );
            return back()->with($notification);
        } else {
            $order->delivered = false;
            $order->save();
            $notification = array(
                'message'=>'Order updated to not delivered!',
                'alert-type'=>'success'
            );
            return back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
