<?php
    include "../DB_tools/DB_manager.php";
    include "../DB_tools/DB_queries.php";
    include "error_handler.php";

    $errorCode = 0;
    if(isset($_POST["bookTitle"]) && isset($_POST["bookAuthor"]) && isset($_POST["bookPrice"]) && isset($_POST["isbn"]) && isset($_POST["bookPages"]) && isset($_POST["bookDescription"]) && !empty($_POST["bookTitle"]) && !empty($_POST["bookAuthor"]) && !empty($_POST["bookPrice"]) && !empty($_POST["isbn"])){
        $polishChars = [
        'ą', 'ć', 'ę', 'ł', 'ń', 'ó', 'ś', 'ź', 'ż',
        'Ą', 'Ć', 'Ę', 'Ł', 'Ń', 'Ó', 'Ś', 'Ź', 'Ż'
        ];
        $latinChars = [
        'a', 'c', 'e', 'l', 'n', 'o', 's', 'z', 'z',
        'A', 'C', 'E', 'L', 'N', 'O', 'S', 'Z', 'Z'
        ];
        $bookTitleInput = $_POST["bookTitle"];
        $bookAuthorInput = $_POST["bookAuthor"];
        $bookPriceInput = $_POST["bookPrice"];
        $isbnInput = $_POST["isbn"];
        $bookPagesInput = $_POST["bookPages"];
        $bookDescriptionInput = $_POST["bookDescription"];
        $bookCoverFileName = strtolower(strtr((str_replace(" ", "_", $bookTitleInput) . ".jpg"), array_combine($polishChars, $latinChars)));

        $isIsbnOk = isIsbnNotInDB($isbnInput);
        if($isIsbnOk){
            $authorId = insertAndGetAuthorId($bookAuthorInput);
            $bookId = insertAndGetBookId($bookTitleInput);

            manageDB(insertBookAuthorConnection($bookId, $authorId));
            manageDB(insertDetailedBookDataIntoDB($bookId, $isbnInput, $bookDescriptionInput, $bookCoverFileName, $bookPagesInput));
            manageDB(insertBookStoreDataIntoDB($bookId, $bookPriceInput));
            header("Location: ../add_book.php?success=1");
            exit();
        }
        header("Location: ../add_book.php?errorCode={$errorCode}");
        exit();
    } 

    
    function isIsbnNotInDB($isbn){
        $isbnCheckOutput = manageDB(checkIsbn($isbn));
        if($isbnCheckOutput == "error"){
            connectionErrorAddBookSendBack();
        }else{
            if(mysqli_num_rows($isbnCheckOutput) != 0){
                $GLOBALS["errorCode"] = 1;
                return false;
            }
            return true;
        }
    }

    function insertAndGetAuthorId($bookAuthor){
        $authorNames = explode(" ", $bookAuthor);
        $authorLastName = array_pop($authorNames);
        $authorFirstName = implode(" ", $authorNames);

        $bookAuthorCheckOutput = manageDB(checkBookAuthor($authorFirstName, $authorLastName));
        if($bookAuthorCheckOutput == "error"){
            connectionErrorAddBookSendBack();
        }else{
            if(mysqli_num_rows($bookAuthorCheckOutput) == 0){
                manageDB(insertNewAuthorIntoDB($authorFirstName, $authorLastName));
                $authorIdOutput = manageDB(checkBookAuthor($authorFirstName, $authorLastName));
                foreach($authorIdOutput as $authorId){
                    return $authorId["id"];
                }
            }else{
                foreach($bookAuthorCheckOutput as $authorId){
                    return $authorId["id"];
                }
            }
        }
    }
    function insertAndGetBookId($bookTitle){
        manageDB(insertNewBookIntoDB($bookTitle));
        $bookIdOutput = manageDB(getBookId($bookTitle));
        foreach($bookIdOutput as $bookId){
            return $bookId["id"];
        }          
    }

?>