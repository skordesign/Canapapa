<?php
    //Info website
    $Phone = get_theme_mod('Phone');
    $Addr_web = get_theme_mod('Addr_web');
    $Skype = get_theme_mod('Skype');
    $Email = get_theme_mod('Email');

?>
<div class="col-sm-4 col-md-3 sub-data-right sub-equal">
    <div class="row">
        <section class="col-sm-12">
            <h5 class="sub-title text-info text-uppercase">Địa chỉ</h5>
            <p><?php echo $Addr_web ?></p>
            <span class="small"> <span
                        class="text-info text-capitalize"> <strong>Điện thoại</strong> :</span><br><?php echo $Phone ?><br>
<span class="text-info text-capitalize"> <strong>Email</strong> :</span><br> <?php echo $Email ?>
</span>
            <p></p>
        </section>
        <section class="col-sm-12">
            <h5 class="sub-title text-info text-uppercase">Skype</h5>
            <p><i class="fa fa-skype"></i><?php echo $Skype ?>
            </p>
        </section>
    </div>
</div>