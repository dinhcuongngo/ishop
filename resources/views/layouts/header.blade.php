<header class="header">
	<div class="container clearfix">
		<div class="header__left">
			<a href="" class="header__left_logo">
				<i class="fab fa-skyatlas fa-lg"></i> iShop
			</a>
		</div>
		<div class="header__right">
			
			<nav class="header__right_menu">
				<ul>
					@if(Auth::check())
						<li><a href="/home">Home</a></li>
						<li><a href="/users">User</a></li>
						<li><a href="/shops">Shop</a></li>
						<li><a href="/categories">Category</a></li>
						<li><a href="/products">Product</a></li>
						<li><a href="/suppliers">Supplier</a></li>
						<li><a href="/transactions">Transaction</a></li>
					@else
						<li><a href="/signin">Signin</a></li>
						<li><a href="/signup">Signup</a></li>
						<li><a href="/about">About us</a></li>
						<li><a href="/contact">Contact us</a></li>
					@endif
				</ul>
			</nav>
			
		</div>
	</div>
</header>