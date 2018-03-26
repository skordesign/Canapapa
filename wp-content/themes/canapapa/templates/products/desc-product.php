<?php
global $getProductDetail, $nameTrademark, $nameOrigin, $nameProduction, $user_manual;
?>
<div class="col-sm-12 accordion">
    <div role="tabpanel">
        <ul id="product-tabs" class="nav nav-tabs text-uppercase" role="tablist">
            <li role="presentation" class="active"><a href="#descreption" aria-controls="descreption" role="tab" data-toggle="tab" aria-expanded="true">Mô tả</a></li>
            <li role="presentation" class=""><a href="#user_manual" aria-controls="reviews" role="tab" data-toggle="tab" aria-expanded="false">Hướng dẫn sử dụng</a></li>
            <li role="presentation" class=""><a href="#evaluate" aria-controls="tags" role="tab" data-toggle="tab" aria-expanded="false"> Đánh giá</a></li>
            <li role="presentation" class=""><a href="#answer" aria-controls="tags" role="tab" data-toggle="tab" aria-expanded="false"> Hỏi đáp</a></li>
            <li role="presentation" class=""><a href="#params" aria-controls="tags" role="tab" data-toggle="tab" aria-expanded="false"> Thông số</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane product-pane fade clearfix active in" id="descreption">
                <?php echo $getProductDetail->post_content ?>
            </div>
            <div role="tabpanel" class="tab-pane product-pane fade clearfix" id="user_manual">
                <div class="single-review clearfix">
                    <p><?php echo $user_manual['_custom_product_user_manual']['0'] ?></p>
                    <hr>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane product-pane fade clearfix" id="evaluate">
                <div class="item_box_col_right space_bottom_20" id="box_rating">
                    <div class="title_common_site">
                        Khách hàng nhận xét
                    </div>
                    <div class="content_common_site">
                        <div class="block_total_rating row space_bottom_10">
                            <div class="block_total_left col-lg-7 col-md-8 col-sm-8 ">
                                <div class="txt_top_total_left">Đánh giá trung bình</div>
                                <div class="row">
                                    <div class="block_number_total col-lg-4 col-md-5 col-sm-4">
                                        <div class="txt_numer txt_color_2">5.0</div>
                                        <div class="block_start start_small">
                                            <div class="number_start" style="width:100%;"></div>
                                            <div class="start_background"></div>
                                        </div>
                                        <p>5 nhận xét</p>
                                    </div>
                                    <div class="block_detail_number col-lg-8 col-md-7 col-sm-8">
                                        <div class="row_detail_number">
                                            <span class="txt_number_start">5 sao</span>
                                            <div class="block_percent_rate"><span style="width:100%"></span>
                                            </div>
                                            <span class="number_ratting"> 5 </span>
                                            Rất hài lòng            </div>
                                        <div class="row_detail_number">
                                            <span class="txt_number_start">4 sao</span>
                                            <div class="block_percent_rate"><span style="width:0%"></span>
                                            </div>
                                            <span class="number_ratting"> 0 </span>
                                            Hài lòng            </div>
                                        <div class="row_detail_number">
                                            <span class="txt_number_start">3 sao</span>
                                            <div class="block_percent_rate"><span style="width:0%"></span>
                                            </div>
                                            <span class="number_ratting"> 0 </span>
                                            Bình thường            </div>
                                        <div class="row_detail_number">
                                            <span class="txt_number_start">2 sao</span>
                                            <div class="block_percent_rate"><span style="width:0%"></span>
                                            </div>
                                            <span class="number_ratting"> 0 </span>
                                            Dưới trung bình            </div>
                                        <div class="row_detail_number">
                                            <span class="txt_number_start">1 sao</span>
                                            <div class="block_percent_rate"><span style="width:0%"></span>
                                            </div>
                                            <span class="number_ratting"> 0 </span>
                                            Thất vọng            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block_total_right col-lg-5 col-md-4 col-sm-4 text-center">
                                <div class="txt_chiase">Chia sẽ nhận xét của bạn về sản phẩm này</div>
                                <a href="" data-login="1" class="btn btn_site_2 write-rating-btn"> Viết Bình luận</a>
                            </div>
                        </div>
                        <form method="post" name="rating_form">
                            <input name="form_key" type="hidden" value="tt76v4aR0mYBXz1l">        <input type="hidden" name="product_id" value="5192">
                            <div class="text-right txt_666 txt_12">* Bắt buộc</div>
                            <div id="box_input_comment" class="width_common">
                                <div class="txt_input_comment space_bottom_10">Đánh giá sản phẩm này *</div>
                                <div class="block_start_ratting width_common space_bottom_10">
                <span class="rating">
                                            <input type="radio" class="rating-input" id="rating-input-1-5" name="rating_star" value="5" data-describe="Rất hài lòng">
                        <label for="rating-input-1-5" class="rating-star"></label>
                                            <input type="radio" class="rating-input" id="rating-input-1-4" name="rating_star" value="4" data-describe="Hài lòng">
                        <label for="rating-input-1-4" class="rating-star"></label>
                                            <input type="radio" class="rating-input" id="rating-input-1-3" name="rating_star" value="3" data-describe="Bình thường">
                        <label for="rating-input-1-3" class="rating-star"></label>
                                            <input type="radio" class="rating-input" id="rating-input-1-2" name="rating_star" value="2" data-describe="Dưới trung bình">
                        <label for="rating-input-1-2" class="rating-star"></label>
                                            <input type="radio" class="rating-input" id="rating-input-1-1" name="rating_star" value="1" data-describe="Thất vọng">
                        <label for="rating-input-1-1" class="rating-star"></label>
                                    </span>
                                    <span class="txt_filling rating_star_describe"></span>
                                </div>

                                <div class="block_input_comment width_common">
                                    <div class="form-group">
                                        <div class="txt_input_comment">Tiêu đề nhận xét</div>
                                        <input type="text" name="rating_title" class="form-control" placeholder="Nhập tiêu đề nhận xét tại đây">
                                    </div>
                                    <div class="form-group">
                                        <div class="txt_input_comment">Mô tả nhận xét *
                                            <span class="pull-right">Ký tự còn lại <span class="character-left">2500</span></span>
                                        </div>
                                        <textarea class="form-control" name="rating_content" placeholder="Nhập mô tả tại đây"></textarea>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn_site_5 cancel_rate">Bỏ qua</button>
                                        <button class="btn btn_site_1" type="submit">Gửi</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                        <div id="box_comment" class="width_common space_bottom_20">
                            <div class="title_box_comment width_common">
                                <div class="txt_total_comment">5 bình luận cho sản
                                    phẩm này
                                </div>
                                <div class="filter_comment pull-right">
                                    <div class="sort_item sort_item_2">
                                        <a id="dLabel2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="javascript:;" data-sort="position" class="rating-current-sort">
                                            Ngày đánh giá <i class="fa fa-caret-down"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dLabel2">
                                            <div>
                                                <a class="rating-sort" href="#" data-product-id="5192" data-sort="best">
                                                    Đánh giá tốt nhất                                        </a>
                                            </div>
                                            <div>
                                                <a class="rating-sort" href="#" data-product-id="5192" data-sort="worst">
                                                    Nhận xét tệ nhất                                        </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="list_comment width_common">
                                <div class="item_comment">
                                    <div class="title_comment space_bottom_5 left">
                                        <div class="block_start start_small">
                                            <div class="number_start" style="width:100%;"></div>
                                            <div class="start_background"></div>
                                        </div>
                                        <strong class="txt_color_1">Uyên Ngọc</strong>

                                    </div>
                                    <div class="timer_comment txt_666 space_bottom_5 right">
                                        13:04 | 08/03/2018                         </div>
                                    <div class="txt_999 width_common">Son Lì Giữ Màu Ruby Woo Màu Đỏ - 3g                            | <span class="bought">Đã mua hàng</span></div>
                                    <div class="content_comment">
                                        Son đẹp, mùi thơm, đóng gói rất gọn gàng và thời gian giao hàng cực kỳ nhanh dù là trong ngày lễ! Cám ơn shop nhiều lắm ạ ^^                        </div>
                                </div>
                                <div class="item_comment">
                                    <div class="title_comment space_bottom_5 left">
                                        <div class="block_start start_small">
                                            <div class="number_start" style="width:100%;"></div>
                                            <div class="start_background"></div>
                                        </div>
                                        <strong class="txt_color_1">Anh Phạm</strong>

                                    </div>
                                    <div class="timer_comment txt_666 space_bottom_5 right">
                                        05:58 | 02/02/2018                         </div>
                                    <div class="txt_999 width_common">Son Lì Giữ Màu Ruby Woo Màu Đỏ - 3g                            </div>
                                    <div class="content_comment">
                                        Đáng tiền                        </div>
                                </div>
                                <div class="item_comment">
                                    <div class="title_comment space_bottom_5 left">
                                        <div class="block_start start_small">
                                            <div class="number_start" style="width:100%;"></div>
                                            <div class="start_background"></div>
                                        </div>
                                        <strong class="txt_color_1">Huỳnh Anh Thư</strong>

                                    </div>
                                    <div class="timer_comment txt_666 space_bottom_5 right">
                                        12:15 | 27/10/2017                         </div>
                                    <div class="txt_999 width_common">Son Lì Giữ Màu Ruby Woo Màu Đỏ - 3g                            </div>
                                    <div class="content_comment">
                                        Good                        </div>
                                </div>
                                <div class="item_comment">
                                    <div class="title_comment space_bottom_5 left">
                                        <div class="block_start start_small">
                                            <div class="number_start" style="width:100%;"></div>
                                            <div class="start_background"></div>
                                        </div>
                                        <strong class="txt_color_1">Hiệp Trần</strong>

                                    </div>
                                    <div class="timer_comment txt_666 space_bottom_5 right">
                                        10:28 | 20/07/2017                         </div>
                                    <div class="txt_999 width_common">Son Lì Giữ Màu Impassioned Màu Hồng - 3g                            </div>
                                    <div class="content_comment">
                                        tốt                        </div>
                                </div>
                                <div class="item_comment">
                                    <div class="title_comment space_bottom_5 left">
                                        <div class="block_start start_small">
                                            <div class="number_start" style="width:100%;"></div>
                                            <div class="start_background"></div>
                                        </div>
                                        <strong class="txt_color_1">Hiệp Trần</strong>

                                    </div>
                                    <div class="timer_comment txt_666 space_bottom_5 right">
                                        10:25 | 20/07/2017                         </div>
                                    <div class="txt_999 width_common">Son Lì Giữ Màu Lady Danger Màu Cam - 3g                            </div>
                                    <div class="content_comment">
                                        tốt                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane product-pane fade clearfix" id="answer">
                <div id="box_qa" class="item_box_col_right space_bottom_20">
                    <div class="title_common_site">
                        Hỏi đáp
                    </div>
                    <div class="content_common_site">
                        <div class="block_book_quest">
                            <form id="dat-cau-hoi" novalidate="novalidate">
                                <input data-validate="{required:true, required-entry: true}" name="new_question" id="new_question" type="text" placeholder="Bạn có câu hỏi với sản phẩm này? Đặt câu hỏi ngay." class="form-control">
                            </form>
                            <button class="btn btn_site_1" id="sendQA">Gửi</button>
                        </div>
                        <div class="list_item_quest">
                            <div class="item_quest">
                                <div class="txt_color_1">Ngô Bích Ngọc - 23/03/2018</div>
                                <div class="txt_quest"><strong>Cho e hỏi son này thuộc dòng retro matte mà sao e thấy shop đề thuộc dòng matte vậy ạ</strong></div>
                                <div class="block_more_answear">
                                    <a href="javascript:;" class="qa_like" data-id="22018">Thích</a>
                                    <img src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/icon_like.png" width="10px">
                                    <span class="number_like">
                    <span class="txt_number txt_color_1">0</span>
                </span>
                                    - <a href="javascript:;" class="qa_reply" data-id="22018">Trả lời</a>
                                </div>

                                <div class="list_ans">
                                    <div style="display:none" class="input_ans_qa 22018">
                                        <div class="block_book_quest">
                                            <form novalidate="novalidate">
                                                <textarea placeholder="Nội dung trả lời của bạn." class="form-control reply_content 22018"></textarea>
                                            </form>
                                            <button class="btn btn_site_1 send-reply" data="22018">Gửi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item_quest">
                                <div class="txt_color_1">Quỳnh Nguyễn Lê - 19/03/2018</div>
                                <div class="txt_quest"><strong>Màu Kinda Sexy và Velvet Teddy khác nhau chỗ nào vậy ạ</strong></div>
                                <div class="block_more_answear">
                                    <a href="javascript:;" class="qa_like" data-id="21589">Thích</a>
                                    <img src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/icon_like.png" width="10px">
                                    <span class="number_like">
                    <span class="txt_number txt_color_1">0</span>
                </span>
                                    - <a href="javascript:;" class="qa_reply" data-id="21589">Trả lời</a>
                                </div>

                                <div class="list_ans">
                                    <div class="item_ans">
                                        <div class=" space_bottom_5">
                                            <span class="hasakitraloi">Hasaki</span>
                                            - <span class="txt_999">20/03/2018                        </span></div>
                                        <div class="txt_answear txt_666">Hasaki chào bạn, 2 tông đều màu đất và màu Velvet Teddy sẽ đậm hơn Kinda Sexy nha bạn. Màu Kinda Sexy là cam đất nhạt thiên cam còn Velvet Teddy sẽ đậm hơn thiên nâu nhé bạn</div>

                                        <a href="javascript:;" class="ans_like txt_color_1" data-id="18097">Thích</a> <img src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/icon_like.png" width="14px"> <span class="txt_color_1 num_like">0</span>
                                        - <a href="javascript:;" class="qa_reply ans" data-reply="Hasaki" data-id="21589">Trả lời</a>
                                    </div>
                                    <div class="view-more-ans more-ans-21589 hide">
                                    </div>
                                    <div style="display:none" class="input_ans_qa 21589">
                                        <div class="block_book_quest">
                                            <form novalidate="novalidate">
                                                <textarea placeholder="Nội dung trả lời của bạn." class="form-control reply_content 21589"></textarea>
                                            </form>
                                            <button class="btn btn_site_1 send-reply" data="21589">Gửi</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="block_more_answear">
                                </div>
                            </div>
                            <div class="item_quest">
                                <div class="txt_color_1">Kim Xuân - 12/03/2018</div>
                                <div class="txt_quest"><strong>Màu hồng thì có loại nào vậy shop?</strong></div>
                                <div class="block_more_answear">
                                    <a href="javascript:;" class="qa_like" data-id="21029">Thích</a>
                                    <img src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/icon_like.png" width="10px">
                                    <span class="number_like">
                    <span class="txt_number txt_color_1">0</span>
                </span>
                                    - <a href="javascript:;" class="qa_reply" data-id="21029">Trả lời</a>
                                </div>

                                <div class="list_ans">
                                    <div class="item_ans">
                                        <div class=" space_bottom_5">
                                            <span class="hasakitraloi">Hasaki</span>
                                            - <span class="txt_999">13/03/2018                        </span></div>
                                        <div class="txt_answear txt_666">Hasaki chào bạn, màu hồng thì có candy yum yum, all fire up, fanfare, pink pigeon, speak louder nhé bạn</div>

                                        <a href="javascript:;" class="ans_like txt_color_1" data-id="17636">Thích</a> <img src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/icon_like.png" width="14px"> <span class="txt_color_1 num_like">0</span>
                                        - <a href="javascript:;" class="qa_reply ans" data-reply="Hasaki" data-id="21029">Trả lời</a>
                                    </div>
                                    <div class="view-more-ans more-ans-21029 hide">
                                    </div>
                                    <div style="display:none" class="input_ans_qa 21029">
                                        <div class="block_book_quest">
                                            <form novalidate="novalidate">
                                                <textarea placeholder="Nội dung trả lời của bạn." class="form-control reply_content 21029"></textarea>
                                            </form>
                                            <button class="btn btn_site_1 send-reply" data="21029">Gửi</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="block_more_answear">
                                </div>
                            </div>
                            <div class="item_quest">
                                <div class="txt_color_1">Mỹ Liên - 10/03/2018</div>
                                <div class="txt_quest"><strong>Cho em hỏi nếu phát hiện son mac không chúnh hãng thì có được trả lại ko ạ</strong></div>
                                <div class="block_more_answear">
                                    <a href="javascript:;" class="qa_like" data-id="20908">Thích</a>
                                    <img src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/icon_like.png" width="10px">
                                    <span class="number_like">
                    <span class="txt_number txt_color_1">0</span>
                </span>
                                    - <a href="javascript:;" class="qa_reply" data-id="20908">Trả lời</a>
                                </div>

                                <div class="list_ans">
                                    <div class="item_ans">
                                        <div class=" space_bottom_5">
                                            <span class="hasakitraloi">Hasaki</span>
                                            - <span class="txt_999">12/03/2018                        </span></div>
                                        <div class="txt_answear txt_666">Hasaki chào bạn, shop cam đoan sản phẩm chính hãng có tem phụ tiếng Việt của nhà phân phối nhé bạn. Bạn có thể đổi trả nếu không hài lòng và với điều kiện nếu sản phẩm chưa sử dụng, đồng thời còn trong 14 ngày kể từ ngày mua hàng và có hóa đơn hoặc thông tin mua hàng bên shop nhé. Bạn có thể mang sản phẩm đến shop để đổi lại sản phẩm khác. Lưu ý shop không hoàn lại tiền mà chỉ đổi sản phẩm khác nhé bạn</div>

                                        <a href="javascript:;" class="ans_like txt_color_1" data-id="17513">Thích</a> <img src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/icon_like.png" width="14px"> <span class="txt_color_1 num_like">1</span>
                                        - <a href="javascript:;" class="qa_reply ans" data-reply="Hasaki" data-id="20908">Trả lời</a>
                                    </div>
                                    <div class="view-more-ans more-ans-20908 hide">
                                    </div>
                                    <div style="display:none" class="input_ans_qa 20908">
                                        <div class="block_book_quest">
                                            <form novalidate="novalidate">
                                                <textarea placeholder="Nội dung trả lời của bạn." class="form-control reply_content 20908"></textarea>
                                            </form>
                                            <button class="btn btn_site_1 send-reply" data="20908">Gửi</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="block_more_answear">
                                </div>
                            </div>
                            <div class="item_quest">
                                <div class="txt_color_1">Thư Minh - 07/03/2018</div>
                                <div class="txt_quest"><strong>Mac lady danger khác mac dangerous gì ạ</strong></div>
                                <div class="block_more_answear">
                                    <a href="javascript:;" class="qa_like" data-id="20590">Thích</a>
                                    <img src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/icon_like.png" width="10px">
                                    <span class="number_like">
                    <span class="txt_number txt_color_1">0</span>
                </span>
                                    - <a href="javascript:;" class="qa_reply" data-id="20590">Trả lời</a>
                                </div>

                                <div class="list_ans">
                                    <div class="item_ans">
                                        <div class=" space_bottom_5">
                                            <span class="hasakitraloi">Hasaki</span>
                                            - <span class="txt_999">07/03/2018                        </span></div>
                                        <div class="txt_answear txt_666">Hasaki chào bạn, màu lady danger  cam sáng hơn dangerous tí nhé bạn</div>

                                        <a href="javascript:;" class="ans_like txt_color_1" data-id="17362">Thích</a> <img src="https://hasaki.vn/static/frontend/Hasaki/default/vi_VN/images/graphics/icon_like.png" width="14px"> <span class="txt_color_1 num_like">0</span>
                                        - <a href="javascript:;" class="qa_reply ans" data-reply="Hasaki" data-id="20590">Trả lời</a>
                                    </div>
                                    <div class="view-more-ans more-ans-20590 hide">
                                    </div>
                                    <div style="display:none" class="input_ans_qa 20590">
                                        <div class="block_book_quest">
                                            <form novalidate="novalidate">
                                                <textarea placeholder="Nội dung trả lời của bạn." class="form-control reply_content 20590"></textarea>
                                            </form>
                                            <button class="btn btn_site_1 send-reply" data="20590">Gửi</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="block_more_answear">
                                </div>
                            </div>
                        </div>
                        <div class="block_btn_view_all_qa view-more-qa">
                            <a class="btn btn_site_1" href="javascript:;">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane product-pane fade clearfix" id="params">

                <table cellspacing="0" cellpadding="0" border="0" class="tb_info_sanpham" id="product-attribute-specs-table">
                    <tbody>
                    <?php if($nameTrademark['_custom_product_trademark_metabox']) : ?>
                    <tr>
                        <td class="col_tb_info_sp bg_info_sp">Thương Hiệu</td>
                        <td><?php echo $nameTrademark['_custom_product_trademark_metabox']['0']; ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if($nameOrigin['_custom_product_origin']) : ?>
                    <tr>
                        <td class="col_tb_info_sp bg_info_sp">Xuất xứ</td>
                        <td><?php echo $nameOrigin['_custom_product_origin']['0'] ?></td>
                    </tr>
                    <?php endif; ?>
                    <!--<tr>
                        <td class="col_tb_info_sp bg_info_sp">Quy cách đóng gói</td>
                        <td>3gr</td>
                    </tr>-->
                    <?php if($nameProduction['_custom_product_production']) : ?>
                    <tr>
                        <td class="col_tb_info_sp bg_info_sp">Nơi sản xuất</td>
                        <td><?php echo $nameProduction['_custom_product_production']['0'] ?></td>
                    </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
</div>