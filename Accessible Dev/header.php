<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico">

  <title><?php bloginfo('name'); ?></title>

  <?php wp_head();?>
</head>

<body <?php body_class();?>>

<header>

<section class="navbar">
  <div class="container">
    <div class="row">
      <!-- collapsible mobile nav menu, visible md-down -->
      <div class="col-sm-6 d-lg-none d-md-block">
        <nav class="navbar navbar-toggleable-sm navbar-custom">
          <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
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
                'menu_class'      => 'navbar-nav mr-auto',
                'depth'           => 2,
                'fallback_cb'     => 'bs4navwalker::fallback',
                'walker'          => new bs4navwalker()
              ));
            ?>
        </nav>
      </div>

      <!-- desktop nav menu, visible lg-up -->
      <div class="col-xl-9 col-lg-10 d-lg-block d-none">
        <nav class="navbar navbar-expand-sm">
          <!-- nav walker for desktop header menu -->
          <?php
            wp_nav_menu(array(
              'menu'            => 'header-menu',
              'theme_location'  => 'header-menu',
              'container'       => 'div',
              'container_id'    => 'bs4navbar',
              'container_class' => '',
              'menu_id'         => false,
              'menu_class'      => 'navbar-nav',
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


<section class="header">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <!-- php conditions to display different header content depending on template -->
        <?php if(is_front_page()) { ?>
          <!-- front page specific header code here -->
        <?php } 
        else { ?>
          <h1><?php the_title() ?></h1>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

</header>