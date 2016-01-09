<?php
/**
 * Template Name: Home Page
 *
 * @package SimpleMag
 * @since 	SimpleMag 1.2
**/
get_header();
global $ti_option;
?>

	<section id="content" role="main" class="clearfix animated">

        <section class="wrapper home-section featured-posts">

		    <?php include('au_home_featured_slider.php'); ?>

		</section><!-- Featured Posts -->

    </section>

    <section class="au_top_ad_space">

    	<div class="au_top_ad_space_container">

    		<a href="http://lightning-100.myshopify.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/merchAd.jpg" /></a>

    	</div>

    </section>

    <section class="wrapper home-section category-posts">

		<?php include('au_home_featured_single.php'); ?>

	</section><!-- Latest by category -->

    <section class="au_bottom_ad_space">

    	<div class="au_bottom_ad_space_container">

			<a href="http://lightning-100.myshopify.com/" target="_blank"><img src="http://placehold
			.it/1050x80?text=Ad/Highlight+2" /></a>

    		<!-- <a href="http://lightning-100.myshopify.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/merchAd.jpg" /></a> -->

    	</div>

    </section>

    <!-- smaller featured posts -->

    <section class="au_home_bottom_content">

    	<div class="au_small_bottom_featured_post">

    		<header class="section-header">

    			<div class="title-with-sep">

    				<h2 class="title">Recent Posts</h2>

    			</div>

    		</header>

    		<?php include('au_home_featured_bottom.php'); ?>

    	</div>

    	<div class="au_bottom_ad_column">

    		<?php include('sidebar-home_bottom.php'); ?>

    	</div>

    </section>

<?php get_footer(); ?>