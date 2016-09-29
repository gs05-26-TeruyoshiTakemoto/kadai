<?php

//dbとの接続をするための関数
function db_con(){  
    try {
      $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
      exit('DbConnectError:'.$e->getMessage());
    }
        return $pdo; 
}


function queryError(){
//SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

