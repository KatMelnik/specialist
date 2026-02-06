<?php get_header(); ?>

 <?php $terms = get_terms(['taxonomy' => 'specialist_category']); ?>

    <section class="specialists-archive">
        <div class="container">
            <h1>Our Specialists</h1>

            <div class="filters">
                <select id="category-filter" class="cat-filter">
                    <option value="">All Categories</option>
                    <?php foreach($terms as $term) : ?>
                        <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                    <?php endforeach; ?>
                </select>

                <label>
                    <input type="checkbox" id="featured-filter">
                    <span class="custom-checkbox"></span> Featured Only
                </label>
            </div>

            <div id="specialists-container" class="specialists-container">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post();
                        get_template_part('template-parts/specialist', 'card');
                    endwhile; ?>
                <?php else :?>
                    <?php  echo '<p>No specialists found.</p>'; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>