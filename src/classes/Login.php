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
            
            //fetches an associative array back an assigns to $user
            $user = $stmt->fetch();
            
            //check if user is a current user
            if($user['username'] != $username){
                $error = ErrorHandling::error('Sorry the username provided cannot be found');
                return $error;
            } else if (password_verify($password, $user['password']) === false){
                $error = ErrorHandling::error('Sorry the password does not match');
                return $error;
            } else {
                Session::start();
                Session::set('username', $user['username']);
                header('Location: http://www.localhost/cms/views/member.php');
            }
            
        }
        
    }


}