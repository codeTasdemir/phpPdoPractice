<?php
    require_once 'conn.php';

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ders Çalışması</title>
    <link rel="stylesheet" href="sstyle.css">
</head>
<body>

    <h3>Dizi Örneği</h3>
<?php
    $dizi = array("Falanca","Filanca","hello","World","Mustafa","Taşdemir");
    foreach ($dizi as $isimler ) {
        echo $isimler . " " ;
    }
?>

<br><hr>
<?php
if(isset($_POST['gonder'])){
    if($_GET['durum']=='ok')
    {
        echo "İşlem Başarılı";
    }
    elseif($_GET['durum']=='no'){
        echo "İşlem başarısız";
    }
}
?>
<div class="indexDiv">
<h3>PDO Veritabanı İnsert Çalışması</h3>
<form class="indexForm" action="operation.php" method="post">
    Ad <br><input type="text"  name="ad" placeholder="Adınızı Giriniz"> <br>
    Soyad <br><input type="text"  name="soyad" placeholder="Soyadınızı Giriniz"> <br>
    Email <br><input type="email"  name="email" placeholder="Email Giriniz"> <br>
    Parola <br><input type="password"  name="parola" placeholder="Parola Giriniz"> <br>
    <br><input type="submit" value="gonder" name="insertislemi">    
</form>

</div>
<hr>



        <table class="indexTable" border="1px" >
        <h4>Kayıtların Pdo ile Listelenmesi</h4>

            <tr>
                <th> ID</th>
                <th> AD</th>
                <th> Soyad</th>
                <th> Email</th>
                <th> Parola</th>
                <th width="50">İşlemler</th>
                <th width="50">İşlemler</th>
            </tr>
            
    <?php
        $bilgiler_tablo = $db->prepare("SELECT * from bilgiler");
        $bilgiler_tablo->execute();
    
        while($bilgiler_tablo_cek = $bilgiler_tablo->fetch(PDO::FETCH_ASSOC)){
            ?>
        
            <tr>
                <td> <?php echo $bilgiler_tablo_cek['id']; ?> </td>
                <td> <?php echo $bilgiler_tablo_cek['ad']; ?> </td>
                <td> <?php echo $bilgiler_tablo_cek['soyad']; ?> </td>
                <td> <?php echo $bilgiler_tablo_cek['email']; ?> </td>
                <td><input type="password" disabled value="<?php echo $bilgiler_tablo_cek['parola']; ?>"></input> </td>
                <td align="center"><a href="duzenle.php?id=<?php echo $bilgiler_tablo_cek['id'];?>"><button>Düzenle</button></a></td>
                <td align="center"><a href="operation.php?id=<?php echo $bilgiler_tablo_cek['id'];?>&sil=ok"><button>Sil</button></a></td>

            </tr>
            <?php } ?>
        </table>


</body>
</html>