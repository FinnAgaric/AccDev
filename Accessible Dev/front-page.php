<?php get_header();?>



<section class="importance">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>How Important is Web Accessibility?</h2>
                <div class="row">
                    <div class="col-4">
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
                    <div class="col-8">
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
                
            </div>
        </div>
    </div>
</section>



<?php get_footer();?>