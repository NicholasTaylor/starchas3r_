<?php

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
	$wp_customize->add_control('social_url_tiktok', array(
		'label'			=> 'TikTok Username (ex. https://tiktok.com/@[username]',
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
}

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

function custom_fonts( $wp_customize ) {
	$wp_customize->add_section( 'starchas3r_fonts', array(
		'title'		=> __( 'Font Integrations', 'starchas3r_' ),
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
	$wp_customize->add_control('project_id_entry',array(
		'label'		=> 'Google Fonts String – Use link tag supplied by Google Fonts (ex. <link href="https://fonts.googleapis.com/css?family=Mansalva|Noto+Sans:400,700|Turret+Road:400,500&display=swap" rel="stylesheet">)',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'google_fonts_list',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('heading_stack', array(
		'default'		=> '\'helvetica neue\',helvetica, arial, sans-serif',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('heading_stack_entry',array(
		'label'		=> 'Heading Stack (Give a CSS-friendly comma delimited sequence of fonts) Default: "\'helvetica neue\',helvetica, arial, sans-serif"',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'heading_stack',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('body_stack', array(
		'default'		=> 'georgia,\'times new roman\',serif',
		'type'			=> 'theme_mod',
		'capability'	=> 'edit_theme_options'
	));
	$wp_customize->add_control('body_stack_entry',array(
		'label'		=> 'Body Copy Stack (Give a CSS-friendly comma delimited sequence of fonts) Default: "georgia,\'times new roman\',serif"',
		'section'	=> 'starchas3r_fonts',
		'settings'	=> 'body_stack',
		'type'		=> 'text'
	));
}

function drop_semicolon($css_string){
	$output = substr($css_string,-1) == ';' ? substr($css_string, 0, -1) : $css_string;
	return $output;
}

function get_font_stacks() {
    $blog_id = blog_switch();
    return array(
    	'headlines'	=> drop_semicolon(get_theme_mod( 'heading_stack' )),
    	'bodycopy'	=> drop_semicolon(get_theme_mod( 'body_stack' ))
    );
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

    if ( $social_media_bool_tiktok || $social_media_bool_fb || $social_media_bool_ig || $social_media_bool_sc || $social_media_bool_twitch || $social_media_bool_twitter || $social_media_bool_yt || $social_media_bool_pn || $social_media_bool_li ) {
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

function starchas3r_register(){
	wp_register_style('main_style', get_template_directory_uri() . '/style.css');
	wp_register_style('homepage', get_template_directory_uri() . '/css/starchas3r_homepage.css');
	wp_register_style('homepage', get_template_directory_uri() . '/css/starchas3r_homepage.css');
	wp_register_style('article', get_template_directory_uri() . '/css/starchas3r_article.css');
	wp_register_style('nav', get_template_directory_uri() . '/css/starchas3r_nav.css');
	wp_register_script('mobile_nav', get_template_directory_uri() . '/js/mobileNav.js','','',true);
	wp_register_script('single_page_effects', get_template_directory_uri() . '/js/singlePageEffects.js','','',true);
	if (has_typekit()) {
		wp_register_style('adobe_font', 'https://use.typekit.net/' . get_theme_mod( 'typekit_pid' ) . '.css');
	};
	if (has_google_fonts()){
		wp_register_style('google_fonts', esc_url('https://fonts.googleapis.com/css?family=' . preg_replace('/(.*)(family=)(.*?)(&|")(.*)/', '$3', get_theme_mod( 'google_fonts_list' )) . '&display=swap'));
	};
}

function starchas3r_custom_styles(){
	wp_enqueue_style('main_style');
	$custom_font_arr = get_font_stacks();
	$custom_fonts = 'h1, 
		h2, 
		h3, 
		h4, 
		h5, 
		h6, 
		#logo h1, 
		#nav-icon {
			font-family: ' . $custom_font_arr['headlines'] . ';
		}

		body, 
		.article-data h2, 
		nav ul li, 
		#title-content h2 {
			font-family: ' . $custom_font_arr['bodycopy'] . ';
		}';
	wp_add_inline_style( 'main_style' , $custom_fonts );
};

function starchas3r_enqueue(){
	wp_enqueue_style('nav');
	wp_enqueue_script('mobile_nav');
	if (is_single()){
		wp_enqueue_style('article');
		wp_enqueue_script('single_page_effects');
	} else {
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
add_action( 'customize_register', 'custom_logo_svg' );
add_action( 'customize_register', 'custom_fonts' );
add_action( 'after_setup_theme', 'theme_support_setup' );
add_action( 'wp_enqueue_scripts', 'starchas3r_register');
add_action( 'wp_enqueue_scripts', 'starchas3r_enqueue');
add_action( 'wp_enqueue_scripts', 'starchas3r_custom_styles');

?>