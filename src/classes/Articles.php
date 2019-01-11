<?php

class Articles extends Database
{
    private $table = 'articles';
    private $secondaryTable = 'comments';

    public function displayArticles()
    {
        $articleArray = [];
        $stmt = $this->databaseConnection()->prepare("SELECT articles.id, articles.title, articles.body, articles.date, users.FullName FROM $this->table LEFT JOIN users ON users.id = articles.entered_by");
        $stmt->execute();

        //echo '<div class="container">';
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            array_push($articleArray, $row);

            //echo '<div class="col-sm-2">' . $row['title'] . '</div>';
            
        }

        return $articleArray;
       // echo '</div>';   
    }

    public function articleComment($username, $comment, $article_id)
    {   

        $stmt = $this->databaseConnection()->prepare("INSERT INTO  $this->secondaryTable (article_id, username, comment) VALUES (:article_id, :username, :comment)");
            $stmt->bindParam(':article_id', $article_id);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':comment', $comment);
            $stmt->execute();

        var_dump($stmt);
            //return 'Comment Posted';
    }
};