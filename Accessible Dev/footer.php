<footer>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <img src="<?php bloginfo('template_directory');?>/images/AccDev_logo_green.png" alt="AccDev Logo">
                <p><?php echo bloginfo('description'); ?>.</p>
                <p>&copy; <?php echo bloginfo('name')?> <?php echo date("Y"); ?></p>
            </div>
            <div class="col-6">
                <nav class="navbar">
                    <a class="nav-link" href="#">Home</a>
                    <a class="nav-link" href="#">About</a>
                    <a class="nav-link" href="#">Blog</a>
                    <a class="nav-link" href="#">Feedback</a> 
                    <a class="nav-link" href="#">WCAG</a>
                </nav>
            </div>
        </div>
    </div>

</footer>



<?php wp_footer();?>
</body>
</html>