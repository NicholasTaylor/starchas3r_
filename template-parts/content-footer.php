<?php
/**
 * A snippet for the footer tag
 *
 * 
 *
 * @package starchas3r_
 * @since starchas3r_ 1.0
 */
$social_media_icons = retrieve_social_links( 'nav' );
$social_media_count = count( $social_media_icons );
$toggle_nav_footer = ( has_nav_menu( 'footer' ) || ( $social_media_count > 0 && is_social_media_loc( 'footer' ) ) ? true : false );
?>    

  		<footer>
			<?php if( $toggle_nav_footer ) : ?>
			  <div id="container-nav-footer">
			    <?php if( has_nav_menu( 'footer' ) ) : ?>
			      <nav id="nav-items-footer">
			        <?php wp_nav_menu( get_args_nav( 'footer' ) );?>
			      </nav>
			    <?php endif; 
			    if( $social_media_count > 0 && is_social_media_loc( 'footer' ) ) : ?>
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