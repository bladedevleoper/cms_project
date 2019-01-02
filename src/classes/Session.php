<?php
class Session
{
    //set an internal flag so that it does not restart the session
    private static $sessionStart = false;
    public static function start()
    {
        
            session_start();
            self::$sessionStart = true;
    
        
    }
    //this will relate to $_SESSION[$key] = $value
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
    public static function redirect($url)
    {
        return header("Location: $url");
    }
    public static function destroy()
    {
        if(self::$sessionStart == true){
            self::$sessionStart = false;
            //not sure if a parameter needs to go in this one
            session_unset();
            session_destroy();
            
            self::redirect('login.php');
        }
        
    }
}