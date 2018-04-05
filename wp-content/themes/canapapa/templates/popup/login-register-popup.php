<!--<div class="mfp-bg mfp-ready"></div>-->
<!--<div class="mfp-wrap mfp-auto-cursor mfp-ready" tabindex="-1" style="overflow-x: hidden; overflow-y: auto;">-->
    <div class="mfp-container mfp-s-ready mfp-inline-holder">
        <div class="mfp-content">
            <div id="popup-login" class="relative">
                <div class="hsk-popup-header">
                    <button title="Đóng" type="button" class="mfp-close">×</button>
                </div>
                <div class="hsk-popup-content">
                    <div id="lg_login">
                        <div class="sub_login">
                            <div class="main_content_sub_login">
                                <div class="block_login_fb">
                                    <div class="space_bottom_5">Đăng nhập với</div>
                                    <a href=""><img
                                                src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/img_login_fb_2.jpg"
                                                alt=""></a> &nbsp;
                                    <a href=""><img
                                                src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/img_login_gg_2.jpg"
                                                alt=""></a>
                                </div>
                                <div class="block_more_login">
                                    <form id="form-head-login" action=""
                                          method="post">
                                        <div class="space_bottom_10">Hoặc đăng nhập với Canapapa</div>
                                        <div class="form-group">
                                            <div class="relative">
                                                <input name="login[username]" type="text"
                                                       placeholder="Nhập email hoặc số điện thoại" class="form-control"
                                                       data-validate="{required:true}">
                                                <i aria-hidden="true" class="fa fa-envelope-o"></i>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="relative">
                                                <input name="login[password]" type="password"
                                                       placeholder="Nhập password" class="form-control"
                                                       data-validate="{required:true}">
                                                <i aria-hidden="true" class="fa fa-lock"></i>
                                            </div>
                                            <!--<div class="error">lỗi nè</div>-->
                                        </div>
                                        <div class="form-group">
                                            <label class="checkbox-inline"><input type="checkbox"> Nhớ mật khẩu</label>
                                            <a class="popup-forgot txt_color_1 pull-right" href="#popup-forgot">Quên mật
                                                khẩu</a>

                                            <div class="clearfix"></div>
                                        </div>
                                        <button class="btn btn_site_1">Đăng nhập</button>
                                    </form>
                                    Bạn chưa có tài khoản? <a href="#popup-register"
                                                              class="txt_color_1 text-uppercase popup-login-dismiss">Đăng
                                        ký ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="lg_register">
                <div class="sub_login">
                    <div class="main_content_sub_login">
                        <form id="form-head-register" action="https://hasaki.vn/customer/account/createpost/"
                              method="post">
                            <div class="block_more_login">
                                <div class="space_bottom_10">Đăng ký tài khoản</div>
                                <div class="form-group">
                                    <div class="relative">
                                        <input name="email" type="text"
                                               placeholder="Nhập email hoặc số điện thoại" class="form-control"
                                               data-validate="{required:true, 'validate-account': true}">
                                        <i aria-hidden="true" class="fa fa-envelope-o"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="relative">
                                        <input id="popup-password" name="password" autocomplete="off"
                                               type="password" placeholder="Nhập mật khẩu từ 6 - 32 ký tự"
                                               class="form-control"
                                               data-validate="{required:true, 'validate-password':true}">
                                        <i aria-hidden="true" class="fa fa-lock"></i>
                                    </div>
                                    <input type="hidden" id="popup-password_confirmation"
                                           name="password_confirmation" value="">
                                    <!--<div class="error">lỗi nè</div>-->
                                </div>
                                <div class="form-group">
                                    <div class="relative">
                                        <input id="reg-fullname" name="fullname" type="text"
                                               placeholder="Họ tên" class="form-control"
                                               data-validate="{required:true, 'validate-custom-fullname': true}">
                                        <i aria-hidden="true" class="fa fa-user"></i>
                                    </div>
                                    <input type="hidden" id="popup-firstname" name="firstname" value="">
                                    <input type="hidden" id="popup-lastname" name="lastname" value="">
                                    <!--<div class="error">lỗi nè</div>-->
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-2">
                                        <label class="radio-inline"><input name="gender" value="1" type="radio">
                                            Nam </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="radio-inline"><input name="gender" value="2"
                                                                           checked="checked" type="radio"> Nữ
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="form-group">
                                            <select class="form-control" name="popup-date">
                                                <option value="">Ngày</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="form-group">
                                            <select class="form-control" name="popup-month">
                                                <option value="">Tháng</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="form-group">
                                            <select class="form-control" name="popup-year">
                                                <option value="">Năm</option>
                                                <option value="2008">2008</option>
                                                <option value="2007">2007</option>
                                                <option value="2006">2006</option>
                                                <option value="2005">2005</option>
                                                <option value="2004">2004</option>
                                                <option value="2003">2003</option>
                                                <option value="2002">2002</option>
                                                <option value="2001">2001</option>
                                                <option value="2000">2000</option>
                                                <option value="1999">1999</option>
                                                <option value="1998">1998</option>
                                                <option value="1997">1997</option>
                                                <option value="1996">1996</option>
                                                <option value="1995">1995</option>
                                                <option value="1994">1994</option>
                                                <option value="1993">1993</option>
                                                <option value="1992">1992</option>
                                                <option value="1991">1991</option>
                                                <option value="1990">1990</option>
                                                <option value="1989">1989</option>
                                                <option value="1988">1988</option>
                                                <option value="1987">1987</option>
                                                <option value="1986">1986</option>
                                                <option value="1985">1985</option>
                                                <option value="1984">1984</option>
                                                <option value="1983">1983</option>
                                                <option value="1982">1982</option>
                                                <option value="1981">1981</option>
                                                <option value="1980">1980</option>
                                                <option value="1979">1979</option>
                                                <option value="1978">1978</option>
                                                <option value="1977">1977</option>
                                                <option value="1976">1976</option>
                                                <option value="1975">1975</option>
                                                <option value="1974">1974</option>
                                                <option value="1973">1973</option>
                                                <option value="1972">1972</option>
                                                <option value="1971">1971</option>
                                                <option value="1970">1970</option>
                                                <option value="1969">1969</option>
                                                <option value="1968">1968</option>
                                                <option value="1967">1967</option>
                                                <option value="1966">1966</option>
                                                <option value="1965">1965</option>
                                                <option value="1964">1964</option>
                                                <option value="1963">1963</option>
                                                <option value="1962">1962</option>
                                                <option value="1961">1961</option>
                                                <option value="1960">1960</option>
                                                <option value="1959">1959</option>
                                                <option value="1958">1958</option>
                                                <option value="1957">1957</option>
                                                <option value="1956">1956</option>
                                                <option value="1955">1955</option>
                                                <option value="1954">1954</option>
                                                <option value="1953">1953</option>
                                                <option value="1952">1952</option>
                                                <option value="1951">1951</option>
                                                <option value="1950">1950</option>
                                                <option value="1949">1949</option>
                                                <option value="1948">1948</option>
                                                <option value="1947">1947</option>
                                                <option value="1946">1946</option>
                                                <option value="1945">1945</option>
                                                <option value="1944">1944</option>
                                                <option value="1943">1943</option>
                                                <option value="1942">1942</option>
                                                <option value="1941">1941</option>
                                                <option value="1940">1940</option>
                                                <option value="1939">1939</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="checkbox-inline"><input name="is_subscribed" value="1"
                                                                          checked="checked" type="checkbox">
                                        Nhận thông tin khuyến mãi qua e-mail </label>
                                </div>
                                <div class="form-group">
                                    Tôi đã đọc và đồng ý thực hiện mọi giao dịch mua bán theo <a
                                            class="txt_color_1"
                                            href="https://hasaki.vn/thong-tin-ho-tro/#tab_dieukhoansudung">điều
                                        kiện sử dụng và chính sách</a> của Hasaki.vn
                                </div>
                                <div class="clearfix"></div>
                                <button class="btn btn_site_1">Đăng ký</button>

                            </div>
                        </form>
                        <div class="block_login_fb">
                            Bạn đã có tài khoản? <a href="#popup-login"
                                                    class="txt_color_1 text-uppercase popup-register-dismiss">Đăng
                                nhập</a>
                            <div class="space_bottom_5">Hoặc đăng nhập với:</div>
                            <a href="https://hasaki.vn/customer/account/facebookLogin/"><img
                                        src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/img_login_fb_2.jpg"
                                        alt=""></a> &nbsp;
                            <a href="https://hasaki.vn/customer/account/googleLogin/"><img
                                        src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/img_login_gg_2.jpg"
                                        alt=""></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
<!--    </div>-->
<!--</div>-->