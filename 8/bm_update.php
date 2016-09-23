<?php
include("bm_functions.php");
//1.POSTでParamを取得
$id = $_POST["id"];
$book_name = $_POST["book_name"];
$book_url = $_POST["book_url"];
$book_cmt = $_POST["book_cmt"];
echo $book_name;
echo $book_url;
echo $book_cmt;


//db接続など
$pdo = db_con();

//update時
//UPDATE gs_bm_table SET  ;で更新

$stmt = $pdo->prepare('UPDATE gs_bm_table SET book_name=:book_name, book_url=:book_url, book_cmt=:book_cmt WHERE id=:id');
    $stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);
    $stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);
    $stmt->bindValue(':book_cmt', $book_cmt, PDO::PARAM_STR);

    $stmt->bindValue(':id',$id, PDO::PARAM_INT);

    $status = $stmt->execute();

if($status==false){
    queryError($stmt);
}else{
    header("Location: bm_list_view.php");
    exit;
}

?>