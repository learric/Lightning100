<?php
/**
 * Template Name: Video Archive Page
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
            	$args = array(
            		'posts_per_page' => 12,
            		'post_status' => 'publish',
            		'category_name' => 'Video Archive',
            		'paged' => $paged
        		);
        		$au_video_archive_posts = new WP_Query($args);

        		if ($au_video_archive_posts -> have_posts()) : ?>

        			<?php while($au_video_archive_posts -> have_posts()) : $au_video_archive_posts -> the_post(); ?>

        				<div class="au_new_music_list">

        					<div class="au_new_music_list_video">
	        					<?php
        						$au_new_music_posts_video = get_post_meta($post->ID, 'au_featured_post_video', true);
        						$au_new_music_posts_code = get_post_meta($post->ID, 'CODE1', true);

                                // Get youtube video ID
                                $html = $au_new_music_posts_code;
                                $dom = new DOMDocument();
                                $dom->loadHTML($html);
                                $iframe = $dom->getElementsByTagName('iframe');
                                $url = '';
                                foreach($iframe as $tag) {
                                    $url = $tag->getAttribute('src');
                                }
                                $output = parse_url($url, PHP_URL_PATH);
                                $pieces = array_filter(explode('/', $output));
                                $video_id = end($pieces);

                                if ($video_id == 'player') {
                                    $video_id = null;
                                }



                                require_once 'inc/Google/autoload.php';
                                require_once 'inc/Google/Client.php';
                                require_once 'inc/Google/Service/YouTube.php';

                                $client = new Google_Client();
                                $client->setDeveloperKey('AIzaSyCRWqiOi7FMRKJrsVxvMY95m8BG_Qr8V1E');
                                $youtube = new Google_Service_YouTube($client);

                                $videoResponse = $youtube->videos->listVideos('snippet', array(
                                    'id' => $video_id
                                ));

                                $video_title = $videoResponse['items'][0]['snippet']['title'];


	        					if ($au_new_music_posts_video) {
	        						 echo $au_new_music_posts_video;
                                } elseif ($au_new_music_posts_code) { 
	        						// echo $au_new_music_posts_code; ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img class="video-thumb" alt="<?php echo $video_title; ?>" src="http://img.youtube.com/vi/<?php echo $video_id ?>/0.jpg">
                                        <p class="video-title"><?php echo $video_title; ?></p>
                                    </a>
	        					<?php } else {
	        						echo '';
	        					}?>
	        				</div>



                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                            <?php the_excerpt(); ?>

            			</div>

        			<?php endwhile; ?>

        			<div class="au_pagination_links">

        				<span class="au_pagination_older_link">
        					<?php echo get_next_posts_link('Older Posts', $au_video_archive_posts -> max_num_pages); ?>
        				</span>

        				<span class="au_pagination_newer_link">
        					<?php echo get_previous_posts_link('Newer Posts'); ?>
        				</span>

        			</div>

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