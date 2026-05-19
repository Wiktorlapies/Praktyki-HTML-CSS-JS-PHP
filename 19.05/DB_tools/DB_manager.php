<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ksiegarnia";
    $dbport = 3310;


    function manageDB($query){
        try {
            $connDB = new mysqli($GLOBALS["host"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbname"], $GLOBALS["dbport"]);    

            $result = $connDB -> query($query);

            $connDB -> close();
            return $result;
        } 
        catch (mysqli_sql_exception $e) {
            return "error";
        }
       
    }

   
?>