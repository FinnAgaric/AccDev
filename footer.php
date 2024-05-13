<footer>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-8 col-12">
                <img src="<?php bloginfo('template_directory');?>/images/AccDev_logo_green.png" alt="AccDev Logo">
                <p><?php echo bloginfo('description'); ?>.</p>
                <p>&copy; <?php echo bloginfo('name')?> <?php echo date("Y"); ?></p>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-4 col-12 d-sm-block d-none">
                <nav class="navbar">
                    <a class="nav-link" href="<?php bloginfo('url'); ?>">Home</a>
                    <a class="nav-link" href="<?php bloginfo('url'); ?>/about">About</a>
                    <a class="nav-link" href="<?php bloginfo('url'); ?>/blog">Blog</a>
                    <a class="nav-link" href="<?php bloginfo('url'); ?>/feedback">Feedback</a> 
                    <a class="nav-link" href="https://www.w3.org/TR/WCAG22/" target="_blank">WCAG</a>
                </nav>
            </div>
        </div>
    </div>

</footer>



<?php wp_footer();?>
</body>
</html>