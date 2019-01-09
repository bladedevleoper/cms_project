<?php

class Articles extends Database
{
    private $table = 'articles';

    public function displayArticles()
    {
        $articleArray = [];
        $stmt = $this->databaseConnection()->prepare("SELECT articles.id, articles.title, articles.body, articles.date, users.FullName FROM $this->table LEFT JOIN users ON users.id = articles.entered_by");
        $stmt->execute();


        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            array_push($articleArray, $row);

            
            
        }

        return $articleArray;
        
    }
}
