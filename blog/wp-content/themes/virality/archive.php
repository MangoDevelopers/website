<?php get_header(); ?>

    <div id="content" class="cont-main clearfix">
        
        <div id="main" class="clearfix" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
							if ( is_day() ) :
								printf( __( 'Daily Archives: %s', 'virality' ), '<span class="txtcolor2">' . get_the_date() . '</span>' );
							elseif ( is_month() ) :
								printf( __( 'Monthly Archives: %s', 'virality' ), '<span class="txtcolor2">' . get_the_date( 'F Y' ) . '</span>' );
							elseif ( is_year() ) :
								printf( __( 'Yearly Archives: %s', 'virality' ), '<span class="txtcolor2">' . get_the_date( 'Y' ) . '</span>' );
							else :
								_e( 'Archives', 'virality' );
							endif;
						?>
					</h1>
				</header>

				<?php rewind_posts(); ?>
				
                
                <div id="grid-wrap" class="clearfix">
                
                <?php /* Start the Loop */ ?>
                
				<?php while ( have_posts() ) : the_post(); ?>

					<div class="grid-box">
                    
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>
                    
                    </div>

				<?php endwhile; ?>
                
                </div>

				<?php if (function_exists("virality_pagination")) {
							virality_pagination(); 
				} elseif (function_exists("virality_content_nav")) { 
							virality_content_nav( 'nav-below' );
				}?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'virality' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content post-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'virality' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

        </div> <!-- end #main -->

    </div> <!-- end #content -->
        
<?php get_footer(); ?>