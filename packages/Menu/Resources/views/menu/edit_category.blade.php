@extends('base::layouts.master')
@section('content')
<div class="container-fluid">
   <div class="row page-titles">
      <div class="col-md-5 align-self-center">
         <h4 class="text-themecolor">{{ trans('Menu') }}</h4>
      </div>
   </div>
   <div class="row">
      <div class="col-md-3 col-md-3 col-sm-12">
         <div class="card text-white">
            <div class="card-header bg-info">
               <h4 class="m-b-0">Listting Menu</h4>
            </div>
            @include('menu::menu.slidebar',compact('cate'))
         </div>
      </div>
      <div class="col-sm-9">
         <form action="{{ route('admin.menu.cate.post.postEditMenu',$cate->id) }}" method="POST" class="">
            <div class="row">
               {{ csrf_field() }}
               <div class="col-sm-8">
                  <div class="card">
                     <div class="card-header bg-default">
                        <h4 class="m-b-0 text-black">{{ trans('Menu') }}</h4>
                     </div>
                     <div class="card-body">
                        <div class="form-group">
                           <label for="pname">{{ trans('Tiêu đề') }}</label>
                           <input type="text" class="form-control" id="title" placeholder="Enter Name" name="title" value="{{ $cate->title or old('title')}}"> 
                        </div>
                        <div class="form-group">
                           <label  for="example-text-slug">Identify</label>
                           <input type="text" id="example-text-slug" name="identify" class="form-control slug" value="{{ $cate->identify or old('identify') }}" placeholder="Identify" readonly="">
                        </div>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header bg-default">
                        <h4 class="m-b-0 text-black" style="float: left;">{{ trans('Cấu trúc Menu') }}</h4>
                        <a href="javascript:void(0)" style="float: right; margin-top: 2px;" class="show-menu"><strong>Edit Menu</strong></a>
                     </div>
                     <div class="card-body menu-display" style="display: block;">
                        <div class="myadmin-dd dd" id="nestable">
                           {{ menu_list($ref_lang,$cate->id) }}
                        </div>
                        <input type="hidden" id="test" name="menu_data" value="">
                     </div>
                  </div>
               </div>
               {{-- publish --}}
               <div class="col-sm-4">
                  <div class="card">
                     <div class="card-header bg-default">
                        <h4 class="m-b-0 text-black">{{ trans('Status') }}</h4>
                     </div>
                     <div class="card-body">
                        <div class="form-group">
                           <label for="example-text-stt">Trạng thái</label> &nbsp
                           <select class="form-control select2" name="status">
                              <option value="1">Enabled</option>
                              <option value="0">Disabled</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header bg-default">
                        <h4 class="m-b-0 text-black">{{ trans('Ngôn ngữ') }}</h4>
                     </div>
                     <div class="card-body">
                        <div class="form-group">
                           <label for="example-text-stt">{{ trans('Languages') }}</label>
                           <select class="form-control select2" name="language">
                              @foreach(config('base.language') as $lang => $name)
                              <option value="{{ $lang }}">{{ $name }}</option>
                              @endforeach
                           </select>
                           <div style="margin-top: 5px;">
                              <label for="example-text-stt">{{ trans('Translations') }}</label>
                              <div id="list-others-language">
                                 @php 
                                 $languages = config('base.language');
                                 unset($languages[$ref_lang]);
                                 @endphp
                                 @foreach($languages as $key => $lang)
                                 <p>
                                    <img src="{{ asset('uploads/languages') }}/{{ $key }}.png" title="{{ $lang }}" alt="{{ $lang }}">
                                    <a href="?ref_lang={{ $key }}"> {{ $lang }}
                                    <i class="fa fa-plus"></i>
                                    </a>
                                 </p>
                                 @endforeach
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header bg-default">
                        <h4 class="m-b-0 text-black">{{ trans('Publish') }}</h4>
                     </div>
                     <div class="card-body">
                        <input type="hidden" name="lang" value="{{ $ref_lang }}">
                        <button type="submit" class="btn btn-info waves-effect waves-light m-r-10" name="save" value="save">
                        <i class="fa fa-save"></i> {{ trans('Save') }}
                        </button>
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="save_edit" value="save_edit"> 
                        <i class="fa fa-check-circle"></i> {{ trans('Save & Edit') }}
                        </button>
                     </div>
                  </div>
               </div>
         </form>
         </div>  
      </div>
   </div>
</div>
@endsection
@push('jQuery')
<script type="text/javascript">
   $(".show-menu").click(function(){
       $(".menu-display").toggle(200);
   });
</script>
<script type="text/javascript">
   $('.dd').nestable({maxDepth:3});
     function update_out(selector, sel2){
       var out = $(selector).nestable('serialize');
       $(sel2).val(window.JSON.stringify(out));
     }
   update_out('#nestable',"#test");
   $('#nestable').on('change', function() {
     update_out('#nestable',"#test");
   });
   
   $('.dd-handle a').on('mousedown', function(e){
     e.stopPropagation();
   });
   
   $('[data-rel="tooltip"]').tooltip();
   
</script>
@endpush