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
            <h3 class="box-title"><?php echo $bcum; ?></h3>


        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <form action="<?php echo base_url() . UPDATE_EXPIRY; ?>" id="expiryform" method="POST">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Start Date<span class="danger1">*</span></label>
                        <input type="text" class="form-control" name="start_date" id="start_date" required value="<?php echo $expiry->start_date; ?>" placeholder=""/>
						<script>
						$('#start_date').datepicker();
						</script>
                        <?php echo form_error('start_date'); ?>
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="form-group">
                        <label>End Date<span class="danger1">*</span></label>
                        <input type="text" class="form-control" name="end_date" id="end_date" required value="<?php echo $expiry->end_date; ?>" placeholder=""/>
						<script>
						$('#end_date').datepicker();
						</script>
                        <?php echo form_error('end_date'); ?>
                    </div>
                </div>
                <div class="col-md-4">	
					<br />
					<div class="col-md-4">
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
		$("#expiryform").validate({
			rules: {
				start_date: "required",
				end_date: "required"
			},
			messages: {
				start_date: "Please enter Start Date",
				end_date: "Please enter End Date"
			}
		});
	});
</script>

