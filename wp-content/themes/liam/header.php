<!DOCTYPE html>

<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo get_site_url(); ?>/favicon.png">
        <script src="https://js.braintreegateway.com/web/dropin/1.22.0/js/dropin.min.js"></script>
        <?php wp_head(); ?>
    </head>

    <body>
        <script>
            fetch("/wp-content/themes/liam/php/blaize-evict-cache.php")
            .then(res => res.json())
        </script>
        <div id="page" class="site">

            <header class="full-width bg-grey color-white pad-v-10" id="site-header">
                <div class="content-width content-max-width-1200">
                    <div class="full-width">
                    
                        <div class="left-content" id="site-logo">
                            <a href="<?php echo get_site_url(); ?>" class="color-white"><?php echo get_blogInfo('name'); ?></a>
                        </div>
                        
                        <nav id="site-navigation" class="main-navigation right-content" role="navigation">
                            <div class="right-content color-white">
                                <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_id' => 'header-menu' ) ); ?>
                            </div>
                            <!-- BLAIZE_FEATURE hide-login-button -->
                              <?php include( locate_template('template-parts/partials/login-button.php') ); ?>
                            <!-- BLAIZE_FEATURE_END hide-login-button -->
                            <!-- BLAIZE_FEATURE hide-profile-logout-buttons -->
                              <?php include( locate_template('template-parts/partials/profile-button.php') ); ?>
                            <!-- BLAIZE_FEATURE_END hide-profile-logout-buttons -->
                        </nav><!-- #site-navigation -->

                    </div>
                </div>
            </header>

            <div class="full-width" id="hero-wrapper">
                <?php get_template_part("template-parts/content-hero"); ?>
            </div>
            
            <div class="full-width" id="main-wrapper">