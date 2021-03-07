<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public.cart');
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
    public function show($id, $vendor_id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "id" => $product->product_id,
                    "name" => $product->product_name,
                    "price" => $product->product_price,
                    "photo" => $product->product_image,
                    "vendor_id"=> $vendor_id
                ]
            ];
            session()->put('cart', $cart);
            $notification = array(
                'message'=>'Successfully Added to cart',
                'alert-type'=>'success'
            );
            return back()->with($notification);

        }
        // if cart not empty then check if this product exist then increment quantity
//        if (isset($cart[$id])) {
//            $cart[$id]['quantity']++;
//            session()->put('cart', $cart);
//            return redirect('cart')->with('success', 'Product added to cart successfully!');
//        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $product->product_id,
            "name" => $product->product_name,
            "price" => $product->product_price,
            "photo" => $product->product_image,
            "vendor_id"=> $vendor_id
        ];
        session()->put('cart', $cart);

        session()->put('cart', $cart);
        $notification = array(
            'message'=>'Successfully Added to cart',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }

    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        } elseif (isset($request->isMulti)) {
            foreach ($request->data as $id => $quantity) {
                $cart = session()->get('cart');
                $cart[$id]["quantity"] = $quantity;
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Cart updated successfully');
        };
        var_dump($request->data);
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }


    public function cart()
    {
        return view('cart');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

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
