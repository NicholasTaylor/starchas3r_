<?php
/**
 * The content from a single post
 *
 * 
 *
 * @package starchas3r_
 * @since starchas3r_ 1.0
 */
$current_post_num = get_the_ID();
$misc_data_open_tag = ( is_byline_enabled() ) ? '<h3 class="data-point">' : '<h2 class="data-point">';
$misc_data_close_tag = ( is_byline_enabled() ) ? '</h3>' : '</h2>';
?>    
    <article id="post-<?php the_ID(); ?>">
      <?php if( has_post_thumbnail() ) : 
        $articleIntroBgRaw = wp_get_attachment_image_src( get_post_thumbnail_id(  ), 'full' );
        $articleIntroBg = $articleIntroBgRaw[0]; ?>
        <div id="article-title" style="background-image: url( '<?php echo $articleIntroBg; ?>' );">
      <?php else : ?>
        <div id="article-title" style="background-color:#000;">
      <?php endif; ?>
        <div id="bg-screen">
        </div>
        <div id="title-content" class="<?php echo starchas3r_retrieve_title_align( get_the_ID() ); ?>">
          <?php echo '<h1>' . elim_widow( get_the_title(), $current_post_num ) . '</h1>'; ?>
          <div id="title-data">
            <?php if ( is_byline_enabled() ) : ?>
              <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                <h2>
                  <?php echo elim_widow( get_the_author(), $current_post_num ) ; ?>
                </h2>
              </a>
            <?php endif;
            echo $misc_data_open_tag . elim_widow( get_the_date( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ) ), $current_post_num ) . $misc_data_close_tag;
            if ( has_category() ) : 
              echo $misc_data_open_tag; ?>
                <span>
                  <?php elim_widow( the_category( ', ' ), $current_post_num ) ?>
                </span>
            <?php echo $misc_data_close_tag;
            endif; 
              $current_content = $post->post_content;
              $read_time_secs = ( str_word_count( strip_tags( do_shortcode( $current_content )) ) * ( 6/25 ));
              $read_time = ( $read_time_secs < 60 ? '&lt; 1 min.' : ( $read_time_secs < 3600 ? round( ($read_time_secs / 60 ),0 ) . ' min.' : round( ($read_time_secs / 3600 ),0 ) . ' hr.' ));
              echo $misc_data_open_tag . elim_widow( $read_time, $current_post_num ) . $misc_data_close_tag; ?>
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
      </div>
      <div id="article-body" class="<?php global $numpages; if ( $page == $numpages ) { echo 'last-page'; }?><?php $page = get_query_var( 'page' ) ; if ( $page == 1 || empty( $page )) { echo ' first-page'; } ?>">
        <?php echo the_content(); ?>
        <?php if ( has_tag () ) : ?>
          <div class="content-body-tag">
            <h2>
              Tags: 
                <?php echo the_tags( '', ', ', '' ); ?>
            </h2>
          </div>
        <?php endif; ?>
      </div>
      <div class="thn_post_wrap wp_link_pages">
        <div class="wrapper-pagination" id="seo-prev-next-btns">
          <?php
            wp_link_pages(
              array(
                'before'           => '<h1>' . get_the_title() . '</h1>',
                'after'            => '',
                'link_before'      => '<li>',
                'link_after'       => '</li>',
                'next_or_number'   => 'next',
                'separator'        => ' ',
                'nextpagelink'     => __( 'Next Page &#9658;' ),
                'previouspagelink' => __( '&#9668; Previous Page' ),
                'pagelink'         => '%',
              )
            );
          ?>
        </div>
      </div>
      <?php if ( comments_open() || get_comments_number() ) { comments_template(); } ?>
    </article>