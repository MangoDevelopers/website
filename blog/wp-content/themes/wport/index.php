<?php
/**
 * Theme Wport
 * index file - main template for blog page
 */
get_header(); ?>
    <section id="content">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <article class="entry">
                <header class="entry-header">
	            <h2 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> <span class="commcount"> <?php do_action( 'wport_show_comments_count' ); ?></span></h2>
                </header>
                    <div class="entry-container">
                    
                        <?php the_content( __( '<span class="read-more">Read All </span>', 'wport' ) ); ?>
                            <?php get_template_part( 'metadata' ); ?>
			    
                    </div>
	    </article> 
        </div><!-- ends post -->

        <?php endwhile; ?>

            <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>

            <p class="pagination"><?php wport_pagination(); ?></p>

    </section>

<?php get_footer(); ?>