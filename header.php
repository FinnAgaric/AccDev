<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Favicon -->
  <link rel="icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico">

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

  <title><?php bloginfo('name'); ?></title>

  <?php wp_head();?>
</head>

<body <?php body_class();?>>

<header>

  <section class="navbar">
    <div class="container">
      <div class="row">

        <div class="col-12">
          
          <!-- collapsible mobile nav menu, visible md-down -->
          <nav class="navbar navbar-expand-md navbar-custom">
            <img src="<?php bloginfo('template_directory');?>/images/AccDev_logo_blue.png" alt="AccDev Logo">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
              <?php
                wp_nav_menu(array(
                  'menu'            => 'header-menu',
                  'theme_location'  => 'header-menu',
                  'container'       => 'div',
                  'container_id'    => 'bs4navbar',
                  'container_class' => 'collapse navbar-collapse',
                  'menu_id'         => false,
                  'menu_class'      => 'navbar-nav ml-auto',
                  'depth'           => 2,
                  'fallback_cb'     => 'bs4navwalker::fallback',
                  'walker'          => new bs4navwalker()
                ));
              ?>
          </nav>
        </div>

      </div>
    </div>
  </section>

  <!-- php conditions to display different header content depending on template -->
  <?php if(is_front_page()) { ?>
    <section class="front-page-banner">
      <div class="container">
        <div class="row">
            <div class="col-md-9 col-12">
              <h1><?php echo bloginfo('name'); ?></h1>
              <p><?php echo bloginfo('description'); ?>.</p>
              <br>
              <a href="<?php bloginfo('url'); ?>/about" class="btn btn-green" role="button" title="Learn more about AccDev">Learn More</a>
            </div>
            <div class="col-3 text-right d-md-block d-none">
              <img src="<?php bloginfo('template_directory');?>/images/header_icon.png" alt="">
            </div>
        </div>
      </div>
    </section>
  <?php }
  
  else { ?>
    <section class="inner-page-banner">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <?php if(is_home()) { ?>
              <h1>Blog</h1>
            <?php } 
            else { ?>
              <h1><?php the_title() ?></h1>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>

</header>