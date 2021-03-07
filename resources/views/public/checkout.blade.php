@extends('public.layout.layout')
@section('content')
    <!-- Breadcrumb Area Start Here -->

    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Checkout</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/cart">Cart</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Checkout Area Start Here -->
    <form action="checkout" method="POST">
        {{csrf_field()}}
        @method('POST')
        <div class="container pr-5 pl-5">
            <div class="row">
                <div class="col-6">
                    <div class="checkbox-form">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="form-group m-1">
                                <label for="firstname" class="control-label mb-1">First Name</label>
                                <input name="firstname" type="text"
                                       class="form-control"
                                       value="{{ old('firstname') }}">
                                @if ($errors->has('firstname'))
                                    <div
                                        class="alert alert-danger">{{ $errors->first('product_price') }}</div>
                                @endif
                            </div>
                            <div class="form-group m-1">
                                <label for="lastname" class="control-label mb-1">Last Name</label>
                                <input name="lastname" type="text"
                                       class="form-control"
                                       value="{{ old('lastname') }}">
                                @if ($errors->has('lastname'))
                                    <div
                                        class="alert alert-danger">{{ $errors->first('lastname') }}</div>
                                @endif
                            </div>
                            <div class="form-group m-1">
                                <label for="location" class="control-label mb-1">Address</label>
                                <input name="location" type="text" placeholder="[City,Street,Apartment,..etc]"
                                       class="form-control"
                                       value="{{ old('location') }}">
                                @if ($errors->has('location'))
                                    <div
                                        class="alert alert-danger">{{ $errors->first('location') }}</div>
                                @endif
                            </div>

                            <div class="form-group m-1">
                                <label for="email" class="control-label mb-1">Email Address <span
                                        class="required">*</span></label>
                                <input name="email" type="text"
                                       class="form-control"
                                       value="{{Auth()->user()->user_email}}"
                                       value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <div
                                        class="alert alert-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <div class="form-group m-1">
                                <label for="phone" class="control-label mb-1">Phone <span
                                        class="required">*</span></label>
                                <input name="phone" type="tel"
                                       class="form-control"
                                       value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <div
                                        class="alert alert-danger">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>

                            <div class="form-group m-1">
                                <label for="date" class="control-label mb-1">Delivery Date <span
                                        class="required">*</span></label>
                                <input class="datepicker form-control pr-4" type="date" value="{{old("date")}}" name="date">
                                @if ($errors->has('phone'))
                                    <div
                                        class="alert alert-danger">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>


                        </div>
                        <div class="">
                            <div class="">
                                <div class="form-group mr-5 pr-4">
                                    <label for="info" class="control-label mb-1">Order Notes</label>
                                    <textarea name="info" type="text" class="form-control p-3">
                                            </textarea>
                                    @if ($errors->has('info'))
                                        <div
                                            class="alert alert-danger">{{ $errors->first('info') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-6">
                    <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="cart-product-name">Product</th>
                                    <th class="cart-product-total">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $total = 0 ?>
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        <?php $total += $details['price'] ?>
                                        <tr class="cart_item">
                                            <td class="cart-product-name">{{$details['name']}} </td>
                                            <td class="cart-product-total text-center"><span
                                                    class="amount">JOD {{$details['price']}}</span></td>
                                        </tr>
                                    @endforeach
                                @endif
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td class="text-center"><strong><span
                                                class="amount">JOD {{$total}}</span></strong>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    @if(session('cart') != null)
                                    <td>
                                        <input class="btn btn-primary btn-block"  {{ session('cart') == null ? 'disabled' : ''}}  value="Place Order"
                                               type="submit">
                                    </td>
                                    @else
                                        <td>

                                        <div class="alert alert-info">You need to have products in you cart.. <a href="/shop">Shop Now</a></div>
                                        </td>
                                        @endif
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="order-button-payment">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
<!-- Checkout Area End Here -->
