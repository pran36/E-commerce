@extends('product_layout')
@section('menu')
    @include('Includes.menu')
@endsection
@section('content')
    <!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
        
<!-- Shopping Cart -->
<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->
                <table class="table shopping-summery">
                    <thead>
                        <tr class="main-hading">
                            <th>PRODUCT</th>
                            <th>NAME</th>
                            <th class="text-center">UNIT PRICE</th>
                            <th class="text-center">QUANTITY</th>
                            <th class="text-center">TOTAL</th> 
                            <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_items as $item)
                        <tr>
                            {{image_crop($item->product->image,100,100)}}
                            <td class="image" data-title="No"><img src="{{ $item->product->image == ' ' ? 'https://via.placeholder.com/100x100':asset('storage/images/thumbnail/'.$item->product->image)}}" alt="#"></td>
                            <td class="product-des" data-title="Description">
                                {{-- @dd($item->product->id) --}}
                                <p class="product-name"><a href="#">{{$item->product->product_name}}</a></p>
                                <p class="product-des">{{$item->product->product_desc}}</p>
                            </td>
                            <td class="price" data-title="Price"><span>{{$item->product_price}} </span></td>
                            <td class="qty" data-title="Qty"><!-- Input Order -->
                            <form action={{route('cart.update',$item->id)}} method="POST">
                                @csrf
                                @method('PUT')
                                <!-- Input Order -->
                                <div class="input-group">
                                    <div class="button minus">
                                        <button type="button" class="btn btn-primary btn-number"
                                            {{$item->quantity>1?'':'disabled="disabled"'}} id="decrement-btn"
                                            data-type="minus" data-field="quant[{{$item->id}}]"
                                            onclick="decrementCount({{$item->id}})">
                                            <i class="ti-minus"></i>
                                        </button>
                                    </div>


                                    <input type="text" name="quant[{{$item->id}}]" class="input-number"
                                        data-min="1" data-max="20" value="{{$item->quantity}}">

                                    {{-- <input type="text" name="quant[{{$item->id}}]" class="input-number"
                                    data-min="1" data-max="20" value="{{$item->quantity}}"> --}}

                                    <div class="button plus">
                                        <button type="button" class="btn btn-primary btn-number"
                                            {{$item->quantity>20?'disabled="disabled"':''}} id="increment-btn"
                                            data-type="plus" data-field="quant[{{$item->id}}]"
                                            onclick="incrementCount({{$item->id}})">
                                            <i class="ti-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="submit" >
                                        <i class=" ti-pencil"></i>
                                </button>
                            </form>
                            </td>
                            <td class="total-amount" data-title="Total"><span>{{$item->total}}</span></td>
                            <td class="action" data-title="Remove">
                                <form action="{{route('cart.destroy',$item->id)}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit"><i class="ti-trash remove-icon"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                <!--/ End Shopping Summery -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form action="#" target="_blank">
                                        <input name="Coupon" placeholder="Enter Your Coupon">
                                        <button class="btn">Apply</button>
                                    </form>
                                </div>
                                <div class="checkbox">
                                    <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
                                <ul>
                                    <li>Cart Subtotal<span>{{$order->sub_total}}</span></li>
                                    <li>Shipping<span>{{$order->shipping_price}}</span></li>
                                    <li>You Save<span>{{$order->discount}}</span></li>
                                    <li class="last">You Pay<span>{{$order->total_price}}</span></li>
                                </ul>
                                <div class="button5">
                                    <a href="{{route('order.show',$order->id)}}" class="btn">Checkout</a>
                                    <a href="{{route('home')}}" class="btn">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>
<!--/ End Shopping Cart -->
        
<!-- Start Shop Services Area  -->
<section class="shop-services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Free shiping</h4>
                    <p>Orders over $100</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Free Return</h4>
                    <p>Within 30 days returns</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Sucure Payment</h4>
                    <p>100% secure payment</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Best Peice</h4>
                    <p>Guaranteed price</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Newsletter -->

@endsection