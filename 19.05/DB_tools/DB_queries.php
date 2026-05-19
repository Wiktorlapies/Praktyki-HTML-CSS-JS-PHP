<?php
    $GET_BOOKS_QUERY = "SELECT k.id, k.tytul,
     m.cena, m.ilosc, si.okladka FROM ksiazki k INNER JOIN magazyn m ON k.id = m.id_ksiazki INNER JOIN szczegoloweinformacje si ON k.id = si.id_ksiazki;";

    $GET_BOOKS_STORE_QUERY = "SELECT k.id, k.tytul, si.isbn, m.ilosc FROM ksiazki k INNER JOIN szczegoloweinformacje si ON k.id = si.id_ksiazki INNER JOIN magazyn m ON k.id = m.id_ksiazki";

    $GET_USERS_QUERY = "SELECT id, user_name, email, is_admin FROM users;";
    
    function getBookAuthorsByIdQuery($id){
        return "SELECT a.imie, a.nazwisko FROM autorzy a INNER JOIN ksiazki_autorzy ka ON a.id = ka.id_autora INNER JOIN ksiazki k ON ka.id_ksiazki = k.id WHERE k.id = $id;";

    }

    function getBookQuery($id){
        return "SELECT k.tytul, m.cena, m.ilosc, si.isbn, si.opis, si.strony, si.okladka FROM ksiazki k INNER JOIN magazyn m ON k.id = m.id_ksiazki INNER JOIN szczegoloweinformacje si ON k.id = si.id_ksiazki WHERE k.id = $id;";

    }

    function getLoginUserData($email, $password){
        return "SELECT user_name FROM users WHERE email = '{$email}' AND password = '{$password}';";
    }

    function checkUserName($userName){
        return "SELECT id FROM users WHERE user_name = '{$userName}';";
    }
    function checkEmail($email){
        return "SELECT id FROM users WHERE email = '{$email}';";
    }

    function checkBookTitle($title){
        return "SELECT id FROM ksiazki WHERE tytul LIKE '{$title}';";
    }
    function checkIsbn($isbn){
        return "SELECT id FROM szczegoloweinformacje WHERE isbn LIKE '{$isbn}';";
    }
    function checkBookAuthor($AuthorName, $AuthorLastName){
        return "SELECT id FROM autorzy WHERE  imie LIKE '{$AuthorName}' AND nazwisko LIKE '{$AuthorLastName}';";
    }

    function getBookId($title){
        return "SELECT id FROM ksiazki WHERE tytul = '{$title}' ORDER BY id DESC";
    }
    function insertNewBookIntoDB($title){
        return "INSERT INTO ksiazki(tytul) VALUES ('{$title}')";
    }

    function insertBookAuthorConnection($bookId, $authorId){
        return "INSERT INTO ksiazki_autorzy(id_autora, id_ksiazki) VALUES ({$authorId}, {$bookId})";
    }

    function insertDetailedBookDataIntoDB($bookId, $isbn, $description, $cover, $pages){
        return "INSERT INTO szczegoloweinformacje(id_ksiazki, isbn, opis, okladka, strony) VALUES ({$bookId}, '{$isbn}', '{$description}', '{$cover}', {$pages})";
    }

    function insertBookStoreDataIntoDB($bookId, $price){
        return "INSERT INTO magazyn(id_ksiazki, cena, ilosc) VALUES({$bookId}, {$price}, 1)";
    }
    function insertNewAuthorIntoDB($firstName, $lastName){
        return "INSERT INTO autorzy(imie, nazwisko) VALUES ('{$firstName}', '{$lastName}');";
    }

    function insertNewUserIntoDB($userName, $email, $password){
        return "INSERT INTO users(user_name, email, password) 
        VALUES('{$userName}','{$email}','{$password}')";
    }

    function updateBookQuantity($bookId, $newQt){
        return "UPDATE magazyn SET ilosc = {$newQt} WHERE id_ksiazki = {$bookId}";
    }
?>