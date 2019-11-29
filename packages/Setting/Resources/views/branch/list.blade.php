<div class="card">
	<div class="card-header bg-info">
	    <h4 class="m-b-0 text-white">{{ trans('Danh sách chi nhánh') }}</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover product-overview">
				<thead>
					<tr>
						<th style="width: 30px;">
							<input type="checkbox" id="checkbox-all">
						</th>
						<th>{{ trans('Name') }}</th>
						<th>{{ trans('Address') }}</th>
						<th>{{ trans('Provinces/City') }}</th>
						<th style="width: 150px;">{{ trans('post::category.created_at') }}</th>
						<th style="width: 90px;">{{ trans('#') }}</th>
					</tr>
				</thead>
				<tbody>
					@if($branch)
						@foreach($branch as $key => $b)
						<tr>
							<td><input type="checkbox" class=" checkbox-selected" value="{{ $b->getId() }}"></td>
							<td><a href="#">{{ $b->name }}</a></td>
							<td style="text-align: center;">{{ $b->address }}</td>
							<td style="text-align: center;">{{ get_province($b->provinces_id) }}</td>
							<td>{{ $b->getCreatedAt() }}</td>
							<td>
								<a href="{{ route('admin.branch.get.edit',$b->getId()) }}" class="text-dark p-r-10" data-toggle="tooltip" title="Edit">
									<i class="ti-marker-alt"></i>
								</a> 
								<a href="{{ route('admin.branch.get.delete',$b->getId()) }}" class="text-dark" title="Delete" data-toggle="tooltip">
									<i class="ti-trash"></i>
								</a>
							</td>
						</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
		<div class="row  pull-right" style="margin-top: 15px;">
			<div class="col-md-12">
				{!! $branch->links('vendor.pagination.bootstrap-4') !!}
			</div>
		</div>
	</div>

</div>