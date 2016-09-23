<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bm_list_view.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>あなたのお気に入りを残そう！</legend>
     <label>書籍名：<input type="text" name="book_name"></label><br>
     <label>書籍URL：<input type="text" name="book_url"></label><br>
     <label>コメント<br><textArea name="book_cmt" rows="4" cols="40"></textArea></label><br>
     <input type="submit" class="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
