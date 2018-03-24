<?php
    //Info website
    $Name_canapapa = get_theme_mod('Name_canapapa');
    $Desc_web = get_theme_mod('Desc_web');
    $Phone = get_theme_mod('Phone');
    $Name_web = get_theme_mod('Name_web');
    $Addr_web = get_theme_mod('Addr_web');
    $Skype = get_theme_mod('Skype');
    $Email = get_theme_mod('Email');

    //Info icon socail
    $Fb = get_theme_mod('Facebook');
    $Tw = get_theme_mod('Twitter');
    $linkedin = get_theme_mod('Linkedin');
    $google = get_theme_mod('Google+');
    $pinterest= get_theme_mod('Pinterest')

?>
<?php get_template_part('quickview')?>
<div class="btm-sec">
    <footer>
        <div class="footer-middle wow fadeIn animated animated" data-wow-offset="40" data-wow-duration="2s"
             style="visibility: visible; animation-duration: 2s;">
            <div class="container">
                <div class="col-md-3 col-sm-12">
                    <h5 class="text-info text-uppercase"><?php echo $Name_canapapa; ?></h5>
                    <p><?php echo $Desc_web ?></p>
                    <ul class="soc">
                        <?php
                            if(!empty($Tw)) {
                                echo '<li><a class="soc-twitter" href=""></a></li>';
                            }
                        ?>
                        <?php
                        if(!empty($Fb)) {
                            echo '<li><a class="soc-facebook" href=""></a></li>';
                        }
                        ?>
                        <?php
                        if(!empty($google)) {
                            echo '<li><a class="soc-google" href=""></a></li>';
                        }
                        ?>
                        <?php
                        if(!empty($pinterest)) {
                            echo '<li><a class="soc-pinterest" href=""></a></li>';
                        }
                        ?>
                    </ul>
                    <hr class="hidden-md hidden-lg hidden-sm">
                </div>
                <div class="col-md-2 col-sm-12">
                    <h5 class="text-info text-uppercase">Liên kết</h5>
                    <?php
                    $args = array(
                        'theme_location' => 'footer',
                        'menu_class' => 'list-unstyled nudge',
                    );
                    wp_nav_menu($args);
                    ?>
                    <hr class="hidden-md hidden-lg hidden-sm">
                </div>
                <div class="col-md-3 col-sm-12">
                    <h5 class="text-info text-uppercase">Thông tin liên hệ</h5>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fa fa-map-marker"> </i>
                            <?php echo $Addr_web; ?>
                        </li>
                        <li>
                            <i class="fa fa-envelope"> </i>
                            <a href="mailto:laziweb@gmail.com"><?php echo $Email ?></a>
                        </li>
                        <li>
                            <i class="fa fa-phone"> </i> <?php echo $Phone; ?>
                        </li>
                        <li>
                            <i class="fa fa-skype"></i> <?php echo $Skype; ?>
                        </li>
                    </ul>
                    <hr class="hidden-md hidden-lg hidden-sm">
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5 class="text-info text-uppercase">Đăng ký email</h5>
                            <p class="text-muted">Đăng ký email để nhận những thông tin mới nhất từ chúng tôi.</p>
                            <form action="#" method="post" id="newsletter">
                                <div>
                                    <input type="text" name="email" id="newsletter-mail"
                                           title="Sign up for our newsletter"
                                           class="input-text required-entry validate-email"
                                           placeholder="Nhập Email..." autocomplete="off">
                                    <button type="submit" title="Subscribe" class="btn btn-primary pull-right">
                                        <span>Đăng ký</span></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-btm wow fadeIn animated animated" data-wow-offset="50" data-wow-duration="2s"
             style="visibility: visible; animation-duration: 2s;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <p class="pull-left">© 2015.Royal Market | phát triển bởi <a href="laziweb.com"
                                                                                     rel="nofollow">laziweb.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>