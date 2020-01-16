<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php
    if (isset($titulo)) {
      echo '<title>'. $titulo . '</title>';
    }else{
      echo '<title> Admin Loja Virtual </title>';
    }
  ?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('public/dist/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('public/dist/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('public/dist/Ionicons/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('public/css/AdminLTE.min.css') ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('public/css/skins/_all-skins.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('public/css/admin_loja.css')?>">

  <!-- plugin Data Table -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/dist/DataTables/datatables.css') ?>">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>DM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Loja</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="<?php echo base_url('admin/login/sair') ?>" >Sair do sistema <i class="fa fa-share-square-o"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        <p>Admin Loja</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <li><a href=""><i class="fa fa-th-list"></i><span>Principal</span>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-plus-circle"></i> <span>Cadastro</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Produto </a></li>
            <li><a href="<?= base_url('admin/categorias') ?>" title="Listar Categorias"><i class="fa fa-circle-o"></i> Categoria </a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Marcas </a></li>
            <li><a href="<?= base_url('admin/clientes') ?>" title="Listar Clientes">
              <i class="fa fa-circle-o"></i> Clientes </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Configuração</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Loja </a></li>
            <li><a href="<?php echo base_url('admin/usuarios') ?>">
              <i class="fa fa-circle-o"></i> Usuários </a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> PagSeguro </a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Correios </a></li>
          </ul>
        </li>

        <li><a href="<?php echo base_url('admin/login/sair') ?>"><i class="fa fa-share-square-o"></i> <span>Sair</span></a></li>

          <ul class="treeview-menu">
            <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
     <!--/.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
    if (isset($view)) {
      $this->load->view($view);
    }
    ?>

    <!-- Main content -->
    <section class="content">
    <!--content -->
  </div>
  <!--/.content-wrapper  -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Loja</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018-2019 <a href="">WSS</a>.</strong> All rights
    reserved.
  </footer>


<!-- jQuery 3 -->
<script src="<?php echo base_url('public/js/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('public/dist/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('public/js/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('public/dist/fastclick/lib/fastclick.js')?>"></script>
<!--Plugin DataTables-->
<script type="text/javascript" charset="utf8" src="<?php echo base_url('public/dist/DataTables/datatables.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('public/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('public/js/demo.js')?>"></script>
<!-- Main -->
<script src="<?php echo base_url('public/js/main.js')?>"></script>
<!-- jquery mask -->
<script src="<?php echo base_url('public/dist/jquery-mask/js/jquery.mask.min.js')?>"></script>

</body>
</html>
