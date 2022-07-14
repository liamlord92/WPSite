<?php /* Template Name: Signup Page */

get_header(); ?>

  <main id="main" class="full-width site-main page-content" role="main">

    <?php while ( have_posts() ) : the_post(); ?>
      
      <section class="full-width text-standard main-text" id="main-text-home">
        <div class="content-width content-max-width-1200 pad-h-20-1299">
          <?php the_content(); ?>
          <!-- BLAIZE_FEATURE signup-page-login -->
            <div class="full-width signup-form" id="signup-form">
              
            </div>
          <!-- BLAIZE_FEATURE_END signup-page-login -->
          <!-- BLAIZE_FEATURE hide-payment-form -->
            <?php include( locate_template('template-parts/payment-form.php') ); ?>
          <!-- BLAIZE_FEATURE_END hide-payment-form -->
        </div>
      </section>
      
    <?php endwhile; // End of the loop. ?>
      
  </main><!-- #main -->

<?php get_footer(); ?>