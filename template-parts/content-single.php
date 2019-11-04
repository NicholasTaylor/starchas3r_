<?php
/**
 * The content from a single post
 *
 * 
 *
 * @package starchas3r_
 * @since starchas3r_ 1.0
 */
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
        <div id="title-content">
          <?php $pre_title = is_schema_enabled() ? '<h1 itemprop="headline">' : '<h1>';
          the_title( $pre_title,'</h1>' ); ?>
          <div id="title-data">
            <?php if ( is_byline_enabled() && is_schema_enabled () ) : ?>
              <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                <h2 itemprop="author">
                  <?php echo get_the_author() ; ?>
                </h2>
              </a>
            <?php elseif ( is_byline_enabled() ) : ?>
              <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                <h2>
                  <?php echo get_the_author() ; ?>
                </h2>
              </a>
            <?php endif;
            if( is_schema_enabled() ) : 
              echo $misc_data_open_tag; ?>
                <time itemprop="datePublished" datetime="<?php echo get_the_date( $d = 'Y-m-d' ); ?>T<?php echo get_the_date( $d = 'H:i' );?>"> 
                  <?php echo get_the_date( 'Y.m.d H:i' );?>
                </time>
              <?php echo $misc_data_close_tag; ?>
              <meta itemprop="dateModified" content="<?php echo get_the_modified_date( $d = 'Y-m-d' );?>T<?php echo get_the_modified_date( $d = 'H:i' );?>">
              </meta>
            <?php else :
              echo $misc_data_open_tag . get_the_date( 'Y.m.d H:i' ) . $misc_data_close_tag;
            endif;
            if ( has_category() && is_schema_enabled() ) :
              echo $misc_data_open_tag; ?>
                <span itemprop="articleSection">
                  <?php the_category( ', ' ); ?>
                </span>
              <?php echo $misc_data_close_tag;
              elseif ( has_category() ) : 
              echo $misc_data_open_tag;
                the_category( ', ' );
            echo $misc_data_close_tag;
            endif; 
              $current_content = $post->post_content;
              $read_time_secs = ( str_word_count( strip_tags( do_shortcode( $current_content )) ) * ( 6/25 ));
              $read_time = ( $read_time_secs < 60 ? '&lt; 1 min.' : ( $read_time_secs < 3600 ? round( ($read_time_secs / 60 ),0 ) . ' min.' : round( ($read_time_secs / 3600 ),0 ) . ' hr.' ));
              echo $misc_data_open_tag . $read_time . $misc_data_close_tag; ?>
          </div>
          <?php if ( has_excerpt () ) : ?>
            <div class="excerpt">
              <a href="<?php echo esc_url( get_permalink() ); ?>">
                <?php if ( is_schema_enabled() ) : ?>
                  <p itemprop="about">
                <?php else : ?>
                  <p>
                <?php endif; ?>
                    <?php echo get_the_excerpt(); ?>
                  </p>
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div id="article-body" class="<?php global $numpages; if ( $page == $numpages ) { echo 'last-page'; }?><?php $page = get_query_var( 'page' ) ; if ( $page == 1 || empty( $page )) { echo ' first-page'; } ?>">
        <?php if ( is_schema_enabled() ) : ?>
          <span itemprop="articleBody">
            <?php echo the_content(); ?>
          </span>
        <?php else :
          echo the_content();
        endif; ?>
        
        <?php if ( has_tag () ) : ?>
          <div class="content-body-tag">
            <h2>
              Tags: 
                <?php if ( is_schema_enabled() ) : ?>
                  <span itemprop="keywords">
                    <?php echo the_tags( '', ', ', '' ); ?>
                  </span>
                <?php else :
                  echo the_tags( '', ', ', '' );
                endif; ?>
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