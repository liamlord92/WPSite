<?php

if( is_home() ){
    $id = get_option( 'page_for_posts' );
}elseif( is_category() || is_archive() ){
    $category = get_queried_object();
    $id = $category->term_id;
    $index_id = get_option( 'page_for_posts' );
}else{
    $id = get_the_id();
    $index_id = get_option( 'page_for_posts' );
}

if( get_field('hero_image',$id) || is_category() || is_archive() || is_home() || is_single() ){
    
    if( is_category() || is_archive() ){
        $title = $category->cat_name;
    }else{
        $title = get_the_title($id);
    }

    $image_id = get_field('hero_image',$id);
    $hero_image = wp_get_attachment_image_src($image_id, 'full')[0]; ?>

    <div id="hero" class="hero-container full-width hero-image" style="background: url( <?php echo $hero_image; ?> ) top center / cover no-repeat" >
        <div class="hero-wrapper content-wrapper">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>

<?php }elseif(is_search()){ ?>
    
    <div id="hero" class="hero-container full-width" >
        <div class="hero-wrapper content-wrapper">
            <h1><?php printf( esc_html__( 'Search Results for "%s"', 'liam' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
            <?php $search_count = $wp_query->found_posts; ?>
            <p>We have found <?php echo $search_count; ?> results relating to your search </p>
        </div>
    </div><?php
    
}else{
    
    if(is_404()){
        $title = '';
    }else{ 
        $title = get_the_title($id);
    }
    ?>

    <div id="hero" class="hero-container full-width">
        <div class="hero-wrapper content-wrapper">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>

<?php } ?>