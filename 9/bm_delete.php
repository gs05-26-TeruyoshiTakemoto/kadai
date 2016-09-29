<?php
include("bm_functions.php");
//getで取得
$id = $_GET["id"];
//DB接続
$pdo = db_con();

$stmt = $pdo->prepare("DELETE FROM gs_bm_table WHERE id =:id");
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
    queryEroor($stmt);
}else{
    header("Location: bm_list_view.php");
    exit;
}

?>