/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.toolbar_Mini =     [     
		['Image']
	]; 
	config.toolbar_MiniII =     [     
		['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink']
	]; 
	config.toolbar_PhotoAddEdit =     [     
		['Bold', 'Italic']
	]; 
	config.toolbar_PhotoMessage =     [     
		['Bold', 'Italic',  '-', 'Link', 'Unlink']
	]; 
	config.toolbar_Report =     [     
		['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'], ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'], ['Link', 'Unlink', 'Anchor'], 
		'/', 
		['Styles', 'Format', 'Font', 'FontSize'], ['TextColor', 'BGColor']
	]; 
	config.toolbar_Reply =     [     
		['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'], ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'], ['Link', 'Unlink', 'Anchor'], ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'], 
		'/', 
		['Styles', 'Format', 'Font', 'FontSize'], ['TextColor', 'BGColor'], ['Maximize', 'ShowBlocks']
	]; 
};


'Maximize', 'ShowBlocks'

