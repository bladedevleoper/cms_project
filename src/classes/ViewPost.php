<?php

class ViewPost extends Database
{

    private $id;

    public function __construct($id)
    {

        //$id = intval($id);
        if(preg_match_all('/[a-z]/', $id)){
            Session::set('not_found', false);
           return Session::redirect("member.php");
        } else {
        
            $this->id = $id;
         } 

        
       
    }

    public function displayPost()
    {
        $stmt = $this->databaseConnection()->prepare("SELECT articles.title, articles.body, articles.date, users.username, users.user_img FROM articles LEFT JOIN users ON users.id = articles.entered_by WHERE articles.id = :id");
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
        

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}