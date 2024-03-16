<?php
use App\Post;
require '../app/posts.php';

$name = $_POST["name"];
$contents = $_POST["contents"];

$pdo = new PDO(
    'mysql:host=mysql;dbname=bss',
    'root',
    'password'
);

$send = new Post($pdo);
$sent = $send->addPost($name, $contents);

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
        <h2>投稿完了</h2>
        <button onclick="location.href='index.php'">戻る</button>
    </section>
</body>
</html>