@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Documents</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('get.create.document_menu') }}" class="btn btn-info d-none d-lg-block m-l-15">
					<i class="fa fa-plus-circle"></i> Create New
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="card">
				<div class="card-header bg-info">
				    <h4 class="m-b-0 text-white">Listing</h4>
				</div>
				<div class="card-body">
					<form action="{{ route('post.edit.document_menu',$menu->id) }}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="title" class="font-weight-bold">Menu</label>
							<input class="form-control" name="title" value="{{ $menu->title }}">
						</div>
						<div class="form-group">
							<label for="title" class="font-weight-bold">Data Href</label>
							<input class="form-control" name="data_href" value="{{ $menu->data_href }}">
						</div>
						<div class="form-group">
							<label for="title" class="font-weight-bold">Parent</label>
							<select name="parent_id" class="select2">
								<option value="0">No parent</option>
								@foreach($menus as $val)
								<option value="{{ $val->id }}" @if($val->id == $menu->parent_id) selected @endif>{{ $val->title }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-submit">
							<button type="submit" class="btn btn-info">Submit</button>
							<button type="reset" class="btn btn-basic">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			@include('documents::menu.list')
		</div>

	</div>
</div>
@endsection