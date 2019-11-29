@extends('frontend::layouts.master')
@section('content')

<section id="about">
	<section id="content-3" class="page-section">
		<div class="container clearfix">
			<div class="content-3-content">
				<div class="row">
					<div class="col-md-6">
						<div class="heading-block"><h3>Our Company Overview</h3></div>
						<p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enimnim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
					</div>
					<div class="col-md-6">
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="content-5" class="page-section" style="background-color: #f6fbff;>
		<div class="container clearfix">
			<div class="content-3-content">
				<div class="row">
					<div class="col-md-6">
						<img src="frontend/about/hinh_1.jpg" alt="">
					</div>
					<div class="col-md-6">
						<div class="heading-block"><h3>Want To Know About Us</h3></div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do smod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis ate irure dolor in reprehenderit in luptate velit esse cillum dolore eu fugiat nulla atur. Excepteur sint caecat cupidatat non proiden. Ut enim ad minim veniam, quirud exercitation ullamco laboris nisi ut aliquip ex.
							<br>
						Deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="content-5" class="page-section"">
		<div class="container clearfix">
			<div class="content-3-content">
				<div class="row">
					<div class="col-md-5">
						<div class="heading-block"><h3>All Roads Lead to Solar!</h3></div>
						<p>{{ get_key_home('SECTION_2')->slogan }}</p>
						<h4>The Cost Benefit Ratio: </h4>
						<p>Akshay Handge dolor sit amet, consectetur adipisicing elido eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud.</p>
						<p>Why Solar Energy ?</p>
						<p>Advantages of Solar Energy: </p>
						<p>Advantages of Solar Energy: </p>
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-6">
						<div class="heading-block" style="margin-top: 90px;"><h4>Our Mission</h4></div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do smod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						<br>
						<div class="heading-block"><h4>Our Mission</h4></div>
						<p>Deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</div>
	</section>
	<section id="content-3" class="page-section">
		<div class="container clearfix">
			<div class="content-3-content">
				<div class="row">
					<div class="col-md-1">
						<img src="frontend/home/slide_3/icon.png" alt="">
					</div>
					<div class="col-md-7">
						<h2>{{ get_key_home('SECTION_3')->title }}</h2>
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-2">
						<a href="#" class="button btn-more"><span>Ask a Question</span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="content-2" class="page-section">
		<div class="container clearfix center">
			<div class="heading-block"><h2>{{ get_key_home('SECTION_2')->title }}</h2></div>
			<p>{{ get_key_home('SECTION_2')->slogan }}</p>
		</div>
		<div class="clearfix">
			<div class="section-2-content" style="margin: 50px;">
				<div class="row">
					<div class="col-md-4">
						@for($i=0; $i < 4; $i++) 
						<div class="row">
							<div class="col-md-3">
								<img src="frontend/home/slide_2/icon_1.png" alt="">
							</div>
							<div class="col-md-9">
								<h4>Long time to use</h4>
								<p>Quisque ut nunc elit. Lorem ipsum dolor Sit amet consectetur.</p>
							</div>
						</div>
						@endfor
					</div>
					<div class="col-md-4"></div>
					<div class="col-md-4 col-right">
						@for($i=0; $i < 4; $i++) 
						<div class="row">
							<div class="col-md-9">
								<h4>Long time to use</h4>
								<p>Quisque ut nunc elit. Lorem ipsum dolor Sit amet consectetur.</p>
							</div>
							<div class="col-md-3">
								<img src="frontend/home/slide_2/icon_1.png" alt="">
							</div>
						</div>
						@endfor
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="content-0" class="page-section" style="padding: 40px; background: url('frontend/about/background_subsrice.jpg');background-repeat: no-repeat;">
		<div class="container clearfix">
			<div class="content-3-content">
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-2" style="padding-right: 0px">
								<img style="width: 80%" src="frontend/about/icon_rocket.png" alt="">
							</div>
							<div class="col-md-8" style="padding-left: 0px">
								<h3 style="margin-bottom: 0px">Subscribe Our Newsletter</h3>
								<p style="margin-top: 0px"><i>Get the latest News & Offers..</i></p>
								<br>
							</div>
							<div class="col-md-2"></div>
							<div class="col-md-8" style="padding-right: 0px">
								<input type="text" style="border-radius: 20px" class="form-control" placeholder="Email">
							</div>
							<div class="col-md-4" style="padding-left: 0px">
								<button class="btn" style="background-color: #328fd1;border-radius: 20px; width: 100%">Submit</button>
							</div>
							<div class="col-md-12">
								<br>
								<br>
								<p>True environmental protection lies in loving the mountains, the oceans and in cherishing all creation.</p>
							</div>
						</div>
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-4">
						<img src="frontend/about/hinh_2.jpg" alt="">
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</div>
	</section>
	<section id="content-8" class="page-section">
		<div class="container clearfix">
			<div id="oc-products" class="owl-carousel products-carousel carousel-widget" data-loop="true" data-margin="20" data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4">
				@for($i = 0; $i < 5; $i++)
				<div class="oc-item">
					<div class="product iproduct clearfix">
						<div class="logo-parner nomargin">
							<img src="{{ url('frontend/home/slide_8/hinh_2.jpg') }}" alt="">
						</div>
					</div>
				</div>
				@endfor
			</div>
		</div>
	</section>
</section>

@endsection