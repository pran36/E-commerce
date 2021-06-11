@extends('product_layout')
@section('menu')
    @include('/Includes/menu')
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
								<li class="active"><a href="blog-single.html">Blog Single Sidebar</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
			
		<!-- Start Blog Single -->
		<section class="blog-single section">
			<div class="container">
				<div class="row">
					@php
						$total_review = 0;
						foreach ($reviews as $review) {
							$total_review = $total_review + $review->rating;
						}
						$average_review = $total_review/count($reviews);	
						// return $average_review;
					@endphp
					<div class="col-lg-8 col-12">
						<div class="blog-single-main">
							<div class="row">
								<div class="col-12">
									<div class="image">
                                        @if ($product->image != ' ')
			                                {{ cover_crop($product->image,1900,700)}}
		                                @endif
                                        {{-- {{image_crop($product->image,950,460)}} --}}
										<img src="{{asset('storage/images/thumbnail/'.$product->image)}}" alt="#">
									</div>
									<div class="blog-detail">
										<h2 class="blog-title">{{$product->product_name}}</h2>
										<h3 class="blog-title">Review: {{$average_review}}/5</h3>
										<div class="blog-meta">
											<span class="author"><a href="#"><i class="fa fa-user"></i>By {{$product->user->name}}</a><a href="#"><i class="fa fa-calendar"></i>{{$product->created_at->format('j F,Y')}}</a><a href="#"><i class="fa fa-comments"></i>Comment ({{count($reviews)}})</a></span>
										</div>
										<div class="content">
											{{$product->product_desc}}
										</div>

									</div>
									<div class="share-social">
										<div class="row">
											<div class="col-12">
												<div class="content-tags">
													<h4>Tags:</h4>
													<ul class="tag-inner">
														<li><a href="#">Glass</a></li>
														<li><a href="#">Pant</a></li>
														<li><a href="#">t-shirt</a></li>
														<li><a href="#">swater</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="comments">
										<h3 class="comment-title">Reviews</h3>
										<star-rating></star-rating>
										@foreach ($reviews as $review)
											<!-- Single Comment -->
											<div class="single-comment">
												<img src="https://via.placeholder.com/80x80" alt="#">
												<div class="content">
													<h4>{{$review->user->name}}<span>{{$review->created_at->format('j F,Y')}}</span></h4>
													<p>{{$review->comment}}</p>
													<div class="button">
														<a href="#" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>Reply</a>
													</div>
												</div>
											</div>
										<!-- End Single Comment -->
										@endforeach
									</div>									
								</div>											
								<div class="col-12">			
									<div class="reply">
										<div class="reply-head">
											<h2 class="reply-title">Review this product</h2>
											<!-- Comment Form -->
											<form class="form" action="{{route('reviews.store')}}" method="POST">
                                                @csrf
												<div class="row">
													<div class="col-lg-6 col-md-6 col-12">
														<div class="form-group">
															{{-- <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="2" data-size="xs"> --}}
															<label>Your Rating<span>*</span></label>
															<input type="number" name="rating" placeholder="" required="required">
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-12">
														<div class="form-group">
															<label>Your Review<span>*</span></label>
															<input type="text" name="review" placeholder="" required="required">
														</div>
													</div>
													{{-- <div class="col-12">
														<div class="form-group">
															<label>Your Message<span>*</span></label>
															<textarea name="message" placeholder=""></textarea>
														</div>
													</div> --}}
                                                    <input type="hidden" name='products_id' value="{{$product->id}}">
													<div class="col-12">
														<div class="form-group button">
															<button type="submit" class="btn">Post review</button>
														</div>
													</div>
												</div>
											</form>
											<!-- End Comment Form -->
										</div>
									</div>			
								</div>			
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="main-sidebar">
							@include('sidebar',['categories'=>$categories]) 
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Blog Single -->
@endsection