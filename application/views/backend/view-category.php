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

      <div class="row">

        <div class="col-xs-12">

         

          <div class="box">

            <div class="box-header">

              <h3 class="box-title">View Categories</h3>

            </div>

            <!-- /.box-header -->

            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">

                <thead>

                <tr>

                  <th>S. No.</th>

                  <th>Category</th>

                  <th>Permalink</th>

                  <th>Position</th>

                  <th class="center">Activity</th>

                </tr>

                </thead>

                <tbody>

                

                <?php if(isset($categories)){ $i=1; foreach($categories as $category){?>

                

                <tr>

                  <td><?php echo $i; ?></td>

                  <td><?php echo $category['cat_name']; ?></td>

                  <td><?php echo $category['cat_permalink']; ?></td>

                  <td><?php echo $category['cat_position']; ?></td>

                  <td class="center">

                      <a href="<?php echo base_url() . EDIT_CATEGORY.'/'.base64_encode($category['cat_id']);?>"><button class="btn btn-warning">Edit</button></a>

                      <a href="<?php echo base_url() . DELETE_CATEGORY.'/'.base64_encode($category['cat_id']); ?>" onclick="return confirm('Are you sure you want to delete category?');"><button class="btn btn-danger">Delete</button></a>

                  </td>

                </tr>

                <?php $i++; }}?>

                </tbody>

                

              </table>

              

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

        </div>

        <!-- /.col -->

      </div>

      <!-- /.row -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->



<script src="<?php echo base_url();?>backend-assets/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url();?>backend-assets/plugins/datatables/dataTables.bootstrap.min.js"></script>



<script>

$(function () {

	$("#example1").DataTable();

});

</script>

