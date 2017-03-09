@extends("layout.master")
@section('title', 'Trang chủ')
@section("menu")
<div class="header-bottom color-div">
	@include('pages.trangchu.menu-bar')
</div> <!-- .header-bottom -->
@endsection
@section("slide")
<div class="rev-slider">
	@include("pages.trangchu.banner")
@endsection
<!--slider-->
</div>
@section("container")
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space10">&nbsp;</div>

			@include('pages.trangchu.beta-banner')
			<div class="space60">&nbsp;</div>
			<div class="row">

				</div> <!-- .aside -->
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>New Products</h4>
						<div class="beta-products-details">
							<p class="pull-left">{{$data->count()}} styles found | <a href="#">View all</a></p>
							<p class="pull-right">
								<span class="sort-by">Sort by </span>
								<select name="sortproducts" class="beta-select-primary">
									<option value="desc">Latest</option>
									<option value="popular">Popular</option>
									<option value="rating">Rating</option>
									<option value="best">Best</option>
								</select>
							</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
						@foreach($data as $item)
							<div class="col-md-4">
								<div class="single-item">
								@if($item->new_product==1)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
								@endif
									<div class="single-item-header">
										<a href="chitiet/{{$item->id}}.html"><img src="assets/dest/images/products/{{$item->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$item->name}}</p>
										<p class="single-item-price">
											<span class="flash-del">{{$item->unit_price}}</span>
											<span class="flash-sale">{{$item->promotion_price}}</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{ route('giohang.addToCart',['id' =>$item->id]) }}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{ route('chitietsanpham',['id' => $item->id]) }}">Details <i class="fa fa-chevron-right"></i></a>
										<a class="like" style="margin-top:10px"><i class="fa fa-thumbs-o-up" aria-hidden="true" style="font-size:30px;"></i></a>
									<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">{{$data->links()}}</div>
							<div class="col-md-3"></div>
						</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Top Products</h4>

						<div class="row">
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product.html"><img src="assets/dest/images/products/home_3/4.jpg" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">Sample Woman Top</p>
										<p class="single-item-price">
											<span>$34.55</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product.html"><img src="assets/dest/images/products/home_3/5.jpg" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">Sample Woman Top</p>
										<p class="single-item-price">
											<span>$34.55</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="single-item">
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

									<div class="single-item-header">
										<a href="product.html"><img src="assets/dest/images/products/home_3/6.jpg" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">Sample Woman Top</p>
										<p class="single-item-price">
											<span class="flash-del">$34.55</span>
											<span class="flash-sale">$33.55</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html#"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>

						<div class="space40">&nbsp;</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="single-item">
									<div class="ribbon-wrapper"><div class="ribbon">New!</div></div>

									<div class="single-item-header">
										<a href="product.html"><img src="assets/dest/images/products/home_3/7.jpg" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">Sample Woman Top</p>
										<p class="single-item-price">
											<span>$34.55</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product.html"><img src="assets/dest/images/products/home_3/8.jpg" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">Sample Woman Top</p>
										<p class="single-item-price">
											<span>$34.55</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product.html"><img src="assets/dest/images/products/home_3/3.jpg" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">Sample Woman Top</p>
										<p class="single-item-price">
											<span>$34.55</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div>
<style>
	.pagination li a{
		background-color:#FFDFE0;
	}
	.pagination > .active > span{
		background-color:#F53B51;
		border-color: #F53A51;
	}
</style>
@endsection
