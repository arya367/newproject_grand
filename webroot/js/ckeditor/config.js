/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.allowedContent = true;
	config.protectedSource.push(/<span[^>]*><\/span>/g);
	config.extraAllowedContent = 'div(*)';
	config.extraAllowedContent = 'span(*)';
	config.extraAllowedContent = 'div(col-md-*,container-fluid,row,data-toggle)';
	config.extraAllowedContent = 'dl; dt dd[dir]';
};
