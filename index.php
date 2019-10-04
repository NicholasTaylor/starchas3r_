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
<?php if ( have_posts() ) : ?>  
  <?php 
    $post_count = wp_count_posts();
    $publish_count = $countPosts->publish;
    $post_01 = ( $paged == 0 ) ? $posts[0]->ID : ''; 
    $post_02 = ( $paged == 0 ) ? $posts[1]->ID : ''; 
    $post_03 = ( $paged == 0 ) ? $posts[2]->ID : ''; 
    // Start the loop.
    while ( have_posts() ) : the_post();
  ?>
    <?php 
      $current_post_num = get_the_ID();
      $article_type = (in_array($current_post_num, array($post_01, $post_02, $post_03)) ? 'primary' : 'secondary');
      $background_flag = has_post_thumbnail();
      $background_raw = ($background_flag ? wp_get_attachment_image_src( get_post_thumbnail_id(  ), 'full' ) : array() );
      $background_style = ($background_flag ? "background-image:url('" . $background_raw[0] . "');" : "background-color: #000;");
      $link_open_tag = '<a href="' . esc_url( get_permalink() ) . '">';
      $link_close_tag = '</a>';
    ?>
    <section id="post-<?php echo $current_post_num; ?>" class="article article-<?php echo $article_type; ?>" style=<?php echo $background_style; ?>>
      <div class="bg-screen">
      </div>
      <div class="article-content">
        <?php the_title( '<h1>' . $link_open_tag,'</h1>' . $link_close_tag ); ?>
        <div class="article-data">
          <h2>
            <a href="<?php echo esc_url( get_permalink() ); ?>">
              <?php echo get_the_date( 'Y.m.d H:i' ); ?>
            </a>
          </h2>
          <?php if (has_category () ) : ?>
            <?php $categories = get_the_category();
            $categoryFirst = $categories[0];
            $categoryName = $categoryFirst->name;
            $categoryURL = esc_url(get_category_link($categoryFirst->term_id)); ?>
            <?php if (categoryName != '') : ?>
              <a href="<?php echo $categoryURL; ?>" title="<?php echo $categoryName; ?>">
                <h2>
                  <?php echo $categoryName; ?>
                </h2>
              </a>
            <?php endif; ?>
          <?php endif; ?>
          <h2>
            <?php $current_content = $post->post_content;
              $read_time_secs = (str_word_count(strip_tags(do_shortcode($current_content))) * (6/25));
            $read_time = ($read_time_secs < 60 ? '&lt; 1 min.' : ($read_time_secs < 3600 ? round(($read_time_secs / 60),0) . ' min.' : round(($read_time_secs / 3600),0) . ' hr.'));
            echo $read_time; ?> 
          </h2>
        </div>
        <?php if ( has_excerpt () ) : ?>
          <div class="excerpt">
            <a href="<?php echo esc_url( get_permalink() ); ?>">
              <p>
                <?php echo get_the_excerpt(); ?>
              </p>
            </a>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php endwhile; ?>
<?php else : ?>
  <?php get_template_part( 'template-parts/content', 'none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>