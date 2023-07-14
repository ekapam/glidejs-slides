<?php
/**
 *
 * View for the Glide.js loop.
 *
 * @package     Glide.js Slides Shortcode
 */

?>

<div class="glide">
	<div class="glide__track" data-glide-el="track">
		<ul class="glide__slides">
<?php
while ( $glidejs_slides_loop->have_posts() ) :
	$glidejs_slides_loop->the_post();
	global $post;
	?>
	<li class="glide__slide">
	<?php
	if ( has_post_thumbnail() ) :
		echo( get_the_post_thumbnail() );
	endif;
	?>
	</li>
	<?php
endwhile;
?>
		</ul>
	</div>
</div>
