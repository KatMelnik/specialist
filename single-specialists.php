<?php get_header(); ?>

<?php
    $rate = get_field('hourly_rate');
    $exp = get_field('experience');
?>

<div class="single-specialist">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>
        <ul class="meta">
            <li>Hourly rate: $<?php echo($rate); ?></li>
            <li>Experience: <?php echo($exp); ?></li>
        </ul>
    </div>
</div>

<?php get_footer(); ?>
