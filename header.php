<?php
/**
 * The Header for the theme
 *
 * @package SimpleMag
 * @since 	SimpleMag 1.0
**/
?>
<!DOCTYPE html>
<!--[if lt IE 9]><html <?php language_attributes(); ?> class="oldie"><![endif]-->
<!--[if (gte IE 9) | !(IE)]><!--><html <?php language_attributes(); ?> class="modern"><!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php global $ti_option; ?>
<link rel="shortcut icon" href="<?php echo $ti_option['site_favicon']['url']; ?>" />
<link rel="apple-touch-icon-precomposed" href="<?php echo $ti_option['site_retina_favicon']['url']; ?>" />

<?php wp_head(); ?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-15673502-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

var googletag = googletag || {};
googletag.cmd = googletag.cmd || [];
(function() {
var gads = document.createElement('script');
gads.async = true;
gads.type = 'text/javascript';
var useSSL = 'https:' == document.location.protocol;
gads.src = (useSSL ? 'https:' : 'http:') +
'//www.googletagservices.com/tag/js/gpt.js';
var node = document.getElementsByTagName('script')[0];
node.parentNode.insertBefore(gads, node);
})();
</script>

<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/1223371/sidebar-bottom', [180, 600], 'div-gpt-ad-1351982117001-0').addService(googletag.pubads());
googletag.defineSlot('/1223371/sidebar-bottom2', [180, 600], 'div-gpt-ad-1369948150265-0').addService(googletag.pubads());
googletag.defineSlot('/1223371/sidebar-middle', [180, 150], 'div-gpt-ad-1351982117001-1').addService(googletag.pubads());
googletag.defineSlot('/1223371/sidebar-top', [180, 150], 'div-gpt-ad-1351982117001-2').addService(googletag.pubads());
//googletag.pubads().enableSingleRequest();
googletag.enableServices();
});

</script>

<script type='text/javascript'>

	jQuery(document).ready(function () {
		var auWindowWidth = jQuery(window).width(),
			auWrapperWidth = jQuery('.layout-boxed').width(),
			auSidebarWidth = (auWindowWidth - auWrapperWidth) / 2;

		var leftBanner = jQuery('.au_banner_left_container'),
			rightBanner = jQuery('.au_banner_right_container');

		if (auSidebarWidth > 200) {
			leftBanner.css({
				width: 200
			});

			rightBanner.css({
				width: 200
			});
		}

		if (auSidebarWidth >= 100 && auSidebarWidth <= 200) {
			leftBanner.css({
				width: auSidebarWidth
			});

			rightBanner.css({
				width: auSidebarWidth
			});
		}

		if (auSidebarWidth < 100) {
			leftBanner.css({
				display: 'none'
			});

			rightBanner.css({
				display: 'none'
			});
		}

		jQuery(window).on('resize', function () {
			this.setTimeout(function () {
				var auWindowWidth = jQuery(window).width(),
					auWrapperWidth = jQuery('.layout-boxed').width(),
					auSidebarWidth = (auWindowWidth - auWrapperWidth) / 2;

				if (auSidebarWidth > 200) {
					leftBanner.css({
						width: 200,
						display: 'block'
					});

					rightBanner.css({
						width: 200,
						display: 'block'
					});
				}

				if (auSidebarWidth >= 100 && auSidebarWidth <= 200) {
					leftBanner.css({
						width: auSidebarWidth,
						display: 'block'
					});

					rightBanner.css({
						width: auSidebarWidth,
						display: 'block'
					});
				}

				if (auSidebarWidth < 100) {
					leftBanner.css({
						display: 'none'
					});

					rightBanner.css({
						display: 'none'
					});
				}
			}, 1000);
		});
	});
</script>

<script type='text/javascript'>

	jQuery(document).ready(function () {
		var allLinks = jQuery('.au_calendar_links a'),
			concertCalendar = jQuery('#concerts'),
			eventsCalendar = jQuery('#events');

		allLinks.first().addClass('active');
		concertCalendar.show();

		allLinks.on('click', function () {
			allLinks.removeClass('active');
			jQuery(this).addClass('active');

			if (jQuery(this).hasClass('showConcert')) {
				concertCalendar.show();
				eventsCalendar.hide();
			} else {
				concertCalendar.hide();
				eventsCalendar.show();
			}
		});
	});

</script>

<link href="<?php echo get_template_directory_uri(); ?>/css/child-theme.css" media="screen" rel="stylesheet" type="text/css" />

</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage" <?php $au_home_ad_banner_full_width = get_post_meta(34, 'au_home_ad_banner_full_width', true ); if ($au_home_ad_banner_full_width) { ?> style="background-image: url(<?php echo $au_home_ad_banner_full_width; ?>);" <?php } ?>>

    <div id="pageslide" class="st-menu st-effect">
    	<a href="#" id="close-pageslide"><i class="icomoon-remove-sign"></i></a>
    </div><!-- Sidebar in Mobile View -->

    <!-- custom top bar -->
	<div class="au_top_bar">

		<div class="au_top_bar_container">

			<div class="au_social_bar">

				<?php // Social Profiles
		            if( $ti_option['top_social_profiles'] == 1 ) {
		                get_template_part ( 'inc/social', 'profiles' );
		            }
	            ?>

			</div>

		</div>

	</div>

	<div class="no-print top-strip">
        <div class="wrapper clearfix">

            <?php
            // Pages Menu
            if ( has_nav_menu( 'secondary_menu' ) ) :
                echo '<nav class="secondary-menu" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                wp_nav_menu( array(
                    'theme_location' => 'secondary_menu',
                    'container' => false,
                ));
               echo '</nav>';
             endif;
            ?>
        </div><!-- .wrapper -->
    </div><!-- .top-strip -->

	<?php
    // Check for a layout options: Full Width or  Boxed
    if ( $ti_option['site_layout'] == '2' ) { $site_layout = ' class="layout-boxed"'; } else { $site_layout = ' class="layout-full"'; } ?>
    <section id="site"<?php echo isset( $site_layout ) ? $site_layout : ''; ?>>
        <div class="site-content">



	<?php

	$au_home_ad_banner_left_image = get_post_meta(34, 'au_home_ad_banner_left_image', true );
	$au_home_ad_banner_left_link = get_post_meta(34, 'au_home_ad_banner_left_link', true );

	$au_home_ad_banner_right_link = get_post_meta(34, 'au_home_ad_banner_right_link', true );
	$au_home_ad_banner_right_image = get_post_meta(34, 'au_home_ad_banner_right_image', true );

	?>

	<div class="au_home_banner_container">

		<div class="au_banner_left_container" <?php if ($au_home_ad_banner_left_image) { ?> style="background-image: url(<?php echo $au_home_ad_banner_left_image; ?>);" <?php } ?> >

			<a href="<?php if ($au_home_ad_banner_left_link) { echo $au_home_ad_banner_left_link; } ?>" target="_blank"></a>

		</div>

		<div class="au_banner_right_container" <?php if ($au_home_ad_banner_right_image) { ?> style="background-image: url(<?php echo $au_home_ad_banner_right_image; ?>);" <?php } ?> >

			<a href="<?php if ($au_home_ad_banner_right_link) { echo $au_home_ad_banner_right_link; } ?>" target="_blank"></a>

		</div>

	</div>

            <header id="masthead" role="banner" class="clearfix<?php if ( $ti_option['site_main_menu'] == true ) { echo ' with-menu'; } ti_top_strip_class(); ?>" itemscope itemtype="http://schema.org/WPHeader">



                <div id="branding">
                    <div class="wrapper">
                    <?php
                        /**
                         *  Header Variations
                        **/

                        // Logo, Social Icons and Search
                        if ( $ti_option['site_header'] == 'header_search' ) {
                            get_template_part( 'inc/header', 'search' );

                        // Logo and Ad unit
                        } elseif ( $ti_option['site_header'] == 'header_banner' ) {
                            get_template_part( 'inc/header', 'banner' );

                        // Default - Centered Logo and Tagline
                        } else {
                            get_template_part( 'inc/header', 'default' );
                        }
                    ?>
                    </div><!-- .wrapper -->
                </div><!-- #branding -->

				<?php
                // Main Menu
                if ( $ti_option['site_main_menu'] == true ):
					if ( has_nav_menu( 'main_menu' ) ) :
					echo '<div class="no-print animated main-menu-container">';
						if ( $ti_option['site_fixed_menu'] == '3' && $ti_option['site_main_menu'] == true ):
							echo '<div class="main-menu-fixed">';
						endif;
							echo '<nav class="wrapper main-menu" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
								wp_nav_menu( array(
									'theme_location' => 'main_menu',
									'container' => false,
									'walker' => new TI_Menu()
								 ));
							echo '</nav>';
						if ( $ti_option['site_fixed_menu'] == '3' && $ti_option['site_main_menu'] == true ):
							echo '</div>';
						endif;
						echo '</div>';
					 else:
						echo '<div class="message warning"><i class="icomoon-warning-sign"></i>' . __( 'Define your site main menu', 'themetext' ) . '</div>';
					 endif;
                endif;
                ?>

            </header><!-- #masthead -->