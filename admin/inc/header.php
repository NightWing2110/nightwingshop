<?php
ob_start();
require_once "../../util/dbConnect.php";
require_once "../../util/checkUserUtil.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Page Admin</title>
  <base href="http://localhost:8080/nightwingshop/">
  <link href="templates/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="templates/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="templates/admin/css/sb-admin.css" rel="stylesheet">
  <script src="templates/admin/assets/js/jquery_1.10.2.js"></script>
  <script src="lib/library/ckeditor/ckeditor.js"></script>
  <script src="lib/library/ckfinder/ckfinder.js"></script>
</head>

<body id="page-topf">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="">Welcome to page Admin</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/admin/auth/login.php" data-toggle="modal" data-target="#logoutModal">Đăng xuất</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->

    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span>
        </a>
      </li>
      <?php
      if ($_SESSION["role"] == "admin") {
      ?>
      <li class="nav-item ">
        <a class="nav-link" href="admin/users">
          <i class="fas fa-user-lock"></i>
          <span>Member</span>
        </a>
      </li>
      <?php }?>
      <li class="nav-item ">
        <a class="nav-link" href="admin/cat">
          <i class="fas fa-list"></i>
          <span>Cat</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="admin/product">
          <i class="fas fa-tshirt"></i>
          <span>Product</span>
        </a>
      </li>
      <?php
      if ($_SESSION["role"] == "admin") {
      ?>
      <li class="nav-item ">
        <a class="nav-link" href="admin/transaction">
          <i class="fa fa-table"></i>
          <span>Transaction</span>
        </a>
      </li>
      <?php }?>
      <li class="nav-item ">
        <a class="nav-link" href="admin/contact">
          <i class="fa fa-phone"></i>
          <span>Contact</span>
        </a>
      </li>
    </ul>