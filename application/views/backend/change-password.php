<?php
error_reporting(0);
?>
<!-- Main content -->
<section class="content">
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

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Change Password</h3>


        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <form action="<?php echo base_url() . UPDATE_PASSWORD; ?>" id="changepasswordform" method="POST">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Old Password<span class="danger1">*</span></label>
                        <input type="password" class="form-control" name="old_pass" id="old_pass" required value="" placeholder="Enter Old Password"/>
                        <?php echo form_error('old_pass'); ?>
                    </div>
                </div>
				<div class="col-md-6">
                    <div class="form-group">
                        <label>New Password<span class="danger1">*</span></label>
                        <input type="password" class="form-control" name="new_pass" id="new_pass" required value="" placeholder="Enter New Password"/>
                        <?php echo form_error('new_pass'); ?>
                    </div>
                </div>
				<div class="col-md-6">
                    <div class="form-group">
                        <label>Confirm New Password<span class="danger1">*</span></label>
                        <input type="password" class="form-control" name="confirm_new_pass" id="confirm_new_pass" required value="" placeholder="Enter New Password Again"/>
                        <?php echo form_error('confirm_new_pass'); ?>
                    </div>
                </div>
                <div class="col-md-6">	
					<br />
                    <div class="col-md-3">
						<button type="submit" class="btn btn-block btn-primary">Update</button>
                    </div>   
                </div>
              </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->

    </div>
    <!-- /.box -->


</section>
<!-- /.content -->
</div>

<script src="<?php echo base_url(); ?>backend-assets/js/jquery.validate.js"></script>
<script>
$().ready(function() {
	$("#changepasswordform").validate({
		rules: {
			old_pass: "required",
			new_pass: "required",
			confirm_new_pass: "required"
		},
		messages: {
			old_pass: "Please enter Old Password",
			new_pass: "Please enter New Password",
			confirm_new_pass: "Please enter New Password Again"
		}
	});
});
</script>

