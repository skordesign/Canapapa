<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <?php wp_head(); ?>
    <style type="text/css">
        html {
            margin-top: 0px !important;
        }

        [data-columns]::before {
            visibility: hidden;
            position: absolute;
            font-size: 1px;
        }

        .dropdown .dropdown-menu {
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            -ms-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
</head>
<body <?php body_class(); ?> >
<div id="preloader" style="display: none;">
    <div id="status" style="display: none;"></div>
</div>
<div class="top-sec">
    <nav class="navbar navbar-static-top line-navbar-one">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed ion-android-menu" data-toggle="collapse"
                        data-target="#line-navbar-collapse-1"><span class="sr-only">Toggle navigation</span></button>
                <a class="lno-cart" href="cart.html"> <span class="glyphicon glyphicon-shopping-cart"></span> <span
                            class="cart-item-quantity"></span> </a>
                <button class="lno-btn-toggle"><span class="ion-android-menu"></span></button>
            </div>
            <div class="row">
                <div class="col-sm-4 welcome-msg hidden-xs">Chào mừng đến với thế giới mỹ phẩm</div>
                <div class="col-sm-8 collapse navbar-collapse navbar-right" id="line-navbar-collapse-1">
                    <ul class="nav navbar-nav top-menu">
                        <li class="dropdown lnt-shopping-cart visible-lg visible-md ">
                            <a href="#" id="cp-cart" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"> <span class="ion-bag bag-icn"></span> <span
                                        class="cart-item-quantity badge cart-badge">2</span> </a>
                            <ul role="menu" id="cp-cart-menu" class="dropdown-menu ul-cart">
                                <li>
                                    <div class="lnt-cart-products text-success"><i
                                                class="ion-android-checkmark-circle icon"></i> 2 Sản Phẩm. <span
                                                class="lnt-cart-total"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
                                    </div>
                                </li>
                                <?php
                                global $woocommerce;
                                $items = $woocommerce->cart->get_cart();
                                $totalcart;
                                $haveitems = 0;
                                foreach ($items as $item => $values) {
                                    $_product = apply_filters('woocommerce_cart_item_product', $values['data'], $values, $item);
                                    if ($_product && $_product->exists() && $values['quantity'] > 0) {
                                        $haveitems = 1;
                                        $_product = wc_get_product($values['data']->get_id());

                                        $linkpro = get_permalink($values['product_id']);
                                        $titlepro = $_product->get_title();
                                        $getProductDetail = wc_get_product($values['product_id']);
                                        $imgpro = $getProductDetail->get_image(array(80, 80));
                                        $pricepro = get_post_meta($values['product_id'], '_price', true);
                                        $quantitypro = $values['quantity'];
                                        ?>
                                        <li>
                                            <div class="lnt-cart-products">
                                                <img alt="<?php echo $titlepro; ?>"
                                                     src="<?php echo $imgpro; ?>">
                                                <p class="lnt-product-info">
                                                    <button class="close"><span aria-hidden="true"
                                                                                class="ion-android-cancel"></span>
                                                    </button>
                                                    <span class="lnt-product-name"><?php echo $titlepro; ?></span> <span
                                                            class="lnt-product-price text-info"><?php echo $pricepro; ?></span>
                                                </p>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                                <li class="lnt-cart-actions text-center"><a
                                            class="btn btn-default btn-lg hvr-underline-from-center-default"
                                            href="<?php echo wc_get_cart_url(); ?>">Giỏ hàng</a> <a
                                            class="btn btn-primary hvr-underline-from-center-primary"
                                            href="checkout.html">Thanh
                                        toán</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><img alt=""
                                                          src="">
                                <span class="ion-android-arrow-dropdown"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="product-details.html"><img width="16" height="12" alt=""
                                                                        data-pagespeed-url-hash="2769670499"
                                                                        src=""></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left lno-search-form visible-xs" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-xs btn-search"><span class="fa fa-search"></span></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="line-navbar-left lnl-hide">
        <p class="lnl-nav-title">Menu</p>
        <ul class="lnl-nav">
            <li><a class="" href="about.html"><span class="lnl-link-text">Giới thiệu</span></a>
            </li>
            <li><a class="collapsed" data-toggle="collapse" href="#collapse-product" aria-expanded="false"
                   aria-controls="collapse-product" data-subcategory="subcategory-sports"><span class="lnl-link-text"> Sản phẩm</span><span
                            class="fa fa-angle-up lnl-btn-sub-collapse"></span></a>
                <ul class="lnl-sub-one collapse" id="collapse-product" data-subcategory="subcategory-sports">
                    <li><a href="products.html"> Nước hoa</a></li>
                    <li><a href="products.html"> Son môi</a></li>
                    <li><a href="products.html"> Mỹ phẩm theo bộ</a></li>
                    <li><a href="products.html"> Sơn móng</a></li>
                    <li><a href="products.html">Dầu gội, dầu xả</a></li>
                    <li><a href="products.html">Xem tất cả</a></li>
                </ul>
            </li>
            <li><a href="products.html"><span class="lnl-link-text"> Bán chạy</span></a>
            </li>
            <li><a href="products.html"><span class="lnl-link-text"> Sản phẩm khuyến mãi</span></a>
            </li>
            <li><a class="collapsed" data-toggle="collapse" href="#collapse-blog" aria-expanded="false"
                   aria-controls="collapse-blog" data-subcategory="subcategory-fashion"><span class="lnl-link-text"> Tin tức</span><span
                            class="fa fa-angle-up lnl-btn-sub-collapse"></span></a>
                <ul class="lnl-sub-one collapse" id="collapse-blog" data-subcategory="subcategory-fashion">
                    <li><a href="blog.html"> Mỹ phẩm mới</a></li>
                    <li><a href="blog.html"> Khuyến mãi</a></li>
                    <li><a href="blog.html"> Tư vấn làm đẹp</a></li>
                    <li><a href="blog.html"> Tuyển dụng</a></li>
                    <li><a href="blog.html"> Xem tất cả</a></li>
                </ul>
            </li>
            <li><a href="contact.html"><span class="lnl-link-text"> Liên hệ</span></a>
            </li>
        </ul>
    </div>
</div>