<?php
/**
 * Template Name: The615 Page
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
            	$args = array(
            		'posts_per_page' => 12,
            		'category_name' => 'Local Music',
            		'paged' => $paged
        		);
        		$au_custom_cat_posts = new WP_Query($args);

        		if ($au_custom_cat_posts -> have_posts()) : ?>

        			<?php while($au_custom_cat_posts -> have_posts()) : $au_custom_cat_posts -> the_post(); ?>

        				<div class="au_local_music_list">

							<?php include('inc/get-image.php'); ?>

            				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            				<?php the_excerpt(); ?>

            			</div>

        			<?php endwhile; ?>

        			<div class="au_pagination_links">

        				<span class="au_pagination_older_link">
        					<?php echo get_next_posts_link('Older Posts', $au_custom_cat_posts -> max_num_pages); ?>
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