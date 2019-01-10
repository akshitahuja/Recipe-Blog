<section class="main-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!--left main-section-->
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <br/>
                    <div class="clearfix"></div>
                    <div class="box-title">
                        <h2 class="title">
                            <span><?php echo $cat_posts[0]['post_cat_name']; ?></span>
                        </h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class="blog-posts_hfeed">
                        <?php foreach ($cat_posts as $row) { ?>
                        <div class="post-outer">
                            <div class="post">
                                <div class="block-image">
                                    <div class="thumb">
                                        <a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>" style="background:url(<?php echo base_url() . 'post-image/' . $row['post_featured_image']; ?>) no-repeat center;background-size:cover; float:left; width:100%; height:190px;"><span class="thumb-overlay"></span></a>
                                    </div>
                                    <!-- <div class="postags">
                                        <a class="Breakfast" href="#" rel="tag"></a>
                                    </div> -->
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
                                                <span itemprop="name"><?php echo PROJECT; ?></span></a><a class="timestamp-link" rel="bookmark" title="permanent link"><span class="published timeago" itemprop="datePublished dateModified"><?php echo date("M d, Y", strtotime($row['post_date_time'])); ?></span></a></div>
                                        <div class="resumo"><span><?php echo mb_substr(strip_tags($row['post_content']), 0, 185); ?>.....</span><a class="read-more" href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>">Read More</a></div>
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
                </div>
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