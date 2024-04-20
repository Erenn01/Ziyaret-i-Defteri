<?php 
    require("cut/function-general.php");
    require ("cut/function.php");
    ini_set("display_errors","0"); 
?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziyaretçi Defteri</title>
    
    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form{
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        h2{
            text-align: center;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin-top: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .btn{
            display: block;
            width: 250px;
            padding: 14px 0;
            font-size: 14px;
            text-align: center;
            background-color: #4CAF50;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
            transition: all ease 300ms;
            margin-top: 20px;
        }
        .btn:hover{
            background-color: #45a049;
        }
    </style>
</head>
<body>
<h2>Ziyaretçi Defteri</h2>

<form action="" method="post">

    <label for="adsoyad">Kullanıcı Adı:</label>
    <input type="text" id="adsoyad" name="adsoyad" placeholder="Lütfen kullanıcı adınızı giriniz!" required>
    
    <label for="tel">Telefon Numarası:</label>
    <input type="text" id="tel" name="tel" placeholder="Lütfen telefon numaranızı giriniz!" required>
    
    <label for="mesaj">Mesaj:</label>
    <textarea id="mesaj" name="mesaj" rows="4" required></textarea> 
    <input type="submit" value="Gönder">
<?php

if($_POST){
    $kullaniciadi =trim($_POST['adsoyad']);
    $tel =trim($_POST['tel']);
    $mesaj =trim($_POST['mesaj']);

    if(!$kullaniciadi || !$tel || !$mesaj){
        echo"lütfen boş bırakılan alanları doldurunuz!";
    }
    else{
    $pdo = Database::db();  
    $stmt = $pdo->prepare("INSERT INTO notlar(`username`,`number`, `message`) VALUES (?,?,?)");
    $result = $stmt->execute([$kullaniciadi,$tel,$mesaj]);
    if($result)
    {
        echo "teşekkürler işlem başarılı.";
        header("refresh:0");
        exit();
    }
    else{
        echo "veritabanı hatası ile işlem tamamlanamadı!";
    }
}
}
    if(isset($_POST["zgoster"])){
    header("Location: login.php");
        exit();
    }
?>
</form>
<a href="login.php" class="btn">Ziyaretçi listesini görmek için tıkla</a>
</body>
</html> 
 
