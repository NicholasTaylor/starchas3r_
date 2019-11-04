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
	<?php 	$social_media_icons = retrieve_social_links();
          	$social_media_count = count( $social_media_icons );
          	$toggle_nav_footer = ( has_nav_menu( 'footer' ) || ( $social_media_count > 0 && get_theme_mod( 'social_media_footer' ) ) ? true : false );
    ?>
  		<footer>
			<?php if( $toggle_nav_footer ) : ?>
			  <div id="container-nav-footer">
			    <?php if( has_nav_menu( 'footer' ) ) : ?>
			      <nav id="nav-items-footer">
			        <?php wp_nav_menu( get_args_nav( 'footer' ) );?>
			      </nav>
			    <?php endif; 
			    if( $social_media_count > 0 && get_theme_mod( 'social_media_footer' ) ) : ?>
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
			<div id="copyright">
				<p>
					&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>
				</p>
			</div>
		</footer>
	<?php wp_footer(); ?>
  </body>
</html>