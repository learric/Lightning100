<?php
/**
 * Template Name: New Music Page
 *
 * @package SimpleMag
 * @since 	SimpleMag 1.2
**/
get_header();
global $ti_option;
?>

	<section id="content" role="main" class="clearfix animated">

        <header class="entry-header page-header">
        	<div class="wrapper title-with-sep">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </div>
        </header>

    	<div class="wrapper">
			<?php
			// Enable/Disable sidebar based on the field selection
			if ( ! get_field( 'page_sidebar' ) || get_field( 'page_sidebar' ) == 'page_sidebar_on' ):
			?>
            <div class="grids">
                <div class="grid-8 column-1">
            <?php endif; ?>

            <?php
            	$args = array(
            		'posts_per_page' => 24,
            		'post_status' => 'publish',
            		'category_name' => 'New Music'
        		);
        		$au_new_music_posts = new WP_Query($args);

        		if ($au_new_music_posts -> have_posts()) : ?>

        			<?php while($au_new_music_posts -> have_posts()) : $au_new_music_posts -> the_post(); ?>

        				<div class="au_new_music_list">

        					<div class="au_new_music_list_video">
	        					<?php
        						$au_new_music_posts_video = get_post_meta($post->ID, 'au_featured_post_video', true);
	        					if ($au_new_music_posts_video) {
	        						echo $au_new_music_posts_video;
	        					} ?>
	        				</div>

            				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            				<?php the_excerpt(); ?>

            			</div>

        			<?php endwhile; ?>

        			<?php wp_reset_postdata(); ?>

        		<?php else : ?>
        			<p><?php _e('Sorry, there are no posts for this category.'); ?></p>
        		<?php endif ?>

                <?php
				// Enable/Disable comments
				if (comments_open($post->ID)) {
					comments_template('/comments.php');
				}
				?>

				<?php
				// Enable/Disable sidebar based on the field selection
				if ( ! get_field( 'page_sidebar' ) || get_field( 'page_sidebar' ) == 'page_sidebar_on' ):
				?>
                </div><!-- .grid-8 -->

                <?php get_sidebar(); ?>

            </div><!-- .grids -->
            <?php endif; ?>

        </div>
    </section><!-- #content -->

<?php get_footer(); ?>