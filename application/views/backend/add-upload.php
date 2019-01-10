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

            <h3 class="box-title">Upload Image</h3>





        </div>

        <!-- /.box-header -->

        <div class="box-body">

            <div class="row">

                <form action="<?php echo base_url().INSERT_UPLOAD; ?>" id="uploadform" method="POST" enctype="multipart/form-data">

                <div class="col-md-6">

                    <div class="form-group">

                        <label>Image<span class="danger1">*</span></label>

                        <input type="file" class="form-control" name="img[]" id="img" required value="" multiple="multiple" />
                    </div>

                </div>



                <div class="col-md-6">	

                    <div class="col-md-3">

						<br />

                        <button type="submit" class="btn btn-block btn-primary">Submit</button>

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



