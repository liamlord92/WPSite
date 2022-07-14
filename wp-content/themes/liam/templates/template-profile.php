<?php /* Template Name: Profile Page */

get_header(); ?>

<main id="main" class="full-width site-main page-content profile-page" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
    <section class="full-width text-standard main-text" id="main-text-home">
      <div class="content-width content-max-width-1200 pad-h-20-1299">
        <?php the_content(); ?>
        <!-- BLAIZE_FEATURE hide-my-profile -->
          <?php include( locate_template('template-parts/profile.php') ); ?>
        <!-- BLAIZE_FEATURE_END hide-my-profile -->
      </div>
    </section>

  <?php endwhile; // End of the loop. ?>

</main><!-- #main -->

<?php get_footer(); ?>