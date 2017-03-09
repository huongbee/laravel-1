<div class="container">
		<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
		<div class="visible-xs clearfix"></div>
		<nav class="main-menu">
			<ul class="l-inline ov">
				<li><a href="index.html">Trang chủ</a>
					<ul class="sub-menu">
					@foreach($type as $t)
						<li><a href="sanpham/{{$t->id}}">{{$t->name}}</a></li>
					@endforeach
					</ul>
				</li>
				<li><a href="#">Pages</a>
					<ul class="sub-menu">
						<li><a href="about_1.html">About 1</a></li>
						<li><a href="about_2.html">About 2</a></li>
						<li><a href="testimonials.html">Testimonials</a></li>
						<li><a href="text_page.html">Text Page</a></li>
						<li><a href="typography.html">Typography</a></li>
						<li><a href="accordion_toggles.html">Accordion and Toggles</a></li>
						<li><a href="buttons.html">Buttons</a></li>
						<li><a href="custom_callout_box.html">Custom Callout Box</a></li>
						<li><a href="404.html">Page 404</a></li>
						<li><a href="under_construction.html">Coming Soon</a></li>
					</ul>
				</li>
				<li><a href="features.html">Features</a></li>
				<li><a href="#">Portfolio</a>
					<ul class="sub-menu">
						<li><a href="portfolio_type_a.html">Portfolio type A</a></li>
						<li><a href="#">Portfolio type B</a>
							<ul class="sub-menu">
								<li><a href="portfolio_2col.html">Portfolio B - 2 Columns</a></li>
								<li><a href="portfolio_3col.html">Portfolio B - 3 Columns</a></li>
								<li><a href="portfolio_4col.html">Portfolio B - 4 Columns</a></li>
							</ul>
						</li>
						<li><a href="portfolio_single.html">Portfolio Item</a></li>
					</ul>
				</li>
				<li><a href="#">Blog</a>
					<ul class="sub-menu">
						<li><a href="blog_fullwidth_1col.html">Blog Full Width</a>
							<ul class="sub-menu">
								<li><a href="blog_fullwidth_2col.html">Blog Full Width - 2 Columns</a></li>
								<li><a href="blog_fullwidth_3col.html">Blog Full Width - 3 Columns</a></li>
								<li><a href="blog_fullwidth_4col.html">Blog Full Width - 4 Columns</a></li>
							</ul>
						</li>
						<li><a href="#">Blog Type A</a>
							<ul class="sub-menu">
								<li><a href="blog_with_sidebarleft_type_a.html">Blog A - Left Sidebar</a></li>
								<li><a href="blog_with_sidebarright_type_a.html">Blog A - Right Sidebar</a></li>
							</ul>
						</li>
						<li><a href="blog_with_sidebarleft_type_b.html">Blog Type B</a></li>
						<li><a href="#">Blog Type C</a>
							<ul class="sub-menu">
								<li><a href="blog_with_sidebarleft_type_c.html">Blog C - Left Sidebar</a></li>
								<li><a href="blog_with_sidebarleft_type_c_2cols.html">Blog C - 2 Columns</a></li>
							</ul>
						</li>
						<li><a href="blog_with_sidebarleft_type_d.html">Blog Type D</a></li>
						<li><a href="#">Blog Type E</a>
							<ul class="sub-menu">
								<li><a href="blog_with_sidebarleft_type_e.html">Blog E - Left Sidebar</a></li>
								<li><a href="blog_with_2sidebars_type_e.html">Blog E - 2 Sidebars</a></li>
							</ul>
						</li>
						<li><a href="#">Blog Single Post</a></li>
					</ul>
				</li>
				<li><a href="index.html">Shop</a>
					<ul class="sub-menu">
						<li><a href="index.html">Home Shop 1</a></li>
						<li><a href="home_2.html">Home Shop 2</a></li>
						<li><a href="home_3.html">Home Shop 3</a></li>
						<li><a href="checkout.html">Checkout</a></li>
						<li><a href="pricing.html">Pricing</a></li>
						<li><a href="shopping_cart.html">Shopping Cart</a></li>
						<li><a href="product.html">Product</a></li>
					</ul>
				</li>
				<li><a href="contacts.html">Contact</a></li>
			</ul>
			<div class="clearfix"></div>
		</nav>

	</div> <!-- .container -->