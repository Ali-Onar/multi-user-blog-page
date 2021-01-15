<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
    <ul class="settings-title">
        <li class="active"><a href="javascript:void(0)"><b>Üye İşlemleri</b></a></li>

        <?php
        if ($kullanicicek['kullanici_magaza']!=2) { ?>

            <li><a href="magaza-basvuru">Mağaza Başvuru</a></li>

        <?php } ?>

        <li><a href="sifre-guncelle">Siparişlerim</a></li>
        <li><a href="hesabim">Hesap Bilgilerim</a></li>
        <li><a href="adres-bilgileri">Adres Bilgilerim</a></li>
        <li><a href="sifre-guncelle">Şifre Güncelle</a></li>
    </ul>

<br>
    <?php
    if ($kullanicicek['kullanici_magaza']==2) { ?>
    
        <ul class="settings-title">
            <li class="active"><a href="javascript:void(0)"><b>Mağaza İşlemleri</b></a></li>
            <li><a href="magaza-basvuru">Ürün Ekle</a></li>
            <li><a href="hesabim">Ürünlerim</a></li>
            <li><a href="adres-bilgileri">Yeni Siparişler</a></li>
            <li><a href="sifre-guncelle">Tamamlanan Siparişler</a></li>
            <li><a href="sifre-guncelle">Mesajlar</a></li>
            <li><a href="sifre-guncelle">Ayarlar</a></li>
        </ul>

    <?php } ?>
</div>