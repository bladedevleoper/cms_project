<?php

class Articles extends Database implements ArticleInterface
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
       //echo '</div>';   
    }

    public function articleComment($username, $comment, $article_id)
    {   

        $stmt = $this->databaseConnection()->prepare("INSERT INTO  $this->secondaryTable (article_id, username, comment) VALUES (:article_id, :username, :comment)");
            $stmt->bindParam(':article_id', $article_id);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':comment', $comment);
            $stmt->execute();
            
            $link = "articles.php?id=" . $article_id;

            //var_dump($stmt);
            return header("Location: $link");
    }


    public function displayArticlePosts($id)
    {
        $commentArr = array();
        $stmt = $this->databaseConnection()->prepare("SELECT comments.username, comments.comment, comments.date, users.user_img FROM comments LEFT JOIN users ON users.username = comments.username WHERE article_id = :id");
        $stmt->execute(array(':id' => $id));
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($commentArr, $row);
        }
        //print_r($commentArr);
        return $commentArr;
    }
};