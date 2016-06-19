<?php
/**
 * Wport
 * single 
 * Please note that trackback rdf must stay in comment for XHTML 
 * to work with HTML. Do not remove its comment element.
 */
get_header(); ?>
    <section id="content">
        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article class="entry">
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
		    <h2 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> <?php do_action( 'wport_show_comments_count' ); ?></h2>
		    <p class="metadata-header"><?php the_date() ?>  <?php _e( ' by ', 'wport' ); ?> <?php the_author() ?> <u><?php do_action( 'wport_show_comments_count' ); _e( ' COMMENTS', 'wport' ); ?></u></p>
                </header>
                    <div class="entry-container">
                        <figure>

                            <?php 
                            if ( has_post_thumbnail() ) { 
                            the_post_thumbnail(); 
                                } else {
                                    echo '<div class="no-thumb"></div>';
                            } ?>

                        </figure>

                            <?php the_content(); ?>
                                <?php get_template_part( 'metadata' ); ?>
                                    <!-- <?php trackback_rdf(); ?> -->
                                        <?php comments_template(); ?>
                    </div>
            </div><!-- ends post -->
	</article> 

        <?php endwhile; ?>
            <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>

    </section>

<?php get_footer(); ?>