<?php
/**
 * The content from a post loop ( which would mainly run on index.php and archive.php )
 *
 * 
 *
 * @package starchas3r_
 * @since starchas3r_ 1.0
 */
$current_post_num = get_the_ID();
$article_type = ( in_array( $current_post_num, array( $post_01, $post_02, $post_03 )) ? 'primary' : 'secondary' );
$background_flag = has_post_thumbnail();
$background_raw = ( $background_flag ? wp_get_attachment_image_src( get_post_thumbnail_id(  ), 'full' ) : array() );
$background_style = ( $background_flag ? "background-image:url('" . $background_raw[0] . "');" : "background-color:#000;" );
$link_open_tag = '<a href="' . esc_url( get_permalink() ) . '">';
$link_close_tag = '</a>';
$misc_data_open_tag = ( is_byline_enabled() && !( is_author() )) ? '<h3 class="data-point">' : '<h2 class="data-point">';
$misc_data_close_tag = ( is_byline_enabled() && !( is_author() )) ? '</h3>' : '</h2>';
$is_last_post = ( ( ( $wp_query->current_post + 1 ) >= ( $wp_query->post_count ) ) ? true : false) ;
?>
    <section id="post-<?php echo $current_post_num; ?>" class="article article-<?php echo $article_type; ?>" style=<?php echo $background_style; ?>>
      <div class="bg-screen">
      </div>
      <div class="article-content <?php echo starchas3r_retrieve_title_align( get_the_ID() ); ?>">
        <?php echo '<h1>' . $link_open_tag . elim_widow( get_the_title(), $current_post_num ) . $link_close_tag . '</h1>'; ?>
        <div class="article-data">
          <?php if ( is_byline_enabled() && !( is_author() ) && is_schema_enabled() ) : ?>
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
              <h2 itemprop="author">
                <?php echo elim_widow( get_the_author(), $current_post_num ); ?>
              </h2>
            </a>
          <?php elseif ( is_byline_enabled() && !( is_author() ) ) : ?>
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
              <h2>
                <?php echo elim_widow( get_the_author(), $current_post_num ); ?>
              </h2>
            </a>
          <?php endif;
          echo $misc_data_open_tag; ?>
            <a href="<?php echo esc_url( get_permalink() ); ?>">
              <?php echo elim_widow( get_the_date( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ) ), $current_post_num ); ?>
            </a>
          <?php echo $misc_data_close_tag;
          if ( has_category () && !( is_category() ) ) :
            $categories = get_the_category();
            $categoryFirst = $categories[0];
            $categoryName = $categoryFirst->name;
            $categoryURL = esc_url( get_category_link( $categoryFirst->term_id ));
              if ( categoryName != '' ) : ?>
              <a href="<?php echo $categoryURL; ?>" title="<?php echo $categoryName; ?>">
                <?php echo $misc_data_open_tag . elim_widow( $categoryName, $current_post_num ) . $misc_data_close_tag; ?>
              </a>
            <?php endif;
          endif;
          echo $misc_data_open_tag;
          $current_content = $post->post_content;
              $read_time_secs = ( str_word_count( strip_tags( do_shortcode( $current_content )) ) * ( 6/25 ));
            $read_time = ( $read_time_secs < 60 ? '&lt; 1 min.' : ( $read_time_secs < 3600 ? round( ($read_time_secs / 60 ),0 ) . ' min.' : round( ($read_time_secs / 3600 ),0 ) . ' hr.' ));
            echo elim_widow( $read_time, $current_post_num );
          echo $misc_data_close_tag; ?>
        </div>
        <?php if ( has_excerpt () ) : ?>
          <div class="excerpt">
            <a href="<?php echo esc_url( get_permalink() ); ?>">
              <p>
                <?php echo elim_widow( get_the_excerpt(), $current_post_num ); ?>
              </p>
            </a>
          </div>
        <?php endif; ?>
      </div>
      <?php if ( ( is_home() || is_front_page() ) && ($is_last_post) ) :
        the_posts_pagination( 
          array(
            'mid_size'  => 1,
            'prev_text' => __( '&#9668; Newer', 'starchas3r_' ),
            'next_text' => __( 'Older &#9658;', 'starchas3r_' ),
            'screen_reader_text' => __( 'Archives','starchas3r_' )
          ) 
        );
        get_template_part( 'template-parts/content', 'footer' );
      endif;
      ?>
    </section>