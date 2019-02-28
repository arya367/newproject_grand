<? if(isset($this->request->params['prefix']) and $this->request->params['prefix']==='admin') {?>  

<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<h2><?php echo $name; ?></h2>
<?php /*?><p class="error">
	<strong><?php echo __d('cake', 'Error'); ?>: </strong>
	<?php printf(
		__d('cake', 'The requested address %s was not found on this server.'),
		"<strong>'{$url}'</strong>"
	); ?>
</p>
<?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?><?php */?>


<? } else { $this->layout='my_error';?><!doctype html>
<html itemscope itemtype="http://schema.org/WebPage">
<head>
<meta charset="utf-8">
<title>Error 404 Page Not Found - India Real Estates</title>
<link rel="shortcut icon" href="<?=SITE_PATH?>images/favicon.ico" type="image/x-icon">
<link href="<?=SITE_PATH?>css/global-indrealestates.css" rel="stylesheet" type="text/css">
<link href="<?=SITE_PATH?>css/contact.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?=SITE_PATH?>css/jquery-ui.css">
<!--[if IE 6]><link href="<?=SITE_PATH?>css/ie/ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
<!--[if IE 7]><link href="<?=SITE_PATH?>css/ie/ie7.css" rel="stylesheet" type="text/css" /><![endif]-->
<!--[if IE 8]><link href="<?=SITE_PATH?>css/ie/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->
<!--[if lt IE 9]><script src="<?=SITE_PATH?>js/all-ie.js"></script><![endif]-->
<script src="<?=SITE_PATH?>js/jquery-1.9.1.js" type="text/javascript"></script>
<script language="JavaScript">
function redireccionar() {
//setTimeout("location.href='<? echo SITE_PATH ; ?>'", 7000);
}
</script>
</head>
<body  onLoad="redireccionar()">
<div class="top_one"></div>
<? echo $this->element('home_menu');?>
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="thank_wrapper">
<div class="thank_inner">
<div class="error_text font_one">404
<p>This wild page has escaped from our servers.</p>
<P><a href="<?=SITE_PATH?>">GO TO HOMEPAGE</a></P>
</div>
</div>
</div>
</div>
</div>
</div>
<? echo $this->element('press-release-footer');?>
<script src="<?=SITE_PATH?>js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="<?=SITE_PATH?>js/jquery-ui.js" type="text/javascript"></script>
<script src="<?=SITE_PATH?>js/global.js" type="text/javascript"></script>
</body>
</html>
<? } ?>