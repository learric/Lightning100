<?php
/**
 * The template for displaying all pages
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