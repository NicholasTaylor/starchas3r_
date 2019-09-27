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
      <!-- START Desktop Nav -->
      <div id="container-nav-desktop">
        <nav id="nav-desktop">
          <?php $args_nav_desk = array(
            'theme_location'  => 'primary',
            'menu'            => '',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => '',
            'menu_id'         => 'nav-desktop-categories',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id=\"%1$s\" class=\"%2$s\">%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
          );

          $args_nav_mobile = array(
            'theme_location'  => 'primary',
            'menu'            => '',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => '',
            'menu_id'         => 'nav-mobile-categories',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id=\"%1$s\" class=\"%2$s\">%3$s</ul>',
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
          $social_media_white = retrieve_social_links('white');
          $social_media_black = retrieve_social_links('black');
          $social_media_count = count( $social_media_white );
          $toggle_mobile_nav = ( $category_count > 0 || has_nav_menu( 'primary' ) || $social_media_count > 0 ? true : false );

          ?>
          <?php if (has_nav_menu( 'primary' )) : ?>
            <?php wp_nav_menu($args_nav_desk);?>
          <?php else : ?>
            <ul id="nav-desktop-categories">
              <li>
                <a href="#">
                  <div id="logo">
                    <span itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
                      <h1>
                        <?php bloginfo( 'name' ); ?>
                      </h1>
                    </span>
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
                </a>
              </li>
              <?php if ($category_count > 0) : ?>
                <?php foreach($categories as $category){
                  echo sprintf( '<li><a href="%s">%s</a></li>', esc_url( get_category_link( $category->term_id ) ), esc_html( $category->name));
                }; ?>
              <?php endif; ?>
            </ul>
          <?php endif; ?>
          <?php if( $social_media_count > 0 ): ?>
            <ul id="nav-desktop-social">
              <?php foreach($social_media_white as $social_white){
                echo $social_white;
              } ?>
            </ul>
          <?php endif; ?>
        </nav>
      </div>
      <!-- END Desktop Nav -->
      <!-- START Mobile Nav -->
      <div id="container-nav-mobile">
        <?php if($toggle_mobile_nav) : ?>
          <div id="nav-icon">
            <a href="#">
              <img src="<?php echo get_template_directory_uri();?>/images/icon-mobile-nav-white.png" border="0" />
            </a>
          </div>
        <?php endif; ?>
        <div id="logo">
          <h1>
            <?php bloginfo( 'name' ); ?>
          </h1>
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
        <?php if($toggle_mobile_nav) : ?>
          <nav id="nav-mobile">   
            <?php if (has_nav_menu( 'primary' )) : ?>
              <?php wp_nav_menu($args_nav_mobile);?>
            <?php elseif ($category_count > 0) : ?>
              <ul id="nav-mobile-categories">
                <?php foreach($categories as $category){
                  echo sprintf( '<li><a href="%s">%s</a></li>', esc_url( get_category_link( $category->term_id ) ), esc_html( $category->name));
                }; ?>
              </ul>
            <?php endif; ?>      
            <?php if( $social_media_count > 0 ): ?>
              <ul id="nav-mobile-social">
                <?php foreach($social_media_black as $social_black){
                  echo $social_black;
                } ?>
              </ul>
            <?php endif; ?>
          </nav>
        <?php endif; ?>
      </div>
      <!-- END Mobile Nav -->
    </header>
    <!-- START Container -->
    <div id="container">