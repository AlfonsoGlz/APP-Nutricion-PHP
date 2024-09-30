<?php
    
    ini_set('display_errors',0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
    

    function Conectarse()
    {
        $dsn = "Driver={SQL Server};
        Server=DESKTOP-F5FO1IU\SQLEXPRESS;Database=proyecto_DB;CharacterSet=UTF-8;";

        if(!($link = odbc_connect($dsn,'cornejo','0416')))
        {
            echo"Error conectando a la base de datos. ";
            exit();
        }
        else{
            echo" ";
        }
        return $link;
    }


    $link2 = Conectarse();
?>