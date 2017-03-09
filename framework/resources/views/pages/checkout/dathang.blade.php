@extends('layout.master')
@section('title','Đặt hàng')

@section("inner-header")
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Checkout</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Checkout</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
@endsection
@section('container')
<div class="container">
	<div id="content">
		<div class="pull-left">
			<p class="beta-checkout-help">Cần hỗ trợ? Gọi dịch vụ chăm sóc khách hàng 0163 296 7751.</p>
		</div>
		<div class="pull-right menu-underline">
			<a href="#">Email chăm sóc khách hàng</a>
			<a href="#">Thông tin Shipping</a>
		</div>
		<div class="clearfix"></div>
		<div class="space20">&nbsp;</div>

		<div class="beta-message">
			<i class="fa fa-ticket pull-left"></i>
			<span class="pull-left beta-message-text">Have a coupon? Nhập mã khuyến mãi <a href="" style="color:yellow">tại đây</a></span>
			<div class="clearfix"></div>
		</div>
		
		@if(Session::has('success'))
			<div class="space50">&nbsp;</div>
			<div class="alert alert-danger">
		    {{ Session::get('success') }}
		    </div>
		@endif
		@if(!Session::has('cart'))
			<div class="space50">&nbsp;</div>
			<div class="alert alert-danger">
		    {{ Session::get('infor') }}
		    </div>
		@endif
		@if(count($errors)>0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $err)
			<p>{{$err}}</p>
			@endforeach
		</div>
		@endif
        <div class="space50">&nbsp;</div>

		@if(Session('cart'))
		<form action="{{route('checkout')}}" method="post" class="beta-form-checkout">
		<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			<div class="row">
				<div class="col-sm-6">
					<h4>Billing Address</h4>
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						<label for="fullname">Họ tên*</label>
						<input type="text" name="fullname" required>
					</div>
					<div class="form-block">
					<label for="gender">Giới tính</label>
						<select class="form-control selcls" name="gender">
							<option value=""></option>
							<option value="Nữ">Nữ</option>
							<option value="Nam">Nam</option>
							<option value="Khác">Khác</option>
						</select>
					</div>
					<div class="form-block">
						<label for="address">Địa chỉ*</label>
						<input type="text" name="address" value="" required placeholder="Số nhà, tên đường...">
					</div>
					<div class="form-block">
						<label for="email">Địa chỉ Email*</label>
						<input type="email" name="email" required>
					</div>

					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="text" name="phone" required>
					</div>
					<div class="space30">&nbsp;</div>

					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea name="notes"></textarea>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head"><h5>Your Order</h5></div>
						<div class="your-order-body">
						@if(Session::has('cart'))
						@foreach($products as $p)
								
							<div class="your-order-item">
								<div class="pull-left">
									<div class="media">
										<img width="60%" src="assets/dest/images/products/{{$p['item']['image']}}" alt="" class="pull-left">
										<div class="media-body">
											<p class="font-large">{{$p['item']['name']}}</p>
											<!-- 
											<span class="color-gray your-order-info">Color: Red</span>
											<span class="color-gray your-order-info">Size: M</span> -->
											<span class="color-gray your-order-info">Số lượng: {{$p['qty']}}</span>
											<span class="font-large color-gray your-order-info">Giá: {{$p['qty']*$p['item']['unit_price']}}</span>
										</div>
									</div>
								</div>
								
								<div class="clearfix"></div>
							</div>
							@endforeach
						@endif
							<div class="your-order-item pbn">
								<div class="pull-left">
									<p class="your-order-f18">Tổng tiền:</p>
									<p class="your-order-f18">Shipping:</p>
								</div>
								<div class="pull-right">
									<h5 class="color-gray text-right">{{$totalPrice}}</h5>
									<p class="your-order-f18 color-gray text-right">Free Shipping</p>
								</div>
								<div class="clearfix"></div>
							</div>

							<div class="your-order-item">
								<div class="pull-left"><p class="your-order-f18">Tổng cộng:</p></div>
								<div class="pull-right"><h5 class="color-black">{{Session('cart')->totalPrice}}</h5></div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="text-center"><input type='submit' class="btn btn-primary" value='Đặt hàng'/></div> <!-- .your-order -->
						</div>
				</div>
			</div>
		</form>
		@endif
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection