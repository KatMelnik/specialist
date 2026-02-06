<?php
    $rate = get_field('hourly_rate');
    $exp = get_field('experience');
    $is_featured = get_field('featured_specialist');
?>

<div class="specialist-card <?php echo $is_featured ? 'is-featured' : ''; ?>">
    <h3><?php the_title(); ?></h3>
    <?php if ( get_the_content() ) : ?>
        <div class="specialist-description">
            <?php the_content(); ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($rate)) : ?>
        <p>Rate: $<?php echo $rate; ?></p>
    <?php endif; ?>
    <?php if (!empty($exp)) : ?>
        <p>Experience: <?php echo $exp; ?></p>
    <?php endif; ?>

</div>