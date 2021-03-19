<?php
/**
 * The template part for displaying post
 * @package Blogger Hub
 * @subpackage blogger_hub
 * @since 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?> 
<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $audio   = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="blog-sec p-3 mb-4 text-center">
    <h2><a href="<?php echo esc_url(get_permalink() ); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
    <hr class="post-hr mx-auto mb-2">
    <?php if(get_theme_mod('blogger_hub_metafields_date',true)==1){ ?>
      <div class="post-info py-2">
        <i class="fa fa-calendar mr-1" aria-hidden="true"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><span class="entry-date"><?php echo esc_html( get_the_date() ); ?></span><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a>
      </div>
    <?php }?>
    <div class="mainimage">
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the audio file.
          if ( ! empty( $audio ) ) {
            foreach ( $audio as $audio_html ) {
              echo '<div class="entry-audio">';
                echo $audio_html;
              echo '</div><!-- .entry-audio -->';
            }
          };

        };
      ?>
    </div>
    <div class="post-info py-2">
      <?php if(get_theme_mod('blogger_hub_metafields_author',true)==1){ ?>
        <i class="fa fa-user mr-1" aria-hidden="true"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><span class="entry-author mr-3"> <?php the_author(); ?></span><span class="screen-reader-text"><?php the_author(); ?></span></a>
      <?php }?>
      <?php if(get_theme_mod('blogger_hub_metafields_comment',true)==1){ ?>
        <i class="fa fa-comments mr-1" aria-hidden="true"></i><span class="entry-comments mr-3"> <?php comments_number( __('0 Comments','blogger-hub'), __('0 Comments','blogger-hub'), __('% Comments','blogger-hub') ); ?></span> 
      <?php }?> 
    </div>
    <?php if(get_theme_mod('blogger_hub_blog_post_content') == 'Full Content'){ ?>
      <?php the_content(); ?>
    <?php }
    if(get_theme_mod('blogger_hub_blog_post_content', 'Excerpt Content') == 'Excerpt Content'){ ?>
      <?php if(get_the_excerpt()) { ?>
        <div class="entry-content"><p class="m-0"><?php $excerpt = get_the_excerpt(); echo esc_html( blogger_hub_string_limit_words( $excerpt, esc_attr(get_theme_mod('blogger_hub_post_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('blogger_hub_button_excerpt_suffix','...') ); ?></p></div>
      <?php }?>
    <?php }?>
    <?php if ( get_theme_mod('blogger_hub_blog_button_text','READ MORE') != '' ) {?>
      <div class="blogbtn my-3">
        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right"><?php echo esc_html( get_theme_mod('blogger_hub_blog_button_text',__('READ MORE', 'blogger-hub')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('blogger_hub_blog_button_text',__('READ MORE', 'blogger-hub')) ); ?></span></a>
      </div>
    <?php }?>
    <?php if( get_theme_mod( 'blogger_hub_metafields_tags') != '' || get_theme_mod( 'blogger_hub_metafields_share_link') != '') { ?>
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <?php if(get_theme_mod('blogger_hub_metafields_tags',true)==1){ ?>
            <p class="post_tag text-md-left text-center"><?php
              if( $tags = get_the_tags() ) {
                echo '<span class="meta-sep"></span>';
                foreach( $tags as $content_tag ) {
                  $sep = ( $content_tag === end( $tags ) ) ? '' : ' ';
                  echo '<a href="' . esc_url(get_term_link( $content_tag, $content_tag->taxonomy )) . '" class="mb-2 mr-2">#' . esc_html($content_tag->name) . '</a>' . esc_html($sep);
                }
              } ?>
            </p>
          <?php }?>
        </div>
        <div class="col-lg-6 col-md-12">
          <?php if(get_theme_mod('blogger_hub_metafields_share_link',true)==1){ ?>
            <div class="att_socialbox text-md-right text-center">
              <i class="fas fa-share-alt"></i> <span><?php echo esc_html_e('Share :','blogger-hub'); ?></span>
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="m-1" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'blogger-hub' ); ?></span></a>
              <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" class="m-1" target="_blank"><i class="fab fa-linkedin-in" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin', 'blogger-hub' ); ?></span></a>
              <a href="https://twitter.com/share?url=<?php the_permalink(); ?>" class="m-1" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'blogger-hub' ); ?></span></a>
              <a href="http://www.instagram.com/submit?url=<?php the_permalink(); ?>" class="m-1" target="_blank"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram', 'blogger-hub' ); ?></span></a>
            </div>
          <?php }?>
        </div>
      </div>
    <?php }?>
  </div>
</article>