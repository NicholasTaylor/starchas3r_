<?php
/**
 * The template for displaying the archive
 *
 *
 *
 * @package Starchas3r_
 * @since Starchas3r_ 1.0
 */

get_header(); ?>
<div class="meta-bg-screen">
</div>
<?php if ( have_posts() ) : ?>
	<header id="header-category">
		<div class="article-content">
			<?php the_archive_title( '<h1>', '</h1>' ); ?>
			<div class="article-data">
				<?php the_archive_description( '<div class="excerpt"><p>', '</p></div>' ); ?>
			</div>
		</div>
	</header>
	<div id="container-section-list"<?php if( $paged == 0 ) { echo ' class="archive-page0"'; } else { echo ' class="archive-page1plus"'; } ?>>
		<?php while (have_posts () ) : 
			the_post(); //Go Loop Go! 
			get_template_part( 'template-parts/content', 'posts' ); 
		endwhile; //Stop Loop Stop!
		?>
	</div>
	<?php the_posts_pagination( 
	  array(
	    'mid_size'  => 1,
	    'prev_text' => __( '&#9668; Newer', 'starchas3r_' ),
	    'next_text' => __( 'Older &#9658;', 'starchas3r_' ),
	    'screen_reader_text' => __('More from ' . get_the_archive_title(),'starchas3r_')
	  ) 
	); ?>
<?php else : 
	get_template_part( 'template-parts/content', 'none' );
endif; 
get_footer(); ?>