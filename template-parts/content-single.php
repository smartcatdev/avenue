<?php $avenue_options = avenue_get_options(); ?>

<article class="item-page">

    <h2 class="post-title">
        <?php the_title(); ?>
    </h2>

    <?php echo $avenue_options['sc_single_date'] == 'on' ? __( 'Posted on: ', 'avenue' ) . esc_html( get_the_date() ) : ''; ?><?php echo $avenue_options['sc_single_author'] == 'on' && $avenue_options['sc_single_date'] == 'on' ? __( ', ', 'avenue' ) : ''; ?>

    <?php echo $avenue_options['sc_single_author'] == 'on' ? __( 'by : ', 'avenue' ) . get_the_author_posts_link() : ''; ?>

    <div class="entry-content">

        <?php $avenue_options['sc_single_featured'] == 'on' ? the_post_thumbnail( 'medium' ) : ''; ?>

        <?php the_content(); ?>

        <?php 

        wp_link_pages(array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'avenue' ),
            'after' => '</div>',
        ));

        if (comments_open() || '0' != get_comments_number()) :
            comments_template();
        endif;

        ?>

    </div>

</article>