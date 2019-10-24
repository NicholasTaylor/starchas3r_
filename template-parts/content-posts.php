<?php
/**
 * The content from a post loop (which would mainly run on index.php and archive.php)
 *
 * 
 *
 * @package starchas3r_
 * @since starchas3r_ 1.0
 */
?>
    <?php 
      $current_post_num = get_the_ID();
      $article_type = (in_array($current_post_num, array($post_01, $post_02, $post_03)) ? 'primary' : 'secondary');
      $background_flag = has_post_thumbnail();
      $background_raw = ($background_flag ? wp_get_attachment_image_src( get_post_thumbnail_id(  ), 'full' ) : array() );
      $background_style = ($background_flag ? "background-image:url('" . $background_raw[0] . "');" : "background-color:#000;");
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