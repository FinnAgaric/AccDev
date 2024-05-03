<?php get_header(); ?>

<section class="post-page-template">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content">
                    <!-- Wysiwug Start -->
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                    <?php endwhile; endif;?>
                    <!--- Wysiwug Editor END -->
                </div>
            </div>
        </div>
    </div>  
</section>

<?php get_footer(); ?>