<?php
/**
 * For breaking the news that you have no posts
 *
 * 
 *
 * @package starchas3r_
 * @since starchas3r_ 1.0
 */
?>    
  <section class="article article-primary" style="background-image: url('<?php echo get_bloginfo('template_directory');?>/images/lily-waiting.gif');">
    <div class="bg-screen">
    </div>
    <div id="fadein-screen">
    </div>
    <div class="article-content">
    	<?php if ( is_404() ) : ?>
			<h1>
				404
			</h1>
			<div id="article-data">
				<h2>
					Page Not Found
				</h2>
			</div>
			<div class="excerpt">
				<p>
					I know we left it somewhere. Sorry! We searched everywhere, but we can't find what you're looking for.
				</p>
			</div>
		<?php elseif ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<h1>
				Ready to Unbox?
			</h1>
			<div id="article-data">
				<h2>
					Let's do this!
				</h2>
			</div>
			<div class="excerpt">
				<p>
					Your site is ready, raring, and quite frankly, a little antsy for your first post.
				</p>
			</div>	
		<?php elseif ( is_search() ) : ?>
			<h1>
				We searched far and wide...
			</h1>
			<div id="article-data">
				<h2>
					...but found nothing.
				</h2>
			</div>
			<div class="excerpt">
				<p>
					We couldn't find what you're looking for. Maybe try other search terms? Or ask again in Semaphore? Can't hurt.
				</p>
			</div>		
		<?php else : ?>
			<h1>
				Uh....hi?
			</h1>
			<div id="article-data">
				<h2>
					Not gonna lie. This is awkward.
				</h2>
			</div>
			<div class="excerpt">
				<p>
					We're still unboxing. We don't have anything to share just yet, but check back later! We'll have something soon!
				</p>
			</div>	
		<?php endif; ?>
	</div>
  </div>