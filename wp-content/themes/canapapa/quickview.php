<div class="modal fade in" id="quick-view-login" tabindex="-1" role="dialog" aria-labelledby="quickviewboxLabel"
     aria-hidden="false" style="display: block; padding-right: 17px;">
        <div class="modal-backdrop fade in" style="height: 708px;"></div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span>
                    </button>
                    <div class="block_login_fb">
                        <div class="space_bottom_5">Đăng nhập với</div>
                        <a href="https://localhost/Canapapa/wp-login.php?loginSocial=facebook" data-plugin="nsl" data-action="connect" data-redirect="current" data-provider="facebook" data-popupwidth="475" data-popupheight="175"><img src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/img_login_fb_2.jpg" alt=""></a> &nbsp;
                        <a href="https://hasaki.vn/customer/account/googleLogin/"><img src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/img_login_gg_2.jpg" alt=""></a>
                    </div>
                    <div class="block_more_login">
                        <form id="form-head-login" action="https://hasaki.vn/customer/account/loginPost/" method="post">
                            <div class="space_bottom_10">Hoặc đăng nhập với Hasaki.vn</div>
                            <div class="form-group">
                                <div class="relative">
                                    <input name="login[username]" type="text" placeholder="Nhập email hoặc số điện thoại" class="form-control" data-validate="{required:true}">
                                    <i aria-hidden="true" class="fa fa-envelope-o"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="relative">
                                    <input name="login[password]" type="password" placeholder="Nhập password" class="form-control" data-validate="{required:true}">
                                    <i aria-hidden="true" class="fa fa-lock"></i>
                                </div>
                                <!--<div class="error">lỗi nè</div>-->
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline"><input type="checkbox"> Nhớ mật khẩu</label>
                                <a class="popup-forgot txt_color_1 pull-right" href="#popup-forgot">Quên mật khẩu</a>

                                <div class="clearfix"></div>
                            </div>
                            <button class="btn btn_site_1">Đăng nhập</button>
                        </form>
                        Bạn chưa có tài khoản?  <a href="#popup-register" class="txt_color_1 text-uppercase popup-login-dismiss">Đăng ký ngay</a>
                    </div>
                </div>

            </div>
        </div>
</div>

