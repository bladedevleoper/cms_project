<?php

class Profile extends Database
{
    private $table = 'users';

    public function getProfileDetails($user)
    {
        $stmt = $this->databaseConnection()->prepare("SELECT FullName, email, username FROM $this->table WHERE username = :username");
        //$stmt->bindParam(':username', $user);
        $stmt->execute([':username' => $user]);
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;


    }

    public function updateUser($fullname, $email, $username, $id)
    {
        $stmt = $this->databaseConnection()->prepare("UPDATE $this->table SET FullName = :fullname, email = :email, username = :username WHERE id = :id");
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        //ErrorHandling::success('Profile Updated');
        $message = 'Profile Updated';
        
        return header('Location: http://www.localhost/cms/views/profile.php?success=true');
    
    }
}