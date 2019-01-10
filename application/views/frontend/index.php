<!--main section-->
<section class="main-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="widget-content-blk">
                    <ul>
                        <?php foreach ($breakfast_recipies as $row) { ?>
                        <li>
                            <div class="featured-inner">
                                <a class="post-tag" href="<?php echo base_url() . CATEGORY . '/' . $row['post_cat_permalink']; ?>">
                                    <?php echo $row['post_cat_name']; ?>
                                </a>
                                <a class="rcp-thumb" href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>" style="background:url(<?php echo base_url() . 'post-image/'.$row['post_featured_image']; ?>) no-repeat center;  background-size: cover;width:100%; float:left; height:400px;">
                                    <span class="img-overlay"></span>
                                </a>
                                <div class="image-overlay"></div>
                                <div class="post-panel">
                                    <h3 class="rcp-title"><a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>"><?php echo $row['post_title']; ?></a></h3>
                                    <div class="featured-meta">
                                        <span class="featured-author idel"><?php echo PROJECT; ?></span>
                                        <span class="featured-date"><?php echo date("M d, Y", strtotime($row['post_date_time'])); ?></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php break; } ?>
                        <?php foreach ($lunch_recipies as $row) { ?>
                        <li>
                            <div class="featured-inner">
                                <a class="post-tag" href="<?php echo base_url() . CATEGORY . '/' . $row['post_cat_permalink']; ?>">
                                    <?php echo $row['post_cat_name']; ?>
                                </a>
                                <a class="rcp-thumb" href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>" style="background:url(<?php echo base_url() . 'post-image/'.$row['post_featured_image']; ?>) no-repeat center;  background-size: cover;width:100%; float:left; height:400px;">
                                    <span class="img-overlay"></span>
                                </a>
                                <div class="image-overlay"></div>
                                <div class="post-panel">
                                    <h3 class="rcp-title"><a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>"><?php echo $row['post_title']; ?></a></h3>
                                    <div class="featured-meta">
                                        <span class="featured-author idel"><?php echo PROJECT; ?></span>
                                        <span class="featured-date"><?php echo date("M d, Y", strtotime($row['post_date_time'])); ?></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php break; } ?>
                        <li style="margin-bottom:6px;">
                            <div class="featured-inner">
                                <!-- <a class="post-tag" href="#">
                                    Dinner
                                </a> -->
                                <a class="rcp-thumb">
                                </a>
                                <!-- <div class="image-overlay"></div>
                                <div class="post-panel">
                                    <h3 class="rcp-title"><a href="#">How to make paneer roll at home – घर पर झटपट बनाए पनीर रोल</a></h3>
                                    <div class="featured-meta">
                                        <span class="featured-author idel">Ankita Sharma</span>
                                        <span class="featured-date">Feb 27, 2018</span>
                                    </div>
                                </div> -->
                            </div>
                        </li>
                        <?php foreach ($chinese_recipies as $row) { ?>
                        <li>
                            <div class="featured-inner">
                                <a class="post-tag" href="<?php echo base_url() . CATEGORY . '/' . $row['post_cat_permalink']; ?>">
                                    <?php echo $row['post_cat_name']; ?>
                                </a>
                                <a class="rcp-thumb" href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>" style="background:url(<?php echo base_url() . 'post-image/'.$row['post_featured_image']; ?>) no-repeat center;  background-size: cover;width:100%; float:left; height:200px;">
                                    <span class="img-overlay"></span>
                                </a>
                                <div class="image-overlay"></div>
                                <div class="post-panel">
                                    <h3 class="rcp-title"><a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>"><?php echo $row['post_title']; ?></a></h3>
                                    <div class="featured-meta">
                                        <span class="featured-author idel"><?php echo PROJECT; ?></span>
                                        <span class="featured-date"><?php echo date("M d, Y", strtotime($row['post_date_time'])); ?></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php break; } ?>
                    </ul>
                </div>
                <!--left main-section-->
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="recent-post">
                        <div class="box-title">
                            <h2 class="title">
                            <span><a href="<?php echo base_url() . CATEGORY . '/' . $sweets_recipies[0]['post_cat_permalink']; ?>"><?php echo $sweets_recipies[0]['post_cat_name']; ?></a></span>
                        </h2><a class="more-link" href="<?php echo base_url() . CATEGORY . '/' . $sweets_recipies[0]['post_cat_permalink']; ?>">View More</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="widget-content">
                            <ul>
                                <?php foreach ($sweets_recipies as $row) { ?>
                                <div class="bx-first">
                                    <div class="bx-item">
                                        <div class="box-thumbnail">
                                            <a class="bf-thumb" href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>" style="background:url(<?php echo base_url() . 'post-image/'.$row['post_featured_image']; ?>) no-repeat center;  background-size: cover;width:100%; float:left; height:362px;">
                                            <span class="img-overlay"></span>
                                        </a>
                                            <div class="first-tag">
                                                <a class="icon Sweets" href="<?php echo base_url() . CATEGORY . '/' . $row['post_cat_permalink']; ?>"><?php echo $row['post_cat_name']; ?></a>
                                            </div>
                                        </div>
                                        <div class="bf-content">
                                            <h3 class="recent-title"><a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>"><?php echo $row['post_title']; ?></a></h3>
                                            <span class="recent-author"><?php echo PROJECT; ?></span>
                                            <span class="recent-date"><?php echo date("M d, Y", strtotime($row['post_date_time'])); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php break; } ?>
                                <?php $a=0; foreach ($sweets_recipies as $row) { if ($a==0) { $a++; continue; } ?>
                                <li>
                                    <div class="box-thumbnail">
                                        <a class="box-image" href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>" style="background:url(<?php echo base_url() . 'post-image/thumbs/'.$row['post_featured_image']; ?>) no-repeat center center;background-size: cover">
                                            <span class="img-overlay"></span>
                                        </a>
                                    </div>
                                    <div class="recent-content">
                                        <h3 class="recent-title">
                                            <a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>"><?php echo $row['post_title']; ?></a>
                                        </h3>
                                        <span class="recent-author"><?php echo PROJECT; ?></span>
                                        <span class="recent-date"><?php echo date("M d, Y", strtotime($row['post_date_time'])); ?></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                <?php $a++; } ?>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <div class="box-title">
                            <h2 class="title">
                            <span><a href="<?php echo base_url() . CATEGORY . '/' . $breakfast_recipies[0]['post_cat_permalink']; ?>"><?php echo $breakfast_recipies[0]['post_cat_name']; ?></a></span>
                        </h2><a class="more-link" href="<?php echo base_url() . CATEGORY . '/' . $breakfast_recipies[0]['post_cat_permalink']; ?>">View More</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="widget-content-brk">
                            <ul>
                                <?php $a=0; foreach ($breakfast_recipies as $row) { if ($a==0) { $a++; continue; } ?>
                                <li>
                                    <div class="videos-item">
                                        <a class="box-image" href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>" style="background:url(<?php echo base_url() . 'post-image/'.$row['post_featured_image']; ?>) no-repeat center center;background-size: cover">
                                        <span class="videos-overlay"></span>
                                        </a>
                                        <div class="recent-content">
                                            <h3 class="recent-title">
                                                <a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>"><?php echo $row['post_title']; ?></a>
                                            </h3>
                                            <span class="recent-author"><?php echo PROJECT; ?></span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>
                                <?php $a++; } ?>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <div class="box-title">
                            <h2 class="title">
                            <span>Recent Posts</span>
                        </h2><!-- <a class="more-link" href="#">View More</a> -->
                        </div>
                        <div class="clearfix"></div>
                        <div class="blog-posts_hfeed">
                            <?php foreach ($recent_posts as $row) { ?>
                            <div class="post-outer">
                                <div class="post">
                                    <div class="block-image">
                                        <div class="thumb">
                                            <a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>" style="background:url(<?php echo base_url() . 'post-image/' . $row['post_featured_image']; ?>) no-repeat center;background-size:cover; float:left; width:100%; height:190px;"><span class="thumb-overlay"></span></a>
                                        </div>
                                        <div class="postags">
                                            <a class="Breakfast" href="<?php echo base_url() . CATEGORY . '/' . $row['post_cat_permalink']; ?>" rel="tag"><?php echo $row['post_cat_name']; ?></a>
                                        </div>
                                    </div>
                                    <div class="post-header">
                                    </div>
                                    <article>
                                        <font class="retitle">
                                            <h2 class="post-title entry-title"><span>
                                            <a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>">
                                            <?php echo $row['post_title']; ?>
                                            </a>
                                            </span></h2>
                                        </font>
                                        <div class="date-header">
                                            <div id="meta-post">
                                                <a class="g-profile" rel="author" data-gapiscan="true" data-onload="true" data-gapiattached="true">
                                                <span itemprop="name"><?php echo PROJECT; ?></span></a><a class="timestamp-link" rel="bookmark"><span class="published timeago" itemprop="datePublished dateModified"><?php echo date("M d, Y", strtotime($row['post_date_time'])); ?></span></a></div>
                                            <div class="resumo"><span> <?php echo mb_substr(strip_tags($row['post_content']), 0, 185); ?>.....   </span><a class="read-more" href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>">Read More</a></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </article>
                                    <div class="post-footer">
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <?php echo $this->pagination->create_links(); ?>
                                    <!-- <ul class="pagination">
                                        <li><a href="#">«</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">»</a></li>
                                    </ul> -->
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="lunch-panel">
                            <div class="box-title">
                                <h2 class="title"><span><a href="<?php echo base_url() . CATEGORY . '/' . $lunch_recipies[0]['post_cat_permalink']; ?>"><?php echo $lunch_recipies[0]['post_cat_name']; ?></a></span></h2><a class="more-link" href="<?php echo base_url() . CATEGORY . '/' . $lunch_recipies[0]['post_cat_permalink']; ?>">View More</a></div>
                            <div class="widget-content">
                                <ul>
                                    <?php $a=0; foreach ($lunch_recipies as $row) { if ($a==0) { $a++; continue; } ?>
                                    <div class="bx-first">
                                        <div class="box-thumbnail"><a class="bf-thumb" href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>" style="background:url(<?php echo base_url() . 'post-image/' . $row['post_featured_image']; ?>) no-repeat center;background-size: cover; width:100%;float:left; height:200px;"><span class="img-overlay"></span></a>
                                            <div class="first-tag"><a class="icon Lunch" href="<?php echo base_url() . CATEGORY . '/' . $row['post_cat_permalink']; ?>"><?php echo $row['post_cat_name']; ?></a></div>
                                        </div>
                                        <div class="bf-content">
                                            <h3 class="recent-title"><a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>"><?php echo $row['post_title']; ?></a></h3><span class="recent-author"><?php echo PROJECT; ?></span><span class="recent-date"><?php echo date("M d, Y", strtotime($row['post_date_time'])); ?></span></div>
                                    </div>
                                    <?php break; } ?>
                                    <?php $a=0; foreach ($lunch_recipies as $row) { if ($a < 2) { $a++; continue; } ?>
                                    <li>
                                        <div class="box-thumbnail"><a class="box-image" href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>" style="background:url(<?php echo base_url() . 'post-image/thumbs/' . $row['post_featured_image']; ?>) no-repeat center center;background-size: cover;"><span class="img-overlay"></span></a></div>
                                        <div class="recent-content">
                                            <h3 class="recent-title"><a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>"><?php echo $row['post_title']; ?></a></h3><span class="recent-author"><?php echo PROJECT; ?></span><span class="recent-date"><?php echo date("M d, Y", strtotime($row['post_date_time'])); ?></span></div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <?php $a++; } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="dinner-panel">
                            <div class="box-title">
                                <h2 class="title"><span><a href="<?php echo base_url() . CATEGORY . '/' . $dinner_recipies[0]['post_cat_permalink']; ?>"><?php echo $dinner_recipies[0]['post_cat_name']; ?></a></span></h2><a class="more-link" href="<?php echo base_url() . CATEGORY . '/' . $dinner_recipies[0]['post_cat_permalink']; ?>">View More</a></div>
                            <div class="widget-content">
                                <ul>
                                    <?php foreach ($dinner_recipies as $row) { ?>
                                    <div class="bx-first">
                                        <div class="box-thumbnail"><a class="bf-thumb" href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>" style="background:url(<?php echo base_url() . 'post-image/' . $row['post_featured_image']; ?>) no-repeat center;background-size: cover; width:100%;float:left; height:200px;"><span class="img-overlay"></span></a>
                                            <div class="first-tag"><a class="icon Lunch" href="<?php echo base_url() . CATEGORY . '/' . $row['post_cat_permalink']; ?>"><?php echo $row['post_cat_name']; ?></a></div>
                                        </div>
                                        <div class="bf-content">
                                            <h3 class="recent-title"><a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>"><?php echo $row['post_title']; ?></a></h3><span class="recent-author"><?php echo PROJECT; ?></span><span class="recent-date"><?php echo date("M d, Y", strtotime($row['post_date_time'])); ?></span></div>
                                    </div>
                                    <?php break; } ?>
                                    <?php $a=0; foreach ($dinner_recipies as $row) { if ($a < 1) { $a++; continue; } ?>
                                    <li>
                                        <div class="box-thumbnail"><a class="box-image" href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>" style="background:url(<?php echo base_url() . 'post-image/thumbs/' . $row['post_featured_image']; ?>) no-repeat center center;background-size: cover;"><span class="img-overlay"></span></a></div>
                                        <div class="recent-content">
                                            <h3 class="recent-title"><a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>"><?php echo $row['post_title']; ?></a></h3><span class="recent-author"><?php echo PROJECT; ?></span><span class="recent-date"><?php echo date("M d, Y", strtotime($row['post_date_time'])); ?></span></div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <?php $a++; } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="chinese-panel">
                            <div class="box-title">
                                <h2 class="title"><span><a href="<?php echo base_url() . CATEGORY . '/' . $chinese_recipies[0]['post_cat_permalink']; ?>"><?php echo $chinese_recipies[0]['post_cat_name']; ?></a></span></h2><a class="more-link" href="<?php echo base_url() . CATEGORY . '/' . $chinese_recipies[0]['post_cat_permalink']; ?>">View More</a></div>
                            <div class="widget-content">
                                <ul>
                                    <?php $a=0; foreach ($chinese_recipies as $row) { if ($a==0) { $a++; continue; } ?>
                                    <li><a class="box-image" href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>" style="background:url(<?php echo base_url() . 'post-image/' . $row['post_featured_image']; ?>) no-repeat center center;background-size: cover"><span class="gallery-overlay"></span></a>
                                        <div class="recent-content">
                                            <h3 class="recent-title"><a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>"><?php echo $row['post_title']; ?></a></h3><span class="recent-author"><?php echo PROJECT; ?></span></div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <?php $a++; } ?>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!--/left main section ends-->
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
</section>