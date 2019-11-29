<div class="form-group">
	<label>{{ $title }}</label>
	  <textarea class="form-control" name="{{ $nameFile }}" id="{{ $idContent }}">{{ $old ?? old($nameFile) }}</textarea>
	  <script type="text/javascript">
	  	CKEDITOR.replace('{{ $idContent }}',{
	  		toolbar:[
              ['Styles','Format','Font','FontSize','Bold','Italic','Undo','Redo','Cut','Copy','Paste','Find','Replace','-','Outdent','Indent'],
			  ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
			  ['Image','Table','-','Link','Flash','Smiley','TextColor','BGColor','Source','Print']
            ],
	  		height: '{{ $height }}px',
	  		filebrowserImageBrowseUrl: BASE_URL_ADMIN+'/ckfinderURL?Type=Images&startupPath=Images:/{{ $folder }}/'
	  	});
	  </script>
</div>