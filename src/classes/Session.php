<?php
class Session
{
    //set an internal flag so that it does not restart the session
    private static $sessionStart = false;

    public static function start()
    {
        if(self::$sessionStart == false){
            session_start();
            self::$sessionStart = true;
        }
        
    }

    //this will relate to $_SESSION[$key] = $valye
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $secondKey = false)
    {
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function destroy()
    {
        if(self::$sessionStart == true){
            //not sure if a parameter needs to go in this one
            self::$sessionStart = false;
            session_unset();
            session_destroy();
            
            //self::$sessionStart = false;
            header('Location: http://www.localhost/cms/views/login.php');
            //exit;
        }
        
    }
}