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
?>