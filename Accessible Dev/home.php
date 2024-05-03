<?php get_header(); ?>

<section class="blog-page-template">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <br>
                    <!-- desktop display -->
                    <article class="box d-md-block d-none">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="<?php the_permalink(); ?>">
                                    <!-- check for post thumbnail -->
                                    <?php if(has_post_thumbnail()) { ?>
                                    <div class="thumbnail" style="background-image: url('<?php the_post_thumbnail_url(); ?>'); background-size:cover; background-position:center;"></div>
                                    <?php }
                                    else { ?>
                                    <!-- if no thumbnail default to backup image -->
                                    <div class="thumbnail" style="background-image: url('<?php bloginfo('template_directory')?>/images/thumbnail_backup.jpg'); background-size:cover; background-position:center;"></div>
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="col-md-8">
                                <a href="<?php the_permalink(); ?>">
                                    <h2><?php the_title(); ?></h2>
                                    <p class="smallprint"><?php echo get_the_date(); ?> | Archive Category: <?php the_category(', '); ?></p>
                                    <span class="d-xl-block d-none"><?php the_excerpt(); ?></span>
                                </a>
                                <a href="<?php the_permalink(); ?>" class="btn btn-blue">read more</a>
                            </div> 
                        </div>
                    </article>
                    <!-- mobile display -->
                    <article class="d-md-none d-block">
                        <div class="row">
                            <div class="col-12">
                                <div class="content">
                                    <a href="<?php the_permalink(); ?>">
                                        <!-- check for post thumbnail -->
                                        <?php if(has_post_thumbnail()) { ?>
                                        <div class="thumbnail" style="background-image: url('<?php the_post_thumbnail_url(); ?>'); background-size:cover; background-position:center;"></div>
                                        <?php }
                                        else { ?>
                                        <!-- if no thumbnail default to backup image -->
                                        <div class="thumbnail" style="background-image: url('<?php bloginfo('template_directory')?>/images/thumbnail_backup.jpg'); background-size:cover; background-position:center;"></div>
                                        <?php } ?>
                                        <div class="box">
                                            <p class="smallprint"><?php echo get_the_date(); ?> | Archive Category: <?php the_category(', '); ?></p>
                                            <h3 class="title"><?php the_title(); ?></h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                    <br class="d-sm-block d-none">
                <?php endwhile; endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php post_pagination(); ?>
            </div>
        </div>
    </div>  
</section>

<?php get_footer(); ?>