<?php
defined('_JEXEC') or die();

class modSapeHelper {
    protected static $sape_objects = array();
    public static function getSape($sapeUser, $options = array()) {
        if(isset(self::$sape_objects[$sapeUser])) {
            return self::$sape_objects[$sapeUser];
        }

        $file = JPATH_BASE.DS.$sapeUser.DS.'sape.php';
        if(is_file($file) && is_readable($file)) {
            include_once($file);
            if(!defined('_SAPE_USER'))
                define('_SAPE_USER', $sapeUser);
            self::$sape_objects[$sapeUser] = new SAPE_client($options);
            return self::$sape_objects[$sapeUser];
        }
        return NULL;
    }
}
