<?php /* Template Name: About Page */

get_header(); ?>

	<main id="main" class="full-width site-main page-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
        
            
            <section class="full-width text-standard main-text" id="main-text-home">
                <div class="content-width content-max-width-1200 pad-h-20-1299">
                	<?php the_content(); ?>
                </div>
            </section>

        <?php endwhile; // End of the loop. ?>

    </main><!-- #main -->

<?php get_footer(); ?>