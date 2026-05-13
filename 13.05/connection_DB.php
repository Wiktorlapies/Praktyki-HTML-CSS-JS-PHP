<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ksiegarnia";
    $dbport = 3310;

    // $connDB = new mysqli($GLOBALS["host"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbname"], $GLOBALS["dbport"]);

    function getDataFromDB($query){
        $connDB = new mysqli($GLOBALS["host"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbname"], $GLOBALS["dbport"]);    

        $result = $connDB -> query($query);

        $connDB -> close();
        return $result;
    }

   
?>