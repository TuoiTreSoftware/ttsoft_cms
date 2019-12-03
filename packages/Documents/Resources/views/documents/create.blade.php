@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Documents</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<a href="{{ route('get.create.document') }}" class="btn btn-info d-none d-lg-block m-l-15">
					<i class="fa fa-plus-circle"></i> Create New
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header bg-info">
				    <h4 class="m-b-0 text-white">Listing</h4>
				</div>
				<div class="card-body">
					<form action="{{ route('post.create.document') }}" method="post">
						{{ csrf_field() }}
						<div class="row">
							<div class="form-group col-md-4">
								<label for="title" class="font-weight-bold">Title</label>
								<input class="form-control" name="title">
							</div>
							<div class="col-md-4">
								<label for="title" class="font-weight-bold">Version</label>
								<select name="version_id" class="select2">
									@foreach($versions as $val)
									<option value="{{ $val->id }}">{{ $val->title }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-4">
								<label for="title" class="font-weight-bold">Href ID</label>
								<select name="data_href_menu" class="select2">
									@foreach($menus as $menu)
									<option value="{{ $menu->data_href }}">{{ $menu->title }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-12">
								<label for="title" class="font-weight-bold">Description</label>
								<textarea name="description" class="form-control"></textarea>
							</div>
							<div class="form-group col-md-12">
								<label for="title" class="font-weight-bold">Content</label>
								{!! ckeditorContent($nameFile = 'content',$old = '', $folder = 'documents', $idContent = 'content' ,$title = trans('Nội dung'),$height = 400) !!}
							</div>
						</div>
						
						
						<div class="form-submit">
							<button type="submit" class="btn btn-info">Submit</button>
							<button type="reset" class="btn btn-basic">Cancel</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection