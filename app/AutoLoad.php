<?php

require 'app/Constants.php';

final class AutoLoad
{
    public static function loadCoreClass ($S_ClassName)
    {
        $S_file = Constants::CoreDirectory() . "$S_ClassName.php";
        self::_load($S_file);
    }


    public static function loadExceptionClass ($S_ClassName)
    {
        $S_file = Constants::CoreDirectory() . "$S_ClassName.php";

        self::_load($S_file);
    }

    public static function loadModelClass ($S_ClassName)
    {
        $S_file = Constants::ModelsDirectory() . "$S_ClassName.php";

        self::_load($S_file);
    }


    public static function loadViewClass ($S_ClassName)
    {
        $S_file = Constants::ViewsDirectory() . "$S_ClassName.php";

        self::_load($S_file);
    }

    public static function loadControllerClass ($S_ClassName)
    {
        $S_file = Constants::ControllersDirectory() . "$S_ClassName.php";

        self::_load($S_file);
    }
    private static function _load ($S_fileToLoad)
    {
        if (is_readable($S_fileToLoad))
        {
            require $S_fileToLoad;
        }
    }

}

spl_autoload_register('AutoLoad::loadCoreClass');
spl_autoload_register('AutoLoad::loadExceptionClass');
spl_autoload_register('AutoLoad::loadModelClass');
spl_autoload_register('AutoLoad::loadViewClass');
spl_autoload_register('AutoLoad::loadControllerClass');