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
                                    <a href="<?php the_permalink() ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                                <div class="post-meta">
                                    <!-- TODO: post meta here -->
                                </div>
                            </div>

                            <?php if (has_post_thumbnail()) { ?>
                                <div class="post-body">
                                    <a href="<?php the_permalink(); ?>" class="post-featured">
                                        <img src="<?php echo esc_url(wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')[0]); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true) ?>" class="post-featured-image">
                                    </a>
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
            <?php } else {
                echo 'No posts';
            }
            ?>
        </div>
    </div>


    <?php wp_footer() ?>

</body>

</html>