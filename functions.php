<?php

function starchas3r_register(){
	wp_register_style('homepage', get_temmplate_directory_uri() . 'css/starchas3r_homepage.css');
	wp_register_style('article', get_temmplate_directory_uri() . 'css/starchas3r_article.css');
	wp_register_style('nav', get_temmplate_directory_uri() . 'css/starchas3r_nav.css');
	wp_register_script('mobileNav', get_temmplate_directory_uri() . 'js/mobileNav.js','','',true);
	wp_register_script('typeKit', get_temmplate_directory_uri() . 'js/typekit-dev.js','','',true);
	wp_register_script('articleFadein', get_temmplate_directory_uri() . 'js/articleFadeIn.js','','',true);
}

function starchas3r_enqueue(){
	wp_enqueue_style('nav');
	wp_enqueue_style('mobileNav');
	wp_enqueue_style('typeKit');
	if (is_single()){
		wp_enqueue_style('article');
		wp_enqueue_script('articleFadein');
	} else {
		wp_enqueue_style('homepage');
	}
}

function title_setup() {
   add_theme_support( 'title-tag' );
}

function social_options( $wp_customize ) {
  $wp_customize->add_section( 'starchas3r_social_media' , array(
  	'title' 		=> __( 'Social Media', 'starchas3r_' ),
  	'priority' 		=> 200,
  ) );
  $wp_customize->add_setting('social_media_fb', array(
  	'default'		=> '',
  	'type'			=> 'theme_mod',
  	'capability'	=> 'edit_theme_options',
  ));
  $wp_customize->add_setting('social_media_ig', array(
  	'default'		=> '',
  	'type'			=> 'theme_mod',
  	'capability'	=> 'edit_theme_options',
  ));
  $wp_customize->add_setting('social_media_sc', array(
  	'default'		=> '',
  	'type'			=> 'theme_mod',
  	'capability'	=> 'edit_theme_options',
  ));
  $wp_customize->add_setting('social_media_twitch', array(
  	'default'		=> '',
  	'type'			=> 'theme_mod',
  	'capability'	=> 'edit_theme_options',
  ));
  $wp_customize->add_setting('social_media_twitter', array(
  	'default'		=> '',
  	'type'			=> 'theme_mod',
  	'capability'	=> 'edit_theme_options',
  ));
  $wp_customize->add_setting('social_media_yt', array(
  	'default'		=> '',
  	'type'			=> 'theme_mod',
  	'capability'	=> 'edit_theme_options',
  ));
  $wp_customize->add_setting('social_media_pn', array(
  	'default'		=> '',
  	'type'			=> 'theme_mod',
  	'capability'	=> 'edit_theme_options',
  ));
  $wp_customize->add_setting('social_media_li', array(
  	'default'		=> '',
  	'type'			=> 'theme_mod',
  	'capability'	=> 'edit_theme_options',
  ));
  $wp_customize->add_setting('social_media_tiktok', array(
  	'default'		=> '',
  	'type'			=> 'theme_mod',
  	'capability'	=> 'edit_theme_options',
  ));
  $wp_customize->add_control('social_url_fb', array(
  	'label'			=> 'Facebook URL',
  	'section'		=> 'starchas3r_social_media',
  	'settings'		=> 'social_media_fb',
  	'type'			=> 'text',
  ));
  $wp_customize->add_control('social_url_ig', array(
  	'label'			=> 'Instagram URL',
  	'section'		=> 'starchas3r_social_media',
  	'settings'		=> 'social_media_ig',
  	'type'			=> 'text',
  ));
  $wp_customize->add_control('social_url_sc', array(
  	'label'			=> 'Snapchat URL',
  	'section'		=> 'starchas3r_social_media',
  	'settings'		=> 'social_media_sc',
  	'type'			=> 'text',
  ));
  $wp_customize->add_control('social_url_twitch', array(
  	'label'			=> 'Twitch URL',
  	'section'		=> 'starchas3r_social_media',
  	'settings'		=> 'social_media_twitch',
  	'type'			=> 'text',
  ));
  $wp_customize->add_control('social_url_twitter', array(
  	'label'			=> 'Twitter URL',
  	'section'		=> 'starchas3r_social_media',
  	'settings'		=> 'social_media_twitter',
  	'type'			=> 'text',
  ));
  $wp_customize->add_control('social_url_yt', array(
  	'label'			=> 'Youtube URL',
  	'section'		=> 'starchas3r_social_media',
  	'settings'		=> 'social_media_yt',
  	'type'			=> 'text',
  ));
  $wp_customize->add_control('social_url_pn', array(
  	'label'			=> 'Pinterest URL',
  	'section'		=> 'starchas3r_social_media',
  	'settings'		=> 'social_media_pn',
  	'type'			=> 'text',
  ));
  $wp_customize->add_control('social_url_li', array(
  	'label'			=> 'LinkedIn URL',
  	'section'		=> 'starchas3r_social_media',
  	'settings'		=> 'social_media_li',
  	'type'			=> 'text',
  ))
  $wp_customize->add_control('social_url_tiktok', array(
  	'label'			=> 'TikTok URL',
  	'section'		=> 'starchas3r_social_media',
  	'settings'		=> 'social_media_tiktok',
  	'type'			=> 'text',
  ));

  function custom_logo_svg( $wp_customize) {
  $wp_customize->add_section( 'starchas3r_logo_svg' , array(
  	'title' 		=> __( 'Logo Icon SVG', 'starchas3r_' ),
  	'priority' 		=> 201,
  ) );
  $wp_customize->add_setting('logo_svg', array(
  	'default'		=> '',
  	'type'			=> 'theme_mod',
  	'capability'	=> 'edit_theme_options',
  ));
  $wp_customize->add_setting('logo_svg_viewBox', array(
  	'default'		=> '',
  	'type'			=> 'theme_mod',
  	'capability'	=> 'edit_theme_options',
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

  function has_social_icons( $blog_id = 0 ) {
	    $switched_blog = false;
	    $custom_social_icons = false;
	 
	    if ( is_multisite() && ! empty( $blog_id ) && (int) $blog_id !== get_current_blog_id() ) {
	        switch_to_blog( $blog_id );
	        $switched_blog = true;
	    }
		endif;

	    $social_media_bool_tiktok = get_theme_mod( 'social_media_tiktok' );
	    $social_media_bool_fb = get_theme_mod( 'social_media_fb' );
	    $social_media_bool_ig = get_theme_mod( 'social_media_ig' );
	    $social_media_bool_sc = get_theme_mod( 'social_media_sc' );
	    $social_media_bool_twitch = get_theme_mod( 'social_media_twitch' );
	    $social_media_bool_twitter = get_theme_mod( 'social_media_twitter' );
	    $social_media_bool_yt = get_theme_mod( 'social_media_yt' );
	    $social_media_bool_pn = get_theme_mod( 'social_media_pn' );
	    $social_media_bool_li = get_theme_mod( 'social_media_li' );
	 
	    if ( $switched_blog ) {
	        restore_current_blog();
	    }

		endif;

	    if ( $social_media_bool_tiktok || $social_media_bool_fb || $social_media_bool_ig || $social_media_bool_sc || $social_media_bool_twitch || $social_media_bool_twitter || $social_media_bool_yt || $social_media_bool_pn || $social_media_bool_li ) {
	    	$custom_social_icons = true;
	    }

		endif;
	 
	    return (bool) $custom_social_icons;
	}
}

function retrieve_social_links( $color, $blog_id = 0 ) {
    $switched_blog = false;
    $custom_social_icons = false;
 
    if ( is_multisite() && ! empty( $blog_id ) && (int) $blog_id !== get_current_blog_id() ) {
        switch_to_blog( $blog_id );
        $switched_blog = true;
    }
	endif;
    if ( $switched_blog ) {
	    restore_current_blog();
	}
	endif;
	$social_links_raw = array(
		'tiktok' => array(
			'prefix' => 'https://vm.tiktok.com/',
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
		)
	);

	$social_links = array();

	$social_links_keys = array_keys($social_links_raw);

	foreach($social_links_keys as $social_key) {
		$currentSocial = $social_links_raw[$social_key];
		$social_color = ($color == 'black' ? 'black' : 'white');
		endif;
		if($currentSocial['value']){
			$social_links[$social_key] = '<li><span itemprop="sameAs"><a href="' . $currentSocial['prefix'] . $currentSocial['value'] . '" itemprop="url"><img src="' . get_temmplate_directory_uri()  . '/images/icons-social/' . $social_color . '/social-logos-' . $social_color . '-' . $currentSocial['abbreviation'] . 'png" border="0" title="' . $currentSocial['title'] . '" /></a></span></li>';
		}
		endif;
	}
	return $social_links;
}

add_action( 'customize_register', 'social_options' );
add_action( 'customize_register', 'custom_logo_svg' );
add_action( 'after_setup_theme', 'title_setup' );
add_action( 'wp_enqueue_scripts', 'starchas3r_register');
add_action( 'wp_enqueue_scripts', 'starchas3r_enqueue');

?>