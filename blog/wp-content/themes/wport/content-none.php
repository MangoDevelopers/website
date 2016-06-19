<?php
/**
 * The template for displaying a "No posts found" message.
 * Wport
 */
?>
<article id="post-0" class="post error404 not-found">
    <h1 class="entry-title"><?php _e( 'Nothing found', 'wport' ); ?></h1>
        <div class="entry-content">
            <p><?php _e( 'No results were found. Please try again.', 'wport' ); ?></p>
                <hr>
                    <p><?php get_search_form(); ?></p>
        </div>
</article><!-- ends post-0.post -->