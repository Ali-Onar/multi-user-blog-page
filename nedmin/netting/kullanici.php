<?php

include 'baglan.php';
include '../production/fonksiyon.php';

// KULLANICI KAYIT İŞLEMLERİ
if (isset($_POST['kullanicikaydet'])) {

    // xss açığı ve script saldırılarına karşı: htmlspecialchars
    // sağında solunda boşlukları yok ediyor: trim

    $kullanici_ad = htmlspecialchars($_POST['kullanici_ad']);
    $kullanici_soyad = htmlspecialchars($_POST['kullanici_soyad']);
    $kullanici_mail = htmlspecialchars($_POST['kullanici_mail']);

    $kullanici_passwordone = htmlspecialchars(trim($_POST['kullanici_passwordone']));
    $kullanici_passwordtwo = htmlspecialchars(trim($_POST['kullanici_passwordtwo']));

    if ($kullanici_passwordone == $kullanici_passwordtwo) {

        if (strlen($kullanici_passwordone) >= 6) {
            // Başlangıç

            $kullanicisor = $db->prepare("select * from kullanici where kullanici_mail=:mail");
            $kullanicisor->execute(array(
                'mail' => $kullanici_mail
            ));

            //dönen satır sayısını belirtir
            $say = $kullanicisor->rowCount();



            if ($say == 0) {

                //md5 fonksiyonu şifreyi md5 şifreli hale getirir.
                $password = md5($kullanici_passwordone);

                $kullanici_yetki = 1;

                //Kullanıcı kayıt işlemi yapılıyor...
                $kullanicikaydet = $db->prepare("INSERT INTO kullanici SET
					kullanici_ad=:kullanici_ad,
                    kullanici_soyad=:kullanici_soyad,
					kullanici_mail=:kullanici_mail,
					kullanici_password=:kullanici_password,
					kullanici_yetki=:kullanici_yetki
					");
                $insert = $kullanicikaydet->execute(array(
                    'kullanici_ad' => $kullanici_ad,
                    'kullanici_soyad' => $kullanici_soyad,
                    'kullanici_mail' => $kullanici_mail,
                    'kullanici_password' => $password,
                    'kullanici_yetki' => $kullanici_yetki
                ));

                if ($insert) {


                    header("Location:../../login?durum=kayitok");


                    //Header("Location:../production/genel-ayarlar.php?durum=ok");

                } else {


                    header("Location:../../register?durum=basarisiz");
                }
            } else {

                header("Location:../../register?durum=mukerrerkayit");
            }

            //Bitiş
        } else {
            header("Location: ../../register?durum=eksiksifre");
        }
    } else {
        header("Location: ../../register?durum=farklisifre");
    }
}


if (isset($_POST['kullanicigiris'])) {

    echo $kullanici_mail = htmlspecialchars($_POST['kullanici_mail']);
    echo $kullanici_password = htmlspecialchars(md5($_POST['kullanici_password']));

    $kullanicisor = $db->prepare("SELECT * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
    $kullanicisor->execute(array(
        'mail' => $kullanici_mail,
        'yetki' => 1,
        'password' => $kullanici_password,
        'durum' => 1
    ));

    $say = $kullanicisor->rowCount();

    if ($say == 1) {

        $_SESSION['userkullanici_mail'] = $kullanici_mail;

        header("Location:../../index.php?durum=girisbasarili");
        exit;
    } else {

        header("Location:../../login?durum=hata");
    }
}

if (isset($_POST['kullanicibilgiguncelle'])) {


    $kullaniciguncelle = $db->prepare("UPDATE kullanici SET
    kullanici_ad =:kullanici_ad, 
    kullanici_soyad =:kullanici_soyad, 
    kullanici_gsm =:kullanici_gsm
    where kullanici_id={$_SESSION['userkullanici_id']}
    ");

    $update = $kullaniciguncelle->execute(array(
        'kullanici_ad' => htmlspecialchars($_POST['kullanici_ad']),
        'kullanici_soyad' => htmlspecialchars($_POST['kullanici_soyad']),
        'kullanici_gsm' => htmlspecialchars($_POST['kullanici_gsm'])
    ));

    if ($update) {
        Header("Location: ../../hesabim.php?durum=ok");
    } else {
        Header("Location: ../../hesabim.php?durum=hata");
    }
}


if (isset($_POST['kullaniciadresguncelle'])) {


    $kullaniciguncelle = $db->prepare("UPDATE kullanici SET
    kullanici_tip =:kullanici_tip, 
    kullanici_tc =:kullanici_tc, 
    kullanici_unvan =:kullanici_unvan,
    kullanici_vdaire =:kullanici_vdaire,
    kullanici_vno =:kullanici_vno,
    kullanici_adres =:kullanici_adres,
    kullanici_il =:kullanici_il,
    kullanici_ilce =:kullanici_ilce
    where kullanici_id={$_SESSION['userkullanici_id']}
    ");

    $update = $kullaniciguncelle->execute(array(
        'kullanici_tip' => htmlspecialchars($_POST['kullanici_tip']),
        'kullanici_tc' => htmlspecialchars($_POST['kullanici_tc']),
        'kullanici_unvan' => htmlspecialchars($_POST['kullanici_unvan']),
        'kullanici_vdaire' => htmlspecialchars($_POST['kullanici_vdaire']),
        'kullanici_adres' => htmlspecialchars($_POST['kullanici_adres']),
        'kullanici_vno' => htmlspecialchars($_POST['kullanici_vno']),
        'kullanici_il' => htmlspecialchars($_POST['kullanici_il']),
        'kullanici_ilce' => htmlspecialchars($_POST['kullanici_ilce'])
    ));

    if ($update) {
        Header("Location: ../../adres-bilgileri.php?durum=ok");
    } else {
        Header("Location: ../../adres-bilgileri.php?durum=hata");
    }
}


if (isset($_POST['kullanicisifreguncelle'])) {

    $kullanici_eskipassword = htmlspecialchars($_POST['kullanici_eskipassword']);
    $kullanici_passwordone = htmlspecialchars($_POST['kullanici_passwordone']);
    $kullanici_passwordtwo = htmlspecialchars($_POST['kullanici_passwordtwo']);

    $kullanici_password = md5($kullanici_eskipassword);

    $kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_password=:password");
    $kullanicisor->execute(array(
        'password' => $kullanici_password
    ));

    $say = $kullanicisor->rowCount();

    if ($say == 0) {
        Header("Location:../../sifre-guncelle?durum=eskisifrehata");
        exit;
    }

    if ($kullanici_passwordone==$kullanici_passwordtwo) {

        if (strlen($kullanici_passwordone)>=6) {

            $sifre = md5($kullanici_passwordone);

            $kullaniciguncelle=$db->prepare("UPDATE kullanici SET

            kullanici_password=:kullanici_password

        where kullanici_id={$_SESSION['userkullanici_id']}
        ");

            $update = $kullaniciguncelle->execute(array(

                'kullanici_password' => $sifre

            ));

            if ($update) {
                Header("Location: ../../sifre-guncelle.php?durum=ok");
            } else {
                Header("Location: ../../sifre-guncelle.php?durum=hata");
            }

        } 
        else {
            Header("Location:../../sifre-guncelle?durum=eksiksifre");
            exit;
        }

    } 
    else {
        Header("Location:../../sifre-guncelle?durum=sifreleruyusmuyor");
        exit;
    }
}



if (isset($_POST['kullanicimagazabasvuru'])) {


    $kullaniciguncelle = $db->prepare("UPDATE kullanici SET
    kullanici_ad =:kullanici_ad, 
    kullanici_soyad =:kullanici_soyad, 
    kullanici_gsm =:kullanici_gsm,
    kullanici_banka =:kullanici_banka,
    kullanici_iban =:kullanici_iban,
    kullanici_tip =:kullanici_tip, 
    kullanici_tc =:kullanici_tc, 
    kullanici_unvan =:kullanici_unvan,
    kullanici_vdaire =:kullanici_vdaire,
    kullanici_vno =:kullanici_vno,
    kullanici_adres =:kullanici_adres,
    kullanici_il =:kullanici_il,
    kullanici_ilce =:kullanici_ilce,
    kullanici_magaza =:kullanici_magaza
    where kullanici_id={$_SESSION['userkullanici_id']}
    ");

    $update = $kullaniciguncelle->execute(array(
        'kullanici_ad' => htmlspecialchars($_POST['kullanici_ad']),
        'kullanici_soyad' => htmlspecialchars($_POST['kullanici_soyad']),
        'kullanici_gsm' => htmlspecialchars($_POST['kullanici_gsm']),
        'kullanici_banka' => htmlspecialchars($_POST['kullanici_banka']),
        'kullanici_iban' => htmlspecialchars($_POST['kullanici_iban']),
        'kullanici_tip' => htmlspecialchars($_POST['kullanici_tip']),
        'kullanici_tc' => htmlspecialchars($_POST['kullanici_tc']),
        'kullanici_unvan' => htmlspecialchars($_POST['kullanici_unvan']),
        'kullanici_vdaire' => htmlspecialchars($_POST['kullanici_vdaire']),
        'kullanici_adres' => htmlspecialchars($_POST['kullanici_adres']),
        'kullanici_vno' => htmlspecialchars($_POST['kullanici_vno']),
        'kullanici_il' => htmlspecialchars($_POST['kullanici_il']),
        'kullanici_ilce' => htmlspecialchars($_POST['kullanici_ilce']),
        'kullanici_magaza' => 1
    ));

    if ($update) {
        Header("Location: ../../magaza-basvuru.php");
    } else {
        Header("Location: ../../magaza-basvuru.php?durum=hata");
    }
}