@extends('frontend::documents.layouts.master')
@section('content')
<div id="docs" class="container-fullwidth clearfix">

	@include('frontend::documents.sidebar')
	<div class="docs-content">
		<div class="docs-content-inner page-section">
			<h2>{{ $data->name }}</h2>
			<br>
			<div class="doc-content">
				{!! $data->content !!}
			</div>
		</div>
	</div>
</div>
@endsection