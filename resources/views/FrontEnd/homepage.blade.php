

@include('FrontEnd.nav');

	<!-- Header -->
	@include('FrontEnd.head');
	<!--/ End Header -->
    <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Trending Item</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main">
								<!-- Tab Nav -->
								<ul class="nav nav-tabs" id="myTab" role="tablist">

									<form action="{{ route('homepage.indexhome') }} " method="get">

                                     <button href="/" class="btn btn-outline-warning rounded-sm" >All Products</button>

                                    @foreach ($categories as $category)
                                    <button type="submit" class="btn btn-outline-warning rounded-sm mb-2" name="category_id" value="{{$category->id}} {{$category->name}}" >{{$category->name}}</button>

                                  @endforeach
                                </form>
								</ul>
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="man" role="tabpanel">
									 <div class="tab-single">
										<div class="row">
                                        @foreach ($products as $product)
											<div class="col-xl-3 col-lg-6 col-md-4 col-12">

												<div class="single-product">
													<div class="product-img">
														<a href="product-details.html">
															<img class="default-img" src="{{Storage::url($product->image)}}" alt="#">
															<img class="hover-img" src="{{Storage::url($product->image)}}" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="{{ route('homepage.showhome', $product->id) }}">show</a>
															</div>
														</div>
													</div>
													<div class="product-content  ">
														<h3><a href="product-details.html">{{$product->name}}</a></h3>
														<div class="product-price">
															<span>${{$product->price}}</span>
														</div>
													</div>
												</div>
											</div>
                                            @endforeach
										</div>
                                       {{-- <div class="card-footer">

                                      {{ $products->links() }}

									</div> --}}

								</div>

							</div>
						</div>

                    {{-- <div class="card-footer text-center">
                    {{$products->links()}}
                    </div> --}}

					</div>

				</div>

            </div>

    </div>

	<!-- End Product Area -->




    @include('FrontEnd.footerbody');


    @include('FrontEnd.Footer');
