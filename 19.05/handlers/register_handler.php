<?php
    session_start();
    include "../DB_tools/DB_manager.php";
    include "../DB_tools/DB_queries.php";
    include "error_handler.php";
    $errorCode = "";          
    if(isset($_POST["userNameInput"]) && isset($_POST["emailRegisterInput"]) && isset($_POST["passwordRegisterInput"]) && !empty($_POST["userNameInput"]) && !empty($_POST["emailRegisterInput"]) && !empty($_POST["passwordRegisterInput"])){
        $userNameInput = $_POST["userNameInput"];
        $emailInput = $_POST["emailRegisterInput"];
        $passwordInput = $_POST["passwordRegisterInput"];

        $isUserOk = isUserNameNotUsed($userNameInput);
        $isEmailOk = isEmailNotUsed($emailInput);
        if($isUserOk && $isEmailOk){
            $addUser = manageDB(insertNewUserIntoDB($userNameInput, $emailInput, $passwordInput));
            header("Location: ../login.php?success=1"); 
            exit();                       
        }else{
            header("Location: ../login.php?errorCode={$errorCode}");
            exit();
        }
    }

    function isUserNameNotUsed($userName){
        $userNameOutput = manageDB(checkUserName($userName));
        if($userNameOutput == "error"){
            connectionErrorLoginSendBack();
        }else{
            if(mysqli_num_rows($userNameOutput) != 0){
                $GLOBALS["errorCode"] = 1;
                return false;
            }
            return true; 
        }
                                                                    
                    
    }
    function isEmailNotUsed($email){
        $emailOutput = manageDB(checkEmail($email));
        if($emailOutput == "error"){
            connectionErrorLoginSendBack();
        }else{
            if(mysqli_num_rows($emailOutput) != 0){
                if($GLOBALS["errorCode"] == 1){
                    $GLOBALS["errorCode"] = 3;

                }else{
                    $GLOBALS["errorCode"] = 2;
                    
                }

                return false;
            }
            return true;
        }
                    
    }
            
?>