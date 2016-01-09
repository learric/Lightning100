<?php

$au_posts_to_show = 6;

$au_bottom_posts = new WP_Query(
array(
	'posts_per_page' => $au_posts_to_show,
	'category__not_in' => array(-2329, -12)
)
);

if ( $au_bottom_posts->have_posts() ) :
while ( $au_bottom_posts->have_posts() ) : $au_bottom_posts->the_post();
?>

<article <?php post_class('au_small_bottom_featured_post_container'); ?>>

	<figure class="entry-image">
        <a href="<?php the_permalink(); ?>">
			<?php
			if ( has_post_thumbnail() ) {
            	the_post_thumbnail( 'rectangle-size' );
            } elseif( first_post_image() ) { // Set the first image from the editor
				echo '<img src="' . first_post_image() . '" class="wp-post-image" alt="' . get_the_title() . '" />';
			} ?>
		</a>
    </figure>

    <div class="au_small_bottom_featured_post_content">

        <header class="entry-header">
            <div class="home-image">
                <?php include('inc/get-image.php'); ?>
            </div>
            <div class="entry-meta">
               <?php ti_meta_data(); ?>
            </div>
            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>


<!--             <?php if( $ti_option['site_author_name'] == 1 ) { ?>
            <span class="vcard author">
                <?php _e( 'By','themetext' ); ?>
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="url fn n" rel="author">
                    <?php the_author_meta( 'display_name' ); ?>
                </a>
            </span>
            <?php } ?> -->
        </header>

        <div class="entry-summary">
            <?php the_excerpt(); ?>
            <p><a href="<?php the_permalink(); ?>" alt="Read More">Read More</a></p>
        </div>

    </div>

</article>

<?php endwhile; ?>

<?php wp_reset_postdata(); ?>

<?php endif; ?>