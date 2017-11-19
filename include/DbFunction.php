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

    public function login($email, $password) {
        $db = new DbConnect();
        $con = $db->connect();
        $result = mysqli_query($con, "SELECT * FROM member WHERE member_email = '$email'");
        if (mysqli_num_rows($result) > 0) {
            $member = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if (password_verify($password, $member['member_password'])) {
                $_SESSION['user'] = $email;
                $_SESSION['password'] = md5($member['member_password']);
                return LOGIN_SUCCESS;
            } else {
                return LOGIN_PASSWORD_INCORRECT;
            }
        } else {
            return LOGIN_USER_NOT_FOUND;
        }
    }

}


?>