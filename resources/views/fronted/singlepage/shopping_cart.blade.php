@extends('fronted.master')
  @include('fronted.cart')
  @section('content')
        <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Shopping Cart
		</h2>
	</section>
	@php
		$contents = Cart::content();
		$total = 0;
	@endphp
	
		
	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Product</th>
								<th class="column-2">Name</th>
								<th class="column-2">Color</th>
								<th class="column-2">Size</th>
								<th class="column-3">Price</th>
								<th class="column-4">Quantity</th>
								<th class="column-5">Total</th>
							</tr>
							@foreach ($contents as $content)
							<tr class="table_row">
								<td class="column-1">
									<div class="how-itemcart1">
										<img src="{{ url('upload/product_img',$content->options->image) }}" alt="IMG">
									</div>
								</td>
								<td class="column-2">{{ $content->name  }}</td>
								
								<td class="column-2">{{ $content->options->color_name}}</td>
								<td class="column-3">{{ $content->options->size_name }}</td>
								<td class="column-3">{{ $content->price }} Tk</td>
								<td class="column-4">
									<div class="wrap-num-product flex-w m-l-auto m-r-0">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" value="{{ $content->qty }}">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
									<input type="hidden" name="rowId" value="{{ $content->rowId }}">
								</td>
								<td class="column-5">{{ $content->subtotal }} Tk</td>
								<td class="column-5">
									<a class="btn btn-danger" href="{{ route('delete_to_cart',$content->rowId) }}">X</a>
								</td>
							</tr>
							
							@php
								$total +=$content->subtotal;
							@endphp
							@endforeach
							

							
						</table>
					</div>
				</div>

				<div class="col-md-12 col-lg-12 col-xl-12">
					<div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">
                                    <h5>What would you like to do next?</h5>
                                    <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                                </th>
                            </tr>
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="total_area">
                                        <ul>
                                        <li>Cart Sub Total <span>{{ $total}} Tk</span></li>
                                        <li>Eco Tax <span>0.00</span> Tk</li>
                                        <li>Shipping Cost <span>Free</span></li>
                                        <li>Total <span>{{ $total}} Tk</span></li>
                                    </ul>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            <a href="{{ route('product_list') }}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Continue Shopping</a>
                            &nbsp;&nbsp;
							@if (@Auth::user()->id != null && Session::get('shipping_id') == null)
							<a href="{{ route('check_out') }} " class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Checkout</a>
							@elseif (@Auth::user()->id != null && Session::get('shipping_id') != null)
							<a href="{{ route('payment_method') }} " class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Checkout</a>
							@else  
							<a href="{{ route('customer_login') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">Checkout</a>
							@endif

                        </div>
                    </div>
				</div>
			</div>
		</div>
	</form>
            
  @endsection