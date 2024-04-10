<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My First Website</title>
    <?php wp_head() ?>

</head>

<body>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>

            <a href="<?php the_permalink() ?>">
                <?php the_title(); ?>
            </a>
            <img src="<?php echo esc_url(wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')[0]); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true) ?>" class="post-featured-image">
    <?php
            the_excerpt();
        }
    } else {
        echo 'No posts';
    }
    ?>

    <?php wp_footer() ?>

</body>

</html>