<?php
/**
 * Template Name: Staff Blogs Page
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
                		'posts_per_page' => 10,
                		'author__in' => array(4,5,6,7),
                		'paged' => $paged
                	);
            		$au_staff_blog_posts = new WP_Query($args);

            		if ($au_staff_blog_posts -> have_posts()) : ?>

            			<?php while($au_staff_blog_posts -> have_posts()) : $au_staff_blog_posts -> the_post(); ?>

            				<div class="au_blog_post_list">

	            				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	            				<span><?php _e( 'By','themetext' ); ?></span>
	                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="url fn n" rel="author" itemprop="url">
	                                <span itemprop="name"><?php the_author_meta( 'display_name' ); ?></span>
	                            </a>

	            				<?php the_content('', true); ?>

	            			</div>

            			<?php endwhile; ?>

            			<div class="au_pagination_links">

            				<span class="au_pagination_older_link">
            					<?php echo get_next_posts_link('Older Posts', $au_staff_blog_posts -> max_num_pages); ?>
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

<?php get_footer(); ?>