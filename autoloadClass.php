<?php 

$autoload = spl_autoload_register(
    function ($class)
    {   
        require "setting/$class.Class.php";
    }
);