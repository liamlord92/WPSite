<?php get_header(); ?>
  
  <main id="main" class="full-width site-main page-content" role="main">
    <section class="full-width">
      <div class="content-width content-max-width-1200 pad-h-20-1299">
        <!-- BLAIZE_FEATURE hide-premium-content -->
          <?php include( locate_template('template-parts/show-blog-posts.php') ); ?>
        <!-- BLAIZE_FEATURE_END hide-premium-content -->
      </div>
    </section>
    
  </main><!-- #main -->
  
<?php get_footer(); ?>