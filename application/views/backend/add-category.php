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

            <h3 class="box-title"><?php echo ($mode==='add')?ADD_NEW:EDIT; ?> Category</h3>





        </div>

        <!-- /.box-header -->

        <div class="box-body">

            <div class="row">

                <form action="<?php echo  ($mode==='add')? base_url().INSERT_CATEGORY : base_url().UPDATE_CATEGORY ; ?>" id="categoryform" method="POST">

                    <input type="hidden" name="editid" id="editid" value="<?php if(isset($category)){echo $category[0]['cat_id'];} ?>"/>

                <div class="col-md-6">

                    <div class="form-group">

                        <label>Category<span class="danger1">*</span></label>

                        <input type="text" class="form-control" name="category" id="category" required value="<?php if(isset($category)){ echo $category[0]['cat_name'];} ?>" placeholder="Enter Category"/>

                        <?php echo form_error('category'); ?>

                    </div>

                </div>

				

				<div class="col-md-6">

                    <div class="form-group">

                        <label>Permalink<span class="danger1">*</span></label>

                        <input type="text" class="form-control" name="permalink" id="permalink" required value="<?php if(isset($category)){ echo $category[0]['cat_permalink'];} ?>" placeholder="Enter Permalink"/>

                        <?php echo form_error('permalink'); ?>

                    </div>

                </div>

				

				<div class="col-md-4">

                    <div class="form-group">

                        <label>Position<span class="danger1">*</span></label>

                        <input type="number" class="form-control" name="position" id="position" required value="<?php if(isset($category)){ echo $category[0]['cat_position'];} ?>" placeholder="Enter Position"/>

                        <?php echo form_error('position'); ?>

                    </div>

                </div>



                <div class="col-md-6">	

                    <div class="col-md-3">

						<br />

						<?php if (isset($category)) { ?>

						<button type="submit" class="btn btn-block btn-primary">Update</button>

						<?php } else { ?>

                        <button type="submit" class="btn btn-block btn-primary">Submit</button>

						<?php } ?>

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

	$("#categoryform").validate({

		rules: {

			category: "required",

			permalink: "required",

			position: "required"

		},

		messages: {

			category: "Please enter Category",

			permalink: "Please enter Permalink",

			position: "Please enter Position"

		}

	});

});

</script>



