<footer id="footer" class="dark">

	<div class="container">

		<!-- Footer Widgets -->
		<div class="footer-widgets-wrap clearfix">

			<div class="row">
				<div class="col-md-4">
					<h2>{{ web_config('site_name') }}</h2>
					<div class="heading-block"></div>
					<p>{{ web_config('cty') }}<br>
					{{ web_config('description') }}</p>
					<div class="row">

						<div class="col-lg-6 clearfix bottommargin-sm">
							<a href="https://www.facebook.com/Vikensportsvn/" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>
							<a href="https://www.facebook.com/Vikensportsvn/"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<h2>{{ trans('frontend::frontend.links') }}</h2>
					<div class="heading-block"></div>
					<div class="row">
						<div class="col-md-6">
							<ul>
								@if(get_menu_nav('footer'))
								@foreach(get_menu_nav('footer') as $key => $menu)
								<li>
									<a href="{{ url($menu->getUrl()) }}" style="text-transform: uppercase;"><div>{{ $menu->getTitle() }}</div></a>
								</li>
								@endforeach
								@endif
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<h2 style="margin-bottom: 10px">{{ trans('frontend::frontend.contact') }}</h2>
					<div class="heading-block"></div>
					<h3>{{ web_config('phone') }}</h3>
					<div><p>{{ web_config('email') }}</p></div>
					<div><p>Địa chỉ: {{ web_config('address') }}</p></div>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div><!-- .footer-widgets-wrap end -->
	</div>
	<!-- Copyrights -->
	<div id="copyrights">
		<div class="container clearfix">
			<div class="col_half">
				Copyrights &copy; 2014 All Rights Reserved by <a href="{{ route('frontend.home1.get') }}">{{ web_config('site_name') }}</a>.<br>
			</div>
			<div class="col_half col_last tright">
				<i class="icon-envelope2"></i> {{ web_config('email') }} <span class="middot">&middot;</span> <i class="fas fa-phone"></i> {{ web_config('phone') }}<span class="middot">&middot;</span>
			</div>
		</div>
	</div><!-- #copyrights end -->
</footer><!-- #footer end -->