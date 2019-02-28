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

$cakeDescription = 'Yoo Project Admin Panel';
?><?php  echo $this->element('session'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?= $this->Html->charset() ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
<?= $cakeDescription ?>:
<?= $this->fetch('title') ?>
</title>
<?= $this->Html->meta('icon') ?>
<?= $this->Html->css('sb-admin.min.css') ?>
<?= $this->Html->css('sb-admin.css') ?>
<?= $this->fetch('meta') ?>
 <link href="<?=SITE_PATH?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <!-- Custom fonts for this template-->
    <link href="<?=SITE_PATH?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
    <link href="<?=SITE_PATH?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <script src="<?=SITE_PATH?>vendor/jquery/jquery.min.js"></script>
</head>
<body>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="#">ADMIN PANEL</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        
       
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">
<?php  echo $this->element('adminmenu'); ?>
      <!-- Sidebar -->
      
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          
<?php  //echo $this->element('adminmenu'); ?>
<?= $this->fetch('content') ?>
<footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Yoo projects 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?=SITE_PATH?>admin/users/logout/">Logout</a>
          </div>
        </div>
      </div>
    </div>
 


    <script src="<?=SITE_PATH?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=SITE_PATH?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
   <!-- <script src="<?=SITE_PATH?>vendor/chart.js/Chart.min.js"></script>-->
    <script src="<?=SITE_PATH?>js/demo/datatables-demo.js"></script>
    <script src="<?=SITE_PATH?>vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?=SITE_PATH?>vendor/datatables/dataTables.bootstrap4.js"></script>
   <?= $this->Html->script('sb-admin.min.js') ?>
    <!-- Demo scripts for this page-->
   
   <!-- <script src="<?=SITE_PATH?>js/demo/chart-area-demo.js"></script>-->
 
</body>
</html>
