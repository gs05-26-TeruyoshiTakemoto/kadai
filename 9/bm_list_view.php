<?php
include ("bm_functions.php");
//1.  DB接続します
$pdo = db_con();

//try {
//  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
//} catch (PDOException $e) {
//  exit('DbConnectError:'.$e->getMessage());
//}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table ORDER BY indate DESC LIMIT 10");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
 queryError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
     //GETデータの送信リンク
      //detail.phpに?idと続けることでget formを作れる
     $view .='<p>';
     $view .='<a href="bm_detail.php?id='.$result["id"].'">';
      
     $view.='『'.''.$result["book_name"].'』'." ".$result["book_cmt"]." ".$result["indate"];
     
      $view .='<a href="bm_delete.php?id='.$result["id"].'">';
      $view .=' [削除]';
      $view .='</a>';
      $view .='</p>';
      
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="bm_insert_view.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron inaka"><?=$view?></div>
    
</div>
<!-- Main[End] -->

</body>
</html>
