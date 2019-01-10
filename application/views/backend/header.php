<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo PROJECT; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>backend-assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>backend-assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>backend-assets/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>backend-assets/css/custom.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>backend-assets/css/skins/_all-skins.min.css">
  
  
  
<script src="<?php echo base_url(); ?>backend-assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<link  href="<?php echo base_url(); ?>backend-assets/plugins/datepicker/datepicker3.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>backend-assets/plugins/datepicker/bootstrap-datepicker.js"></script>	
<link  href="<?php echo base_url(); ?>backend-assets/plugins/timepicker/bootstrap-timepicker.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>backend-assets/plugins/timepicker/bootstrap-timepicker.js"></script>	
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>backend-assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>backend-assets/plugins/ckeditor/ckeditor.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url() . DASHBOARD; ?>" class="logo">
     
      <span class="logo-lg"><b><?php echo PROJECT; ?></b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- Notifications: style can be found in dropdown.less -->
         
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url(); ?>backend-assets/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ucwords($this->session->userdata['logged_in']['name']); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>backend-assets/img/avatar5.png" class="img-circle" alt="User Image">

                <p><?php echo ucwords($this->session->userdata['logged_in']['name']); ?></p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <!--<div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>-->
                <div class="pull-right">
                  <a href="<?php echo base_url() . BACKEND_LOGOUT; ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>backend-assets/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucwords($this->session->userdata['logged_in']['name']); ?></p>
         
        </div>
      </div>
      
   
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="<?php echo ($tab==='dashboard')?'active':''; ?>"> <a href="<?php echo base_url() . DASHBOARD;?>"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a></li>
		<li class="treeview <?php echo ($main==='category')?'active':''; ?>">
          <a href="#">
            <i class="fa fa-arrows"></i>
            <span>Category</span>
           <!-- <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span> -->
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($tab==='AddCategory')?'active':''; ?>"><a href="<?php echo base_url().ADD_CATEGORY; ?>"><i class="fa fa-circle-o"></i><?php echo ADD_NEW; ?></a></li>
            <li class="<?php echo ($tab==='ViewCategory')?'active':''; ?>"><a href="<?php echo base_url().VIEW_CATEGORY; ?>"><i class="fa fa-circle-o"></i><?php echo VIEW_ALL; ?></a></li>
          </ul>
        </li>
        <li class="treeview <?php echo ($main==='post')?'active':''; ?>">
          <a href="#">
            <i class="fa fa-arrows"></i>
            <span>Post</span>
            <!--<span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>-->
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($tab==='AddPost')?'active':''; ?>"><a href="<?php echo base_url().ADD_POST; ?>"><i class="fa fa-circle-o"></i><?php echo ADD_NEW; ?></a></li>
            <li class="<?php echo ($tab==='ViewPost')?'active':''; ?>"><a href="<?php echo base_url().VIEW_POST; ?>"><i class="fa fa-circle-o"></i><?php echo VIEW_ALL; ?></a></li>
          </ul>
        </li>
        <li class="treeview <?php echo ($main==='upload')?'active':''; ?>">
          <a href="#">
            <i class="fa fa-arrows"></i>
            <span>Upload Image</span>
            <!--<span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>-->
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($tab==='AddUpload')?'active':''; ?>"><a href="<?php echo base_url().ADD_UPLOAD; ?>"><i class="fa fa-circle-o"></i><?php echo ADD_NEW; ?></a></li>
          </ul>
        </li>
		<li class="<?php echo ($tab==='change_password')?'active':''; ?>"> <a href="<?php echo base_url() . CHANGE_PASSWORD;?>"> <i class="fa fa-lock"></i> <span>Change Password</span> </a></li>
		<?php if ($this->session->userdata['logged_in']['usertype'] == 'SuperAdmin') { ?>
		<li class="treeview <?php echo ($main==='expiry')?'active':''; ?>">
          <a href="#">
            <i class="fa fa-arrows"></i>
            <span>Expiry</span>
            <!--<span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>-->
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($tab==='EditExpiry')?'active':''; ?>"><a href="<?php echo base_url().EDIT_EXPIRY; ?>"><i class="fa fa-circle-o"></i>Expiry</a></li>
          </ul>
        </li>
		<?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo ucwords($bcum); ?></h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . DASHBOARD;?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $bcum; ?></li>
      </ol>
    </section>