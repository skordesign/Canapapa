<?php
$cat = (isset($_GET['cat']) && !empty($_GET['cat']) ? $_GET['cat'] : '');
$postname = (isset($_GET['postname']) && !empty($_GET['postname']) ? $_GET['postname'] : '');

//get all categories
$taxonomy = 'product_cat';
$orderby = 'name';
$show_count = 0;      // 1 for yes, 0 for no
$pad_counts = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title = '';
$empty = 0;

$params = array(
    'taxonomy' => $taxonomy,
    'orderby' => $orderby,
    'show_count' => $show_count,
    'pad_counts' => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li' => $title,
    'hide_empty' => $empty
);
$all_categories = get_categories($params);
?>
<div class="loader" style="display: none"></div>
<div class="container"><!--mo div bao 3 block, logo, search, (gio hang, ho tro, dang nhap)-->
    <div class="col-lg-2 col-md-3 col-sm-4">
        <a class="logo" href="<?php echo get_home_url() ?>" title="Canapapa - Chất lượng cho tất cả">
            <img src="<?php bloginfo('template_url') ?>/images/logo-gold.png"
                 alt="Hasaki - Chất lượng cho tất cả">
        </a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-5">
        <form class="form minisearch" id="search_mini_form" action="<?php echo home_url('/san-pham'); ?>"
              method="get">
            <div class="block block-search" style="padding-left: 69px;">
                <div class="block-title">
                    <input type="hidden" class="search_category" name="cat" value="21">
                    <?php if ($cat != '') : ?>
                        <?php foreach ($all_categories as $category) : ?>
                            <?php if ($category->term_id == $cat) : ?>
                                <a class="sort_title" href="javascript:;" id="dLabel" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" style="width: 70px;">
                                    <span><?php echo $category->name ?></span>
                                    <i class="fa fa-caret-down"></i>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <a class="sort_title" href="javascript:;" id="dLabel" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" style="width: 70px;">
                            <span>Tất cả</span>
                            <i class="fa fa-caret-down"></i>
                        </a>
                    <?php endif; ?>
                    <ul class="dropdown-menu" aria-labelledby="dLabel" name="cat" style="left: 0px;">
                        <?php if ($cat == '') : ?>
                            <li data-id="" value="">
                                <span>Tất cả</span>
                            </li>
                        <?php endif; ?>
                        <?php foreach ($all_categories as $cate) : ?>
                            <?php if ($cate->parent == 0) : ?>
                                <li class="search_cate" data-id="<?php echo $cate->term_id ?>"
                                    value="<?php echo $cate->term_id ?>">
                                    <span><?php echo $cate->name ?></span>
                                </li>
                            <?php endif; ?>
                            <?php foreach ($all_categories as $child_cate) : ?>
                                <?php if ($child_cate->parent == $cate->term_id) : ?>
                                    <li class="search_child_cate" data-id="<?php echo $child_cate->term_id ?>"
                                        value="<?php echo $child_cate->term_id ?>">
                                        <span><?php echo $child_cate->name ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="block block-content">

                    <div class="field search">
                        <div class="control">
                            <input class="input-text"
                                   placeholder="Tìm sản phẩm bạn mong muốn..." id="search"
                                   name="postname" autocomplete="off" value="<?php echo $postname ?>"
                                   aria-haspopup="false">
                            <div id="block_suggest_search" style="display: none">

                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="action search" title="Search" type="submit"><i
                                    class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#search_mini_form ul.dropdown-menu li').click(function () {
                $('.block-search a.sort_title').html($(this).html() + ' <i class="fa fa-caret-down"></i>');
                var newWidth = $(this).find('span').width() + 20;
                $('.block-search a.sort_title').width(newWidth);
                $('.block.block-search').css('padding-left', newWidth + 10);
                $('input.search_category').val($(this).attr('value'));
                $('.action.search').removeAttr('disabled');
            });
            //trigger click item selected

            //move ul
            $('.dropdown-menu').css('left', '-1000px');
            //show menu to click, to get width
            $('.block-title').addClass('open');
            //click
            $('#search_mini_form > div > div.block-title.open > ul > li[data-id=""]').trigger('click');
            $('.block-title').removeClass('open');
            //move ul
            $('.dropdown-menu').css('left', '0px');
        })
    </script>
    <?php
    global $woocommerce;
    $items = $woocommerce->cart->get_cart();
    $count = $woocommerce->cart->cart_contents_count;
    ?>
    <div class="col-lg-4 col-md-3 col-sm-3">
        <!--mo block "gio hang, dang nhap, ho tro", the dong o cuoi item ho tro khach hang-->
        <div class="item_header">
            <div class="add-to-cart-success" style="display: none;"><span class="close"><i
                            class="tikicon icon-circle-close"></i></span>
                <p class="text">
                    <i class="tikicon icon-circle-tick"></i>
                    Thêm vào giỏ hàng thành  công!
                </p>
                <a href="<?php echo wc_get_cart_url(); ?>" class="btn">Xem giỏ hàng và thanh toán</a>
            </div>
            <div data-block="minicart" class="minicart-wrapper">
                <a class="action showcart popup-cart" href="<?php echo wc_get_cart_url(); ?>">
                    <img alt="Giỏ hàng"
                         src="<?php bloginfo('template_url') ?>/images/icon_01.png">
                    <span class="counter qty"><?php echo $count ?></span>
                </a>
            </div>
            <a class="txt_gio_hang popup-cart" href="#popup-cart"> Giỏ <br> hàng </a>
        </div>
        <div class="item_header item_login">
            <a class="icon_header" href="#"><img alt=""
                                                 src="<?php bloginfo('template_url') ?>/images/icon_02.png"></a>
            <div class="text_1_header">
                <a href="javascript:;">
                    Chào <span>Nguyễn</span>
                </a>
            </div>
            <div class="text_1_header">
                <a class="txt_link_hasaki" href="#">Tài khoản <i class="fa fa-caret-down"></i></a>
            </div>
            <div class="sub_login sub_dalogin">
                <div class="main_content_sub_login">
                    <span class="arrow_sub_login"></span>

                    <div class="item_da_login">
                        <a href=""><i aria-hidden="true"
                                      class="fa fa-file-text-o"></i> Tài
                            khoản của bạn </a>
                    </div>
                    <div class="item_da_login">
                        <a href=""><i aria-hidden="true"
                                      class="fa fa-list-alt"></i> Quản
                            lý đơn hàng </a>
                    </div>
                    <div class="item_da_login">
                        <a href=""><i aria-hidden="true"
                                      class="fa fa-heart-o"></i> Sản phẩm yêu
                            thích</a>
                    </div>
                    <div class="item_da_login">
                        <a href=""><i aria-hidden="true"
                                      class="fa fa-map-marker"></i> Địa
                            chỉ giao hàng</a>
                    </div>
                    <div class="item_da_login">
                        <a href=""><i aria-hidden="true"
                                      class="fa fa-sign-out"></i>
                            Thoát</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="item_header">
            <a class="icon_header" href=""><img alt="Câu hỏi thường gặp"
                                                src="<?php bloginfo('template_url') ?>/images/icon_03.png"></a>
            <a class="txt_gio_hang" href="">Hỗ trợ <br> khách hàng</a>
        </div>
    </div><!--dong div wrap login, ho tro, gio hang duoc mo o minicart.phtml-->

</div><!--dong div bao 3 block logo, search, (gio hang, ho tro, dang nhap)-->