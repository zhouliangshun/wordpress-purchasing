<?php

/**
 * Template part for displaying purchasing posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Purchasing
 * @since Purchasing 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="blog-post-container no-featured" >
    	<?php the_post_thumbnail( 'single-post-thumbnail', array( 'class' => 'single-post-thumbnail' ) ); ?>
        <div class="container">
        	<div class="row">
                <div class="col-md-12">
                    <div class="post-details">
                        <header class="entry-header">
                            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                            <?php if ( 'post' === get_post_type() ) : ?>
                            <div class="entry-meta">
                                <?php travellator_posted_on(); ?>
                            </div><!-- .entry-meta -->
                            <?php endif; ?>
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                            <p>参考价: 未知</p>
                            <a href="<?php the_permalink('') ?>" class="read_more"><?php _e( 'Add Cart', 'travellator' ); ?></a>
                            <?php
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'travellator' ),
                                    'after'  => '</div>',
                                ) );
                            ?>
                        </div><!-- .entry-content -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</article><!-- #post-## -->

