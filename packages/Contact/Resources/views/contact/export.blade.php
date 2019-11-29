<table>
	<thead>
		<tr>
			<th>{{ trans('#') }}</th>
			<th>{{ trans('Name') }}</th>
			<th>{{ trans('Email') }}</th>
			<th>{{ trans('Content') }}</th>
			<th>{{ trans('Date') }}</th>
		</tr>
	</thead>
	<tbody>
		@if($contacts)
			<tr>
				@foreach($contacts as $key => $contact)
					<td>{{ ++$key }}</td>
					<td>{{ $contact->getName() }}</td>
					<td>{{ $contact->getEmail() }}</td>
					<td>{{ $contact->getContent() }}</td>
					<td>{{ $contact->getCreatedAt() }}</td>
				@endforeach
			</tr>
		@endif
	</tbody>
</table>