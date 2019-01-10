<footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="footer-title">
                                <h3>Featured Post</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="custom-widget">
                                    <?php foreach ($featured_posts as $row) { ?>
                                    <li><a class="rcthumb" href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>" style="background:url(<?php echo base_url() . 'post-image/thumbs/' . $row['post_featured_image']; ?>) no-repeat center;background-size: cover"><span class="img-overlay"></span></a>
                                        <div class="post-panel">
                                            <h3 class="rcp-title"><a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>"><?php echo $row['post_title']; ?></a></h3><span class="recent-author"><?php echo PROJECT; ?></span><span class="recent-date"><?php echo date("M d, Y", strtotime($row['post_date_time'])); ?></span></div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="footer-title">
                                <h3>Sweets</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="custom-widget">
                                    <?php $a=0; foreach ($sweets_recipies as $row) {
                                        if ($a==4) { break; } ?>
                                    <li><a class="rcthumb" href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>" style="background:url(<?php echo base_url() . 'post-image/thumbs/' . $row['post_featured_image']; ?>) no-repeat center;background-size: cover"><span class="img-overlay"></span></a>
                                        <div class="post-panel">
                                            <h3 class="rcp-title"><a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>"><?php echo $row['post_title']; ?></a></h3><span class="recent-author"><?php echo PROJECT; ?></span><span class="recent-date"><?php echo date("M d, Y", strtotime($row['post_date_time'])); ?></span></div>
                                    </li>
                                    <?php $a++; } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="footer-title">
                                <h3>Recent Post</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="custom-widget">
                                    <?php $a=0; foreach ($latest_recipies as $row) {
                                        if ($a==4) { break; } ?>
                                    <li><a class="rcthumb" href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>" style="background:url(<?php echo base_url() . 'post-image/thumbs/' . $row['post_featured_image']; ?>) no-repeat center;background-size: cover"><span class="img-overlay"></span></a>
                                        <div class="post-panel">
                                            <h3 class="rcp-title"><a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>"><?php echo $row['post_title']; ?></a></h3><span class="recent-author"><?php echo PROJECT; ?></span><span class="recent-date"><?php echo date("M d, Y", strtotime($row['post_date_time'])); ?></span></div>
                                    </li>
                                    <?php $a++; } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--footer section ends-->
        <!--copyright section-->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-6">
                        © 2018-2019 Designed By: <a class="_blank" href="http://www.systootech.com/" target="_blank"> Systoo Impex India Pvt. Ltd.</a>
                    </div>

                    <div class="col-md-6 col-sm-12 col-xs-6">
                        <span id="counter" style="background-color:black;color:red;font-weight:700;padding:0px 10px;font-size:20px;"><?=$visitor_count;?></span>
                    </div>
                </div>
            </div>
        </div>
        <!--/copyright section ends-->
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.fancybox.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/stroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/uisearch.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/classie.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
</body>

</html>