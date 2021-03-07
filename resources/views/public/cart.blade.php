@extends('public.layout.layout')

@section('content')

    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Shopping Cart</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cart <i class="mdi mdi-cart"></i>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- cart main wrapper start -->
    <div class="container p-5">
        <div class="row">

            <div class="col-8" style="border-right: 3px #cbd3da">
                <div class="cart-table table-responsive">
                    <table class="table table-responsive">
                        <thead>

                        <tr>
                            <th class="pro-thumbnail">Image</th>
                            <th class="pro-title">Product</th>
                            <th class="pro-price">Price</th>

                            <th class="pro-remove">Remove</th>
                        </tr>

                        </thead>
                        <tbody>

                        <?php $total = 0 ?>
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <?php $total += $details['price'] ?>

                                <tr>
                                    <td class=""
                                        style="display: flex; justify-content: center; align-items: center"><a
                                            href="#"><img class="m-auto" width="150"
                                                          src="/images/{{$details['photo']}}" alt="Product"/></a>
                                    </td>
                                    <td class=""><a href="#" ><b>{{ $details['name'] }}</b></a></td>
                                    <td class="pro-price"><span>JOD{{ $details['price'] }}</span></td>
                                    <td class="pro-remove"><a data-id="{{ $id }}"
                                                              class="remove-from-cart btn btn-danger p-1"
                                                              href="#"><i class="mdi mdi-delete"></i></a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4">
                <div class="">
                    <!-- Cart Calculation Area -->
                    <div class="cart-calculator-wrapper">
                        <div class="cart-calculate-items">
                            <h3>Cart Totals</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr class="total">
                                        <td>Total</td>
                                        <td class="total-amount">JOD {{$total}}</td>
                                    </tr>
                                    <tr>
                                        <td>

                                            <a href="checkout" class="btn btn-primary btn-block {{count(session('cart')) == 0 ? 'disabled' : ''}}">Proceed To Checkout</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-main-wrapper mt-no-text">
        <div class="container custom-area">
            <div class="row">
                <div class="col-lg-6 col-custom">
                    <!-- Cart Table Area -->

                    <!-- Cart Update Option -->
                    <div class="cart-update-option d-block d-md-flex justify-content-between">
                        <div class="cart-update mt-sm-16">

                            <a href="#" id="update-cart" class="btn flosun-button primary-btn rounded-0 black-btn">Update
                                Cart</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>
@endsection

<!-- cart main wrapper end -->
@section('scripts')
    <script type="text/javascript">
        $("#update-cart").click(e => {
            e.preventDefault();
            const inputs = document.querySelectorAll(".cart-plus-minus-box");
            const vals = {};
            inputs.forEach(_input => {
                const id = _input.attributes.getNamedItem("data-id");
                if (id) vals[id.value] = _input.value
            })

            $.ajax({
                url: '{{ url("update-cart") }}',
                method: "put",
                data: {
                    _token: '{{ csrf_token() }}',
                    isMulti: true,
                    data: vals
                },
                success: function (response) {
                    window.location.reload();
                }
            });

        })


        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            console.log("Remove");

            if (confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url("remove-from-cart") }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
