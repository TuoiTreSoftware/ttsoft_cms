/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.allowedContent = true;
	config.removeDialogTabs = 'image:advanced;link:advanced';
	config.filebrowserBrowseUrl = BASE_URL_ADMIN +"/ckfinderURL";
	config.filebrowserImageBrowseUrl = BASE_URL_ADMIN +"/ckfinderURL?type=Images";
	config.filebrowserFlashBrowseUrl = BASE_URL_ADMIN +"/ckfinderURL?type=Flash";
	config.filebrowserUploadBrowseUrl = BASE_URL +"/themes/plugins/ckfinder/core/connector/php/connector.php?command=QuickUload&type=Files";
	config.filebrowserImageUploadBrowseUrl = BASE_URL +"/assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUload&type=Image";
	config.filebrowserFlashUploadBrowseUrl = BASE_URL +"/assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUload&type=Flash";
};
