
<div class="col-sm-12">
    <ol class="breadcrumb  dashed-border">
        <li><a href="index.html">Trang chủ</a></li>
        <li class="active"> <?php the_title() ?></li>
    </ol>
</div>
<div class="col-sm-12">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; else: ?>
        <p>Sorry, no posts matched your criteria.</p>
    <?php endif; ?>
</div>