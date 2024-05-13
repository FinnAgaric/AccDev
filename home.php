<?php get_header(); ?>

<section class="blog-page-template">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article class="box">
                        <div class="row">
                            <div class="col-12">
                                <a href="<?php the_permalink(); ?>">
                                    <h2><?php the_title(); ?></h2>
                                    <?php the_excerpt(); ?>
                                </a>
                                <br>
                                <a href="<?php the_permalink(); ?>" class="btn btn-blue">read more</a>
                            </div> 
                        </div>
                    </article>
                    <hr>
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