<?php
$params = array('posts_per_page' => 4, 'post_type' => 'slider');
$wp_slider = new WP_Query($params);
?>
<div id="banner">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php if ($wp_slider) : ?>
                <?php
                    foreach ($wp_slider->posts as $post)
                    {
                        $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(600, 172), false, '');
                        if ($wp_slider->posts['0'] == $post) {
                            echo '<div class="item active">
                                    <img src="'.esc_url($src['0']).'" height="500px" width="1920px">
                                  </div>';
                        } else {
                            echo '<div class="item">
                                    <img src="'.esc_url($src['0']).'" height="500px" width="1920px">
                                  </div>';
                        }
                    }
                ?>
            <?php endif; ?>
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>