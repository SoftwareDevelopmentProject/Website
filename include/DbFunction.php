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

    public function register($name, $email, $password, $phone, $address, $country){
        $db = new DbConnect();
        $con = $db->connect();
        $password = password_hash($password, PASSWORD_DEFAULT);
        $register = mysqli_query($con, "INSERT INTO member(member_name, member_email, member_password, member_phone, member_address, member_country) VALUES ('$name','$email', '$password','$phone','$address','$country')");
        return $register;
    }


}


?>