<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Online Shop
 */
get_header(); ?>
    <main id="main" class="site-main">
        <?php if ( have_posts() ) :
            if ( is_home() && ! is_front_page() ) : ?>
                <header class="page-header">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </header>
            <?php
            endif;
            while ( have_posts() ) : the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'template-parts/content', 'canapapa-deals' );
            endwhile;
            the_posts_navigation();
        else :
            get_template_part( 'template-parts/content', 'none' );
        endif; ?>
    </main><!-- #main -->
<?php
get_footer();