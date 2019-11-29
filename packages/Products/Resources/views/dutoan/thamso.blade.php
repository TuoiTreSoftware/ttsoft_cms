@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Khai Báo Tham Số Dự Toán</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="javascript:void(0)" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Thêm tham số</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			@include('base::partials.flash-notifitions')
			<div class="card">
				<div class="card-body">
					<form action="" method="POST" class="m-b-20">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="loai_thamso">Loại tham số</label>
							<select class="form-control" name="type">
								@foreach(\TTSoft\Products\Entities\TSDT::TYPE as $key => $value)
									<option value="{{ $key }}">{{ $value }}</option>
								@endforeach
							</select>
						</div>
						
						<div class="form-group">
							<label for="name">Tên tham số</label>
							<input type="text" name="name" id="name" class="form-control">
						</div>

						<div class="form-group">
							<label for="value">Giá trị tham số</label>
							<input type="text" name="value" class="form-control">
						</div>

						<div class="row" style="margin-top: 15px;">
							<div class="col-md-4">
								<button class="btn btn-info d-none d-lg-block" type="submit"><i class="fa fa-plus-circle"></i> Thêm hệ số</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-7">
			<div class="card">
				<div class="card-body">
					@foreach(\TTSoft\Products\Entities\TSDT::TYPE as $k => $value)
						<h3 class="box-title">{{ \TTSoft\Products\Entities\TSDT::TYPE[$k] }}</h3>
						<table class="table">
							<thead>
								<tr>
									<th style="width: 35%">Tên tham số</th>
									<th style="width: 35%">Loại</th>
									<th style="width: 30%">Giá trị</th>
								</tr>
							</thead>
							<tbody>
								@foreach(\TTSoft\Products\Entities\TSDT::where('type',$k)->get() as $key => $tsdt)
									<tr>
										<td>{{ $tsdt->getTitle() }}</td>
										<td>{{ \TTSoft\Products\Entities\TSDT::TYPE[$tsdt->type] }}</td>
										<td>{{ $tsdt->getValue() }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<hr class="m-t-0 m-b-40">
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('jQuery')
<script type="text/javascript">$('select').select2();</script>
@endpush
