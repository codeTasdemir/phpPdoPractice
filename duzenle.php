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
    <link rel="stylesheet" href="style.css">
</head>
<body>

	<hr>
	<?php 

    // Düzenle.php sayfasındaki veriler değiştirildikten sonra url Get metod ile gelen durum değişkeni sayesinde işlem sonucunun 
    // bilgisi verililir.

    if(isset($_POST['updateislemi'])){
	if ($_GET['durum']=="ok") {
		
		echo "İşlem başarılı";

	} elseif ($_GET['durum']=="no") {

		echo "İşlem başarısız";


	}
}

	?>

<!-- Pdo İle veritabanından verilerin ilgili tabloya çekilmesi    -->
<?php
     $bilgiler_tablo = $db->prepare("SELECT * from bilgiler where id=:id");
     $bilgiler_tablo->execute(array(
         'id' => $_GET["id"]
     ));
     $bilgiler_tablo_cek = $bilgiler_tablo->fetch(PDO::FETCH_ASSOC)
?>
<div class="indexDiv">
<h1>Veritabanı PDO düzenleme işlemleri</h1>

<form class="indexForm" align="center" action="operation.php" method="post">
    id      <br>    <input disabled type="text"  name="ad" value="<?php echo $_GET['id']; ?>"> <br>
    Ad      <br>    <input type="text"  name="ad" value="<?php echo $bilgiler_tablo_cek['ad']; ?>"> <br>
    Soyad   <br>    <input type="text"  name="soyad"  value="<?php echo $bilgiler_tablo_cek['soyad']; ?>"> <br>
    Email   <br>    <input type="email"  name="email" value="<?php echo $bilgiler_tablo_cek['email']; ?>"> <br>
    Parola  <br>    <input type="password"  name="parola"  value="<?php echo $bilgiler_tablo_cek['parola']; ?>"> <br>
                    <input  hidden type="text" value="<?php echo $bilgiler_tablo_cek['id']; ?>" name="id">
            <br>    <input type="submit" value="gonder" name="updateislemi">    
</form>
</div>

</body>
</html>