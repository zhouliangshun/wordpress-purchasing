<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Purchasing
 * @since Purchasing 1.0
 */

get_header(); ?>

	
    <div class="page-header-container no-featured" >
    <?php the_post_thumbnail( 'single-post-thumbnail', array( 'class' => 'single-post-thumbnail' ) ); ?>
    	<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->
    </div>
    
    <div class="breadcrumb-container">
    	<div class="container">
        	<div class="row">
                <div class="col-md-12">
                	<?php travellator_breadcrumb(); ?>
                </div>
            </div>
        </div>
    </div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
            	<div class="row">
                	<div class="col-md-12">
						<?php $query = array("cat"=>11);
		                        $posts = new WP_Query();
		                        $posts -> query($query);
		                        while ( $posts->have_posts() ) : $posts->the_post(); ?>
                            <?php load_template(dirname( __FILE__ ) .'page-purchasing-content.php'); ?>

                        <?php endwhile; // End of the loop. ?>

                    </div>
                </div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>

