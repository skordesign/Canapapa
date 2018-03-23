<?php
global $getProductDetail;
?>
<div class="col-sm-12 accordion">
    <div role="tabpanel">
        <ul id="product-tabs" class="nav nav-tabs text-uppercase" role="tablist">
            <li role="presentation" class="active"><a href="#descreption" aria-controls="descreption" role="tab" data-toggle="tab" aria-expanded="true">Mô tả</a></li>
            <li role="presentation" class=""><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab" aria-expanded="false">Nhận xét</a></li>
            <li role="presentation" class=""><a href="#tags" aria-controls="tags" role="tab" data-toggle="tab" aria-expanded="false"> Viết nhận xét</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane product-pane fade clearfix active in" id="descreption">
                <?php echo $getProductDetail->post_content ?>
            </div>
            <div role="tabpanel" class="tab-pane product-pane fade clearfix" id="reviews">
                <div class="single-review clearfix">
                    <h5 class="text-primary">Nguyễn Thị Cúc<small class=" text-info"><strong>18 tháng 3, 2015</strong></small> </h5>
                    <p><span class="reviews-ratings text-info"><i class="ion-android-star"></i> <i class="ion-android-star"></i> <i class="ion-android-star"></i> <i class="ion-android-star"></i> <i class="ion-android-star-half"></i></span></p>
                    <p>Sản phẩm rất tốt</p>
                    <hr>
                </div>
                <div class="single-review clearfix">
                    <h5 class="text-primary">Nguyễn Thục Hiền<small class=" text-info"><strong> 21 tháng 4, 2015</strong></small> </h5>
                    <p><span class="reviews-ratings text-info"><i class="ion-android-star"></i> <i class="ion-android-star"></i> <i class="ion-android-star"></i> <i class="ion-android-star"></i> <i class="ion-android-star-half"></i></span></p>
                    <p> Tôi rất hài lòng về sản phẩm</p>
                    <hr>
                </div>
                <div class="single-review clearfix">
                    <h5 class="text-primary">Nguyễn An Đông<small class=" text-info"><strong> 17 tháng 9, 2015</strong></small> </h5>
                    <p><span class="reviews-ratings text-info"><i class="ion-android-star"></i> <i class="ion-android-star"></i> <i class="ion-android-star"></i> <i class="ion-android-star"></i> <i class="ion-android-star-half"></i></span></p>
                    <p>Một sản phẩm tuyệt vời</p>
                    <hr>
                </div>
                <div class="single-review clearfix">
                    <h5 class="text-primary">Trần Thị Phương<small class=" text-info"><strong> 17 tháng 8, 2015</strong></small> </h5>
                    <p><span class="reviews-ratings text-info"><i class="ion-android-star"></i> <i class="ion-android-star"></i> <i class="ion-android-star"></i> <i class="ion-android-star"></i> <i class="ion-android-star-half"></i></span></p>
                    <p>Nhất định sẽ mua sản phẩm này lần nữa</p>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane product-pane fade clearfix" id="tags">
                <form role="form">
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label" for="exampleInputName">Họ tên <span class="req">*</span></label>
                                <input type="text" placeholder="" id="exampleInputName" class="form-control txt">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputSummary">Email <span class="req">*</span></label>
                                <input type="text" placeholder="" id="exampleInputSummary" class="form-control txt">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="exampleInputReview">Nội dung <span class="req">*</span></label>
                                <textarea placeholder="" rows="4" id="exampleInputReview" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="action">
                        <button class="btn btn-primary hvr-underline-from-center-primary">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
</div>