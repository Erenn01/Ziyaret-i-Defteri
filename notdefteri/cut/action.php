<?php 
    $action = '';
    if(isset($_POST["idsil"]) && !empty($_POST['idsil'])){ 
        $action = deleteItem('notlar', $_POST['idsil']); 
    }
    if(isset($_POST["tumsil"])){
        $action = getItemCutAll('notlar');
    }
?>