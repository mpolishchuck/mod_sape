<?php
defined('_JEXEC') or die();

require_once(__DIR__.DS.'helper.php');
$sape = modSapeHelper::getSape($params->get('sape_user', '__'), array('charset' => $params->get('charset', 'utf-8')));
if($sape instanceof SAPE_client) {
    echo $sape->return_links($params->get('link_count', 0));
}
else {
    echo "Cannot find SAPE module!";
}
