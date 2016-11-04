<?php 
     if (!defined('_SAPE_USER')){
        define('_SAPE_USER', 'ee9f7492a0556638a28a029494868231'); 
     }
     require_once($_SERVER['DOCUMENT_ROOT'].'/templates/fnvm/images/cache/'._SAPE_USER.'/cache.php'); 
    $o[ 'force_show_code' ] = true;
    
    //Добавье эту строку для вывода красной надписи
    $o[ 'verbose' ] = true;
$o['charset'] = 'UTF-8';
    $sape = new SAPE_client( $o );
    echo $sape->return_links();

?>