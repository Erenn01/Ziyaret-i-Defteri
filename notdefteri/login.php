<?php 
    require ("cut/function.php");
    include_once('cut/action.php');
    ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Not Defteri</title>
<link rel="stylesheet" href="main.css">
<STYLE>
        table{
            width: 900px;
            margin: 50px auto;
        }
        table  TD{
            border: 1px solid #ddd;
            padding: 5px;
            text-align: center;
        }
        h2{
            text-align: center;
        }
        input[type="text"], textarea {
            width: 200px;
            max-height: 10px;
            padding: 20px;
            margin-top: 20px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            display: flex;
        }
        h2{
            text-align: center;
        }
        input[type="submit"] {
            width: 100px;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
           display: flex;
           justify-content: center;
        }
        body{
            font-family: Arial, sans-serif;
            margin: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input[type="submit"] {
            width: 250px;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin-top: 10px;
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
        }
        .btn:hover{
            background-color: #45a049;
        }
        .container{
            display: flex;
            justify-content: space-evenly;
        }
        .message{
            display: inline-flex;
            justify-content: center;
            padding: 20px;
            border-radius: 5px;
            font-weight: 700;
            color: #fff;
            margin: 20px 0;
        }
        .message.success{
            background-color: #4CAF50;
        }
        .message.danger{
            background-color: #911212;
        }
</STYLE>
</head>
<body>
<h2>ZİYARETÇİ DEFTERİ</h2>


<?php if(!empty($action)) echo $action; ?>


<div class="container">
    <div class="forms">
        <a href="./index.php" class="btn">Kayıt sayfasına dönmek için Tıkla</a>
        <form action="" method="POST">
            <input type="text" id="id" name="id" placeholder="Lütfen 'id' degerini giriniz!">
            <input type="submit" value="Göster">
        </form>
        <form action ="" method= "POST">
            <input type="text" id="idsil" name="idsil" placeholder="Lütfen silmek istediginiz'id' degerini giriniz!">
            <input type="submit" value="Sil" name="sil">
        </form>
        <form action="" method = "POST"> <input type="submit" value="Tüm kayıtları sil" name="tumsil"></form>
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>USERNAME</td>
                    <td>TELEFON</td>
                    <td>MESAJ</td>  
                    <td>EKLENME TARİHİ</td>
                </tr>
            </thead>
            <tbody>
            <?php
                if(isset($_POST["id"]) && !empty($_POST['id'])){ 
                   $row = getItem('notlar', $_POST['id']); 
                   echo '<tr>
                            <td>'.$row["id"].'</td>
                            <td>'.$row["username"].'</td>
                            <td>'.$row["number"].'</td>
                            <td>'.$row["message"].'</td>
                            <td>'.$row["add_with"].'</td>
                        </tr>';
                }
                else{
                   $column = getItemAll('notlar');
                   foreach($column as $row){
                    echo '<tr>
                            <td>'.$row["id"].'</td>
                            <td>'.$row["username"].'</td>
                            <td>'.$row["number"].'</td>
                            <td>'.$row["message"].'</td>
                            <td>'.$row["add_with"].'</td>
                        </tr>';
                   }
                }
            ?> 
            </tbody>          
            </form>
        </table>
    </div>
</div>
</body>
</html>