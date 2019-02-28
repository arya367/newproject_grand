<?php
namespace App\View\Helper;

use Cake\View\Helper;

class SetupEditorHelper extends Helper {
public $helpers = array('Html');
function setupEditor( $textareaId ) {
$path=SITE_PATH;
        return "<script type=\"text/javascript\">
	
	CKEDITOR.replace( '". $textareaId ."', {
    filebrowserBrowseUrl:  '". $path ."js/ckeditor/plugins/uploader/index.php',
        filebrowserWindowWidth: '860',
        filebrowserWindowHeight: '660'
    });
		</script>";
    }
	}
?>