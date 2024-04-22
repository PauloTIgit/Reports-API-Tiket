<?php 
#||::::::::::::::::::::::::::::::::::||
#||               PF WEB             ||
#||  configuration for the autoload  ||
#||            Version 0.6           ||
#||::::::::::::::::::::::::::::::::::||
#
#
#### CONFIGURAÇÂO DO SERVIDOR
$_SERVER["SERVER_ADMIN"] = 'pauloferreira@paulodevelop.com.br' ;


$autoload = spl_autoload_register(
    function ($class)
    {   
        require "setting/$class.Class.php";
    }
);

