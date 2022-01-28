<?php get_header(); ?>

	<main id="main" class="full-width site-main content-area" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
                        
            <section class="full-width text-standard main-text" id="main-text-page">
                <div class="content-width content-max-width-1024 pad-h-20-1099">
                	<?php the_content(); ?>
                </div>
            </section>
            

        <?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

<?php get_footer(); ?>