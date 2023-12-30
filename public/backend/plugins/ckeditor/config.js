/**
 * @license Copyright (c) 2003-2023, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

	// The toolbar groups arrangement, optimized for two toolbar rows.
    config.filebrowserBrowseUrl = BASE_URL + 'backend/plugins/ckfinder_2/ckfinder.html',
    config.filebrowserImageBrowseUrl = BASE_URL + 'backend/plugins/ckfinder_2/ckfinder.html?type=Images',
    config.filebrowserFlashBrowseUrl = BASE_URL + 'backend/plugins/ckfinder_2/ckfinder.html?type=Flash',
    config.filebrowserUploadUrl = BASE_URL + 'backend/plugins/ckfinder_2/core/connector/php/connector.php?command=QuickUpload&type=Files',
    config.filebrowserImageUrl = BASE_URL + 'backend/plugins/ckfinder_2/core/connector/php/connector.php?command=QuickUpload&type=Images',
    config.filebrowserFlashUrl = BASE_URL + 'backend/plugins/ckfinder_2/core/connector/php/connector.php?command=QuickUpload&type=Flash'
};
