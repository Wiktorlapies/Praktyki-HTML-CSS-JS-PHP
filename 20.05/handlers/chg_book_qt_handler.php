<?php
    session_start();
    include "../DB_tools/DB_manager.php";
    include "../DB_tools/DB_queries.php";
    include "error_handler.php";


    if(isset($_POST["bookId"]) && isset($_POST["newBookQt"])){
        $bookId = $_POST["bookId"];
        $newQt = $_POST["newBookQt"];

        $qtUpdateResult = manageDB(updateBookQuantity($bookId, $newQt));
        if($qtUpdateResult === "error"){
            connectionErrorBookQtSendBack();
        }else{
            header("Location: ../store.php");
            exit();
        }
    }
    header("Location: ../store.php");
    exit();


?>