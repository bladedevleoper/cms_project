<?php

class ErrorHandling
{
    public static function error($message)
    {
        $error = "<div class='alert alert-danger' role='alert'>$message</div>";
        return self::extraction(compact('error'));
    }


    public static function extraction($errors)
    {
        echo '<div class="container">';
        foreach($errors as $key => $value){
    
            echo $value;
        }
        echo '</div>';
    }


    public static function success($message)
    {
        $error = "<div class='alert alert-success' role='alert'>$message</div>";
        return self::extraction(compact('error'));
    }


}