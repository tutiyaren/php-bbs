<?php

namespace App;

use PDO;

interface PostInterface
{
    public function getPosts(): array; 
    public function addPost(string $name, string $contents): void; 
}

abstract class AbstractPost implements PostInterface
{
    protected PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}

class Post extends AbstractPost
{
    public function getPosts(): array 
    {
        $stmt = $this->pdo->query("SELECT * FROM post");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addPost(string $name, string $contents): void 
    {
        date_default_timezone_set('Asia/Tokyo');
        $created_at = date("Y-m-d H:i:s");

        $stmt = $this->pdo->prepare("INSERT INTO post(name, contents, created_at) VALUES (:name, :contents, :created_at)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":contents", $contents);
        $stmt->bindParam(":created_at", $created_at);
        $stmt->execute();
    }
}