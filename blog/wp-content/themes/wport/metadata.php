<?php
/**
 * FourFive
 * meatadata template
 */
if( is_single() ) { ?>
    <div class="metadata">
    
    <p class="cat-link"><i class="fa fa-asterisk"></i> <?php _e( 'Posted in: ', 'wport' ); ?> <u><?php the_category(', ') ?></u>
		<span class="tag-link"><i class="fa fa-asterisk"></i> <?php the_tags(); ?> </span>
		<u> <?php do_action( 'wport_show_comments_count' ); _e( ' Comments', 'wport' ); ?></u></p>
            <?php edit_post_link( __( 'Edit', 'wport' ), '<p class="edit-link">', '</p>' ); ?>
                    </div>

<?php } else { ?>

  <div class="metadata-footer">
	  <p><?php the_date() ?> <u><?php the_author() ?></u> <?php edit_post_link(__('Edit', 'wport' ) ); ?></p>
                    </div>

<?php } ?>