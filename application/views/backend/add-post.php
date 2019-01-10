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

            <h3 class="box-title"><?php echo ($mode==='add')?ADD_NEW:EDIT; ?> Post</h3>





        </div>

        <!-- /.box-header -->

        <div class="box-body">

            <div class="row">

                <form action="<?php echo  ($mode==='add')? base_url().INSERT_POST : base_url().UPDATE_POST ; ?>" id="postform" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="editid" id="editid" value="<?php if(isset($post)){echo $post[0]['post_id'];} ?>"/>

					<input type="hidden" name="old_featured_image" id="old_featured_image" value="<?php if(isset($post)) {echo $post[0]['post_featured_image'];} ?>" />

                <div class="col-md-6">

                    <div class="form-group">

                        <label>Title<span class="danger1">*</span></label>

                        <input type="text" class="form-control" name="title" id="title" required value="<?php if(isset($post)){ echo $post[0]['post_title'];} ?>" placeholder="Enter Title" />

                        <?php echo form_error('title'); ?>

                    </div>

                </div>

				 <div class="col-md-6">

                    <div class="form-group">

                        <label>Permalink<span class="danger1">*</span></label>

                        <input type="text" class="form-control" name="permalink" id="permalink" required value="<?php if(isset($post)){ echo $post[0]['post_permalink'];} ?>" placeholder="Enter Permalink" />

                        <?php echo form_error('permalink'); ?>

                    </div>

                </div>

				<div class="col-md-6">

                    <div class="form-group">

                        <label>Featured Image</label>

                        <input type="file" class="form-control" name="featured_image" id="featured_image" value="" />

						<?php if (isset($post) && !empty($post[0]['post_featured_image'])) { ?>

						Current Image: <img src="<?php echo base_url() . 'post-image/'.$post[0]['post_featured_image']; ?>" style="width:100px;" />

						<?php } ?>

						<?php echo form_error('featured_image'); ?>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        <label>Featured</label>

                        <br />

                        <input type="checkbox" name="featured" id="featured" <?php if (isset($post)) { if ($post[0]['post_featured'] == 1) {echo "checked"; } } ?> />

                        <?php echo form_error('featured'); ?>

                    </div>

                </div>

				<div class="col-md-12">

                    <div class="form-group">

                        <label>Category<span class="danger1">*</span></label>

						<br />

                        <?php $i=1; foreach ($categories as $category) {

							if (isset($post)) {

								if (in_array($category['cat_id'], $post[0]['post_categories'])) { ?>

									<input type="checkbox" name="category[]" id="category<?=$i;?>" required value="<?php echo $category['cat_id']; ?>" checked="true" />&nbsp;&nbsp;<?=$category['cat_name'];?>&nbsp;&nbsp;

								<?php }

								else { ?>

									<input type="checkbox" name="category[]" id="category<?=$i;?>" required value="<?php echo $category['cat_id']; ?>" />&nbsp;&nbsp;<?=$category['cat_name'];?>&nbsp;&nbsp;

								<?php }

							}

							else { ?>

								<input type="checkbox" name="category[]" id="category<?=$i;?>" required value="<?php echo $category['cat_id']; ?>" />&nbsp;&nbsp;<?=$category['cat_name'];?>&nbsp;&nbsp;

							<?php }

						$i++; } ?>

                        <?php echo form_error('category'); ?>

                    </div>

                </div>

				<div class="col-md-12">

                    <div class="form-group">

                        <label>Content<span class="danger1">*</span></label>

                        <textarea class="form-control" name="content" id="content" required placeholder="Enter Content"><?php if(isset($post)){ echo $post[0]['post_content'];} ?></textarea>

						<script>CKEDITOR.replace('content');</script>

                        <?php echo form_error('content'); ?>

                    </div>

                </div>

                <div class="col-md-6">	

					<br />

                    <div class="col-md-3">

						<?php if (isset($post)) { ?>

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

	$("#postform").validate({

		rules: {

			title: "required",

			permalink: "required",

			content: "required"

		},

		messages: {

			title: "Please enter Title",

			permalink: "Please enter Permalink",

			content: "Please enter Content"

		}

	});

});

</script>



