<?php get_header(); ?>



<section id="archive-page-template" class="section-padding bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a class="btn" href="<?php bloginfo('url') ?>/news"><i class="fa-solid fa-arrow-left"></i> Back to All Posts</a>
                <br>
                <br>
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

<!-- btn to top of page -->
<button onclick="topFunction()" id="btn-top" title="Go to top"><i class="fa-solid fa-arrow-up"></i></button>

<!-- js for top button -->
<script>
// Get the button:
let mybutton = document.getElementById("btn-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>



<?php get_footer(); ?>