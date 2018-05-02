<footer class="footer">
	<div class="container clearfix">
		<div class="footer__left">
			@if(Auth::check())
				Designed by {{ Auth::user()->name }}
			@else
				Designed by ME
			@endif			
		</div>
		<div class="footer__right">
			@if(Auth::check())
			<ul>
				<li><a href="/logout">Logout</a></li>
			</ul>
			@endif
		</div>
	</div>
</footer>