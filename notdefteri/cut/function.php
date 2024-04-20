<?php 
class Database{

public static function db(){

$ini = dirname(__FILE__)."/dbconfigNT.ini";

$config = parse_ini_file($ini,true);

if($config === false)
{
	die("ini dosyası okunmadı");
}
else
{
	$host = $config['host'];
	$dbname = $config['dbname'];
	$username = $config['username'];
	$password = $config['password'];
	$dsn = "mysql: host={$host}; dbname={$dbname}";
try {
	$pdo= new PDO($dsn,$username,$password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $pdo;
	}
	catch (PDOException $e){
	die("veritabanı hatası var! ".$e->getMessage());	
	}
} 
}
}
function printMsg($class, $msg){
	$message = '<div class="message '.$class.'">'.$msg.'</div>';
	return $message;
}

function getItemCutAll($table){
	try{
		$pdo = Database::db();
		$query = "DELETE FROM $table ; ALTER TABLE $table AUTO_INCREMENT= 1"; // burada alter tableyi "id yi" sifirlamasi icin kullandim.
		$stmt = $pdo->prepare($query);
		$stmt->execute();
		$msg = "tüm veriler silinmiştir";
		$class = 'success';
		return printMsg($class, $msg);
	}
	catch(PDOException $e)
	{
		$class = 'danger';
		$msg = 'silme işleminde bir hata meydana geldi! '.$e->getMessage();
		return printMsg($class, $msg);
	}
}
function getItem($table, $id){
	$pdo = Database::db();
	$query = "SELECT * FROM (`$table`) WHERE id = $id";
	$stmt = $pdo->prepare($query);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;
}
function getItemAll($table){
	$pdo = Database::db();
	$query = "SELECT * FROM (`$table`)";
	$stmt = $pdo->prepare($query);
	$stmt->execute();
	$column = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $column;
}
function deleteItem($table, $id){
	try{
		$pdo = Database::db();
		$query = "DELETE FROM `$table` WHERE id = $id";
		$stmt = $pdo->prepare($query);
		$stmt->execute();
		$class = 'success';
		$msg = $id. ' numaralı kayıt silinmiştir.';
		return printMsg($class, $msg);
	}
	catch(PDOException $err){
		$class = 'danger';
		$msg = 'Kayıt silme işlemi başarısız. '.$err->getMessage();
		return printMsg($class, $msg);
	}
}
?>