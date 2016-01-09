<?php
/**
 * Template Name: Media Archive Page
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
            	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            	$au_video_id = get_cat_ID('Video Archive');
            	$au_audio_id = get_cat_ID('Audio Archive');
            	$au_festival_id = get_cat_ID('Festival');
            	$args = array(
            		'posts_per_page' => 24,
            		'post_status' => 'publish',
            		'category__in' => array($au_video_id, $au_audio_id, $au_festival_id),
            		'paged' => $paged
        		);
        		$au_media_archive_posts = new WP_Query($args);

        		if ($au_media_archive_posts -> have_posts()) : ?>

        			<?php while($au_media_archive_posts -> have_posts()) : $au_media_archive_posts -> the_post(); ?>

        				<div class="au_new_music_list">

        					<div class="au_new_music_list_video">
								<?php
								$au_new_music_posts_video = get_post_meta($post->ID, 'au_featured_post_video', true);
								$au_new_music_posts_code = get_post_meta($post->ID, 'CODE1', true);
								if ( (strpos($au_new_music_posts_code, 'youtube') == true) or (strpos($au_new_music_posts_video, 'youtube') == true ) ) {
									include('inc/get-image.php');
								}  elseif ($au_new_music_posts_video) {
									echo $au_new_music_posts_video;
								} elseif ($au_new_music_posts_code) {
									echo $au_new_music_posts_code;
								} else {
									echo '';
								}?>
	        				</div>

            				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            				<?php the_excerpt(); ?>

            			</div>

        			<?php endwhile; ?>

<!--         			<div class="au_pagination_links">

        				<span class="au_pagination_older_link">
        					<?php echo get_next_posts_link('Older Posts', $au_media_archive_posts -> max_num_pages); ?>
        				</span>

        				<span class="au_pagination_newer_link">
        					<?php echo get_previous_posts_link('Newer Posts'); ?>
        				</span>

        			</div> -->

        			<?php wp_reset_postdata(); ?>

        		<?php else : ?>
        			<p><?php _e('Sorry, there are no posts for this category.'); ?></p>
        		<?php endif ?>

                <?php
				// Enable/Disable comments
				// if (comments_open($post->ID)) {
				// 	comments_template('/comments.php');
				// }
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