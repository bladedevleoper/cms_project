<?php

//get all classes from the classes folder with spl_autoloader function

function autoLoader($className)
{
        //glob brings back an array with the matched files in directory
        foreach(glob(__DIR__ . '/*', GLOB_ONLYDIR) as $dir){

            if(file_exists("$dir/" . $className . '.php')){
                require_once "$dir/" . $className . '.php';
                break;
            }   

        }
    }


spl_autoload_register('autoLoader');