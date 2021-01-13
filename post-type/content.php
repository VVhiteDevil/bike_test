<?php global $recent_post; ?>
<h2>
    <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
    <?php echo '<a class="bike-edit-post-button" href="' . get_edit_post_link( $recent_post['ID']  ) . '"><i class="fas fa-edit"></i></a>'; ?>
</h2>
<div class="post-info">
    <span class="post-author">Posted by <?php the_author_posts_link(); ?></span>
    <span class="post-date"><?php echo esc_html( human_time_diff( get_the_date( 'U', $recent_post['ID'] ), current_time('U') ) ) . ' ago'; ?></span>
    <span class="post-comments-counter"><?php echo get_comments_number(); ?> <i class="fa fa-comment" aria-hidden="true"></i></span>
</div><!-- .post-info -->

<div class="entry standart-format">
    <?php
        $attachment_id = get_post_thumbnail_id( $recent_post['ID'] );
        if ( ! empty( $attachment_id ) ) { ?>
            <div class="entry-img">
                <?php echo wp_get_attachment_image( $attachment_id, 'full' ); ?>
            </div>
        <?php } 
    ?>
    <?php if ( is_front_page() ) { ?>
        <div class="entry-text">
            <?php echo get_the_excerpt(); ?>
        </div>
        <div class="slider-post-button entry-button">
            <a href="<?php the_permalink(); ?>">Read more</a>
        </div>
    <?php } else { ?>
        <div class="entry-text post-page">
            <?php the_content(); ?>
        </div>
        <?php
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
        ?>
    <?php } ?>
</div><!-- .entry .standart-format -->