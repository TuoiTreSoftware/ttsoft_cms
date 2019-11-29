@if($childAttr !== null)
@foreach($childAttr as $key => $v)
<div class="swatch-element nomals sizeClass border-z" style="background: {{ $v->color }}">
 <input id="checkbox-{{ $v->id }}" class="checkbox-style " name="checkbox-{{ $key }}" type="checkbox" value="{{ $v->id }}">
 @if($v->parent_id == 1)
 <label for="checkbox-{{ $v->id }}" class="checkbox-style-3-label" style="background: {{ $v->color  }}">Màu : {{ $v->title }}</label>
 @else
 <label for="checkbox-{{ $v->id }}" class="checkbox-style-3-label" >Size : {{ $v->title }}</label>
 @endif
</div>
@endforeach
@endif