<?php get_header(); ?>

<?php
    $rate = get_field('hourly_rate');
    $exp = get_field('experience');
?>

<div class="single-specialist">
    <div class="container">
        <?php get_template_part('template-parts/specialist-card'); ?>
    </div>
</div>

<?php get_footer(); ?>
