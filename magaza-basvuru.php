<?php

include 'header.php';

islemkontrol();

?>


<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">

        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Settings Page Start Here -->
<div class="settings-page-area bg-secondary section-space-bottom">
    <div class="container">


        <div class="row settings-wrapper">


            <?php

            include 'hesap-sidebar.php'

            ?>

            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">

                <?php

                if (@$_GET['durum'] == "hata") { ?>

                    <div class="alert alert-danger">
                        <strong>Hata!</strong> İşlem Başarısız.
                    </div>

                <?php } else if (@$_GET['durum'] == "ok") { ?>

                    <div class="alert alert-success">
                        <strong>Bilgi!</strong> İşlem Başarılı.
                    </div>

                <?php } else if (@$_GET['durum'] == "eskisifrehata") { ?>

                    <div class="alert alert-danger">
                        <strong>Hata!</strong> Eski Şifreniz Hatalı!
                    </div>

                <?php } else if (@$_GET['durum'] == "sifreleruyusmuyor") { ?>

                    <div class="alert alert-danger">
                        <strong>Hata!</strong> Şifreler Uyuşmuyor!
                    </div>

                <?php } else if (@$_GET['durum'] == "eksiksifre") { ?>

                    <div class="alert alert-danger">
                        <strong>Hata!</strong> Şifreniz en az 6 karakter olmalı!
                    </div>

                <?php } ?>



                <div class="settings-details tab-content">

                    <div class="tab-pane fade active in" id="Personal">
                        <h2 class="title-section">Adres Bilgilerimi Düzenle</h2>
                        <div class="personal-info inner-page-padding">
                            <form action="nedmin/netting/kullanici.php" method="POST" class="form-horizontal" id="personal-info-form">
                                <?php if ($kullanicicek['kullanici_magaza'] == 0) { ?>

                                    <p>Başvuru bilgilerinizin doğru ve eksiksiz olduğuna özen gösteriniz. Eksik bilgi doldurursanız başvurunuz
                                        iptal edilecektir.</p>
                                    <hr>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Banka Adı</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="first-name" name="kullanici_banka" value="<?php echo $kullanicicek['kullanici_banka'] ?>" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">İban Numaranız</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="first-name" name="kullanici_iban" value="<?php echo $kullanicicek['kullanici_iban'] ?>" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Mail Adresiniz</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="first-name" name="kullanici_mail" disabled="" value="<?php echo $kullanicicek['kullanici_mail'] ?>" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Adınız</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="first-name" name="kullanici_ad" value="<?php echo $kullanicicek['kullanici_ad'] ?>" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Soyadınız</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="last-name" name="kullanici_soyad" value="<?php echo $kullanicicek['kullanici_soyad'] ?>" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Telefon GSM</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="company-name" name="kullanici_gsm" value="<?php echo $kullanicicek['kullanici_gsm'] ?>" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Kişisel / Kurumsal</label>
                                        <div class="col-sm-9">
                                            <div class="custom-select">
                                                <select name="kullanici_tip" id="kullanici_tip" class='select2'>
                                                    <option <?php
                                                            if ($kullanicicek['kullanici_tip'] == "PERSONAL") {
                                                                echo "selected";
                                                            }
                                                            ?> value="PERSONAL">Kişisel</option>

                                                    <option <?php
                                                            if ($kullanicicek['kullanici_tip'] == "PRIVATE_COMPANY") {
                                                                echo "selected";
                                                            }
                                                            ?> value="PRIVATE_COMPANY">Kurumsal</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="tc">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">TC</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="first-name" name="kullanici_tc" value="<?php echo $kullanicicek['kullanici_tc'] ?>" type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div id="kurumsal">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Firma Ünvan</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="first-name" name="kullanici_unvan" value="<?php echo $kullanicicek['kullanici_unvan'] ?>" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Firma Dairesi</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="first-name" name="kullanici_vdaire" value="<?php echo $kullanicicek['kullanici_vdaire'] ?>" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Firma Vergi No</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="first-name" name="kullanici_vno" value="<?php echo $kullanicicek['kullanici_vno'] ?>" type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Açık Adres *</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" required="" id="first-name" name="kullanici_adres" value="<?php echo $kullanicicek['kullanici_adres'] ?>" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">İl *</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" required="" id="first-name" name="kullanici_il" value="<?php echo $kullanicicek['kullanici_il'] ?>" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">İlçe *</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" required="" id="first-name" name="kullanici_ilce" value="<?php echo $kullanicicek['kullanici_ilce'] ?>" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Onay *</label>
                                        <div class="col-sm-9">
                                            <div class="checkbox">
                                                <label><input required="" type="checkbox" value="">Kullanım şartlarını kabul ediyorum.</label>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <div align="right" class="col-sm-12">
                                            <button name="kullanicimagazabasvuru" class="update-btn" id="login-update">Başvuruyu Tamamla</button>
                                        </div>
                                    </div>

                            </form>


                        <?php } else if ($kullanicicek['kullanici_magaza'] == 1) { ?>
                            <div class="alert alert-success">
                                <strong>Bilgi!</strong> Başvurunuz Onay Aşamasında.
                            </div>
                        <?php } else if ($kullanicicek['kullanici_magaza'] == 2) { ?>
                            <div class="alert alert-success">
                                <strong>Bilgi!</strong> Başvurunuz Onaylandı.
                            </div>
                        <?php } ?>
                        </div>
                    </div>

                </div>




            </div>
        </div>
    </div>
</div>
<!-- Settings Page End Here -->

<?php include 'footer.php' ?>