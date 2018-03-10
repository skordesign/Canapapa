<div class="btm-sec">
    <footer>
        <div class="footer-middle wow fadeIn animated animated" data-wow-offset="40" data-wow-duration="2s"
             style="visibility: visible; animation-duration: 2s;">
            <div class="container">
                <div class="col-md-3 col-sm-12">
                    <h5 class="text-info text-uppercase">Mỹ phẩm laziweb</h5>
                    <p>Mỹ Phẩm laziweb được quý khách hàng biết đến là phân phối các mặt hàng mỹ phẩm và Dược mỹ
                        phẩm được sản xuất tại Hàn Quốc đặc biệt là nhà bán lẻ số 1 các Sản phẩm chăm sóc sắc đẹp
                        của Hãng mỹ phẩm nổi tiếng ThefaceShop.</p>
                    <ul class="soc">
                        <li>
                            <a class="soc-twitter" href="#"></a>
                        </li>
                        <li>
                            <a class="soc-facebook" href="#"></a>
                        </li>
                        <li>
                            <a class="soc-google" href="#"></a>
                        </li>
                        <li>
                            <a class="soc-pinterest" href="#"></a>
                        </li>
                    </ul>
                    <hr class="hidden-md hidden-lg hidden-sm">
                </div>
                <div class="col-md-2 col-sm-12">
                    <h5 class="text-info text-uppercase">Liên kết</h5>
                    <?php
                        $args = array(
                                'theme_location'=> 'footer',
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
                            78/1 Phan Đình Phùng, Phường Tân Thành, Quận Tân Phú, TP.Hồ Chí Minh
                        </li>
                        <li>
                            <i class="fa fa-envelope"> </i>
                            <a href="mailto:laziweb@gmail.com">laziweb@gmail.com</a>
                        </li>
                        <li>
                            <i class="fa fa-phone"> </i>0903.915.877 (Kỹ thuật) - 0901.461.407(Kinh doanh)
                        </li>
                        <li>
                            <i class="fa fa-skype"></i> hotienloc.92 - <i class="fa fa-skype"></i> gm.quantrinh
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
                        <p class="pull-left">© 2018.Canapapa Market | phát triển bởi <a href="laziweb.com"
                                                                                        rel="nofollow">Team Canapapa</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script data-pagespeed-no-defer="">(function () {
        function f(b) {
            var a = window;
            if (a.addEventListener) a.addEventListener("load", b, !1); else if (a.attachEvent) a.attachEvent("onload", b); else {
                var c = a.onload;
                a.onload = function () {
                    b.call(this);
                    c && c.call(this)
                }
            }
        };window.pagespeed = window.pagespeed || {};
        var k = window.pagespeed;

        function l(b, a, c, g, h) {
            this.h = b;
            this.i = a;
            this.l = c;
            this.j = g;
            this.b = h;
            this.c = [];
            this.a = 0
        }

        l.prototype.f = function (b) {
            for (var a = 0; 250 > a && this.a < this.b.length; ++a, ++this.a) try {
                null != document.querySelector(this.b[this.a]) && this.c.push(this.b[this.a])
            } catch (c) {
            }
            this.a < this.b.length ? window.setTimeout(this.f.bind(this), 0, b) : b()
        };
        k.g = function (b, a, c, g, h) {
            if (document.querySelector && Function.prototype.bind) {
                var d = new l(b, a, c, g, h);
                f(function () {
                    window.setTimeout(function () {
                        d.f(function () {
                            for (var a = "oh=" + d.l + "&n=" + d.j, a = a + "&cs=", b = 0; b < d.c.length; ++b) {
                                var c = 0 < b ? "," : "", c = c + encodeURIComponent(d.c[b]);
                                if (131072 < a.length + c.length) break;
                                a += c
                            }
                            k.criticalCssBeaconData = a;
                            var b = d.h, c = d.i, e;
                            if (window.XMLHttpRequest) e = new XMLHttpRequest; else if (window.ActiveXObject) try {
                                e = new ActiveXObject("Msxml2.XMLHTTP")
                            } catch (g) {
                                try {
                                    e = new ActiveXObject("Microsoft.XMLHTTP")
                                } catch (h) {
                                }
                            }
                            e &&
                            (e.open("POST", b + (-1 == b.indexOf("?") ? "?" : "&") + "url=" + encodeURIComponent(c)), e.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"), e.send(a))
                        })
                    }, 0)
                })
            }
        };
        k.criticalCssBeaconInit = k.g;
    })();

</script>
    <?php wp_footer(); ?>
</div>
</body>
</html>