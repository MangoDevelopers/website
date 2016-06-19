<section id="comments">

    <?php if ( have_comments() ) : ?>
    
        <h2 class="comments-title">
            <?php get_the_title() ?>
        </h2>
            <ol class="commentlist">
            
                <?php wp_list_comments(); ?>
                
            </ol><!-- ends commentlist -->
                <div class="pagination">
                
                    <div class="alignleft"><?php previous_comments_link() ?></div>
                    <div class="alignright"><?php next_comments_link() ?></div>
                    
                </div>
                    <p class="reply-on"><?php _e( 'COMMENT ON: ', 'wport' ); ?></button> <span class="reply-title"> <?php the_title() ?></span></p>
                    
                        <?php comment_form(); ?>
        <?php else : // this is displayed if there are no comments so far ?>
	    <?php if ( comments_open() ) : ?>
	    
                <p class="reply-on"><?php _e( 'COMMENT ON: ', 'wport' ); ?></button> <span class="reply-title"> <?php the_title() ?></span></p>
                
                    <?php comment_form(); ?>
                <?php else : // then this if comments are closed ?>
                
	            <p class="comments-closed"> <small> <?php _e( 'Comments  are Closed on this Post', 'wport' ); ?></small></p>
	            
	    <?php endif; ?>
    <?php endif; // end have comments ?>
    
        <br /><hr>
</section><!-- ends comments area -->