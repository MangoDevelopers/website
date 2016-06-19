<?php
/**
 * Wport
 * archive
 */
get_header(); ?>
    <section id="content">
        <header id="archive-header">

            <?php if ( have_posts() ) : ?>

            <h1 class="archive-title">

            <?php if ( is_category() ) : ?>
            <?php echo single_cat_title( '', false ); ?>
            <?php elseif ( is_author() ) : ?>
            <?php printf( __( 'Author Archive for %s', 'wport' ), get_the_author_meta( 'display_name', get_query_var( 'author' ) ) ); ?>
            <?php elseif ( is_tag() ) : ?>
            <?php printf( __( 'Tag Archive for %s', 'wport' ), single_tag_title( '', false ) ); ?>
            <?php elseif ( is_day() ) : ?>
            <?php printf( __( 'Daily Archives: %s', 'wport' ), get_the_date() ); ?>
            <?php elseif ( is_month() ) : ?>
            <?php printf( __( 'Monthly Archives: %s', 'wport' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'wport' ) ) ); ?>
            <?php elseif ( is_year() ) : ?>
            <?php printf( __( 'Yearly Archives: %s', 'wport' ), get_the_date( _x( 'Y', 'yearly archives date format', 'wport' ) ) ); ?>
            <?php else : ?>
            <?php _e( 'Blog Archives', 'wport' ); ?>
            <?php endif; ?>
            
            </h1><!-- archive-title -->

                <?php
                if ( is_category() ) :
                    if ( $category_description = category_description() )
                    echo '<h2 class="meta-header">' . $category_description . '</h2>';
                    endif;
                        if ( is_author() ) :
                        $curauth = ( get_query_var('author_name') ) ? get_user_by( 'slug', get_query_var( 'author_name' ) ) : get_userdata( get_query_var(' author' ) );
                        if ( isset( $curauth->description ) )
                        echo '<h2 class="archive-meta">' . $curauth->description . '</h2>';
                    endif;
                        if ( is_tag() ) :
                            if ( $tag_description = tag_description() )
                            echo '<h2 class="archive-meta">' . $tag_description . '</h2>';
                        endif;
                ?>

        </header><!-- #archive-header -->

            <?php
            while ( have_posts() ) : the_post(); ?>
            
            <article class="entry">
                <header class="entry-header">
	            <h2 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> <span class="commcount"> <?php do_action( 'wport_show_comments_count' ); ?></span></h2>
                    <p class="metadata-header"><?php the_date() ?>  <?php _e( ' by ', 'wport' ); ?> <?php the_author() ?> <u><?php do_action( 'wport_show_comments_count' ); _e( ' COMMENTS', 'wport' ); ?></u></p>
                </header>
                    <div class="entry-container">
                    
                        <?php the_excerpt(); ?>
			    <?php get_template_part( 'metadata' ); ?>
			    
                    </div>
	    </article> 
          
            <?php endwhile; ?>   
            <?php else : get_template_part( 'content', 'none' );
            endif;
            ?>
                <p class="pagination"><?php wport_pagination(); ?></p>
    </section><!-- ends content -->

<?php get_footer(); ?>