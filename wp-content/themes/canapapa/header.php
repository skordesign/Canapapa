<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <title>
        <?php
            wp_title('|', true, 'right');
            bloginfo('name')
        ?>
    </title>
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
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
</head>
<body <?php body_class(); ?> >
<div id="preloader" style="display: none;">
    <div id="status" style="display: none;"></div>
</div>
<input type="hidden" name="home_url" value="<?php echo get_home_url(); ?>">
<?php
    global $woocommerce;
    $items = $woocommerce->cart->get_cart();
    $count = $woocommerce->cart->cart_contents_count;
    $totalcart;
    $haveitems = 0;
?>

<div class="top-sec">
    <nav class="navbar navbar-static-top line-navbar-one">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 welcome-msg hidden-xs">Chào mừng đến với thế giới mỹ phẩm</div>
                <div class="col-sm-8 collapse navbar-collapse navbar-right" id="line-navbar-collapse-1">

                    <ul class="nav navbar-nav top-menu">
                        <li class="dropdown lnt-shopping-cart visible-lg visible-md ">
                            <a href="#" id="cp-cart" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"> <span class="ion-bag bag-icn"></span>
                                <span class="cart-item-quantity badge cart-badge"><?php echo $count ?></span>
                            </a>
                            <?php if($count > 0) : ?>
                            <ul role="menu" id="cp-cart-menu" class="dropdown-menu ul-cart">
                                <li>
                                    <div class="lnt-cart-products text-success">
                                        <i class="ion-android-checkmark-circle icon"></i>
                                        <?php echo $count ?> Sản Phẩm.
                                        <span class="lnt-cart-total">
                                            <?php echo WC()->cart->get_cart_subtotal(); ?>
                                        </span>
                                    </div>
                                </li>
                                <?php
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
                                                <img alt="<?php echo $titlepro; ?>" src="<?php echo $imgpro; ?>">
                                                <p class="lnt-product-info">
                                                    <span class="lnt-product-name"><?php echo $titlepro; ?></span>
                                                    <span class="lnt-product-price text-info">
                                                        <label for="">x<?php echo $quantitypro ?></label>
                                                        <?php echo number_format($pricepro, 0, '.', ','); ?> đ
                                                    </span>
                                                </p>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                                <li class="lnt-cart-actions text-center">
                                    <a class="btn btn-default btn-lg hvr-underline-from-center-default" href="<?php echo wc_get_cart_url(); ?>">Giỏ hàng</a>
                                    <a class="btn btn-primary hvr-underline-from-center-primary" href="<?php echo wc_get_checkout_url() ?>">Thanh toán</a>
                                </li>
                            </ul>
                            <?php else: ?>
                            <ul role="menu" id="cp-cart-menu" class="dropdown-menu ul-cart">
                                <li>
                                    <div class="lnt-cart-products text-success">
                                        Giỏ hàng của trống
                                    </div>
                                </li>
                            </ul>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>