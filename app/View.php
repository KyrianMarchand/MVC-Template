<?php

final class View
{

    public static function render ($S_localisation, $data = array())
    {
        extract($data);
        ob_start();
        include(Constants::ViewsDirectory() . $S_localisation. '.php');
        $content = ob_get_clean();
        include(Constants::ViewsDirectory() .'template.php');
    }


}