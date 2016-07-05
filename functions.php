<?php

/*** Child Theme Function  ***/

function magazinevibe_edge_child_theme_enqueue_scripts() {
	wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_style( 'childstyle' );
}

add_action( 'wp_enqueue_scripts', 'magazinevibe_edge_child_theme_enqueue_scripts', 11 );


function magazinevibe_child_remove_first_image( $content ) {

	//$content = '<div class="innerContent">' . $content . '</div>';
	$dom     = new DOMDocument();
	$dom->loadHTML( $content );
	$images = $dom->getElementsByTagName( 'img' );

	foreach ( $images as $image ) {
		$parent = $image->parentNode;
		if ( $parent->nodeName ) {
			$parent->parentNode->removeChild( $parent );
			$content = $dom->saveHTML();
			$content = str_replace('&Acirc;', '', $content);
			return $content;
		}
	}

	$content = str_replace('&Acirc;', '', $content);

	return $content;
}

add_filter( 'the_content', 'magazinevibe_child_remove_first_image' );


/**
 * SHORTCODES
 */

## Divider -------------------------------------------------- #
function tie_shortcode_divider( $atts, $content = null ) {
	$out = '<div class="clear"></div><div class="divider"></div>';

	return $out;
}

add_shortcode( 'divider', 'tie_shortcode_divider' );

# Buttons -------------------------------------------------- #
function tie_shortcode_button( $atts, $content = null ) {
	@extract( $atts );
	$align  = '';
	$size   = ( $size ) ? ' ' . $size : ' small';
	$color  = ( $color ) ? ' ' . $color : ' gray';
	$link   = ( $link ) ? ' ' . $link : '';
	$target = ( $target ) ? ' target="_blank"' : '';

	$out = '<a href="' . $link . '"' . $target . ' class="shortc-button' . $size . $color . $align . '">' . do_shortcode( $content ) . '</a>';

	return $out;
}

add_shortcode( 'button', 'tie_shortcode_button' );

## Boxes -------------------------------------------------- #
function tie_shortcode_box( $atts, $content = null ) {

	$type = $align = $class = $width = '';
	@extract( $atts );

	$type  = ( $type ) ? ' ' . $type : 'shadow';
	$align = ( $align ) ? ' ' . $align : '';
	$class = ( $class ) ? ' ' . $class : '';
	$width = ( $width ) ? ' style="width:' . $width . '"' : '';

	$out = '<div class="box' . $type . $class . $align . '"' . $width . '><div class="box-inner-block"><i class="tieicon-boxicon"></i>
			' . do_shortcode( $content ) . '
			</div></div>';

	return $out;
}

add_shortcode( 'box', 'tie_shortcode_box' );


function custom_excerpt_more($more){
	return  '';
}
add_filter( 'excerpt_more', 'custom_excerpt_more');