@include('base::partials.flash-notifitions')
<div class="card">
	<div class="card-header bg-info">
	    <h4 class="m-b-0 text-white">Listing</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover product-overview" id="post-datatables">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Menu</th>
						<th>Parent</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($menus as $key => $val)
					<tr>
						<th class="text-center">{{ $key+1 }} </th>
						<th>{{ $val->title }} </th>
						<th>{{ $val->getTitleById($val->parent_id) }} </th>
						<th class="text-center">
							<a href="{{ route('delete.document_menu',$val->id) }}" class="mr-2"><i class="fa fa-trash"></i></a>
							<a href="{{ route('get.edit.document_menu',$val->id) }}"><i class="fa fa-pencil"></i></a>
						</th>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>