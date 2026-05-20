<?php
    session_start();
    include "../DB_tools/DB_manager.php";
    include "../DB_tools/DB_queries.php";
    include "error_handler.php";
    if(isset($_POST["emailLoginInput"]) && isset($_POST["passwordLoginInput"])){
        $emailInput = $_POST["emailLoginInput"];
        $passwordInput = $_POST["passwordLoginInput"];
        $userLoginOutput = manageDB(getLoginUserData($emailInput, $passwordInput));
        if($userLoginOutput == "error"){
            header("Location: ../login.php?connError=1");
        } else {
            if(mysqli_num_rows($userLoginOutput) == 0){
                connectionErrorLoginSendBack();
            }else{
                foreach($userLoginOutput as $userData){
                    $userName = $userData["user_name"];
                    $isAdmin = $userData["is_admin"];
                    $_SESSION["userName"] = $userName;
                    $_SESSION["isAdmin"] = $isAdmin;
                    header("Location: ../index.php"); 
                    exit();                       
                }
            }
        }
                                                                  
    }

?>