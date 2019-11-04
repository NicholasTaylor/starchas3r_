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
	<?php if ( is_archive() ) :
    	get_template_part( 'template-parts/content', 'footer' );
    endif; ?>
	</div>
	<!-- END Container -->
	<?php if ( !( is_home() ) && !( is_front_page() ) && !( is_archive() ) ) :
    	get_template_part( 'template-parts/content', 'footer' );
    endif;
    wp_footer(); ?>
  </body>
</html>