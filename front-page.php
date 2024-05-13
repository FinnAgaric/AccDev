<?php get_header();?>



<section class="importance">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>How Important is Web Accessibility?</h2>
                <div class="row">
                    <div class="col-lg-4 d-lg-block d-none">
                        <div class="card">
                            <div class="row">
                                <div class="col-4">
                                    <p class="big">96%</p>
                                </div>
                                <div class="col-8">
                                    <p>Of home pages have accessibility issues.</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="row">
                                <div class="col-4">
                                    <p class="big">16%</p>
                                </div>
                                <div class="col-8">
                                    <p>Of people worldwide experience disability.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <?php the_field('how_important_is_web_accessibility'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tools">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Tools</h2>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="box">
                            <a href="<?php bloginfo('url'); ?>/colour-contrast-checker/">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-10">
                                            <h3>Colour Contrast Checker</h3>
                                            <p>Test whether the colours on your site meet accessibility requirements.</p>
                                        </div>
                                        <div class="col-2">
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </div>
                                    </div>   
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="box">
                            <a href="<?php bloginfo('url'); ?>/html-validation-tools/">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-10">
                                            <h3>HTML Validation Tools</h3>
                                            <p>See if your site's HTML is valid using Recommended tools.</p>
                                        </div>
                                        <div class="col-2">
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </div>
                                    </div> 
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="box">
                            <a href="<?php bloginfo('url'); ?>/automated-testing-tools/">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-10">
                                            <h3>Automated Testing Tools</h3>
                                            <p>Test your site's accessibility using automated tools.</p>
                                        </div>
                                        <div class="col-2">
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </div>
                                    </div> 
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="box">
                            <a href="<?php bloginfo('url'); ?>/wordpress-plugins/">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-10">
                                            <h3>WordPress Plugins</h3>
                                            <p>Recommended plugins to improve the accessibility of WordPress sites.</p>
                                        </div>
                                        <div class="col-2">
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </div>
                                    </div> 
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="box">
                            <a href="<?php bloginfo('url'); ?>/browser-extensions/">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-10">
                                            <h3>Browser Extensions</h3>  
                                            <p>Recommended browser extensions to help detect issues on websites.</p>
                                        </div>
                                        <div class="col-2">
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </div>
                                    </div> 
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--<section class="resources">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Resources</h2>
                <p>AccDev is full of helpful resources aimed at making it easier for developers to learn about accessibility related topics or how to meet standards.<p>
            </div>
        </div>
    </div>
</section>-->

<section class="recent-posts">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Recent Posts</h2>
                <div class="row">
                    <?php
                    $args = array(
                        'post_status' => 'publish',
                        'order' => 'DES',
                        'posts_per_page' => '2',
                    );

                    $hdfeed = new WP_Query( $args );

                    if ($hdfeed->have_posts()) : while($hdfeed->have_posts()) : $hdfeed->the_post(); ?>

                        <div class="col-md-6 col-12">
                            <article>
                                <a href="<?php the_permalink(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_excerpt(); ?>
                                </a>
                                <a href="<?php the_permalink(); ?>" class="btn btn-blue">Read More</a>
                            </article>
                        </div>

                    <?php endwhile;
                      wp_reset_postdata();
                    else :
                      esc_html_e( 'No posts to display.', 'text-domain' );
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>



<?php get_footer();?>