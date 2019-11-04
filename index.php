<?php
/**
 * The template for displaying the index
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Starchas3r_
 * @since Starchas3r_ 1.0
 */

get_header();
if ( have_posts() ) :  
  while ( have_posts() ) : 
    the_post();
    get_template_part( 'template-parts/content', 'posts' ); 
  endwhile;
  /*the_posts_pagination( 
      array(
        'mid_size'  => 1,
        'prev_text' => __( '&#9668; Newer', 'starchas3r_' ),
        'next_text' => __( 'Older &#9658;', 'starchas3r_' ),
        'screen_reader_text' => __( 'Archives','starchas3r_' )
      ) 
    );*/
else :
  get_template_part( 'template-parts/content', 'none' );
endif; 
get_footer(); ?>