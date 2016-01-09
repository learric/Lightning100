<div class="au_home_top_featured_content_container">

	<div class="au_home_top_featured_slider_container">

		<div class="slider_previous_button"></div>

		<div class="slider_next_button"></div>

		<div id="owl-slider" class="owl-carousel">

			<?php
				$au_home_page_featured_posts_args = array(
					'category_name' => 'Home Page Featured'
				);
				$au_home_page_featured_posts = new WP_Query( $au_home_page_featured_posts_args );

				if ( $au_home_page_featured_posts -> have_posts() ) : while ( $au_home_page_featured_posts -> have_posts() ) : $au_home_page_featured_posts -> the_post();

				$au_home_page_featured_posts_image = get_post_meta($post->ID, 'au_home_carousel_image', true);
				$au_home_page_featured_posts_link = get_post_meta($post->ID, 'au_home_carousel_link', true);
			?>

			<div class="au_home_top_featured_slider_slide">

				<a href="<?php if ($au_home_page_featured_posts_link) { echo $au_home_page_featured_posts_link; } ?>"><img src="<?php if ($au_home_page_featured_posts_image) { echo $au_home_page_featured_posts_image; } ?>" /></a>

				<h2 class="au_slider_headline"><a href="<?php echo $au_home_page_featured_posts_link; ?>"><?php the_title(); ?><span
							class="icomoon-plus"></span></a></h2>

			</div>

			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>

			<?php endif; ?>

		</div>

	</div>

	<div class="au_home_top_featured_sidebar_container">

		<div class="au_home_top_featured_sidebar_box">

			<div class="au_sidebar_tagline">
				<span>New Music List</span>
			</div>

			<?php
				$au_home_page_featured_sidebar_top_args = array(
					'posts_per_page' => 1,
					'category_name' => 'New Music'
				);
				$au_home_page_featured_sidebar_top = new WP_Query( $au_home_page_featured_sidebar_top_args );

				if ( $au_home_page_featured_sidebar_top -> have_posts() ) : while ( $au_home_page_featured_sidebar_top -> have_posts() ) : $au_home_page_featured_sidebar_top -> the_post();

				$au_home_page_featured_posts_video = get_post_meta($post->ID, 'au_featured_post_video', true);
			?>

			<?php include('inc/get-image.php') ?>

			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="icomoon-plus"></span></a></h2>

			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>

			<?php endif; ?>

		</div>

		<div class="au_home_top_featured_sidebar_box">

			<div class="au_sidebar_tagline">
				<span>Local Music List</span>
			</div>

			<?php
				$au_home_page_featured_sidebar_bottom_args = array(
					'posts_per_page' => 1,
					'category_name' => 'Local Music'
				);
				$au_home_page_featured_sidebar_bottom = new WP_Query( $au_home_page_featured_sidebar_bottom_args );

				if ( $au_home_page_featured_sidebar_bottom -> have_posts() ) : while ( $au_home_page_featured_sidebar_bottom -> have_posts() ) : $au_home_page_featured_sidebar_bottom -> the_post();
			?>

				<a href="<?php the_permalink(); ?>"><?php
				if (has_post_thumbnail()) {
					the_post_thumbnail();
				} ?></a>

				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="icomoon-plus"></span></a></h2>

			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>

			<?php endif; ?>

		</div>

	</div>

</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
<script type="text/javascript">
	jQuery(document).on('ready', function () {
		var owlSlider = jQuery("#owl-slider");

		owlSlider.owlCarousel({
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem:true,
			autoPlay: true
		});

		jQuery('.slider_previous_button').on('click', function () {
			owlSlider.trigger('owl.prev');
		});

		jQuery('.slider_next_button').on('click', function () {
			owlSlider.trigger('owl.next');
		});
	});
</script>