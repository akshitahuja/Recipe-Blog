<section class="main-section">
    <div class="container">
        <div class="row">
            <div class="margin-req">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!--left main-section-->
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="left-main">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                                <?php foreach ($post[0]['post_categories'] as $row) { ?>
                                <li class="breadcrumb-item"><a href="<?php echo base_url() . CATEGORY . '/' . $row['post_cat_permalink']; ?>"><?php echo $row['post_cat_name']; ?></a></li>
                                <?php } ?>
                                <li class="breadcrumb-item active"><?php echo $post[0]['post_title']; ?></li>
                            </ol>
                            <div class="recipe-block">
                                <div class="rec-heading">
                                    <h2><a><?php echo $post[0]['post_title']; ?></a></h2>
                                </div>
                                <div class="post-meta">
                                    <a class="timestamp-link" rel="bookmark"><span class="published timeago"><?php echo date("M d, Y", strtotime($post[0]['post_date_time'])); ?></span></a>
                                    <span class="label-head">
                                    <a href="<?php echo base_url() . CATEGORY . '/' . $post[0]['post_categories'][0]['post_cat_permalink']; ?>" rel="tag"><?php echo $post[0]['post_categories'][0]['post_cat_name']; ?></a>
                                    </span>
                                    &nbsp;&nbsp;
                                    <i class="fa fa-eye"></i> <?php echo $post[0]['post_views']; ?>
                                </div>
                                <br/>
                                <div class="rec-img">
                                    <img src="<?php echo base_url() . 'post-image/' . $post[0]['post_featured_image']; ?>" class="img-responsive" />
                                </div>
                                <div class="rec-desc">
                                    <?php echo $post[0]['post_content']; ?>
                                </div>
                            </div>
                            <div class="share-box">
                                <h8 class="share-title">Share This</h8>
                                <div class="share-art">
                                    <a class="fac-art" href="http://www.facebook.com/sharer.php?u=<?=$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>&amp;t=<?php echo $post[0]['post_title']; ?>" target="_blank"><i class="fa fa-facebook-official"></i><span class="resp_del"> Facebook</span></a>
                                    <a class="twi-art" href="http://twitter.com/share?text=<?php echo $post[0]['post_title']; ?>;url=<?=$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" target="_blank"><i class="fa fa-twitter"></i><span class="resp_del2"> Twitter</span></a>
                                    <a class="goo-art" href="http://plus.google.com/share?url=<?=$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" target="_blank"><i class="fa fa-google-plus"></i><span class="resp_del3"> Google+</span></a>
                                    <a class="pin-art" href="https://www.pinterest.com/pin/create/button/?url=<?=$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>&amp;media=<?php echo base_url() . 'post-image/' . $post[0]['post_featured_image']; ?>&amp;description=<?php echo $post[0]['post_title']; ?>" target="_blank"><i class="fa fa-pinterest"></i><span class="resp_del3"> Pinterest</span></a>
                                    <a class="wha-art" href="whatsapp://send?text=<?php echo $post[0]['post_title']; ?> - <?=$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" data-action="share/whatsapp/share" target="_blank"><i class="fa fa-whatsapp"></i><span class="resp_del3"> WhatsApp</span></a>
                                </div>
                            </div>
                            <div class="chinese-panel">
                                <div class="widget-content">
                                    <ul>
                                        <?php foreach ($related_posts as $row) { ?>
                                        <li><a class="box-image" href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>" style="background:url(<?php echo base_url() . 'post-image/' . $row['post_featured_image']; ?>) no-repeat center center;background-size: cover"><span class="gallery-overlay"></span></a>
                                            <div class="category-gallery"><a class="icon Chinese" href="#"></a></div>
                                            <div class="recent-content">
                                                <h3 class="recent-title"><a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>"><?php echo $row['post_title']; ?></a></h3><span class="recent-author"><?php echo PROJECT; ?></span></div>
                                            <div class="clearfix"></div>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- <div class="status-upload">
                                <form>
                                    <textarea placeholder="Enter Your Comment ...."></textarea>
                                    <ul>
                                        <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="fa fa-music"></i></a></li>
                                        <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class="fa fa-video-camera"></i></a></li>
                                        <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Sound Record"><i class="fa fa-microphone"></i></a></li>
                                        <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="fa fa-picture-o"></i></a></li>
                                    </ul>
                                    <br/>
                                    <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Share</button>
                                </form>
                            </div> -->
                            <!-- Status Upload  -->
                        </div>
                        <!-- Widget Area -->
                    </div>
                    <!--/left main section ends-->
                    <!--right main section-->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="right-main-section">
                        <br/>
                        <div class="box-title">
                            <h2 class="title">
                                <span>Social Counter</span>
                            </h2>
                        </div>
                        <div class="social-counts">
                            <div class="social-media">
                                <ul>
                                    <li><i class="fa fa-facebook" aria-hidden="true" id="fb"></i>&nbsp; <b>3.5 k</b>
                                        <div class="pull-right">likes</div>
                                    </li>
                                    <li><i class="fa fa-twitter" aria-hidden="true" id="tw"></i>&nbsp; <b>3.5 k</b>
                                        <div class="pull-right">likes</div>
                                    </li>
                                    <li><i class="fa fa-google-plus" aria-hidden="true" id="gg"></i>&nbsp; <b>3.5 k</b>
                                        <div class="pull-right">likes</div>
                                    </li>
                                    <li><i class="fa fa-pinterest" aria-hidden="true" id="pt"></i>&nbsp; <b>3.5 k</b>
                                        <div class="pull-right">likes</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-title">
                            <h2 class="title">
                                <span>Popular Post</span>
                            </h2>
                        </div>
                        <div class="quick-links">
                            <?php foreach ($popular_posts as $row) { ?>
                            <div class="inner-links">
                                <a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>"><div class="link-image"><img src="<?php echo base_url() . 'post-image/thumbs/' . $row['post_featured_image']; ?>" class="img-responsive"></div>
                                <div class="link-desc"><?php echo $row['post_title']; ?></div></a>
                                <span class="recent-author"><?php echo PROJECT; ?></span>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="tbsandpill">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#popular-post">Recent Posts</a></li>
                                <!-- <li><a data-toggle="tab" href="#new-panel">Comments</a></li> -->
                            </ul>
                            <div class="tab-content">
                                <div id="popular-post" class="tab-pane fade in active">
                                    <?php foreach ($latest_recipies as $row) { ?>
                                    <a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>">
                                        <div class="inner-links">
                                            <div class="link-image"><img src="<?php echo base_url() . 'post-image/thumbs/' . $row['post_featured_image']; ?>" class="img-responsive"></div>
                                            <div class="link-desc"><?php echo $row['post_title']; ?>
                                                <div class="item-snippet"><?php echo mb_substr(strip_tags($row['post_content']), 0, 50); ?>.....</div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php } ?>
                                </div>
                                <!-- <div id="new-panel" class="tab-pane fade">
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div> -->
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!-- tabs and pills end -->
                        <div class="box-title">
                            <h2 class="title">
                                <span>Facebook</span>
                            </h2>
                        </div>
                        <div class="quick-links">
                            <div class="facebook-plugin">
                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs&width=340&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="box-title">
                            <h2 class="title">
                                <span>Categories</span>
                            </h2>
                        </div>
                        <div class="quick-links">
                            <ul>
                                <?php foreach ($categories as $category) { ?>
                                <li><a href="<?php echo base_url() . CATEGORY . '/' . $category['cat_permalink']; ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i> <?php echo $category['cat_name']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- <div class="clearfix"></div>
                        <div class="box-title">
                            <h2 class="title">
                                <span>Blog Archive</span>
                            </h2>
                        </div>
                        <div class="quick-links">
                            <a href="#">
                                <div class="date-links">
                                    february 2018 (5)
                                </div>
                            </a>
                            <a href="#">
                                <div class="date-links">
                                    january 2018 (6)
                                </div>
                            </a>
                            <a href="#">
                                <div class="date-links">
                                    december 2017 (8)
                                </div>
                            </a>
                        </div> -->
                        <div class="clearfix"></div>
                    </div>
                    <!--right main section ends-->
                </div>
                    <!--right main section ends-->
                </div>
            </div>
        </div>
    </div>
</section>