<?php
/**
 * The template for displaying the archive
 *
 *
 *
 * @package Starchas3r_
 * @since Starchas3r_ 1.0
 */

get_header();
$archive_page_tag = $paged == 0 ? ' class="archive-page0"' : ' class="archive-page1plus"';
?>
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
	<div id="container-section-list"<?php echo $archive_page_tag; ?>>
		<?php while ( have_posts () ) : 
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
	    'screen_reader_text' => __( 'Archives','starchas3r_' )
	  ) 
	); ?>
<?php else : 
	get_template_part( 'template-parts/content', 'none' );
endif; 
get_footer(); ?>