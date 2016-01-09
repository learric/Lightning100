<?php $au_custom_section_title = get_post_meta($post->ID, 'au_featured_posts_secondary_title', true ); if( $au_custom_section_title ): ?>
	    <header class="section-header">
	        <div class="title-with-sep">
	            <h2 class="title"><?php echo $au_custom_section_title; ?></h2>
	        </div>
	        <?php $au_custom_section_subtitle = get_post_meta($post->ID, 'au_featured_posts_secondary_subtitle', true ); if( $au_custom_section_subtitle ): ?>
	        <span class="sub-title"><?php echo $au_custom_section_subtitle; ?></span>
	        <?php endif; ?>
	    </header>
	    <?php endif; ?>

	    <!-- large featured post -->

	    <div class="grids entries au_large_bottom_featured_post">
			<?php

			$au_large_single_posts = new WP_Query(
				array(
					'posts_per_page' => 1,
					'category_name' => 'large-featured-post'
				)
			);

			if ( $au_large_single_posts->have_posts() ) :
				while ( $au_large_single_posts->have_posts() ) : $au_large_single_posts->the_post();
			?>

	            <article <?php post_class(); ?>>

	            	<figure class="entry-image">

	            		<?php $au_single_post_video = get_post_meta($post->ID, 'au_featured_post_video', true);

	            		if ($au_single_post_video) {
	            			echo $au_single_post_video;
	            		} else { ?>
	                    <a href="<?php the_permalink(); ?>">
							<?php
							if ( has_post_thumbnail() ) {
	                        	the_post_thumbnail( 'rectangle-size' );
	                        } elseif( first_post_image() ) { // Set the first image from the editor
								echo '<img src="' . first_post_image() . '" class="wp-post-image" alt="' . get_the_title() . '" />';
							} ?>
						</a>
						<?php } ?>
	                </figure>

	                <div class="au_large_bottom_featured_post_content">

		                <header class="entry-header">

		                    <h2 class="entry-title">
		                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		                    </h2>
		                </header>

		            </div>

	            </article>

	        <?php endwhile; ?>

	        <?php wp_reset_postdata(); ?>

	    </div>

	        <?php
	        // Enable/Disable the button
	        if ( get_sub_field( 'category_button' ) == 'cat_but_enable' ) {
	            // Link to the selected category
	            $category_id = get_sub_field( 'category_section_name' );
	            $category_link = get_category_link( $category_id );
	            ?>
	            <div class="composer-button clearfix">
	                <a class="read-more" href="<?php echo esc_url( $category_link ); ?>"><?php _e( 'View The Category', 'themetext' ); ?></a>
	            </div>
	        <?php } ?>


	      <?php else: ?>

	      <p class="message">
	        <?php _e( 'This category does not contain any posts yet', 'themetext' ); ?>
	      </p>

	      <?php endif; ?>