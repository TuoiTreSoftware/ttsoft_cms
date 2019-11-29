
@php
	$ref_lang = (request()->get('ref_lang')) ? request()->get('ref_lang') : config('app.locale');
@endphp
<div class="card-body" style="padding: 8px;">
	<div id="accordion" class="accordion-style1 panel-group no-margin">
	  <div class="panel panel-default">
	     <div class="panel-heading">
	        <h4 class="panel-title"> <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false"></i>Chuyên mục</a> </h4>
	     </div>
	     <div class="panel-collapse collapse" id="collapseOne" aria-expanded="false" style="height: 0px;">
	        <div class="panel-body">
	           <div class="body-check-menu">
	              <form role="form" method="post" enctype="multipart/form-data" action="{{ route('admin.menu.postAddCatePost') }}">
	                 {{ csrf_field() }}
	                 <ul class="list-check-menu">
	                 	<input type="hidden" name="category_menu" value="{{ $cate->id }}">
	                 	<input type="hidden" name="lang" value="{{ $ref_lang }}">
	                    {{ menu_category($ref_lang) }}
	                 </ul>
	                 <button type="submit" name="btn-submit-page" class="btn btn-white btn-success btn-xs btn-mrt-5" id="add-page-menu"> <i class="ace-icon fa fa-plus"></i> Thêm vào menu</button>
	              </form>
	           </div>
	        </div>
	     </div>
	  </div>
	  {{-- Bài viết --}}
	  <div class="panel panel-default">
	     <div class="panel-heading">
	        <h4 class="panel-title"> <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false"></i> Bài viết</a> </h4>
	     </div>
	     <div class="panel-collapse collapse" id="collapse2" aria-expanded="false" style="height: 0px;">
	        <div class="panel-body">
	           <div class="body-check-menu">
	              <form role="form" method="post" enctype="multipart/form-data" action="{{ route('admin.menu.postAddPost') }}">
	                 {{ csrf_field() }}
	                 <input type="hidden" name="category" value="{{ $cate->id }}">
	                 <input type="hidden" name="lang" value="{{ $ref_lang }}">
	                 <ul class="list-check-menu">
	                    {{ menu_post($ref_lang) }}
	                 </ul>
	                 <button type="submit" name="btn-submit-page" class="btn btn-white btn-success btn-xs btn-mrt-5" id="add-page-menu"> <i class="ace-icon fa fa-plus"></i> Thêm vào menu</button>
	              </form>
	           </div>
	        </div>
	     </div>
	  </div>
	  {{-- Page --}}
	  <div class="panel panel-default">
	     <div class="panel-heading">
	        <h4 class="panel-title"> <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false"></i> Trang tỉnh</a> </h4>
	     </div>
	     <div class="panel-collapse collapse" id="collapse4" aria-expanded="false" style="height: 0px;">
	        <div class="panel-body">
	           <div class="body-check-menu">
	              <form role="form" method="post" enctype="multipart/form-data" action="{{ route('admin.menu.postAddPage') }}">
	                 {{ csrf_field() }}
	                 <input type="hidden" name="category" value="{{ $cate->id }}">
	                 <input type="hidden" name="lang" value="{{ $ref_lang }}">
	                 <ul class="list-check-menu">
	                    {{ menu_page($ref_lang) }}
	                 </ul>
	                 <button type="submit" name="btn-submit-page" class="btn btn-white btn-success btn-xs btn-mrt-5" id="add-page-menu"> <i class="ace-icon fa fa-plus"></i> Thêm vào menu</button>
	              </form>
	           </div>
	        </div>
	     </div>
	  </div>
	  {{-- Lien ket tuy chinh --}}
	  <div class="panel panel-default">
	     <div class="panel-heading">
	        <h4 class="panel-title"> <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false"></i> Liên kết tùy chỉnh</a> </h4>
	     </div>
	     <div class="panel-collapse collapse" id="collapse5" aria-expanded="false" style="height: 0px;">
	        <div class="panel-body">
	           <div class="body-check-menu">
	              <form role="form" method="post" enctype="multipart/form-data" action="{{ route('admin.menu.postAddCustom') }}">
	                 {{ csrf_field() }}
	                 <input type="hidden" name="category" value="{{ $cate->id }}">
	                 <input type="hidden" name="lang" value="{{ $ref_lang }}">
	                 <div class="body-check-menu" style="margin-bottom: 10px;"> URL <br>
	                    <input class="form-control" type="text" id="custom-menu-url" name="custom_menu_url" value="http://">
	                    <br>
	                    Đường dẫn bằng chữ <br>
	                    <input class="form-control" type="text" id="custom-menu-title" name="custom_menu_title" value="" placeholder="Trình đơn">
	                 </div>
	                 <button type="submit" name="btn-submit-page" class="btn btn-white btn-success btn-xs btn-mrt-5" id="add-page-menu"> <i class="ace-icon fa fa-plus"></i> Thêm vào menu</button>
	              </form>
	           </div>
	        </div>
	     </div>
	  </div>
	</div>
	</div>