<?php 
    require_once 'conn.php';

    // İnsert İşlemi
    if(isset($_POST['insertislemi']))
    {
        $kaydet = $db->prepare("INSERT INTO bilgiler SET
        
        ad=:ad,
        soyad=:soyad,
        email=:email,
        parola=:parola
        ");
    
        $insert = $kaydet->execute(array(
        'ad' => $_POST['ad'],
        'soyad' => $_POST['soyad'],
        'email' => $_POST['email'],
        'parola' => $_POST['parola']
        ));


    if($insert){
        echo "islem Basarılı";
        header("Location:index.php?durum=ok");
        exit;
    }
    else{
        header("Location:index.php?durum=no");
        exit;
    }
    
    }

    //Update İslemi

    if(isset($_POST['updateislemi']))
    {
        $id = $_POST['id'];
        $kaydet = $db->prepare("UPDATE bilgiler SET
        
        ad=:ad,
        soyad=:soyad,
        email=:email,
        parola=:parola
        where id= {$_POST['id']}
        ");
    
        $insert = $kaydet->execute(array(
        'ad' => $_POST['ad'],
        'soyad' => $_POST['soyad'],
        'email' => $_POST['email'],
        'parola' => $_POST['parola']
        ));
   

    if($insert){
        header("Location:index.php?durum=ok&id=$id");
        echo "İşlem başarıılı";
        exit;
    }
    else{
        header("Location:index.php?durum=no&id=$id");
        exit;
    }

}

if($_GET['sil']=="ok")
{
    $sil = $db->prepare("DELETE From bilgiler where id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET["id"]
    ));

    if($kontrol){
        header("Location:index.php?durum=ok");
        exit;
    }
    else{
        header("Location:index.php?durum=no");
        exit;
    }
}


?>