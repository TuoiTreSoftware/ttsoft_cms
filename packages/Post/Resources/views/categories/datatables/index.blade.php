<tbody>
@if($categories)
	@foreach($categories as $key => $category)
	<tr>
		<td><input type="checkbox" class=" checkbox-selected" value="{{ $category->getId() }}"></td>
		<td><a href="#">{{ $category->name }}</a></td>
		<td style="text-align: center;" width="100"><a href="#">{{ count($category->posts()->get()->toArray()) }}</a></td>
		<td>{{ $category->getCreatedAt() }}</td>
		<td>#</td>
		<td width="80">
			<a href="{{ route('admin.post-categories.get.edit',$category->getId()) }}" class="text-dark p-r-10" data-toggle="tooltip" title="Edit">
				<i class="ti-marker-alt"></i>
			</a> 
			<a href="{{ route('admin.post-categories.get.delete',$category->getId()) }}" class="text-dark" title="Delete" data-toggle="tooltip">
				<i class="ti-trash"></i>
			</a>
		</td>
	</tr>
	@endforeach
@endif
</tbody>