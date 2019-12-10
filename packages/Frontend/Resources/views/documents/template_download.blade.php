@extends('frontend::documents.layouts.master_index')


<?php
	$template = Request::get('subject');
?>
@section('content')
<section id="slider" class="slider-element slider-parallax full-screen dark" style="background: url('http://res.cgvdt.vn/ckfinder/images/Article/2015/loi%20chua%20va%20cuoc%20song/tu%20ngu%20kinh%20thanh/bong%20toi1.jpg') center center no-repeat; background-size: cover">

	<div class="slider-parallax-inner">
		<div class="modal-dialog modal-lg modal_download_template">
			<div class="modal-body">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Register To Download Template</h4>
					</div>
					<div class="modal-body">
						<div class="style-msg successmsg" id="successmsg">
							<div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Well done!</strong> Please check your email!</div>
						</div>
						<div class="style-msg errormsg" id="errormsg">
							<div class="sb-msg"><i class="icon-remove"></i><strong>Oh snap!</strong> Please try again!</div>
						</div>
						<form method="post" action="">
							{{ csrf_field() }}
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Phone Number</label>
								<input type="phone" name="phone_number" required="" class="form-control">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" required="" name="email" class="form-control">
							</div>
							<div class="form-submit">
								<input type="hidden" required="" name="content" value="Get {{ $template }} template" class="form-control">
								<button class="btn btn-danger" style="width:100%">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</div>

</section>
@endsection
@push('js')
<script>
	$(document).ready(function(){
		var msg = '{{Session::get('message')}}';
	    var exist = '{{Session::has('message')}}';
	    $("#successmsg").hide();
	    $("#errormsg").hide();
	    if(exist && msg === 'success'){
	      $("#successmsg").show();
	    }if(exist && msg === 'error'){
	      $("#errormsg").show();
	    }
	});
</script>


@endpush