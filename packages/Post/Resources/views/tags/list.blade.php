<div class="card">
	<div class="card-body">
		<h5 class="card-title">{{ trans('post::tag.tag') }}</h5>
		<div class="table-responsive">
			<table class="table table-bordered table-hover product-overview">
				<thead>
					<tr>
						<th style="width: 30px;">
							<input type="checkbox" class="check" id="minimal-checkbox-1">
						</th>
						<th>{{ trans('post::tag.tag') }}</th>
						<th>{{ trans('Alias') }}</th>
						<th style="width: 100px;">{{ trans('post::tag.action') }}</th>
					</tr>
				</thead>
				<tbody>
					@if($tags)
						@foreach($tags as $key => $tag)
							<tr>
								<td><input type="checkbox" class="check" id="minimal-checkbox-1"></td>
								<td>{{ $tag->getTitle() }}</td>
								<td>{{ $tag->slug }}</td>
								<td>
									<a href="javascript:void(0)" class="text-dark p-r-10" data-toggle="tooltip" title="Edit">
										<i class="ti-marker-alt"></i>
									</a> 
									<a href="javascript:void(0)" class="text-dark" title="Delete" data-toggle="tooltip">
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
				{!! $tags->links('vendor.pagination.bootstrap-4') !!}
			</div>
		</div>
	</div>

</div>