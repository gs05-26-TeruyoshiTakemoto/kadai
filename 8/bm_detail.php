<?php
//外部phpと接続
include("bm_functions.php");

//get送信されたidの受け取り
$id = $_GET["id"];
echo $id;

//db接続
$pdo = db_con();

//SELECT * FROM gs_bm_table WHERE id= ; を取得
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
    queryError($stmt);
}else{
    $row =$stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    
<!--Head[start] -->
   <nav class="navbar navbar"></nav>   
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="bm_list_view.php">データ一覧</a></div>
    </div>
    </nav>
    </header>
    <!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>あなたのお気に入りを残そう！</legend>
     <label>書籍名：<input type="text" name="book_name" value="<?=$row["book_name"]?>"></label><br>
     <label>書籍URL：<input type="text" name="book_url" value="<?=$row["book_url"]?>"></label><br>
     <label>コメント<br><textArea name="book_cmt" rows="4" cols="40"><?=$row["book_cmt"]?></textArea></label><br>
     <input type="hidden" name="id" value="<?=$id?>">
     <input type="submit" class="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

    
</html>
</body>
</html>