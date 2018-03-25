<div class="modal fade in" id="quick-view-box" tabindex="-1" role="dialog" aria-labelledby="quickviewboxLabel"
     aria-hidden="false" style="display: none; padding-right: 17px;">
    <script id="quickview-posttemplate" type="text/template">
        <div class="modal-backdrop fade in" style="height: 708px;"></div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h4 class="modal-title text-primary text-uppercase" id="quickviewboxLabel">{{post_title}}</h4>
                </div>
                <div class="modal-body product-details">
                    <div class="row">
                        <div class="col-sm-7"><img class="img-responsive" width="700" height="700" alt="{{post_title}}" src="{{featured_image}}"></div>
                        <div class="col-sm-5 sub-info">
                            <div class="product-description">
                                <h5 class="text-primary text-uppercase">{{post_title}}</h5>
                                <p> {{post_excerpt}}</p>
                            </div>
                            <div class="product-availability in-stock">
                                <p>Tình trạng: <span class="text-info">{{stock_status}}</span></p>
                            </div>
                            <div class="product-price clearfix"><span
                                        class="pull-left btn btn-primary"><strong>{{regular_price}} đ</strong></span> <span
                                        class="pull-left btn btn-link"><del>{{sale_price}} đ</del></span></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
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
                    <a href="{{link_url_product}}">
                        <button class="btn btn-default hvr-underline-from-center-default">Xem chi tiết</button>
                    </a>
                    <a href="{{add_to_cart_url}}">
                        <button type="button" class="btn btn-primary hvr-underline-from-center-primary">Thêm giỏ hàng</button>
                    </a>

                </div>
            </div>
        </div>
    </script>
</div>

