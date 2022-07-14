<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <div class="entry">
            <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><b>on:</b> <?php $post_date = get_the_date( 'n/j/Y' ); echo $post_date; ?>, <b>by:</b> <?php echo get_the_author(); ?></p>
        </div>
    <?php endwhile; // End of the loop.
    liam_pagination();
else : ?>
    <div class="no-results">
        <p>None Found</p>
    </div>
<?php endif; ?>