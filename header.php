<?php
/**
 * The template for displaying the header
 *
 * Contains the opening of the #content div
 *
 * @package Starchas3r_
 * @since Starchas3r_ 1.0
 */
$page_id = get_queried_object_id();
$metaStructuredTitle = get_the_title( $page_id );
?>
<!doctype html>
<html <?php language_attributes( $doctype ) ?> <?php if( is_schema_enabled() ) : ?>itemscope <?php if ( is_single() ) : ?>itemtype="http://schema.org/Article"<?php else : ?>itemtype="http://schema.org/CreativeWork"<?php endif; endif; ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <?php if ( is_single () && is_schema_enabled() ) : ?>
        <meta itemprop="name" content="<?php echo $metaStructuredTitle; ?>"></meta>
    <?php endif; ?>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?> >
    <header>
      <!-- START Navs -->
      <?php $social_media_icons = retrieve_social_links();
          $social_media_count = count( $social_media_icons );
          $toggle_nav_primary = ( has_nav_menu( 'primary' ) || ( $social_media_count > 0 && is_social_media_loc( 'primary' ) ) ? true : false );
          $toggle_nav_header = ( has_nav_menu( 'header' ) || ( $social_media_count > 0 && is_social_media_loc( 'header' ) ) ? true : false );

          ?>
      <div id="container-nav">
        <div id="container-nav-main-divs">
          <?php if( $toggle_nav_primary ) : ?>
            <div id="nav-icon">
              <a href="#">
                <img src="<?php echo get_template_directory_uri();?>/images/icon-mobile-nav-white.png" border="0" />
              </a>
            </div>
          <?php endif; ?>
          <div id="logo">
            <a href="<?php echo get_home_url(); ?>">
              <h1>
                <?php bloginfo( 'name' ); ?>
              </h1>
            </a>
            <?php if ( has_custom_logo() && is_schema_enabled() ) : ?>
              <span itemprop="logo" itemscope itemtype="http://schema.org/ImageObject" class="hide">
                  <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
                  $imageCustomLogo = wp_get_attachment_image_src( $custom_logo_id, 'full' ); ?>
                  <img src="<?php echo $imageCustomLogo[0]; ?>">
                  <meta itemprop="url" content="<?php echo $imageCustomLogo[0]; ?>">
                  <meta itemprop="width" content="<?php echo $imageCustomLogo[1]; ?>">
                  <meta itemprop="height" content="<?php echo $imageCustomLogo[2]; ?>">
              </span>
            <?php elseif ( has_custom_logo() ) : ?>
              <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
              $imageCustomLogo = wp_get_attachment_image_src( $custom_logo_id, 'full' ); ?>
              <img src="<?php echo $imageCustomLogo[0]; ?>">
            <?php endif; ?>
          </div>
        </div>
        <?php if( $toggle_nav_header ) : ?>
          <div id="container-nav-header">
            <?php if( has_nav_menu( 'header' ) ) : ?>
              <nav id="nav-items-header">
                <?php wp_nav_menu( get_args_nav( 'header' ) );?>
              </nav>
            <?php endif; 
            if( $social_media_count > 0 && is_social_media_loc( 'header' ) ) : ?>
              <nav id="nav-items-social">
                <ul>
                  <?php foreach( $social_media_icons as $social_icon ){
                    echo $social_icon;
                  } ?>
                </ul>
              </nav>
            <?php endif; ?>
          </div>
        <?php endif; 
        if( $toggle_nav_primary ) : ?>
          <div id="container-nav-primary">
            <?php if( has_nav_menu( 'primary' ) ) : ?>
              <nav id="nav-items-primary">
                <?php wp_nav_menu( get_args_nav( 'primary' ) );?>
              </nav>
            <?php endif; 
            if( $social_media_count > 0 && is_social_media_loc( 'primary' ) ) : ?>
              <nav id="nav-items-social">
                <ul>
                  <?php foreach( $social_media_icons as $social_icon ){
                    echo $social_icon;
                  } ?>
                </ul>
              </nav>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
      <!-- END Navs -->
    </header>
    <!-- START Container -->
    <?php $featured_id = $posts[0]->ID; 
      $container_style = ( ( is_archive() && have_posts() && has_post_thumbnail( $featured_id ) ) ? 'background-image: url( \'' . wp_get_attachment_image_src( get_post_thumbnail_id( $featured_id ), 'full' )[0] . '\' );' : '' ); ?>
    <div id="container" style="<?php echo $container_style ; ?>">