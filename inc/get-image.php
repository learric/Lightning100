<?php 
$home_image = get_post_meta($post->ID, 'home-image', true);

// Get youtube video ID

$au_new_music_posts_code = get_post_meta($post->ID, 'CODE1', true);

if (strpos($au_new_music_posts_code, 'youtube') == false) {
    $au_new_music_posts_code = get_post_meta($post->ID, 'CODE2', true);
}
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

if ( ($video_id == 'player') or ( empty( $video_id )) ) {
    $video_id = null;
}

if ($home_image) { ?>

<a href="<?php the_permalink(); ?>" class="au_thumbnail_excerpt_image"><img src="<?php echo $home_image; ?>" /></a>

<?php } elseif ( has_post_thumbnail() ) { 
    the_post_thumbnail( 'rectangle-size' );
      } elseif( first_post_image() ) { // Set the first image from the editor ?>

        <a href="<?php the_permalink(); ?>" class="au_thumbnail_excerpt_image"><img src="<?php first_post_image(); ?>" alt="<?php get_the_title(); ?>" /></a>

      <?php } elseif( isset($video_id) ) { ?>

        <a href="<?php the_permalink(); ?>" class="au_thumbnail_excerpt_image"><img src="http://img.youtube.com/vi/<?php echo $video_id ?>/0.jpg" /></a>

      <?php } else {
        echo '';
     } ?>