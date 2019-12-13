@extends('frontend::documents.layouts.master_index')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<style type="text/css">
	.form-submit{
		margin-top: 30px;
	}
</style>
@endpush
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
							<div class="row">
								<div class="col-md-6">
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
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Programing Language</label>
										<input type="text" class="form-control" id="tagsinput" name="content[language]" data-role="tagsinput">
									</div>
									<div class="form-group">
										<label>Start working</label>
										<select class="form-control select2" name="content[start_working]">
											<option value="">--Select--</option>
											<?php $year = 2000; ?>
											@for($i=$year; $i<=2019; $i++ )
											<option value="{{ $i }}">{{ $i }}</option>
											@endfor
										</select>
									</div>
								</div>
							</div>
							<div class="form-submit center">
								<input type="hidden" required="" name="content[content]" value="Get {{ $template }} template" class="form-control">
								<button class="btn btn-danger" style="width:35%">Register</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script>

	$(document).ready(function(){
		$('.select2').select2();

		var msg = '{{Session::get('message')}}';
	    var exist = '{{Session::has('message')}}';
	    $("#successmsg").hide();
	    $("#errormsg").hide();
	    if(exist && msg === 'success'){
	      $("#successmsg").show();
	    }if(exist && msg === 'error'){
	      $("#errormsg").show();
	    }

	    $(function () {
		    $('#tagsinput').tagsinput();
		});
	});
</script>


@endpush