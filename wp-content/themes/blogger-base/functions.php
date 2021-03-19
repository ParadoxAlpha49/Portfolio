<?php
/**
 * Theme Functions.
 */

add_action( 'wp_enqueue_scripts', 'blogger_base_enqueue_styles' );
function blogger_base_enqueue_styles() {
	$parent_style = 'blogger-hub-style'; // Style handle of parent theme.
	wp_enqueue_style( $parent_style, esc_url(get_template_directory_uri()) . '/style.css' );
	wp_enqueue_style( 'blogger-base-style', get_stylesheet_uri(), array( $parent_style ) );
}
function blogger_base_customize_register() {     
	global $wp_customize;
	$wp_customize->remove_section( 'blogger_hub_theme_color_option' );  
	$wp_customize->remove_control( 'blogger_hub_metafields_date' );
	$wp_customize->remove_setting( 'blogger_hub_metafields_date' ); 
	$wp_customize->remove_control( 'blogger_hub_metafields_author' );
	$wp_customize->remove_setting( 'blogger_hub_metafields_author' );
	$wp_customize->remove_control( 'blogger_hub_metafields_comment' );
	$wp_customize->remove_setting( 'blogger_hub_metafields_comment' );
} 
add_action( 'customize_register', 'blogger_base_customize_register', 11 );

/* Excerpt Limit Begin */
function blogger_base_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}