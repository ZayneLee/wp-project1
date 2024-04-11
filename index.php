<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My First Website</title>
    <?php wp_head() ?>

</head>

<body <?php body_class() ?>>
    <div class="container">
        <div class="section-content">
            <?php
            if (have_posts()) { ?>
                <main>
                    <?php while (have_posts()) {
                        the_post(); ?>

                        <article id="post">
                            <div class="post-header">
                                <h4>
                                    <?php if (!is_single()) { ?>
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    <?php } else {
                                        the_title();
                                    }
                                    ?>
                                </h4>
                                <div class="post-meta">

                                    <?php echo get_avatar(
                                        get_the_author_meta('ID'),
                                        '18',
                                        isset($default) ? $default : '',
                                        isset($alt) ? $alt : '',
                                        array('class' => array())
                                    );
                                    ?>
                                    <span class="post-author">
                                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>"><?php echo get_the_author_meta('display_name'); ?></a>
                                    </span> |
                                    <span class="post-time"><?php the_time('Y-m-d'); ?></span> |
                                    Cat: <?php the_category() ?> |
                                    <?php the_tags() ?>
                                </div>
                            </div>

                            <?php if (has_post_thumbnail()) { ?>
                                <div class="post-body">
                                    <?php if (!is_single()) { ?>
                                        <a href="<?php the_permalink(); ?>" class="post-featured">
                                            <img src="<?php echo esc_url(wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')[0]); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true) ?>" class="post-featured-image">
                                        </a>
                                    <?php } else { ?>
                                        <div class="post-featured">
                                            <img src="<?php echo esc_url(wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')[0]); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true) ?>" class="post-featured-image">
                                        </div>
                                    <?php } ?>
                                    <div class="post-text-with-featured">
                                        <?php
                                        if (is_home()) {
                                            if (has_excerpt()) {
                                                echo get_the_excerpt();
                                            } else {
                                                echo wp_trim_words(get_the_content(), 30);
                                            }
                                        } elseif (is_single()) {
                                            the_content();
                                        } ?>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="post-body">
                                    <div class="post-text-without-featured">
                                        <?php
                                        if (is_home()) {
                                            if (has_excerpt()) {
                                                echo get_the_excerpt();
                                            } else {
                                                echo wp_trim_words(get_the_content(), 30);
                                            }
                                        } elseif (is_single()) {
                                            the_content();
                                        } ?>
                                    </div>
                                </div>
                            <?php } ?>

                        </article>

                    <?php } ?>
                </main>
                <div class="pagination">
                    <?php
                    // next_posts_link('&laquo; Older');
                    // previous_posts_link('Newer &raquo;');
                    the_posts_pagination();
                    ?>
                </div>
            <?php } else {
                echo 'No posts';
            }
            ?>
        </div>
    </div>


    <?php wp_footer() ?>

</body>

</html>