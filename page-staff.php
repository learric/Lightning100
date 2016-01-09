<?php
/**
 * Template Name: Staff Page
 *
 * @package SimpleMag
 * @since 	SimpleMag 1.2
**/
get_header();
global $ti_option;
?>

	<section id="content" role="main" class="clearfix animated">

        <?php
        /**
         * If Featured Image is uploaded set it as a background
         * and change page title color to white
        **/
        if ( has_post_thumbnail() ) {
            $page_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'big-size' );
        } ?>

        <header class="entry-header page-header">
        	<div class="wrapper title-with-sep">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </div>
            <div class="au_staff_title">
            	<img src="<?php echo $page_image_url[0] ?>">
            </div>

            <a href="javascript:void(window.open('http://player.streamtheworld.com/liveplayer.php?callsign=WRLTFM','WRLTFM','width=620,height=300,status=no,resizable=no,scrollbars=no'));" class="au_listen_live_link">Listen Live</a>
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
                if (have_posts()) : while (have_posts()) : the_post();
                ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <div class="page-content">
                        	<?php the_content(); ?>
                        </div>

                    </article>

                <?php endwhile; endif; ?>

                <?php
                	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                	$au_staff_blog_id = get_post_meta($post->ID, 'au_staff_blog_id', true);
                	$args = array(
                		'posts_per_page' => 10,
                		'post_type' => 'post',
                		'post_status' => 'publish',
                		'author' => $au_staff_blog_id,
                		'paged' => $paged
            		);
            		$au_recent_staff_posts = new WP_Query($args);

            		if ($au_recent_staff_posts -> have_posts()) : ?>

            		<h2 class="au_recent_post_header">Recent Posts</h2>

            			<?php while($au_recent_staff_posts -> have_posts()) : $au_recent_staff_posts -> the_post(); ?>

            				<div class="au_blog_post_list">

	            				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	            				<?php the_content('', true); ?>

	            			</div>

            			<?php endwhile; ?>

            			<div class="au_pagination_links">

            				<span class="au_pagination_older_link">
            					<?php echo get_next_posts_link('Older Posts', $au_recent_staff_posts -> max_num_pages); ?>
            				</span>

            				<span class="au_pagination_newer_link">
            					<?php echo get_previous_posts_link('Newer Posts'); ?>
            				</span>

            			</div>

            			<?php wp_reset_postdata(); ?>

            		<?php else : ?>
            			<p><?php _e('Sorry, there are no posts for this author.'); ?></p>
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

    <div id="execphp-7" class="widget widget_execphp">	<div class="execphpwidget"><div id='div-gpt-ad-1351982117001-2' style='width:180px; height:150px;'>
<script type='text/javascript'>googletag.cmd.push(function(){googletag.display('div-gpt-ad-1351982117001-2');});</script>
</div></div>

<?php get_footer(); ?>