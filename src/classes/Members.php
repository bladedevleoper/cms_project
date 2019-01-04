<?php

class Members extends Database
{
    private $table = 'users';
    
    public function activeMembers($currentUser)
    {
     $stmt = $this->databaseConnection()->prepare("SELECT username FROM $this->table WHERE is_active = 1 AND username != :currentUser");
     $stmt->bindParam(':currentUser', $currentUser);
     $stmt->execute();
     return $stmt->fetchAll(PDO::FETCH_ASSOC);
     
    }


}