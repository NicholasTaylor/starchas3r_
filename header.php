<?php
/**
 * The template for displaying the header
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Starchas3r_
 * @since Starchas3r_ 1.0
 */
?>
<!doctype html>
<html <?php language_attributes( $doctype ) ?> itemscope <?php if (is_single() ) : ?>itemtype="http://schema.org/Article"<?php else : ?>itemtype="http://schema.org/CreativeWork"<?php endif; ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <?php $page_id = get_queried_object_id();
        $metaStructuredTitle = get_the_title( $page_id );
    ?>
    <?php if (is_single () ) : ?>
        <meta itemprop="name" content="<?php echo $metaStructuredTitle; ?>"></meta>
    <?php endif; ?>

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?> >
    <header>
      <!-- START Nav -->
      <?php $args_nav = array(
            'theme_location'  => 'primary',
            'menu'            => '',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => '',
            'menu_id'         => 'nav-categories',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
          );

          $args_categories = array(
            'parent' => 0,
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => 0
          );

          $categories = get_categories( $args_categories );
          $category_count = count( $categories );
          $misc_options = retrieve_misc_options();
          $disable_nav_default = $misc_options['disable_nav_default'];
          $show_cats = (( $category_count == 0 || $disable_nav_default ) ? false : true);
          $social_media_icons = retrieve_social_links();
          $social_media_count = count( $social_media_icons );
          $toggle_nav = ( $show_cats || has_nav_menu( 'primary' ) || $social_media_count > 0 ? true : false );

          ?>
      <div id="container-nav">
        <div id="nav-screen">
        </div>
        <?php if($toggle_nav) : ?>
          <div id="nav-icon">
            <a href="#">
              <img src="<?php echo get_template_directory_uri();?>/images/icon-mobile-nav-white.png" border="0" />
            </a>
          </div>
        <div id="logo" class="nav-on">
        <?php else : ?>
        <div id="logo" class="nav-off">
        <?php endif; ?>
          <a href="<?php echo get_home_url(); ?>">
            <h1>
              <?php bloginfo( 'name' ); ?>
            </h1>
          </a>
          <?php if (has_custom_logo()) : ?>
            <span itemprop="logo" itemscope itemtype="http://schema.org/ImageObject" class="hide">
                <?php $custom_logo_id = get_theme_mod( 'custom_logo');
                $imageCustomLogo = wp_get_attachment_image_src( $custom_logo_id, 'full' ); ?>
                <img src="<?php echo $imageCustomLogo[0]; ?>">
                <meta itemprop="url" content="<?php echo $imageCustomLogo[0]; ?>">
                <meta itemprop="width" content="<?php echo $imageCustomLogo[1]; ?>">
                <meta itemprop="height" content="<?php echo $imageCustomLogo[2]; ?>">
            </span>
          <?php endif; ?>
        </div>
        <?php if($toggle_nav) : ?>
          <nav id="nav-inner"> 
            <?php if (has_nav_menu( 'primary' )) : ?>
              <?php wp_nav_menu($args_nav);?>
            <?php elseif ($show_cats) : ?>
              <ul id="nav-categories">
                <?php foreach($categories as $category){
                  echo sprintf( '<li><a href="%s">%s</a></li>', esc_url( get_category_link( $category->term_id ) ), esc_html( $category->name));
                }; ?>
              </ul>
            <?php endif; ?>      
            <?php if( $social_media_count > 0 ): ?>
              <ul id="nav-social">
                <?php foreach($social_media_icons as $social_icon){
                  echo $social_icon;
                } ?>
              </ul>
            <?php endif; ?>
          </nav>
        <?php endif; ?>
      </div>
      <!-- END Nav -->
    </header>
    <!-- START Container -->
    <div id="container">