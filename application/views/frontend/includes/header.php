<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php 
    if ($page == 'index') {
        echo PROJECT;
    }
    elseif ($page == 'category') {
        echo $cat_posts[0]['post_cat_name'] . " | " . PROJECT;
    }
    elseif ($page == 'post') {
        echo $post[0]['post_title'] . " | " . PROJECT;
    }
    ?>
    </title>

    <?php if ($page == 'index') { ?>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="og:image" content="<?php echo base_url() . 'post-image/recipebowl.jpg'; ?>">
    <?php } elseif ($page == 'post') { ?>
    <meta name="title" content="<?=$post[0]['post_title'];?>">
    <meta name="description" content="<?php echo mb_substr(strip_tags($post[0]['post_content']), 0, 165); ?>">
    <meta name="og:image" content="<?php echo base_url() . 'post-image/' . $post[0]['post_featured_image']; ?>">
    <?php } ?>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/fav.gif" />
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/fav.gif" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/full-slider.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.fancybox.css">
    <link href="<?php echo base_url(); ?>assets/css/default.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/component.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <!-- JSON-LD markup generated by Google Structured Data Markup Helper. -->
</head>
<!--/head-->

<body>
    <div class="main-wrapper">
        <header>
            <div class="header-top">
                <div class="container">
                    <div class="tm-head row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <ul class="header-link">
                                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Contact</a></li>
                                    <li><a href="#">Advertise</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <ul class="social-icon pull-right">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="logo">
                                <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" class="img-responsive"/></a>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="ad-setting">
                                <img src="<?php echo base_url(); ?>assets/images/foodad.jpg" alt="" class="img-responsive" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item <?php if ($page == 'index') { ?> active <?php } ?> li-home">
                                        <a class="nav-link" href="<?php echo base_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i></a>
                                    </li>
                                    <?php foreach ($categories as $category) { ?>
                                    <li class="nav-item <?php if ($category['cat_permalink'] == htmlspecialchars(strip_tags(trim($this->uri->segment(3))))) { ?> active <?php } ?>">
                                        <a href="<?php echo base_url() . CATEGORY . '/' . $category['cat_permalink']; ?>" class="nav-link"><?php echo $category['cat_name']; ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                               <!--  <ul class="navbar-right">
                                    <li class="column">
                                        <div id="sb-search" class="sb-search">
                                            <form>
                                                <input class="sb-search-input" placeholder="Search Here" type="text" value="" name="search" id="search">
                                                <input class="sb-search-submit" type="submit" value="">
                                                <span class="sb-icon-search"></span>
                                            </form>
                                        </div>
                                    </li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--header ends-->
        <!-- latest news-->
        <div class="latest-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-2 col-sm-2 col-xs-3">
                            <h3><i class="fa fa-plane" aria-hidden="true"></i> Latest Recipe</h3>
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-9 widget-content">
                            <marquee onmouseover="this.stop();" onmouseout="this.start();">
                                <?php foreach ($latest_recipies as $row) { ?>
                                <a href="<?php echo base_url() . POST . '/' . $row['post_permalink']; ?>"><img src="<?php echo base_url() . 'post-image/thumbs/'.$row['post_featured_image']; ?>" />&nbsp; <label class="color-r"><?php echo $row['post_cat_name']; ?></label><?php echo $row['post_title']; ?></a>&nbsp;&nbsp;
                                <?php } ?>
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/latest news-->