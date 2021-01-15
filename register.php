﻿<?php include 'header.php' ?>


<!-- Registration Page Area Start Here -->
<div class="registration-page-area bg-secondary section-space-bottom">
    <div class="container">
        <h2 class="title-section">Üye Kayıt İşlemleri</h2>
        <div class="registration-details-area inner-page-padding">

            <?php

            if (@$_GET['durum'] == "farklisifre") { ?>

                <div class="alert alert-danger">
                    <strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
                </div>

            <?php } elseif (@$_GET['durum'] == "eksiksifre") { ?>

                <div class="alert alert-danger">
                    <strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
                </div>

            <?php } elseif (@$_GET['durum'] == "mukerrerkayit") { ?>

                <div class="alert alert-danger">
                    <strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
                </div>

            <?php } elseif (@$_GET['durum'] == "basarisiz") { ?>

                <div class="alert alert-danger">
                    <strong>Hata!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız.
                </div>

            <?php }
            ?>

            <form action="nedmin/netting/kullanici.php" method="POST" id="personal-info-form">


                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="last-name">Mail Adresiniz *</label>
                            <input type="mail" id="last-name" required="" name="kullanici_mail" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="first-name">Adınız *</label>
                            <input type="text" id="first-name" required="" name="kullanici_ad" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="last-name">Soyadınız *</label>
                            <input type="text" id="last-name" required="" name="kullanici_soyad" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="email">Parolanız *</label>
                            <input type="password" id="email" required="" name="kullanici_passwordone" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="phone">Parolanız Tekrar *</label>
                            <input type="password" id="phone" required="" name="kullanici_passwordtwo" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="pLace-order">
                            <button class="update-btn disabled" type="submit" name="kullanicikaydet">Kayıt Yap</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Registration Page Area End Here -->

<?php include 'footer.php' ?>