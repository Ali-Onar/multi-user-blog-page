<?php include 'header.php' ?>


<!-- Registration Page Area Start Here -->
<div class="registration-page-area bg-secondary section-space-bottom">
    <div class="container">
        <h2 class="title-section">Üye Kayıt İşlemleri</h2>
        <div class="registration-details-area inner-page-padding">

            <?php

            if (@$_GET['durum'] == "hata") { ?>

                <div class="alert alert-danger">
                    <strong>Upss!</strong> Hatalı Giriş.
                </div>

            <?php } ?>

            <form action="nedmin/netting/kullanici.php" method="POST" id="personal-info-form">

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="first-name">Mail Adresiniz *</label>
                            <input type="text" id="first-name" required="" name="kullanici_mail" class="form-control">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="last-name">Parolanız *</label>
                            <input type="password" id="last-name" required="" name="kullanici_password" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="pLace-order">
                            <button class="update-btn disabled" type="submit" name="kullanicigiris">Giriş Yap</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- Registration Page Area End Here -->

<?php include 'footer.php' ?>