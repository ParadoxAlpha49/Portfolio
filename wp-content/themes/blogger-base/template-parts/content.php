<?php
/**
 * The template part for displaying Post
 * @package Blogger Base
 * @subpackage blogger_base
 * @since 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="blog-sec p-3 mb-4 text-center">
    <div class="mainimage">
      <?php 
        if(has_post_thumbnail()) { 
          the_post_thumbnail(); 
        }
      ?>
    </div>
    <h2><a href="<?php echo esc_url(get_permalink() ); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
    <hr class="post-hr mx-auto my-2">
    <?php if(get_theme_mod('blogger_hub_blog_post_content') == 'Full Content'){ ?>
      <?php the_content(); ?>
    <?php }
    if(get_theme_mod('blogger_hub_blog_post_content', 'Excerpt Content') == 'Excerpt Content'){ ?>
      <?php if(get_the_excerpt()) { ?>
        <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( blogger_hub_string_limit_words( $excerpt, esc_attr(get_theme_mod('blogger_hub_post_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('blogger_hub_button_excerpt_suffix','...') ); ?></p></div>
      <?php }?>
    <?php }?>
    <?php if ( get_theme_mod('blogger_hub_blog_button_text','READ MORE') != '' ) {?>
      <div class="blogbtn">
        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right"><?php echo esc_html( get_theme_mod('blogger_hub_blog_button_text',__('READ MORE', 'blogger-base')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('blogger_hub_blog_button_text',__('READ MORE', 'blogger-base')) ); ?></span></a>
      </div>
    <?php }?>
    <?php if(get_theme_mod('blogger_hub_metafields_tags',true)==1){ ?>
      <p class="post_tag"><?php
        if( $tags = get_the_tags() ) {
          echo '<span class="meta-sep"></span>';
          foreach( $tags as $content_tag ) {
            $sep = ( $content_tag === end( $tags ) ) ? '' : ' ';
            echo '<a href="' . esc_url(get_term_link( $content_tag, $content_tag->taxonomy )) . '">#' . esc_html($content_tag->name) . '</a>' . esc_html($sep);
          }
        } ?>
      </p>
    <?php }?>
  </div>
</article>