<?php
/**
 * Various functions and variables
 *
 * 
 *
 * @package Starchas3r_
 * @since Starchas3r_ 1.0
 */

function get_sm_locs(){
	return array(
		'None',
		'Primary',
		'Header',
		'Footer'
	);
}

function get_font_weights(){
	return array(
		'',
		'inherit',
		'initial',
		'normal',
		'bold',
		'bolder',
		'lighter',
		100,
		200,
		300,
		400,
		500,
		600,
		700,
		800,
		900);
}

function get_transform_options(){
	return array(
		'',
		'inherit',
		'initial',
		'none',
		'captitalize',
		'uppercase',
		'lowercase'
	);
}

function blog_switch( $blog_id = 0 ) {
	$switched_blog = false;

	if ( is_multisite() && ! empty( $blog_id ) && (int) $blog_id !== get_current_blog_id() ) {
	    switch_to_blog( $blog_id );
	    $switched_blog = true;
	}

	if ( $switched_blog ) {
	    restore_current_blog();
	}

	return $blog_id;
}

function theme_support_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style-editor.css' );
	add_theme_support( 'responsive-embeds' );
	register_nav_menus(
			array(
				'primary' => __( 'Primary', 'starchas3r_' ),
				'header' => __( 'Header', 'starchas3r_' ),
				'footer' => __( 'Footer', 'starchas3r_' )
			)
		);
}

function general_options( $wp_customize ){
	$wp_customize->add_section( 'starchas3r_general', array(
		'title'			=>	__( 'General Site Settings', 'starchas3r_' ),
		'priority'		=> 200
	) );
	$wp_customize->add_setting('general_is_schema', array(
		'default'		=>	false,
		'type'			=>	'theme_mod',
		'capability'	=>	'edit_theme_options'
	));
	$wp_customize->add_control('general_is_schema_entry', array(
		'label'			=> 'Enable Schema.org Support',
		'section'		=> 'starchas3r_general',
		'settings'		=> 'general_is_schema',
		'type'			=> 'checkbox'
	));
}

function social_options( $wp_customize ) {
	$wp_customize->add_section( 'starchas3r_social_media' , array(
		'title' 		=> __( 'Social Media', 'starchas3r_' ),
		'priority' 		=> 200
	) );
	$wp_customize->add_setting('social_media_tiktok', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_setting('social_media_fb', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_setting('social_media_ig', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_setting('social_media_sc', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_setting('social_media_twitch', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_setting('social_media_twitter', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_setting('social_media_yt', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_setting('social_media_pn', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_setting('social_media_li', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_setting('social_media_gh', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_setting('social_media_dr', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_setting('social_media_be', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_setting('social_media_vs', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_setting('social_media_location', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('social_media_location_control', array(
		'label'			=> 'Social Media Menu Location',
		'section'		=> 'starchas3r_social_media',
		'settings'		=> 'social_media_location',
		'type'			=> 'select',
		'choices'		=> get_sm_locs()
	));
	$wp_customize->add_control('social_url_tiktok', array(
		'label'			=> 'TikTok Username (ex. https://tiktok.com/@[username])',
		'section'		=> 'starchas3r_social_media',
		'settings'		=> 'social_media_tiktok',
		'type'			=> 'text'
	));
	$wp_customize->add_control('social_url_fb', array(
		'label'			=> 'Facebook Username (ex. https://www.facebook.com/[username])',
		'section'		=> 'starchas3r_social_media',
		'settings'		=> 'social_media_fb',
		'type'			=> 'text'
	));
	$wp_customize->add_control('social_url_ig', array(
		'label'			=> 'Instagram Username (ex. https://www.instagram.com/[username])',
		'section'		=> 'starchas3r_social_media',
		'settings'		=> 'social_media_ig',
		'type'			=> 'text'
	));
	$wp_customize->add_control('social_url_sc', array(
		'label'			=> 'Snapchat Username (ex. https://www.snapchat.com/add/[username]',
		'section'		=> 'starchas3r_social_media',
		'settings'		=> 'social_media_sc',
		'type'			=> 'text'
	));
	$wp_customize->add_control('social_url_twitch', array(
		'label'			=> 'Twitch Username (ex. https://www.twitch.tv/[username]',
		'section'		=> 'starchas3r_social_media',
		'settings'		=> 'social_media_twitch',
		'type'			=> 'text'
	));
	$wp_customize->add_control('social_url_twitter', array(
		'label'			=> 'Twitter Handle (ex. https://www.twitter.com/[handle])',
		'section'		=> 'starchas3r_social_media',
		'settings'		=> 'social_media_twitter',
		'type'			=> 'text'
	));
	$wp_customize->add_control('social_url_yt', array(
		'label'			=> 'Youtube Channel ID (ex. https://www.youtube.com/channel/[channel ID])',
		'section'		=> 'starchas3r_social_media',
		'settings'		=> 'social_media_yt',
		'type'			=> 'text'
	));
	$wp_customize->add_control('social_url_pn', array(
		'label'			=> 'Pinterest Username (ex. https://www.pinterest.com/[username]',
		'section'		=> 'starchas3r_social_media',
		'settings'		=> 'social_media_pn',
		'type'			=> 'text'
	));
	$wp_customize->add_control('social_url_li', array(
		'label'			=> 'LinkedIn Profile Name (ex. https://www.linkedin.com/in/[profile name]',
		'section'		=> 'starchas3r_social_media',
		'settings'		=> 'social_media_li',
		'type'			=> 'text'
	));
	$wp_customize->add_control('social_url_gh', array(
		'label'			=> 'Github Username (ex. https://www.github.com/[username]',
		'section'		=> 'starchas3r_social_media',
		'settings'		=> 'social_media_gh',
		'type'			=> 'text'
	));
	$wp_customize->add_control('social_url_dr', array(
		'label'			=> 'Dribbble Profile Name (ex. https://www.dribbble.com/[profile name]',
		'section'		=> 'starchas3r_social_media',
		'settings'		=> 'social_media_dr',
		'type'			=> 'text'
	));
	$wp_customize->add_control('social_url_be', array(
		'label'			=> 'Behance Profile Name (ex. https://www.behance.net/[profile name]',
		'section'		=> 'starchas3r_social_media',
		'settings'		=> 'social_media_be',
		'type'			=> 'text'
	));
	$wp_customize->add_control('social_url_vs', array(
		'label'			=> 'VSCO Username (ex. https://vsco.co/[Username]/images/1',
		'section'		=> 'starchas3r_social_media',
		'settings'		=> 'social_media_vs',
		'type'			=> 'text'
	));
}

function custom_logo_svg( $wp_customize) {
	$wp_customize->add_section( 'starchas3r_logo_svg' , array(
		'title' 		=> __( 'Logo Icon SVG', 'starchas3r_' ),
		'priority' 		=> 201,
	) );
	$wp_customize->add_setting('logo_svg', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_setting('logo_svg_viewBox', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('logo_svg_code', array(
		'label'			=> 'SVG Code for Icon (Usually found in exports from apps like Adobe Illustrator)',
		'section'		=> 'starchas3r_logo_svg',
		'settings'		=> 'logo_svg',
		'type'			=> 'text',
	));
	$wp_customize->add_control('logo_svg_viewBox_code', array(
		'label'			=> 'Attribute for "ViewBox" attribute in SVG tag (Also found in exports from apps like Adobe Illustrator)',
		'section'		=> 'starchas3r_logo_svg',
		'settings'		=> 'logo_svg_viewBox',
		'type'			=> 'text',
	));
}

function custom_fonts( $wp_customize ) {
	$options_font_weight = get_font_weights();
	$options_text_transform = get_transform_options();

	$wp_customize->add_section( 'starchas3r_fonts', array(
		'title'		=> __( 'Font Settings', 'starchas3r_' ),
		'priority'	=> 202
	) );
	$wp_customize->add_setting('typekit_pid', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('project_id_entry',array(
		'label'		=> 'Project ID (go to https://fonts.adobe.com/my_fonts#web_projects-section to find this)',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'typekit_pid',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('google_fonts_list', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('google_fonts_entry',array(
		'label'		=> 'Google Fonts String – Use link tag supplied by Google Fonts (ex. <link href="https://fonts.googleapis.com/css?family=Mansalva|Noto+Sans:400,700|Turret+Road:400,500&display=swap" rel="stylesheet">)',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'google_fonts_list',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('heading_stack', array(
		'default'		=> '\'helvetica neue\', helvetica, arial, sans-serif',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('heading_stack_entry',array(
		'label'		=> 'Headline default (Give a CSS-friendly comma delimited sequence of fonts) Blank defaults to "\'helvetica neue\', helvetica, arial, sans-serif"',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'heading_stack',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('body_stack', array(
		'default'		=> 'georgia, \'times new roman\', serif',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('body_stack_entry',array(
		'label'		=> 'Body copy default (Give a CSS-friendly comma delimited sequence of fonts) Blank defaults to "georgia, \'times new roman\', serif"',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'body_stack',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('code_text_stack', array(
		'default'		=> 'SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", Courier, monospace',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('code_text_stack_entry',array(
		'label'		=> 'Code tag default (Give a CSS-friendly comma delimited sequence of fonts) Blank defaults to "SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", Courier, monospace;"',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'code_text_stack',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_logo', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_logo_entry',array(
		'label'		=> 'Site Logo Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_logo',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('weight_logo', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('weight_logo_entry', array(
		'label'			=> 'Site Logo Font Weight',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'weight_logo',
		'type'			=> 'select',
		'choices'		=> $options_font_weight
	));
	$wp_customize->add_setting('transform_logo', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('transform_logo_entry', array(
		'label'			=> 'Site Logo Text Options',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'transform_logo',
		'type'			=> 'select',
		'choices'		=> $options_text_transform
	));
	$wp_customize->add_setting('stack_nav_items', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_nav_items_entry',array(
		'label'		=> 'Nav Items Fonts (Default)',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_nav_items',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('weight_nav_items', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('weight_nav_items_entry', array(
		'label'			=> 'Nav Items Font Weight',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'weight_nav_items',
		'type'			=> 'select',
		'choices'		=> $options_font_weight
	));
	$wp_customize->add_setting('transform_nav_items', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('transform_nav_items_entry', array(
		'label'			=> 'Nav Items Text Options',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'transform_nav_items',
		'type'			=> 'select',
		'choices'		=> $options_text_transform
	));
	$wp_customize->add_setting('stack_nav_items_primary', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_nav_items_primary_entry',array(
		'label'		=> 'Nav Items Fonts (Primary)',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_nav_items_primary',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('weight_nav_items_primary', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('weight_nav_items_primary_entry', array(
		'label'			=> 'Nav Items (Primary) Font Weight',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'weight_nav_items_primary',
		'type'			=> 'select',
		'choices'		=> $options_font_weight
	));
	$wp_customize->add_setting('transform_nav_items_primary', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('transform_nav_items_primary_entry', array(
		'label'			=> 'Nav Items (Primary) Text Options',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'transform_nav_items_primary',
		'type'			=> 'select',
		'choices'		=> $options_text_transform
	));
	$wp_customize->add_setting('stack_nav_items_header', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_nav_items_header_entry',array(
		'label'		=> 'Nav Items Fonts (Header)',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_nav_items_header',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('weight_nav_items_header', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('weight_nav_items_header_entry', array(
		'label'			=> 'Nav Items (Header) Font Weight',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'weight_nav_items_header',
		'type'			=> 'select',
		'choices'		=> $options_font_weight
	));
	$wp_customize->add_setting('transform_nav_items_header', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('transform_nav_items_header_entry', array(
		'label'			=> 'Nav Items (Header) Text Options',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'transform_nav_items_header',
		'type'			=> 'select',
		'choices'		=> $options_text_transform
	));
	$wp_customize->add_setting('stack_nav_items_footer', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_nav_items_footer_entry',array(
		'label'		=> 'Nav Items Fonts (Footer)',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_nav_items_footer',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('weight_nav_items_footer', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('weight_nav_items_footer_entry', array(
		'label'			=> 'Nav Items (Footer) Font Weight',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'weight_nav_items_footer',
		'type'			=> 'select',
		'choices'		=> $options_font_weight
	));
	$wp_customize->add_setting('transform_nav_items_footer', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('transform_nav_items_footer_entry', array(
		'label'			=> 'Nav Items (Footer) Text Options',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'transform_nav_items_footer',
		'type'			=> 'select',
		'choices'		=> $options_text_transform
	));
	$wp_customize->add_setting('stack_pagination_header', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_pagination_header_entry',array(
		'label'		=> 'Pagination Header Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_pagination_header',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_pagination_copy', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_pagination_copy_entry',array(
		'label'		=> 'Pagination Copy Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_pagination_copy',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_copyright', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_copyright_entry',array(
		'label'		=> 'Copyright Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_copyright',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_homepage_headline', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_homepage_headline_entry',array(
		'label'		=> 'Headline Fonts (Homepage, Archive)',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_homepage_headline',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('weight_homepage_headline', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('weight_homepage_headline_entry', array(
		'label'			=> 'Headline Font Weight (Homepage, Archive)',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'weight_homepage_headline',
		'type'			=> 'select',
		'choices'		=> $options_font_weight
	));
	$wp_customize->add_setting('transform_homepage_headline', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('transform_homepage_headline_entry', array(
		'label'			=> 'Headline Text Options (Homepage, Archive)',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'transform_homepage_headline',
		'type'			=> 'select',
		'choices'		=> $options_text_transform
	));
	$wp_customize->add_setting('stack_homepage_byline', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_homepage_byline_entry',array(
		'label'		=> 'Article Byline/Date Fonts (Homepage, Archive)',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_homepage_byline',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('weight_homepage_byline', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('weight_homepage_byline_entry', array(
		'label'			=> 'Article Byline/Date Font Weight (Homepage, Archive)',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'weight_homepage_byline',
		'type'			=> 'select',
		'choices'		=> $options_font_weight
	));
	$wp_customize->add_setting('transform_homepage_byline', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('transform_homepage_byline_entry', array(
		'label'			=> 'Article Byline/Date Text Options (Homepage, Archive)',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'transform_homepage_byline',
		'type'			=> 'select',
		'choices'		=> $options_text_transform
	));
	$wp_customize->add_setting('stack_homepage_copy', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_homepage_copy_entry',array(
		'label'		=> 'Body Copy Fonts (Homepage, Archive)',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_homepage_copy',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('weight_homepage_copy', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('weight_homepage_copy_entry', array(
		'label'			=> 'Body Copy Font Weight (Homepage, Archive)',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'weight_homepage_copy',
		'type'			=> 'select',
		'choices'		=> $options_font_weight
	));
	$wp_customize->add_setting('transform_homepage_copy', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('transform_homepage_copy_entry', array(
		'label'			=> 'Body Copy Text Options (Homepage, Archive)',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'transform_homepage_copy',
		'type'			=> 'select',
		'choices'		=> $options_text_transform
	));
	$wp_customize->add_setting('stack_article_title_headline', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_article_title_headline_entry',array(
		'label'		=> 'Article Title Section Headline Fonts (Post, Page)',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_article_title_headline',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('weight_article_title_headline', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('weight_article_title_headline_entry', array(
		'label'			=> 'Article Title Section Headline Font Weight (Post, Page)',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'weight_article_title_headline',
		'type'			=> 'select',
		'choices'		=> $options_font_weight
	));
	$wp_customize->add_setting('transform_article_title_headline', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('transform_article_title_headline_entry', array(
		'label'			=> 'Article Title Section Headline Text Options (Post, Page)',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'transform_article_title_headline',
		'type'			=> 'select',
		'choices'		=> $options_text_transform
	));
	$wp_customize->add_setting('stack_article_title_byline', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_article_title_byline_entry',array(
		'label'		=> 'Article Title Section Byline/Date Fonts (Post, Page)',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_article_title_byline',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('weight_article_title_byline', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('weight_article_title_byline_entry', array(
		'label'			=> 'Article Title Section Byline/Date Font Weight (Post, Page)',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'weight_article_title_byline',
		'type'			=> 'select',
		'choices'		=> $options_font_weight
	));
	$wp_customize->add_setting('transform_article_title_byline', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('transform_article_title_byline_entry', array(
		'label'			=> 'Article Title Section Byline/Date Text Options (Post, Page)',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'transform_article_title_byline',
		'type'			=> 'select',
		'choices'		=> $options_text_transform
	));
	$wp_customize->add_setting('stack_article_title_copy', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_article_title_copy_entry',array(
		'label'		=> 'Article Title Body Copy Fonts (Post, Page)',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_article_title_copy',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('weight_article_title_copy', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('weight_article_title_copy_entry', array(
		'label'			=> 'Article Title Section Body Copy Font Weight (Post, Page)',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'weight_article_title_copy',
		'type'			=> 'select',
		'choices'		=> $options_font_weight
	));
	$wp_customize->add_setting('transform_article_title_copy', array(
		'default'		=> 'inherit',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('transform_article_title_copy_entry', array(
		'label'			=> 'Article Title Section Body Copy Text Options (Post, Page)',
		'section'		=> 'starchas3r_fonts',
		'settings'		=> 'transform_article_title_copy',
		'type'			=> 'select',
		'choices'		=> $options_text_transform
	));
	$wp_customize->add_setting('stack_article_copy', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_article_copy_entry',array(
		'label'		=> 'Article Body Copy Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_article_copy',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_article_captions', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_article_captions_entry',array(
		'label'		=> 'Article Captions Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_article_captions',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_article_tags', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_article_tags_entry',array(
		'label'		=> 'Article Tags Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_article_tags',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_article_blockquote', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_article_blockquote_entry',array(
		'label'		=> 'Article Blockquote Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_article_blockquote',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_article_pagination', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_article_pagination_entry',array(
		'label'		=> 'Article Pagination Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_article_pagination',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_comment_headline', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_comment_headline_entry',array(
		'label'		=> 'Comment Headline Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_comment_headline',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_comment_data', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_comment_data_entry',array(
		'label'		=> 'Comment Author Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_comment_data',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_comment_metadata', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_comment_metadata_entry',array(
		'label'		=> 'Comment Metadata Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_comment_metadata',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_comment_copy', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_comment_copy_entry',array(
		'label'		=> 'Comment Copy Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_comment_copy',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_comment_reply', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_comment_reply_entry',array(
		'label'		=> 'Comment Reply Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_comment_reply',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_comment_write_headline', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_comment_write_headline_entry',array(
		'label'		=> 'Write Comment Headline Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_comment_write_headline',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_comment_write_copy', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_comment_write_copy_entry',array(
		'label'		=> 'Write Comment Instructions Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_comment_write_copy',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_comment_write_label', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_comment_write_label_entry',array(
		'label'		=> 'Write Comment Label Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_comment_write_label',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_archive_headline', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_archive_headline_entry',array(
		'label'		=> 'Archive Headline Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_archive_headline',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('stack_archive_header_copy', array(
		'default'		=> '',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('stack_archive_header_copy_entry',array(
		'label'		=> 'Archive Header Copy Fonts',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'stack_archive_header_copy',
		'type'		=> 'text'
	));
}

function drop_semicolon($css_string){
	$output = substr($css_string,-1) == ';' ? substr($css_string, 0, -1) : $css_string;
	return $output;
}

function has_google_fonts() {
    $blog_id = blog_switch();
    $google_fonts = preg_replace('/(.*)(family=)(.*?)(&|")(.*)/', '$3', get_theme_mod( 'google_fonts_list' ));
    $google_bool = (!($google_fonts) || preg_match('([^\\A-Za-z_\|\+:0-9,])',$google_fonts) ? false : true);
    return (bool) $google_bool;
}

function has_social_icons() {
    $blog_id = blog_switch();
    $custom_social_icons = false;

    $social_media_bool_tiktok = get_theme_mod( 'social_media_tiktok' );
    $social_media_bool_fb = get_theme_mod( 'social_media_fb' );
    $social_media_bool_ig = get_theme_mod( 'social_media_ig' );
    $social_media_bool_sc = get_theme_mod( 'social_media_sc' );
    $social_media_bool_twitch = get_theme_mod( 'social_media_twitch' );
    $social_media_bool_twitter = get_theme_mod( 'social_media_twitter' );
    $social_media_bool_yt = get_theme_mod( 'social_media_yt' );
    $social_media_bool_pn = get_theme_mod( 'social_media_pn' );
    $social_media_bool_li = get_theme_mod( 'social_media_li' );
    $social_media_bool_gh = get_theme_mod( 'social_media_gh' );
    $social_media_bool_dr = get_theme_mod( 'social_media_dr' );
    $social_media_bool_be = get_theme_mod( 'social_media_be' );
    $social_media_bool_be = get_theme_mod( 'social_media_vs' );

    if ( $social_media_bool_tiktok || $social_media_bool_fb || $social_media_bool_ig || $social_media_bool_sc || $social_media_bool_twitch || $social_media_bool_twitter || $social_media_bool_yt || $social_media_bool_pn || $social_media_bool_li || $social_media_bool_gh || $social_media_bool_dr || $social_media_bool_be || $social_media_bool_vs ) {
    	$custom_social_icons = true;
    }
 
    return (bool) $custom_social_icons;
}

function retrieve_social_links() {
    $blog_id = blog_switch();

	$social_links_raw = array(
		'tiktok' => array(
			'prefix' => 'https://tiktok.com/@',
			'value' => get_theme_mod( 'social_media_tiktok' ),
			'title' => 'TikTok',
			'abbreviation' => 'tk'
		),
		'facebook' => array(
			'prefix' => 'https://www.facebook.com/',
			'value' => get_theme_mod( 'social_media_fb' ),
			'title' => 'Facebook',
			'abbreviation' => 'fb'
		),
		'instagram' => array(
			'prefix' => 'https://www.instagram.com/',
			'value' => get_theme_mod( 'social_media_ig' ),
			'title' => 'Instagram',
			'abbreviation' => 'ig'
		),
		'snapchat' => array(
			'prefix' => 'https://www.snapchat.com/add/',
			'value' => get_theme_mod( 'social_media_sc' ),
			'title' => 'Snapchat',
			'abbreviation' => 'sc'
		),
		'twitch' => array(
			'prefix' => 'https://www.twitch.tv/',
			'value' => get_theme_mod( 'social_media_twitch' ),
			'title' => 'Twitch',
			'abbreviation' => 'twitch'
		),
		'twitter' => array(
			'prefix' => 'https://www.twitter.com/',
			'value' => get_theme_mod( 'social_media_twitter' ),
			'title' => 'Twitter',
			'abbreviation' => 'twitter'
		),
		'youtube' => array(
			'prefix' => 'https://www.youtube.com/channel/',
			'value' => get_theme_mod( 'social_media_yt' ),
			'title' => 'YouTube',
			'abbreviation' => 'yt'
		),
		'pinterest' => array(
			'prefix' => 'https://www.pinterest.com/',
			'value' => get_theme_mod( 'social_media_pn' ),
			'title' => 'Pinterest',
			'abbreviation' => 'pn'
		),
		'linkedin' => array(
			'prefix' => 'https://www.linkedin.com/in/',
			'value' => get_theme_mod( 'social_media_li' ),
			'title' => 'LinkedIn',
			'abbreviation' => 'li'
		),
		'github' => array(
			'prefix' => 'https://www.github.com/',
			'value' => get_theme_mod( 'social_media_gh' ),
			'title' => 'GitHub',
			'abbreviation' => 'gh'
		),
		'dribbble' => array(
			'prefix' => 'https://www.dribbble.com/',
			'value' => get_theme_mod( 'social_media_dr' ),
			'title' => 'Dribbble',
			'abbreviation' => 'dr'
		),
		'behance' => array(
			'prefix' => 'https://www.behance.net/',
			'value' => get_theme_mod( 'social_media_be' ),
			'title' => 'Behance',
			'abbreviation' => 'be'
		),
		'vsco' => array(
			'prefix' => 'https://vsco.co/',
			'value' => get_theme_mod( 'social_media_vs' ),
			'title' => 'VSCO',
			'abbreviation' => 'vs'
		)
	);

	$social_links = array();

	$social_links_keys = array_keys($social_links_raw);

	foreach($social_links_keys as $social_key) {
		$currentSocial = $social_links_raw[$social_key];
		if($currentSocial['value']){
			$social_links[$social_key] = '<li><span itemprop="sameAs"><a href="' . $currentSocial['prefix'] . $currentSocial['value'] . '" itemprop="url"><img src="' . get_template_directory_uri()  . '/images/icons-social/white/social-logos-white-' . $currentSocial['abbreviation'] . '.png" border="0" title="' . $currentSocial['title'] . '" /></a></span></li>';
		}
	}
	return $social_links;
}

function has_typekit( $blog_id = 0 ){
    $blog_id = blog_switch();

	if (get_theme_mod( 'typekit_pid' ) ){
		return true;	
	};
}

function is_schema_enabled( $blog_id = 0 ){
    $blog_id = blog_switch();

	if (get_theme_mod( 'general_is_schema' ) ){
		return true;	
	};
}

function starchas3r_register(){
	wp_register_style('main_style', get_template_directory_uri() . '/style.css');
	wp_register_style('homepage', get_template_directory_uri() . '/css/starchas3r_homepage.css');
	wp_register_style('archive', get_template_directory_uri() . '/css/starchas3r_archive.css');
	wp_register_style('article', get_template_directory_uri() . '/css/starchas3r_article.css');
	wp_register_style('nav', get_template_directory_uri() . '/css/starchas3r_nav.css');
	wp_register_script('mobile_nav', get_template_directory_uri() . '/js/mobileNav.js','','',true);
	wp_register_script('single_page_fade_in', get_template_directory_uri() . '/js/singlePageFadeIn.js','','',true);
	wp_register_script('page_effects', get_template_directory_uri() . '/js/pageEffects.js','','',true);
	if (has_typekit()) {
		wp_register_style('adobe_font', 'https://use.typekit.net/' . get_theme_mod( 'typekit_pid' ) . '.css');
	};
	if (has_google_fonts()){
		wp_register_style('google_fonts', esc_url('https://fonts.googleapis.com/css?family=' . preg_replace('/(.*)(family=)(.*?)(&|")(.*)/', '$3', get_theme_mod( 'google_fonts_list' )) . '&display=swap'));
	};
}

function starchas3r_custom_styles( $blog_id = 0 ){
    $blog_id = blog_switch();
	wp_enqueue_style('main_style');
	$css_array = array(
		'heading'	=> array(
			'selector'					=> 	'h1, h2, h3, h4, h5, h6',
			'font_stack'				=> 	get_theme_mod( 'heading_stack' ),
			'has_default_font_stack'	=>	true,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false,
			'default_font_stack'		=>	'\'helvetica neue\', helvetica, arial, sans-serif'
			),
		'body'	=> array(
			'selector'					=>	'body',
			'font_stack'				=>	get_theme_mod( 'body_stack' ),
			'has_default_font_stack'	=>	true,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false,
			'default_font_stack'		=>	'georgia,\' times new roman\', serif'
			),
		'code_text'	=> array(
			'selector'					=>	'code',
			'font_stack'				=>	get_theme_mod( 'code_text_stack' ),
			'has_default_font_stack'	=>	true,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false,
			'default_font_stack'		=>	'SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", Courier, monospace'
			),
		'logo'	=> array(
			'selector'					=>	'#logo h1',
			'font_stack'				=>	get_theme_mod( 'stack_logo' ),
			'weight'					=>	get_theme_mod( 'weight_logo' ),
			'transform'					=>	get_theme_mod( 'transform_logo' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	true,
			'has_default_transform'		=>	true,
			'default_weight'			=>	'inherit',
			'default_transform'			=>	'inherit'
			),
		'nav_items'	=> array(
			'selector'					=>	'nav ul li',
			'font_stack'				=>	get_theme_mod( 'stack_nav_items' ),
			'weight'					=>	get_theme_mod( 'weight_nav_items' ),
			'transform'					=>	get_theme_mod( 'transform_nav_items' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	true,
			'has_default_transform'		=>	true,
			'default_weight'			=>	'inherit',
			'default_transform'			=>	'inherit'
			),
		'nav_items_primary'	=> array(
			'selector'					=>	'nav#nav-items-primary ul li',
			'font_stack'				=>	get_theme_mod( 'stack_nav_items_primary' ),
			'weight'					=>	get_theme_mod( 'weight_nav_items_primary' ),
			'transform'					=>	get_theme_mod( 'transform_nav_items_primary' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false			),
		'nav_items_header'	=> array(
			'selector'					=>	'nav#nav-items-header ul li',
			'font_stack'				=>	get_theme_mod( 'stack_nav_items_header' ),
			'weight'					=>	get_theme_mod( 'weight_nav_items_header' ),
			'transform'					=>	get_theme_mod( 'transform_nav_items_header' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'nav_items_footer'	=> array(
			'selector'					=>	'nav#nav-items-footer ul li',
			'font_stack'				=>	get_theme_mod( 'stack_nav_items_footer' ),
			'weight'					=>	get_theme_mod( 'weight_nav_items_footer' ),
			'transform'					=>	get_theme_mod( 'transform_nav_items_footer' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'pagination_header'	=> array(
			'selector'					=>	'.pagination h2',
			'font_stack'				=>	get_theme_mod( 'stack_pagination_header' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'pagination_copy'	=> array(
			'selector'					=>	'.nav-links a, .nav-links span',
			'font_stack'				=>	get_theme_mod( 'stack_pagination_copy' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'copyright'	=> array(
			'selector'					=>	'#copyright p',
			'font_stack'				=>	get_theme_mod( 'stack_copyright' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'homepage_headline'	=> array(
			'selector'					=>	'.article h1',
			'font_stack'				=>	get_theme_mod( 'stack_homepage_headline' ),
			'weight'					=>	get_theme_mod( 'weight_homepage_headline' ),
			'transform'					=>	get_theme_mod( 'transform_homepage_headline' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	true,
			'has_default_transform'		=>	true,
			'default_weight'			=>	'inherit',
			'default_transform'			=>	'inherit'
			),
		'homepage_byline'	=> array(
			'selector'					=>	'.article h2',
			'font_stack'				=>	get_theme_mod( 'stack_homepage_byline' ),
			'weight'					=>	get_theme_mod( 'weight_homepage_byline' ),
			'transform'					=>	get_theme_mod( 'transform_homepage_byline' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	true,
			'has_default_transform'		=>	true,
			'default_weight'			=>	'inherit',
			'default_transform'			=>	'inherit'
			),
		'homepage_copy'	=> array(
			'selector'					=>	'.article p',
			'font_stack'				=>	get_theme_mod( 'stack_homepage_copy' ),
			'weight'					=>	get_theme_mod( 'weight_homepage_copy' ),
			'transform'					=>	get_theme_mod( 'transform_homepage_copy' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	true,
			'has_default_transform'		=>	true,
			'default_weight'			=>	'inherit',
			'default_transform'			=>	'inherit'
			),
		'article_title_headline'	=> array(
			'selector'					=>	'#title-content h1',
			'font_stack'				=>	get_theme_mod( 'stack_article_title_headline' ),
			'weight'					=>	get_theme_mod( 'weight_article_title_headline' ),
			'transform'					=>	get_theme_mod( 'transform_article_title_headline' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	true,
			'has_default_transform'		=>	true,
			'default_weight'			=>	'inherit',
			'default_transform'			=>	'inherit'
			),
		'article_title_byline'	=> array(
			'selector'					=>	'#title-content h2',
			'font_stack'				=>	get_theme_mod( 'stack_article_title_byline' ),
			'weight'					=>	get_theme_mod( 'weight_article_title_byline' ),
			'transform'					=>	get_theme_mod( 'transform_article_title_byline' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	true,
			'has_default_transform'		=>	true,
			'default_weight'			=>	'inherit',
			'default_transform'			=>	'inherit'
			),
		'article_title_copy'	=> array(
			'selector'					=>	'#title-content p',
			'font_stack'				=>	get_theme_mod( 'stack_article_title_copy' ),
			'weight'					=>	get_theme_mod( 'weight_article_title_copy' ),
			'transform'					=>	get_theme_mod( 'transform_article_title_copy' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	true,
			'has_default_transform'		=>	true,
			'default_weight'			=>	'inherit',
			'default_transform'			=>	'inherit'
			),
		'article_copy'	=> array(
			'selector'					=>	'#article-body p, #article-body li',
			'font_stack'				=>	get_theme_mod( 'stack_article_copy' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'article_captions'	=> array(
			'selector'					=>	'#article-body .wp-caption-text',
			'font_stack'				=>	get_theme_mod( 'stack_article_captions' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'article_tags'	=> array(
			'selector'					=>	'.content-body-tag h2',
			'font_stack'				=>	get_theme_mod( 'stack_article_tags' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'article_blockquote'	=> array(
			'selector'					=>	'blockquote ',
			'font_stack'				=>	get_theme_mod( 'stack_article_blockquote' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'article_pagination'	=> array(
			'selector'					=>	'.post-page-numbers h3',
			'font_stack'				=>	get_theme_mod( 'stack_article_pagination' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'comment_headline'	=> array(
			'selector'					=>	'#comments',
			'font_stack'				=>	get_theme_mod( 'stack_comment_headline' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'comment_author'	=> array(
			'selector'					=>	'.comment-author',
			'font_stack'				=>	get_theme_mod( 'stack_comment_data' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'comment_data'	=> array(
			'selector'					=>	'.comment-metadata',
			'font_stack'				=>	get_theme_mod( 'stack_comment_metadata' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'comment_copy'	=> array(
			'selector'					=>	'.comment-content p',
			'font_stack'				=>	get_theme_mod( 'stack_comment_copy' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'comment_reply'	=> array(
			'selector'					=>	'.reply .comment-reply-link',
			'font_stack'				=>	get_theme_mod( 'stack_comment_reply' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'comment_write_headline'	=> array(
			'selector'					=>	'h3#reply-title',
			'font_stack'				=>	get_theme_mod( 'stack_comment_write_headline' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'comment_write_copy'	=> array(
			'selector'					=>	'#commentform p',
			'font_stack'				=>	get_theme_mod( 'stack_comment_write_copy' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'comment_write_label'	=> array(
			'selector'					=>	'#commentform p.comment-form-comment',
			'font_stack'				=>	get_theme_mod( 'stack_comment_write_label' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'archive_headline'	=> array(
			'selector'					=>	'#header-category h1',
			'font_stack'				=>	get_theme_mod( 'stack_archive_headline' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			),
		'archive_header_copy'	=> array(
			'selector'					=>	'#header-category p',
			'font_stack'				=>	get_theme_mod( 'stack_archive_header_copy' ),
			'has_default_font_stack'	=>	false,
			'has_default_weight'		=>	false,
			'has_default_transform'		=>	false
			)
	);
	$custom_fonts = '';
	$css_keys = array_keys($css_array);

	foreach($css_keys as $css_key){
		$current_array = $css_array[$css_key];
		$current_declaration = '';
		$meta_array = array(
			'font_stack'	=>	array(
				'name'			=>	'font_stack',
				'attr'			=>	'font-family',
				'type'			=> 	'text'
			),
			'weight'	=>	array(
				'name'			=>	'weight',
				'attr'			=>	'font-weight',
				'type'			=>	'select',
				'choices'		=>	get_font_weights()
			),
			'transform'	=>	array(
				'name'			=>	'transform',
				'attr'			=>	'text-transform',
				'type'			=>	'select',
				'choices'		=>	get_transform_options()
			)
		);
		foreach($meta_array as $field_name){
			$current_field_name = $field_name['name'];
			$current_field_attr = $field_name['attr'];
			$current_field_type = $field_name['type'];
			$current_field_choices = $current_field_type == 'select' ? $field_name['choices'] : '';
			$has_default_key = 'has_default_' . $current_field_name;
			$default_key = 'default_' . $current_field_name;
			if($current_array[$current_field_name]){
				$declaration_value = $field_name['type'] == 'select' ? $current_field_choices[$current_array[$current_field_name]] : $current_array[$current_field_name];
				$current_declaration .= "\t" . $current_field_attr . ": " . drop_semicolon($declaration_value) . ";\n"; 
			} elseif($current_array[$has_default_key]){
				$current_declaration .= "\t" . $current_field_attr . ": " . drop_semicolon($current_array[$default_key]) . ";\n"; 
			}
		}

		if(strlen($current_declaration) > 0){
			$custom_fonts .= $current_array['selector'] . " {\n" . $current_declaration . "}\n\n";
		}

		/*
		if($current_array['font_stack']){
			$current_font_stack = $current_array['font_stack'];
		} elseif($current_array['has_default']) {
			$current_font_stack = $current_array['default'];
		} else {
			$current_font_stack = '';
		}

		if($current_font_stack){
			$custom_fonts .= $current_array['selector'] . " {\n\tfont-family: " . drop_semicolon($current_font_stack) . ";\n}\n\n";
		}*/
	}

	wp_add_inline_style( 'main_style' , $custom_fonts );
}

function starchas3r_enqueue(){
	wp_enqueue_style('nav');
	wp_enqueue_script('mobile_nav');
	wp_enqueue_script('page_effects');
	if (is_single() || is_page()){
		wp_enqueue_style('article');
		wp_enqueue_script('single_page_fade_in');
	} elseif ( is_archive() ){
		wp_enqueue_style('archive');}
	else {
		wp_enqueue_style('homepage');
	}
	if (has_typekit()){
		wp_enqueue_style('adobe_font');
	}
	if (has_google_fonts()){
		wp_enqueue_style('google_fonts');
	}
}

add_action( 'customize_register', 'social_options' );
add_action( 'customize_register', 'general_options' );
add_action( 'customize_register', 'custom_logo_svg' );
add_action( 'customize_register', 'custom_fonts' );
add_action( 'after_setup_theme', 'theme_support_setup' );
add_action( 'wp_enqueue_scripts', 'starchas3r_register');
add_action( 'wp_enqueue_scripts', 'starchas3r_enqueue');
add_action( 'wp_enqueue_scripts', 'starchas3r_custom_styles');

?>