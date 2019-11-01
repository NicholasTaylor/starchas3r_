<?php
/**
 * The content from a single post
 *
 * 
 *
 * @package starchas3r_
 * @since starchas3r_ 1.0
 */
?>    
    <article id="post-<?php the_ID(); ?>">
      <?php if(has_post_thumbnail()) : ?>
        <?php $articleIntroBgRaw = wp_get_attachment_image_src( get_post_thumbnail_id(  ), 'full' );
        $articleIntroBg = $articleIntroBgRaw[0]; ?>
        <div id="article-title" style="background-image: url('<?php echo $articleIntroBg; ?>');">
      <?php else : ?>
        <div id="article-title" style="background-color:#000;">
      <?php endif; ?>
        <div id="bg-screen">
        </div>
        <div id="title-content">
          <?php $pre_title = is_schema_enabled() ? '<h1 itemprop="headline">' : '<h1>';
          the_title( $pre_title,'</h1>' ); ?>
          <div id="title-data">
            <?php if(is_schema_enabled()) : ?>
              <h2>
                <time itemprop="datePublished" datetime="<?php echo get_the_date( $d = 'Y-m-d' ); ?>T<?php echo get_the_date( $d = 'H:i' );?>"> 
                  <?php echo get_the_date( 'Y.m.d H:i');?>
                </time>
              </h2>
              <meta itemprop="dateModified" content="<?php echo get_the_modified_date( $d = 'Y-m-d' );?>T<?php echo get_the_modified_date( $d = 'H:i' );?>">
              </meta>
            <?php else :
              echo '<h2>' . get_the_date( 'Y.m.d H:i') . '</h2>';
            endif; ?>

            <?php if ( has_category() && is_schema_enabled() ) : ?>
              <h2>
                <span itemprop="articleSection">
                  <?php the_category( ', ' ); ?>
                </span>
              </h2>
            <?php elseif ( has_category() ) : ?>
              <h2>
                <?php the_category( ', ' ); ?>
              </h2>
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
      <div id="article-body" class="<?php global $numpages; if ($page == $numpages) { echo 'last-page'; }?><?php $page = get_query_var('page') ; if ($page == 1 || empty($page)) { echo ' first-page'; } ?>">
        <?php if ( is_schema_enabled() ) : ?>
          <span itemprop="articleBody">
            <?php echo the_content(); ?>
          </span>
        <?php else :
          echo the_content();
        endif; ?>
        
        <?php if (has_tag () ) : ?>
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
                'before'           => '',
                'after'            => '',
                'link_before'      => '<h3>',
                'link_after'       => '</h3>',
                'next_or_number'   => 'next',
                'separator'        => ' ',
                'nextpagelink'     => __( 'Next Page' ),
                'previouspagelink' => __( 'Previous Page' ),
                'pagelink'         => '%',
              )
            );
          ?>
        </div>
      </div>
      <?php if ( comments_open() || get_comments_number() ) { comments_template(); } ?>
    </article>