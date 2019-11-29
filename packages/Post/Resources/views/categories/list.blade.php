<div class="card">
	<div class="card-header bg-info">
	    <h4 class="m-b-0 text-white">{{ trans('post::post.list_post_name') }}</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover product-overview" id="cate-datatables">
				<thead>
					<tr>
						<th style="width: 30px;">
							<input type="checkbox" id="checkall">
						</th>
						<th width="230">{{ trans('post::category.categories') }}</th>
						<th style="text-align: center; width: 80px;">{{ trans('post::category.number_post') }}</th>
						<th style="width: 150px;">{{ trans('post::category.created_at') }}</th>
						<th class="text-left" style="width: {{ count(config('base.language')) * 50 }}px">
							@foreach(config('base.language') as $lang => $name)
	                        	<img src="{{ asset('uploads/languages') }}/{{ $lang }}.png" title="English" alt="English">
							@endforeach
						</th>
						<th style="width: 90px;">{{ trans('#') }}</th>
					</tr>
				</thead>
				@push('jQuery')
					<script>
						$(function() {
						    $('#cate-datatables').DataTable({
						        processing: true,
						        serverSide: true,
						        pageLength : 10,
						        lengthChange : false,
						        searching : false,
						        order: [],
						        columnDefs : [ {
						            targets: [0, 4, 5],
									orderable: false
						        }],
						        ajax: '{!! route('admin.post_categories.datatables.get.list') !!}',
						        columns: [
						            { data: 'check', name: 'check'},
						            { data: 'title', name: 'title',searching : true},
						            { data: 'catogory_title', name: 'catogory_title' },
						            { data: 'created_at', name: 'created_at' },
						            { data: 'languages', name: 'languages'},
						            { data: 'action', name: 'action'}
						        ]
						    });
						});
					</script>
				@endpush
			</table>
		</div>
	</div>
</div>