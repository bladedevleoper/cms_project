<?php

class Post extends Database
{
    private $table = 'articles';
    public function postArticle($title, $body, $id)
    {
        if($title == '' || $body == '' ){
            return ErrorHandling::error('All fields are mandatory.');
        } else {
            $stmt = $this->databaseConnection()->prepare("INSERT INTO " . $this->table . "(title, body, entered_by) VALUES (:title, :body, :entered_by)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':body', $body);
            $stmt->bindParam(':entered_by', $id);
            $stmt->execute();
            return ErrorHandling::success('Article has been posted successfully');
        }
        
    }
}