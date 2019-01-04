<?php

class Profile extends Database
{
    private $table = 'users';

    public function getProfileDetails($user)
    {
        $stmt = $this->databaseConnection()->prepare("SELECT FullName, email, username, user_img FROM $this->table WHERE username = :username");
        //$stmt->bindParam(':username', $user);
        $stmt->execute([':username' => $user]);
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;


    }

    public function updateUser($fullname, $email, $username, $id, $files)
    {
        
            //check image first
            $returnValue = $this->uploadImage($files);
            $newImage = strval($returnValue);
            //var_dump($newImage);
            //exit;
            $stmt = $this->databaseConnection()->prepare("UPDATE $this->table SET FullName = :fullname, email = :email, username = :username WHERE id = :id");
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':id', $id);
            //$stmt->bindParam(':user_img', $newImage);
            $stmt->execute();
            //ErrorHandling::success('Profile Updated');
            $message = 'Profile Updated';
            
            return header('Location: http://www.localhost/cms/views/profile.php?success=true');
      
        
    
    }

    public function uploadImage($files)
    {
            //name that was given to the input type
            $files = $_FILES['file'];

            //now we need to find out the size, the type of file
            $fileName = $_FILES['file']['name'];
            
            //additional info within the array
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            //wont be using this, but it is good to see what information is coming from the associative array
            $fileType = $_FILES['file']['type'];

            //explode it by the punctuation
            $fileExt = explode(".", $fileName);

            //make sure that the ext is lower case, get the last part of the array
            $fileActualExt = strtolower(end($fileExt));

            //allowed img types

            $allowed = array(
            'jpg',
            'jpeg',
            'png',	
            );
            
            //now check if the file is allowed
            if(in_array($fileActualExt, $allowed)){
                //check if there are any errors
                if($fileError === 0){
                    //check the file size, is less than 1mb
                    if($fileSize < 1000000){
                        //when the file gets uploaded we want to provide it a proper name
                        //this provides a unique id with the current time
                        //$fileNameNew = uniqid('', true) . "." . $fileActualExt;
                        $fileNameNew = $_SESSION['username'] . "." . $fileActualExt;
                    //we need to say where we want to upload the file to
                    $fileDestination = 'profile_photos/' . $fileNameNew;
                    
                    //move temp file to the location
                    move_uploaded_file($fileTmpName , $fileDestination);
                    $stmt = $this->databaseConnection()->prepare("UPDATE $this->table SET user_img = :filename WHERE username = :username");
                    $stmt->bindParam(':filename', $fileNameNew );
                    $stmt->bindParam(':username', $_SESSION['username']);
                    $stmt->execute();
                    //return $fileNameNew;
                    //header('Location: profile.php?uploladsuccess');
                    } else {
                        echo 'Your file is to big';
                    }
                } else {
                    echo 'There was an error uploading your file';
                }

            } else {
                echo 'You cannot upload files of this type';
            }
        }
}