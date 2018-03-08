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
    </style>
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"> <span class="ion-bag bag-icn"></span> <span
                                        class="cart-item-quantity badge cart-badge">2</span> </a>
                            <ul role="menu" class="dropdown-menu ul-cart">
                                <li>
                                    <div class="lnt-cart-products text-success"><i
                                                class="ion-android-checkmark-circle icon"></i> 2 Sản Phẩm. <span
                                                class="lnt-cart-total">1.300.000₫</span></div>
                                </li>
                                <li>
                                    <div class="lnt-cart-products">
                                        <script data-pagespeed-no-defer="">(function () {
                                                var g = this;

                                                function h(b, d) {
                                                    var a = b.split("."), c = g;
                                                    a[0] in c || !c.execScript || c.execScript("var " + a[0]);
                                                    for (var e; a.length && (e = a.shift());) a.length || void 0 === d ? c[e] ? c = c[e] : c = c[e] = {} : c[e] = d
                                                };

                                                function l(b) {
                                                    var d = b.length;
                                                    if (0 < d) {
                                                        for (var a = Array(d), c = 0; c < d; c++) a[c] = b[c];
                                                        return a
                                                    }
                                                    return []
                                                };

                                                function m(b) {
                                                    var d = window;
                                                    if (d.addEventListener) d.addEventListener("load", b, !1); else if (d.attachEvent) d.attachEvent("onload", b); else {
                                                        var a = d.onload;
                                                        d.onload = function () {
                                                            b.call(this);
                                                            a && a.call(this)
                                                        }
                                                    }
                                                };var n;

                                                function p(b, d, a, c, e) {
                                                    this.h = b;
                                                    this.j = d;
                                                    this.l = a;
                                                    this.f = e;
                                                    this.g = {
                                                        height: window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight,
                                                        width: window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth
                                                    };
                                                    this.i = c;
                                                    this.b = {};
                                                    this.a = [];
                                                    this.c = {}
                                                }

                                                function q(b, d) {
                                                    var a, c, e = d.getAttribute("data-pagespeed-url-hash");
                                                    if (a = e && !(e in b.c)) if (0 >= d.offsetWidth && 0 >= d.offsetHeight) a = !1; else {
                                                        c = d.getBoundingClientRect();
                                                        var f = document.body;
                                                        a = c.top + ("pageYOffset" in window ? window.pageYOffset : (document.documentElement || f.parentNode || f).scrollTop);
                                                        c = c.left + ("pageXOffset" in window ? window.pageXOffset : (document.documentElement || f.parentNode || f).scrollLeft);
                                                        f = a.toString() + "," + c;
                                                        b.b.hasOwnProperty(f) ? a = !1 : (b.b[f] = !0, a = a <= b.g.height && c <= b.g.width)
                                                    }
                                                    a && (b.a.push(e), b.c[e] = !0)
                                                }

                                                p.prototype.checkImageForCriticality = function (b) {
                                                    b.getBoundingClientRect && q(this, b)
                                                };
                                                h("pagespeed.CriticalImages.checkImageForCriticality", function (b) {
                                                    n.checkImageForCriticality(b)
                                                });
                                                h("pagespeed.CriticalImages.checkCriticalImages", function () {
                                                    r(n)
                                                });

                                                function r(b) {
                                                    b.b = {};
                                                    for (var d = ["IMG", "INPUT"], a = [], c = 0; c < d.length; ++c) a = a.concat(l(document.getElementsByTagName(d[c])));
                                                    if (0 != a.length && a[0].getBoundingClientRect) {
                                                        for (c = 0; d = a[c]; ++c) q(b, d);
                                                        a = "oh=" + b.l;
                                                        b.f && (a += "&n=" + b.f);
                                                        if (d = 0 != b.a.length) for (a += "&ci=" + encodeURIComponent(b.a[0]), c = 1; c < b.a.length; ++c) {
                                                            var e = "," + encodeURIComponent(b.a[c]);
                                                            131072 >= a.length + e.length && (a += e)
                                                        }
                                                        b.i && (e = "&rd=" + encodeURIComponent(JSON.stringify(t())), 131072 >= a.length + e.length && (a += e), d = !0);
                                                        u = a;
                                                        if (d) {
                                                            c = b.h;
                                                            b = b.j;
                                                            var f;
                                                            if (window.XMLHttpRequest) f = new XMLHttpRequest; else if (window.ActiveXObject) try {
                                                                f = new ActiveXObject("Msxml2.XMLHTTP")
                                                            } catch (k) {
                                                                try {
                                                                    f = new ActiveXObject("Microsoft.XMLHTTP")
                                                                } catch (v) {
                                                                }
                                                            }
                                                            f && (f.open("POST", c + (-1 == c.indexOf("?") ? "?" : "&") + "url=" + encodeURIComponent(b)), f.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"), f.send(a))
                                                        }
                                                    }
                                                }

                                                function t() {
                                                    var b = {}, d = document.getElementsByTagName("IMG");
                                                    if (0 == d.length) return {};
                                                    var a = d[0];
                                                    if (!("naturalWidth" in a && "naturalHeight" in a)) return {};
                                                    for (var c = 0; a = d[c]; ++c) {
                                                        var e = a.getAttribute("data-pagespeed-url-hash");
                                                        e && (!(e in b) && 0 < a.width && 0 < a.height && 0 < a.naturalWidth && 0 < a.naturalHeight || e in b && a.width >= b[e].o && a.height >= b[e].m) && (b[e] = {
                                                            rw: a.width,
                                                            rh: a.height,
                                                            ow: a.naturalWidth,
                                                            oh: a.naturalHeight
                                                        })
                                                    }
                                                    return b
                                                }

                                                var u = "";
                                                h("pagespeed.CriticalImages.getBeaconData", function () {
                                                    return u
                                                });
                                                h("pagespeed.CriticalImages.Run", function (b, d, a, c, e, f) {
                                                    var k = new p(b, d, a, e, f);
                                                    n = k;
                                                    c && m(function () {
                                                        window.setTimeout(function () {
                                                            r(k)
                                                        }, 0)
                                                    })
                                                });
                                            })();
                                            pagespeed.CriticalImages.Run('/ngx_pagespeed_beacon', 'http://theme.laziweb.com/myphamroyal/', 'PTYbCtWsbg', false, false, 'WW9gzue4Srk');</script>
                                        <img alt="Product title" data-pagespeed-url-hash="4273646131"
                                             src=""

                                             data-pagespeed-lazy-replaced-functions="1">
                                        <p class="lnt-product-info">
                                            <button class="close"><span aria-hidden="true"
                                                                        class="ion-android-cancel"></span></button>
                                            <span class="lnt-product-name">Sữa tắm On The Body (New)</span> <span
                                                    class="lnt-product-price text-info">600.000₫</span></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="lnt-cart-products"><img alt="Product title"
                                                                        data-pagespeed-url-hash="273178756"
                                                                        src=""/>
                                        <p class="lnt-product-info">
                                            <button class="close"><span aria-hidden="true"
                                                                        class="ion-android-cancel"></span></button>
                                            <span class="lnt-product-name">Nước hoa nữ Coco Noir Chanel 100ml</span>
                                            <span class="lnt-product-price text-info">700.000₫</span></p>
                                    </div>
                                </li>
                                <li class="lnt-cart-actions text-center"><a
                                            class="btn btn-default btn-lg hvr-underline-from-center-default"
                                            href="cart.html">Giỏ hàng</a> <a
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