<tbody>
	@if($posts)
		@foreach($posts as $k => $post)
			<tr>
				<td>
					<input type="checkbox" class="check" id="minimal-checkbox-1" name="check[]" value="{{ $post->getId() }}">
				</td>
				<td><a href="{{ $post->getRoute() }}">{{ $post->getTitle() }}</a></td>
				<td><img src="{{ $post->getImage() }}" width="50"></td>
				<td><a href="#">{{ $post->getCategoryTitle() }}</a></td>
				<td>{{ \Carbon\Carbon::parse($post->start_display)->format('d-m-Y') }}</td>
				<td> 
					@if($post->status == 1)
						<span class="label label-success font-weight-100">Enabled</span> 
					@else
						<span class="label label-danger font-weight-100">Disabled</span> 
					@endif
				</td>
				<td>
					@foreach(config('base.language') as $lang => $name)
						@if($lang != $ref_lang)
							<a href="{{ route('admin.post.get.edit',$post->getId()) }}?ref_lang={{ $lang }}" class="tip" data-original-title="Edit related language for this record">
								@if(get_language_post($lang,$post->id) > 0)
	                    			<i class="fa fa-edit"></i>
	                    		@else
	                    			<i class="fa fa-plus"></i>
	                    		@endif
							</a>
						@else
							<a href="{{ route('admin.post.get.edit',$post->getId()) }}?ref_lang={{ $lang }}" class="tip" data-original-title="Current record's language">
								<i class="fa fa-check text-success"></i>
							</a>
						@endif
					@endforeach
				</td>
				<td>
					<a href="{{ route('admin.post.get.edit',$post->getId()) }}" class="text-dark p-r-10" data-toggle="tooltip" title="Edit">
						<i class="ti-marker-alt"></i>
					</a> 
					<a href="{{ route('admin.post.get.delete',$post->getId()) }}" class="text-dark" title="Delete" data-toggle="tooltip">
						<i class="ti-trash"></i>
					</a>
				</td>
			</tr>
		@endforeach
	@endif
</tbody>