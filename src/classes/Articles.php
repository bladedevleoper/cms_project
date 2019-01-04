<?php

class Articles extends Database
{
    private $table = 'articles';

    public function displayArticles()
    {
        $articleArray = [];
        $stmt = $this->databaseConnection()->prepare("SELECT * FROM $this->table");
        $stmt->execute();

        //echo '<div class="container">';
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            array_push($articleArray, $row);

            //echo '<div class="col-sm-2">' . $row['title'] . '</div>';
            
        }
        
        return $articleArray;
       // echo '</div>';   
    }
}