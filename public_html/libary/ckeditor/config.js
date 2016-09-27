/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ){
	config.toolbar = 'Celulose';
	config.toolbar_Celulose = [
		{ name: 'document',	items : [ 'Source'] },
		{ name: 'clipboard',   items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing',	 items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
		'/',
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
		{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
		{ name: 'links',	   items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert',	  items : [ 'Image','Table','HorizontalRule','SpecialChar','PageBreak' ] },
		'/',
		{ name: 'styles',	  items : [ 'Styles','Format','Font','FontSize' ] },
		{ name: 'colors',	  items : [ 'TextColor','BGColor' ] }
	];
};