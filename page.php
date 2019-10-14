<?php
/**
 * The template for displaying the index
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Starchas3r_
 * @since Starchas3r_ 1.0
 */

get_header();?>
  <?php while (have_posts () ) : the_post(); //Go Loop Go! ?>
      <?php get_template_part( 'template-parts/content', 'single' ); ?>

  <?php endwhile; //Stop Loop Stop! ?>

<?php get_footer(); ?>