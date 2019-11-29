<div class="card">
	<div class="card-body">
		<h5 class="card-title">{{ trans('Danh sách chương trình giảm giá') }}</h5>
		<ul class="country-state">
			@foreach($discounts as $key => $d)
			<li>
				<h2>{{ $d->getCode() }}</h2>
				<small>{{ $d->getTitle() }} ({{ $d->start_date }} - {{ $d->end_date }}) - <b>{{ $d->getDiscountOnline() }}</b></small>
				<div class="pull-right">Xóa
					<a title="Xóa" href="{{ route('admin.promotions.get.deleted',$d->getId()) }}" class="text-dark p-r-10" data-toggle="tooltip" title="Edit">
						<i class="ti-trash"></i>
					</a> 
				</div>
				<div class="progress">
					<div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			</li>
			@endforeach
		</ul>
		
		<div class="row  pull-right" style="margin-top: 15px;">
			<div class="col-md-12">
				{!! $discounts->links('vendor.pagination.bootstrap-4') !!}
			</div>
		</div>
	</div>

</div>