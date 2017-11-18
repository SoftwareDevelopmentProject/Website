<?php

include_once 'DbConnect.php';



class DbFunction {

    public function getBooks() {

        $db = new DbConnect();
        $con = $db->connect();

        $books = array();
        $result = mysqli_query($con, "SELECT * FROM book");
        while ($book = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            array_push($books, $book);
        }
        return $books;

    }

}

?>