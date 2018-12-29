<?php

include_once __DIR__ .  '/ErrorHandling.php';

class Login extends Database
{
    public function checkUser($username, $password)
    {
        
        if($username == ''){

           $error = ErrorHandling::error('Please enter a Username');
           return $error;


        } else if ($password == '') {
            $error = ErrorHandling::error('Please enter a Password');
            return $error;

        } else if ($username != '' && $password != '')  {

            $stmt = $this->databaseConnection()->prepare("SELECT username, password FROM users WHERE username = :username");
            $stmt->execute([':username' => $username]);
            $user = $stmt->fetch();

            //check if user is a current user
            if($user['username'] == $username && $user['password'] == $password){
                header('Location: http://www.localhost/cms/views/member.php');
            } else {
                $error = ErrorHandling::error('Sorry, credentials are either incorrect, or username or password are incorrect');
                return $error;
            }
            
        }
        
    }


}