<?php get_header(); ?>

	<main id="main" class="full-width site-main page-content" role="main">
        
        <section class="full-width">
            <div class="content-width content-max-width-1024 pad-h-20-1099">
                <!-- BLAIZE_FEATURE hide-premium-content -->
                    <?php if ( have_posts() ) :
                        while ( have_posts() ) : the_post(); ?>
                            <div class="full-width content">
                                <div class="content-wrapper page-content">
                                    <section class="blog-content-container">
                                        <?php the_content(); ?>
                                    </section>
                                </div>
                            </div>
                        <?php endwhile;
                    else : ?>
                        <p>Post not found</p>
                    <?php endif; ?>
                <!-- BLAIZE_FEATURE_END hide-premium-content -->
            
            </div>
        </section>

	</main>

<?php get_footer(); ?>