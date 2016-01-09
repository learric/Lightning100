<?php

global $ti_option;

$profiles = $ti_option['social_profile_url'];

?>

<ul class="social">
		<li><a href="#" class="icomoon-share social-share-link"></a>
			<ul>
				<?php foreach ( $profiles as $key => $value ) {
					if ( !empty ( $value ) ) {
						echo '<li><a href="' . esc_url( $value ) . '" class="icomoon-' . $key . '" target="_blank"></a></li>';
					}
				} ?>
				<li class="teamgreen-icon"><a class="team_green_icon" href="#" title="Team Green Adventures"><img
							src="<?php echo
						get_template_directory_uri();
						?>/images/team_green_logo_small.png" /></a></li>
			</ul>
		</li>
	</ul>