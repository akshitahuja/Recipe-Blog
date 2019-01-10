<!DOCTYPE html>
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
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>backend-assets/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>backend-assets/plugins/iCheck/square/blue.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <b><?php echo PROJECT; ?></b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
      <?php if($this->session->userdata('msg')){
        $stat=$this->session->userdata('status');
        ?>
    <div class="alert <?php echo ($stat==='success')?'alert-success':'alert-danger' ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><?php echo ucfirst($stat);?>!</h4>
                    <?php 
                        $msg=$this->session->userdata('msg');
                        echo $msg;
                        $this->session->set_userdata('msg',''); 
                    ?>
              </div>
    <?php }?>
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo base_url() . BACKEND_LOGIN; ?>" method="POST" id="loginform">
      <div class="form-group has-feedback">
          <input type="text" class="form-control" autocomplete="off" name="users_name" id="users_name" required value="" placeholder="Username">
		  <?php echo form_error('users_name'); ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" class="form-control" autocomplete="off" name="users_password" id="users_password" required value="" placeholder="Password">
		  <?php echo form_error('users_password'); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!--<div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>-->
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!--<div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"> I forgot my password</a>
      
    </div>-->
    <!-- /.social-auth-links -->

    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>backend-assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>backend-assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>backend-assets/plugins/iCheck/icheck.min.js"></script>
<!-- Form validation -->
<script src="<?php echo base_url(); ?>backend-assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>backend-assets/js/jquery.validate.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script>
$().ready(function() {
	$("#loginform").validate({
		rules: {
			users_name: "required",
			users_password: "required",
		},
		messages: {
			users_name: "Please enter your Username",
			users_password: "Please enter your Password",
		}
	});
});
</script>
</body>
</html>
