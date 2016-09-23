<?php
include("bm_functions.php");
//1. POSTデータ取得
$book_name   = $_POST["book_name"];
$book_url    = $_POST["book_url"];
$book_cmt    = $_POST["book_cmt"];

//2. DB接続します

//※まで全コピー
$pdo = db_con();
//※

//３．データ登録SQL作成
//pdoの中のprepareの中をいじる
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, book_name, book_url, book_cmt,
indate )VALUES(NULL, :a1, :a2, :a3, sysdate())");
$stmt->bindValue(':a1', $book_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $book_url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $book_cmt, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト= header("location:~~~~)
  header("Location: bm_insert_view.php");
  exit;

}
?>
