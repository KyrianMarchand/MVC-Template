<?php

// Rappel : nous sommes dans le répertoire Core, voilà pourquoi dans realpath je "remonte d'un cran" pour faire référence
// à la VRAIE racine de mon application
final class Constants
{
    // Les constantes relatives aux chemins
    const VIEWS_DIRECTORY        = '/views/';

    const MODELS_DIRECTORY      = '/models/';

    const CORE_DIRECTORY       = '/app/';

    const EXCEPTIONS_DIRECTORY  = '/app/Exceptions/';

    const CONTROLLERS_DIRECTORY = '/controllers/';

    public static function rootDirectory() {
        return realpath(__DIR__ . '/../');
    }

    public static function CoreDirectory() {
        return self::rootDirectory() . self::CORE_DIRECTORY;
    }

    public static function ExceptionsDirectory() {
        return self::rootDirectory() . self::EXCEPTIONS_DIRECTORY;
    }

    public static function ViewsDirectory() {
        return self::rootDirectory() . self::VIEWS_DIRECTORY;
    }

    public static function ModelsDirectory() {
        return self::rootDirectory() . self::MODELS_DIRECTORY;
    }

    public static function ControllersDirectory() {
        return self::rootDirectory() . self::CONTROLLERS_DIRECTORY;
    }

}