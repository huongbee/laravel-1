<div id="header">
	<div class="header-top">
		<div class="container">
			<div class="pull-left auto-width-left">
				<ul class="top-menu menu-beta l-inline">
					<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
					<li><a href="#"><i class="fa fa-sitemap"></i> Sitemap</a></li>
				</ul>
			</div>
			<div class="pull-right auto-width-right">
				<ul class="top-details menu-beta l-inline">
					<li class="hidden-xs">
						<select name="languages">
							<option value="ro">Romana</option>
							<option value="en">English</option>
							<option value="ru">Rusa</option>
						</select>
					</li>
					<li class="hidden-xs">
						<select name="currency">
							<option value="usd">USD</option>
							<option value="eur">EUR</option>
							<option value="ron">RON</option>
						</select>
					</li>
					 <li>
					    <a href="{{route('admin.pages.user.signin')}}"><i class="fa fa-user"></i> Đăng nhập</a>
					  </li>
					<li><a href="{{route('admin.pages.user.signup')}}"><i class="fa fa-user"></i> Đăng kí</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-top -->
	<div class="header-body">
		<div class="container beta-relative">
			<div class="pull-left">
				<a href="index.html" id="logo"><img src="assets/dest/images/logo.png" alt=""></a>
				<span class="slogan">a premium HTML Template</span>
			</div>
			<div class="pull-right beta-components space-left ov">
				<div class="space10">&nbsp;</div>
				<div class="beta-comp">
					<form method="post" id="searchform" action="">
				        <input type="text" value="" name="s" id="s" placeholder="Search entire store here..." />
				        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
					</form>
				</div>
				<div class="beta-comp">
					<div class="cart">
						<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng
						{{Session('cart') ? '('.Session('cart')->totalQty
							.')': '(Empty)'}}
						<i class="fa fa-chevron-down"></i>
						</div>
						@if(Session('cart'))
						<div class="beta-dropdown cart-body">
							@foreach($products as $product)
							<div class="cart-item">
								<a class="cart-item-edit" href="#"><i class="fa fa-pencil"></i></a>
								<a class="cart-item-delete" href="#"><i class="fa fa-times"></i></a>
								<div class="media">
									<a class="pull-left" href="#"><img src="assets/dest/images/products/{{$product['item']['image']}}" alt=""></a>
									<div class="media-body">
										<span class="cart-item-title">{{$product['item']['name']}}</span>
										<span class="cart-item-options">Size: XS; Colar: Navy</span>
										<span class="cart-item-amount">{{$product['qty']}}*<span>{{$product['item']['unit_price']}}</span></span>
									</div>
								</div>
							</div>
							@endforeach
							<div class="cart-caption">
								<div class="cart-total text-right">Tổng cộng: <span class="cart-total-value">{{Session('cart')->totalPrice}}</span></div>
								<div class="clearfix"></div>

								<div class="center">
									<div class="space10">&nbsp;</div>
									<a href="{{route('checkout')}}" class="beta-btn primary text-center">Checkout <i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
						@endif
					</div> <!-- .cart -->
				</div>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-body -->

	@yield("menu")
</div>
@yield("inner-header")