<?php

class Post extends Database
{
    private $table = 'articles';


    public function postArticle($title, $body)
    {
        $stmt = $this->databaseConnection()->prepare("INSERT INTO " . $this->table . "(title, body) VALUES (:title, :body)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':body', $body);
        $stmt->execute();
    }
}