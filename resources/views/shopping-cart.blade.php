@extends('layout.app')
@section('content')
    <!-- Header Section End -->
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ url('/') }}">Home</a>
                            <a href="shop">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th style="padding-right: 20px;">Quantity</th>
                                    <th>SubTotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp

                                        <tr data-id="{{ $id }}">
                                            <td data-th="Product" class="product__cart__item">
                                                <div class="product__cart__item__pic">
                                                    <img src="/uploads/product/{{ $details['image'] }}" alt=""
                                                        style="height: 100px">
                                                </div>
                                                <div class="product__cart__item__text">
                                                    <h6 data-th="Product">{{ $details['name'] }}</h6>
                                                    <h5 data-th="Price">${{ $details['price'] }}</h5>
                                                </div>
                                            </td>
                                            <td data-th="Quantity">
                                                <input type="number" value="{{ $details['quantity'] }}"
                                                    class="form-control quantity update-cart" />
                    </div>
                    </td>
                    <td class="cart__price" style="padding-left: 20px;">${{ $details['price'] * $details['quantity'] }}
                    </td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                    </td>
                    </tr>
                    @endforeach
                @else
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="shopping__cart__table">
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <i class="fa fa-exclamation-circle me-2"></i>
                                        You haven't done any shopping yet
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="{{ url('/') }}">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Apply</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        @if (session('cart'))
                            <li>Subtotal <span>${{ $details['price'] * $details['quantity'] }}</span></li>
                            <li>Total <span>${{ $total }}</span></li>
                        @endif
                    </ul>
                    <a href="check_out" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
