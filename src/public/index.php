<?php
use App\Post;
require '../app/posts.php';

$pdo = new PDO(
    'mysql:host=mysql;dbname=bss',
    'root',
    'password'
);

$send = new Post($pdo);
$posts = $send->getPosts();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>掲示板アプリ（class/実践課題）</title>
</head>
<body>

    <title>掲示板サンプル</title>
    <h1>掲示板サンプル</h1>
    <section>
        <h2>新規投稿</h2>
        <form action="send.php" method="post">
            名前 : <input type="text" name="name" value=""><br>
            投稿内容: <input type="text" name="contents" value=""><br>
            <button type="submit">投稿</button>
        </form>
    </section>
    <section>
      <h2>投稿内容一覧</h2>
          <?php foreach($posts as $loop):?>
              <div>No: <?php echo $loop['id']?></div>
              <div>名前：<?php echo $loop['name']?></div>
              <div>投稿内容：<?php echo $loop['contents']?></div>
              <div>------------------------------------------</div>
          <?php endforeach;?>
    </section>
  
</body>
</html>