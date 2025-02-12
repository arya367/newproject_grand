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
* @since         0.10.0
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
<?= $this->Html->charset() ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $cakeDescription ?>:<?= $this->fetch('title') ?></title>
<?= $this->Html->meta('icon') ?>
<?= $this->Html->css('bootstrap.min.css') ?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>
</head>
<body>

<div class="container">
<div class="row">
<div class="col-lg-5 col-lg-offset-4 login_midl">
<?= $this->fetch('content') ?>
</div>
</div>

</div>
</body>
</html>
