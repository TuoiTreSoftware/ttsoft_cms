<?php 

function addJs(){
	$js = '';
	$js .= '<script type="text/javascript" src="'.url('assets/admin/plugins/ckfinder/ckfinder.js').'"></script>';
	$js .= '<script type="text/javascript" src="'.url('assets/admin/plugins/ckeditor/ckeditor.js').'"></script>';
	echo $js;
}

function fileUploadSingle($nameFile = 'image',$folder = '', $old = '', $idImage = 'image', $function = 'SetFileField' , $f = 'BrowseServer'){
	addJs();
	$html = view('file::file.fileUploadSingle',[
		'old' => $old,
		'nameFile' => $nameFile,
		'folder' => $folder,
		'idImage' => $idImage,
		'function' => $function,
		'f' => $f,
	]);
    return $html;
}

function fileUploadMultip($action = 'add', $nameFile = 'image', $folder = '' , $idImage = 'image_1', $function = 'SetFileFieldMultip' , $f = 'BrowseDetail'){
	addJs();
	$html = view('file::file.fileUploadMultip',[
		'nameFile' => $nameFile,
		'folder' => $folder,
		'idImage' => $idImage,
		'function' => $function,
		'f' => $f,
		'action' => $action, 
	]);
	return $html;
}

function ckeditorContent($nameFile = 'image', $old = '' ,$folder = '',$idContent = 'content' , $title = 'Nội dung' , $height = 300){
	addJs();
	$html = view('file::file.content',[
		'nameFile' => $nameFile,
		'folder' => $folder,
		'title' => $title,
		'idContent' => $idContent,
		'height' => $height,
		'old' => $old
	]);
	return $html;
}