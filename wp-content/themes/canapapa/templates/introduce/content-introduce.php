<div class="col-sm-8 col-md-9 main-sec">
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb  dashed-border">
                <li><a href="index.html">Trang chủ</a></li>
                <li class="active"> <?php the_title(); ?></li>
            </ol>
        </div>
        <?php
            if(have_posts()) :
                while (have_posts()) : the_post()
        ?>
        <div class="col-sm-12">
            <p class="about">
                <?php the_content(); ?>
            </p>
        </div>
        <?php
            endwhile;
                else:
                get_template_part('content', 'none');
            endif;
        ?>
    </div>
</div>