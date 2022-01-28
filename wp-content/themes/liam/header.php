<!DOCTYPE html>

<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo get_site_url(); ?>/favicon.png">
        <?php wp_head(); ?>
    </head>

    <body>

        <div id="page" class="site">

            <header class="full-width bg-grey color-white pad-v-10" id="site-header">
                <div class="content-width content-max-width-1200">
                    <div class="full-width">
                    
                        <div class="left-content" id="site-logo">
                            <span class="color-white"><?php echo get_blogInfo('name'); ?>
                        </div>
                        
                        <nav id="site-navigation" class="main-navigation right-content" role="navigation">
                            <div class="right-content color-white">
                                <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_id' => 'header-menu' ) ); ?>
                            </div>
                        </nav><!-- #site-navigation -->

                    </div>
                </div>
            </header>
            
            <div class="full-width" id="main-wrapper">