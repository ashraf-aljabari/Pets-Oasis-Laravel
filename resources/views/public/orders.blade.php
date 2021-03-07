@extends('public.layout.layout')

@section('content')
    <div style="height: 70vh" class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                <ul class="category-nav">
                    <li class="{{request()->getRequestUri() == '/manage_shop' ? 'active' : null}}">
                        <a href="/manage_shop">Shop Details</a>
                    </li>
                    <li class="{{request()->getRequestUri() == '/manage_sub_categories' ? 'active' : null}}">
                        <a href="/manage_sub_categories">Manage Categories</a>
                    </li>
                    <li class="{{request()->getRequestUri() == '/manage_products' ? 'active' : null}}">
                        <a href="/manage_products">Manage Products</a>
                    </li>
                    <li class="{{request()->getRequestUri() == '/manage_orders' ? 'active' : null}}">
                        <a href="/manage_orders">Manage Orders</a>
                    </li>
                </ul>
            </div>

            {{--            other content--}}
            <div class="col-9">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                {{--                <div class="alert alert-success">--}}
                {{--                    Order updated successfully!--}}
                {{--                </div>--}}
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">order_id</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Location</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Delivered</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{$order->order_id}}</th>
                            <td>{{$order->user_name}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->location}}</td>
                            <td>{{$order->product_name}}</td>
                            <td>{{$order->product_price}}</td>
                            <td>@if($order->delivered == 0)
                                    <form method="post"
                                          action="{{ route('manage_orders.update', $order->orderpro_id)  }}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-danger" type="submit">Not Delivered</button>
                                    </form>
                                @else
                                    <form method="post"
                                          action="{{ route('manage_orders.update', $order->orderpro_id)  }}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-success" type="submit">Delivered</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
