<?php
/**
 * Plugin Name: Glide.js Slides Shortcode
 * Plugin URI: https://github.com/ekapam/glidejs-slides
 * Description: Create sliders and carousels with Glide.js using shortcodes
 * Version: 1.0
 * Author: Ricardo Ambriz
 * Author URI: https://ricardoambriz.com
 *
 * @package     Glide.js Slides Shortcode
 * @author      Ricardo Ambriz
 * @license     GPL-2.0+
 */

/**
 * Exit if direct access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Include custom taxonomy.
require_once 'inc/glidejs-taxonomy.php';

/**
 * Register Glide.js Shortcode
 *
 * @return void
 */
function register_glidejs_shortcode() {
	$plugin = new GlidejsShortcode();
	$plugin->register_glidejs_shortcode();
}
register_glidejs_shortcode();

/**
 * Options for the shortcode
 *
 * @param mixed $atts the atts.
 * @return mixed
 */
function glidejs_slides_options_from_shortcode( $atts ) {
	$glide_options = array(
		'type'       => isset( $atts['type'] ) ? $atts['type'] : 'slider',
		'startAt'    => isset( $atts['startAt'] ) ? $atts['startAt'] : 0,
		'perView'    => isset( $atts['perView'] ) ? $atts['perView'] : 1,
		'focusAt'    => isset( $atts['focusAt'] ) ? $atts['focusAt'] : 0,
		'gap'        => isset( $atts['gap'] ) ? $atts['gap'] : 10,
		'autoplay'   => isset( $atts['autoplay'] ) ? $atts['autoplay'] : false,
		'hoverpause' => isset( $atts['hoverpause'] ) ? $atts['hoverpause'] : true,
		'keyboard'   => isset( $atts['keyboard'] ) ? $atts['keyboard'] : true,
	);
	return $glide_options;
}

/**
 * Shortcode function
 *
 * @param obj $glidejs_slides_post The object.
 * @return obj
 */
function glidejs_slides_shortcode( $glidejs_slides_post ) {
	$atts = shortcode_atts(
		array(
			'category'   => null,
			'type'       => null,
			'startAt'    => null,
			'focusAt'    => null,
			'gap'        => null,
			'autoplay'   => null,
			'hoverpause' => null,
			'perView'    => null,
			'keyboard'   => null,
		),
		$glidejs_slides_post
	);

	global $glide_options;
	$glide_options = glidejs_slides_options_from_shortcode( $atts );

	$glidejs_slides_args = array(
		'post_type'   => 'glidejs_slide',
		'post_status' => 'publish',
		'orderby'     => 'post_date',
		'order'       => 'ASC',
	);

	if ( null !== $atts['category'] ) {
		$glidejs_slides_args['glidejs-slides'] = $atts['category'];
	}

	$glidejs_slides_loop = new WP_Query( $glidejs_slides_args );
	ob_start();
	require_once 'views/glidejs-slides.php';
	$output = ob_get_clean();
	return $output;
}
add_shortcode( 'glidejs', 'glidejs_slides_shortcode' );

/**
 * Enqueue Scripts
 *
 * @return void
 */
function glidejs_slides_scripts() {
	global $post;
	if ( strstr( $post->post_content, '[glidejs' ) ) {
		wp_enqueue_style( 'glide_css_core', 'https://unpkg.com/@glidejs/glide@3.6.0/dist/css/glide.core.css', array(), DAY_IN_SECONDS );
		wp_enqueue_style( 'glide_css_theme', 'https://unpkg.com/@glidejs/glide@3.6.0/dist/css/glide.theme.min.css', array(), DAY_IN_SECONDS );
		wp_enqueue_script( 'glide_js', 'https://unpkg.com/@glidejs/glide@3.6.0/dist/glide.js', array(), DAY_IN_SECONDS, 'true' );
	}
}
add_action( 'wp_enqueue_scripts', 'glidejs_slides_scripts' );

/**
 * Attach the JS to the footer
 *
 * @return void
 */
function glidejs_slides_main_js() {
	global $glide_options;
	$glide_options_str = wp_json_encode( $glide_options );
	?>
	<script type="text/javascript">
		const glideOptions = <?php echo wp_kses_data( $glide_options_str ); ?>;
		document.addEventListener('DOMContentLoaded', function() {
			const glide = new Glide('.glide', glideOptions);
			glide.mount();
		});
	</script>
	<?php
}
add_action( 'wp_footer', 'glidejs_slides_main_js' );
