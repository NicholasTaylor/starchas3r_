<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Starchas3r_
 * @since Starchas3r_ 1.0
 */
?>
	</div>
	<!-- END Container -->
	<?php 	$args_nav_footer = array(
	            'theme_location'  => 'footer',
	            'menu'            => '',
	            'container'       => '',
	            'container_class' => '',
	            'container_id'    => '',
	            'menu_class'      => '',
	            'menu_id'         => '',
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
			$social_media_icons = retrieve_social_links();
          	$social_media_count = count( $social_media_icons );
          	$sm_loc_array = get_sm_locs();
      		$sm_loc = strtolower( $sm_loc_array[get_theme_mod( 'social_media_location' )] );
          	$toggle_nav_footer = ( has_nav_menu( 'footer' ) || ($social_media_count > 0 && $sm_loc == 'footer') ? true : false );
    ?>
  		<footer>
			<?php if($toggle_nav_footer) : ?>
			  <div id="container-nav-footer">
			    <?php if( has_nav_menu( 'footer' ) ) : ?>
			      <nav id="nav-items-footer">
			        <?php wp_nav_menu($args_nav_footer);?>
			      </nav>
			    <?php endif; ?>
			    <?php if( $social_media_count > 0 && $sm_loc == 'footer' ) : ?>
			      <nav id="nav-items-social">
			        <ul>
			          <?php foreach($social_media_icons as $social_icon){
			            echo $social_icon;
			          } ?>
			        </ul>
			      </nav>
			    <?php endif; ?>
			  </div>
			<?php endif; ?>
			<div id="copyright">
				&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>
			</div>
		</footer>
	<?php wp_footer(); ?>
  </body>
</html>