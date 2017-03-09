@extends('layout.master')
@section('title','Chi tiết sản phẩm ')
@section('container')
<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">
				@foreach($detail as $chitiet)
				<div class="row">
					<div class="col-sm-4">
						<img src="assets/dest/images/products/{{$chitiet->image}}" alt="">
					</div>
					<div class="col-sm-8">
						<div class="single-item-body">
							<p class="single-item-title">{{$chitiet->name}}</p>
							<p class="single-item-price">
								<span>{{$chitiet->promotion_price}}</span>
							</p>
						</div>

						<div class="woocommerce-product-rating" >
							<div class="star-rating" title="Rated 4.00 out of 5"> 
								<span style="width:80%"> <strong itemprop="ratingValue" class="rating">4.00</strong> out of 5 </span>
							</div> 
							<span class="color-gray">(14)</span>
						</div>

						<div class="clearfix"></div>
						<div class="space20">&nbsp;</div>

						<div class="single-item-desc">
							<p>Mô tả ngắn</p>
						</div>
						<div class="space20">&nbsp;</div>

						Số lượng:
						<div class="single-item-options">
							<form role="search" method="get" id="searchform">
								<input type="text" name="qty" value="1" size="1">
							</form>
							<a class="add-to-cart" href="{{route('giohang.addToCart',['id' => $chitiet->id])}}"><i class="fa fa-shopping-cart"></i></a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="tabs">
						<li><a href="#tab-description">Description</a></li>
						<li><a href="#tab-reviews">Reviews (0)</a></li>
					</ul>

					<div class="panel" id="tab-description">
						<p>{{$chitiet->description}}</p>
					</div>
					<div class="panel" id="tab-reviews">
						<p>No Reviews</p>
					</div>
				</div>
				
				@endforeach
				<div class="space50">&nbsp;</div>
				
			</div>
			
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection