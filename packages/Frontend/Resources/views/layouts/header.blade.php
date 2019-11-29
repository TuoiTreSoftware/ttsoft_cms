<!-- Top Bar -->
<div id="top-bar" class="transparent-topbar not-dark">

	<div class="container clearfix">

		<div class="col_half nobottommargin clearfix">

			<!-- Top Links -->
			<div class="top-links">
				<ul>
					@php 
						$lang = (session()->has('lang_locale_frontend')) ? session()->get('lang_locale_frontend') : config('app.locale');
					@endphp
					<li><a href="javascript:void(0)"> <img src="{{ asset('uploads/languages') }}/{{ $lang }}.png"> {{ config('base.language')[$lang] }}</a>
						<ul>
							@php 
								$languages = config('base.language');
								unset($languages[$lang]);
							@endphp
							@foreach($languages as $key => $lang)
								<li> <a href="{{ route('frontend.home.get.setlang',$key) }}">
									<img src="{{ asset('uploads/languages') }}/{{ $key }}.png">
									{{ $lang }}</a>
								</li>
							@endforeach
						</ul>
					</li>
					@if(get_menu_nav('top_header'))
						@foreach(get_menu_nav('top_header') as $key => $menu)
							<li>
								<a href="{{ url($menu->getUrl()) }}" style="text-transform: uppercase;"><div>{{ $menu->getTitle() }}</div></a>
								@if(get_menu_nav('top_header' , $menu->getId()))
								<ul>
									@foreach(get_menu_nav('top_header' , $menu->getId()) as $menuChild)
									<li><a href="{{ url($menuChild->getUrl()) }}"><div>{{ $menuChild->getTitle() }}</div></a></li>
									@endforeach
								</ul>
								@endif
							</li>
						@endforeach
					@endif
				</ul>
			</div><!-- .top-links end -->

		</div>

		<div class="col_half fright col_last clearfix nobottommargin">

			<!-- Top Social -->
			<div id="top-social">
				<ul>
					<li><a href="https://www.facebook.com/Vikensportsvn/" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
					<li><a href="#" class="si-twitter"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>
					<li><a href="#" class="si-pinterest"><span class="ts-icon"><i class="icon-pinterest"></i></span><span class="ts-text">Pinterest</span></a></li>
					<li><a href="#" class="si-instagram"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
					<li><a href="tel:+91.11.85412542" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text">(028) 7107 7868</span></a></li>
					<li><a href="mailto:info@canvas.com" class="si-email3"><span class="ts-icon"><i class="icon-envelope-alt"></i></span><span class="ts-text">info@canvas.com</span></a></li>
				</ul>
			</div><!-- #top-social end -->

		</div>

	</div>

</div><!-- #top-bar end -->
<header id="header" class="box-header not-dark" data-sticky-class="not-dark" data-responsive-class="not-dark">
	<div id="header-wrap">
		<div class="container clearfix">
			<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
			<div id="logo">
				<a href="{{ url('/') }}" class="standard-logo" data-dark-logo="{{ asset(web_config('logo')) }}"><img src="{{ asset(web_config('logo')) }}" alt="{{web_config('site_name')}}"></a>
				<a href="{{ url('/') }}" class="retina-logo" data-dark-logo="{{ asset(web_config('logo')) }}"><img src="{{ asset(web_config('logo')) }}" alt="{{web_config('site_name')}}"></a>
			</div><!-- #logo end -->
			<nav id="primary-menu" class="not-dark">
				<ul>
					@if(get_menu_nav('main_header'))
						@foreach(get_menu_nav('main_header') as $key => $menu)
							<li>
								<a href="{{ url($menu->getUrl()) }}" style="text-transform: uppercase;"><div>{{ $menu->getTitle() }}</div></a>
								@if(get_menu_nav('main_header' , $menu->getId()))
								<ul>
									@foreach(get_menu_nav('main_header' , $menu->getId()) as $menuChild)
									<li><a href="{{ url($menuChild->getUrl()) }}"><div>{{ $menuChild->getTitle() }}</div></a></li>
									@endforeach
								</ul>
								@endif
							</li>
						@endforeach
					@endif
				</ul>
				<div id="top-cart">
					<a href="{{ url('checkout/cart') }}" id="top-cart-trigger"><i class="icon-shopping-cart"></i>
						<span class="quantity-count">{{ Cart::count() }}</span>
					</a>
					<div class="top-cart-content">
						<div class="top-cart-title">
							<h4>Giỏ hàng</h4>
						</div>
						<?php $total = 0; ?>
						<div class="top-cart-items">
							@if(Cart::count() > 0)
							
							@foreach(Cart::content() as $k => $c)
							<?php 
								$value_vat = ($c->price * $c->options->vat) / 100;
            					$total+= ($c->price) * $c->qty; 
            				?>
							<div class="top-cart-item clearfix">
								<div class="top-cart-item-image">
									<a href="{{ $c->options->url }}"><img src="{{ $c->options->image }}" alt="Blue Round-Neck Tshirt"></a>
								</div>
								<div class="top-cart-item-desc">
									<a href="{{ $c->options->url }}">{{ $c->name }}</a>
									<span class="top-cart-item-price">{{ format_price($c->price) }}đ</span>
									<span class="top-cart-item-quantity">x {{ $c->qty }}</span>
								</div>
							</div>
							@endforeach
							@endif

						</div>
						<div class="top-cart-action clearfix">
							<span class="fleft top-checkout-price">{{ format_price($total) }}đ</span>
							<a href="{{ url('checkout/cart') }}" class="button button-small nomargin fright">Xem giỏ hàng</a>
						</div>
					</div>
				</div>
				<div id="top-search">
					<a href="#" id="top-search-trigger"><i class="fas fa-search"></i></a>
					<form action="search.html" method="get">
						<input type="text" name="search" class="form-control" value="" placeholder="Nhập từ khóa và nhấn Enter...">
					</form>
				</div><!-- #top-search end -->
			</nav><!-- #primary-menu end -->
		</div>
	</div>
</header><!-- #header end -->
