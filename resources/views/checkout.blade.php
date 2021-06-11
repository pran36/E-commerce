{{-- @dd($order) --}}
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
								<li class="active"><a href="blog-single.html">Checkout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
		<!-- Start Checkout -->
		<section class="shop checkout section">
			<div class="container">
				<div class="row"> 
                    <!-- Form -->
					<form class="form" method="POST" action="{{route('checkout.store')}}">
                        @csrf
                        <div class="col-lg-8 col-12">
                            <div class="checkout-form">
                                <h2>Make Your Checkout Here</h2>
                                <p>Please register in order to checkout more quickly</p>
                                
                                <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Phone Number<span>*</span></label>
                                                <input type="number" name="number" placeholder="" required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>City Name <span>*</span></label>
                                                <input type="text" name="city" placeholder="" required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Address Line<span>*</span></label>
                                                <input type="text" name="address" placeholder="" required="required">
                                            </div>
                                        </div>
                                        <input type="hidden" name='user_id' value="{{Auth::id()}}">
                                        <input type="hidden" name='order_id' value="{{$order->id}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="order-details">
                                <!-- Order Widget -->
                                <div class="single-widget">
                                    <h2>CART  TOTALS</h2>
                                    <div class="content">
                                        <ul>
                                            <li>Sub Total<span>{{$order->sub_total}}</span></li>
                                            <li>(+) Shipping<span>{{$order->shipping_price}}</span></li>
                                            <li class="last">Total<span>{{$order->total_price}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/ End Order Widget -->
                                <!-- Order Widget -->
                                <div class="single-widget">
                                    <h2>Payments</h2>
                                    <div class="content">
                                        <div class="checkbox">
                                            <label class="checkbox-inline" for="1"><input name="payment_gateway" id="1" type="checkbox" value="Check Payment"> Check Payments</label>
                                            <label class="checkbox-inline" for="2"><input name="payment_gateway" id="2" type="checkbox" value="Cash On Delivery"> Cash On Delivery</label>
                                            <label class="checkbox-inline" for="3"><input name="payment_gateway" id="3" type="checkbox" value="PayPal"> PayPal</label>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Order Widget -->
                                <!-- Payment Method Widget -->
                                <div class="single-widget payement">
                                    <div class="content">
                                        <img src="images/payment-method.png" alt="#">
                                    </div>
                                </div>
                                <!--/ End Payment Method Widget -->
                                <!-- Button Widget -->
                                <div class="single-widget get-button">
                                    <div class="content">
                                        <div class="button">
                                            <a href="#" class="btn"onclick="event.preventDefault();this.closest('form').submit();">proceed to checkout</a>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Button Widget -->
                    </form>
                    <!--/ End Form -->
                </div>
			</div>
		</section>
		<!--/ End Checkout -->
		
		<!-- Start Shop Services Area  -->
		<section class="shop-services section home">
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
		<!-- End Shop Services -->
@endsection