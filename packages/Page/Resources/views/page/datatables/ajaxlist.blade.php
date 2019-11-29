@foreach(config('base.language') as $lang => $name)
@if($lang != $ref_lang)
    <a href="{{ route('admin.page.get.edit',$id) }}?ref_lang={{ $lang }}" class="tip" data-original-title="Edit related language for this record">
        @if(get_language_product($lang,$id) > 0)
            <i class="fa fa-edit"></i>
        @else
            <i class="fa fa-plus"></i>
        @endif
    </a>
@else
    <a href="{{ route('admin.page.get.edit',$id) }}?ref_lang={{ $lang }}" class="tip" data-original-title="Current record's language">
        <i class="fa fa-check text-success"></i>
    </a>
@endif
@endforeach