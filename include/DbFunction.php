<?php

include_once 'DbConnect.php';

class DbFunction {
    public function getGenre(){
        $db = new DbConnect();
        $con = $db->connect();
        $genres = array();
        $result_genre =mysqli_query($con,"SELECT genre.genre_name from genre");
        while ($genre = mysqli_fetch_array($result_genre,MYSQLI_ASSOC)){
            array_push($genres, $genre);
                  }
       return $genres;
    }

    public function getBooks() {
        $db = new DbConnect();
        $con = $db->connect();
        $books = array();
        $result_book = mysqli_query($con, "SELECT book.book_id, book.book_title, book.book_author, book.book_publisher, book.book_description, book.book_stock, book.book_price, book.book_years, genre.genre_name FROM book, genre WHERE book.genre_id = genre.genre_id");
        $result_feedback = mysqli_query($con, "SELECT * FROM feedback");
        $result_feedback_rating = mysqli_query($con, "SELECT * FROM feedback_rating");
        while ($book = mysqli_fetch_array($result_book,MYSQLI_ASSOC)) {
            $book['feedback'] = array();
            array_push($books, $book);
        }
        while ($feedback = mysqli_fetch_array($result_feedback, MYSQLI_ASSOC)) {
            foreach ($books as &$book) {
                if ($book['book_id'] == $feedback['book_id']){
                    $feedback['rating'] = array();
                    array_push($book['feedback'], $feedback);
                    break;
                }
            }
        }
        while ($feedback_rating = mysqli_fetch_array($result_feedback_rating, MYSQLI_ASSOC)) {
            foreach ($books as &$book) {
                foreach ($book['feedback'] as &$feedback) {
                    if ($feedback['feedback_id'] == $feedback_rating['feedback_id']) {
                        array_push($feedback['rating'], $feedback_rating);
                        break;
                    }
                }
            }
        }
        return $books;
    }
	//add new book
	public function add_book($title, $author, $genre, $description, $publisher, $years, $price, $amount){
        $db = new DbConnect();
        $con = $db->connect();
        $new_book = mysqli_query($con, "INSERT INTO book (book_title, book_author, genre_id, book_description, book_publisher, book_years, book_price, book_stock) VALUES ('$title', '$author', $genre,'$description','$publisher',$years, $price ,$amount)");
        return $new_book;
	}
	//delete book
	public function delBook($id){
        $db = new DbConnect();
        $con = $db->connect();
        $target_book = mysqli_query($con, "DELETE FROM book WHERE book_id=$id");
        return $target_book;
    }
	//update Book 
	public function updateBook($id,$title, $author, $genre, $description, $publisher, $years, $price, $amount){
        $db = new DbConnect();
        $con = $db->connect();
        $result = mysqli_query($con, "UPDATE book SET book_title='$title', book_author='$author', genre_id=$genre, book_description='$description', book_publisher='$publisher', book_years=$years, book_price=$price, book_stock=$amount WHERE book_id=$id");
        return $result;
	}
	
	
	
	public function checkEmailExists($email) {
		$db = new DbConnect();
		$con = $db->connect();
		$result = mysqli_query($con, "SELECT * FROM staff WHERE staff_email = '$email'");
		return (mysqli_num_rows($result) > 0);
	}

    public function getBooksByGenre($genre_id) {
        $db = new DbConnect();
        $con = $db->connect();
        $books = array();
        $result_book = mysqli_query($con, "SELECT book.book_id, book.book_title, book.book_author, book.book_publisher, book.book_description, book.book_stock, book.book_price, book.book_years, genre.genre_name FROM book, genre WHERE book.genre_id = genre.genre_id AND book.genre_id = $genre_id");
        $result_feedback = mysqli_query($con, "SELECT * FROM feedback");
        $result_feedback_rating = mysqli_query($con, "SELECT * FROM feedback_rating");
        while ($book = mysqli_fetch_array($result_book,MYSQLI_ASSOC)) {
            $book['feedback'] = array();
            array_push($books, $book);
        }
        while ($feedback = mysqli_fetch_array($result_feedback, MYSQLI_ASSOC)) {
            foreach ($books as &$book) {
                if ($book['book_id'] == $feedback['book_id']){
                    $feedback['rating'] = array();
                    array_push($book['feedback'], $feedback);
                    break;
                }
            }
        }
        while ($feedback_rating = mysqli_fetch_array($result_feedback_rating, MYSQLI_ASSOC)) {
            foreach ($books as &$book) {
                foreach ($book['feedback'] as &$feedback) {
                    if ($feedback['feedback_id'] == $feedback_rating['feedback_id']) {
                        array_push($feedback['rating'], $feedback_rating);
                        break;
                    }
                }
            }
        }
        return $books;
    }

    public function getBook($book_id) {
        $db = new DbConnect();
        $con = $db->connect();
        $books = array();
        $result_book = mysqli_query($con, "SELECT book.genre_id, book.book_id, book.book_title, book.book_author, book.book_publisher, book.book_description, book.book_stock, book.book_price, book.book_years, genre.genre_name FROM book, genre WHERE book.genre_id = genre.genre_id AND book.book_id = $book_id");
        $result_feedback = mysqli_query($con, "SELECT * FROM feedback");
        $result_feedback_rating = mysqli_query($con, "SELECT * FROM feedback_rating");
        while ($book = mysqli_fetch_array($result_book,MYSQLI_ASSOC)) {
            $book['feedback'] = array();
            array_push($books, $book);
        }
        while ($feedback = mysqli_fetch_array($result_feedback, MYSQLI_ASSOC)) {
            foreach ($books as &$book) {
                if ($book['book_id'] == $feedback['book_id']){
                    $feedback['rating'] = array();
                    array_push($book['feedback'], $feedback);
                    break;
                }
            }
        }
        while ($feedback_rating = mysqli_fetch_array($result_feedback_rating, MYSQLI_ASSOC)) {
            foreach ($books as &$book) {
                foreach ($book['feedback'] as &$feedback) {
                    if ($feedback['feedback_id'] == $feedback_rating['feedback_id']) {
                        array_push($feedback['rating'], $feedback_rating);
                        break;
                    }
                }
            }
        }
        return $books;
    }
    public function getBooksGenre($genre_name){
	    $db = new DbConnect();
	    $con =$db->connect();
	    $books = array();
	    $result=mysqli_query($con,"SELECT * from book inner join genre ON book.genre_id = genre.genre_id where genre_name = '$genre_name'");


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
            if ($this->isAccountLocked($member['member_id'])) {
                return LOGIN_ACCOUNT_LOCKED;
            }
            if (password_verify($password, $member['member_password'])) {
                $_SESSION['user'] = $member['member_id'];
                $_SESSION['password'] = md5($member['member_password']);
                $this->recordLoginAttempt($member['member_id'], true);
                return LOGIN_SUCCESS;
            }
            $this->recordLoginAttempt($member['member_id'], false);
            return LOGIN_PASSWORD_INCORRECT;
        }
        return LOGIN_USER_NOT_FOUND;
    }
    /*
     Member functions
     */
    public function getmember(){
    $db = new DbConnect();
    $con =$db->connect();
    $result_member =mysqli_query($con, "SELECT * from member where member_id = '$_SESSION[user]'");
        $user = mysqli_fetch_array($result_member,MYSQLI_ASSOC);
        return $user;
    }
    public function myaccount($m_name,$m_email,$m_phone,$m_country){
        $db = new DbConnect();
        $con =$db->connect();
        $result_account =mysqli_query($con,"UPDATE member set member_name = '$m_name', member_email='$m_email', member_phone ='$m_phone', member_country ='$m_country' ");
        return $result_account;
    }

    public function recordLoginAttempt($member_id, $status) {
        $db = new DbConnect();
        $con = $db->connect();
        $status = (int) $status;
        mysqli_query($con, "INSERT INTO login_attempt(member_id, status) VALUES ($member_id, $status)");
    }

    public function isAccountLocked($member_id) {
        $db = new DbConnect();
        $con = $db->connect();
        $result = mysqli_query($con, "SELECT * FROM login_attempt WHERE member_id = $member_id AND status = 0 AND created_at > NOW() - INTERVAL " . SECURITY_MAX_LOGIN_TIMEOUT . " MINUTE");
        return !(mysqli_num_rows($result) < SECURITY_MAX_LOGIN_ATTEMPT);
    }
	
	 public function loginStaff($email, $password) {
        $db = new DbConnect();
        $con = $db->connect();
        $result = mysqli_query($con, "SELECT * FROM staff WHERE staff_email = '$email'");
        if (mysqli_num_rows($result) > 0) {
            $staff = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if (md5($password) == $staff['staff_password']) {
                $_SESSION['staff'] = $staff['staff_id'];
                $_SESSION['staff_password'] = md5($staff['staff_password']);
                return LOGIN_SUCCESS;
            }
            return LOGIN_PASSWORD_INCORRECT;
        }
        return LOGIN_USER_NOT_FOUND;
    }
	
	//staff set new password 
	    public function resetPsStaff($code,$ps){
    $db = new DbConnect();
    $con =$db->connect();
	$id = substr($code,32);
	$ps = md5($ps);	
    $result_staff =mysqli_query($con, "UPDATE staff SET staff_password = '$ps' WHERE staff_id = $id ");
        return mysqli_affected_rows($con) > 0;
 
    }
	
	
	
	    public function getStaff(){
			$db = new DbConnect();
			$con =$db->connect();
			$result_staff =mysqli_query($con, "SELECT * from staff where staff_id = '$_SESSION[staff]'");
			return mysqli_fetch_assoc($result_staff);
    }

	public function up_staff($id, $role){
        $db = new DbConnect();
        $con = $db->connect();
        $up_staff= mysqli_query($con, "UPDATE staff SET staff_role = $role WHERE staff_id = $id ");
        return mysqli_affected_rows($con) > 0;
	}
	
	 public function getAllStaff() {
        $db = new DbConnect();
        $con = $db->connect();
		$staffs= array();
        $result = mysqli_query($con, "SELECT * FROM staff");
		while ($staff = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            array_push($staffs, $staff);
        }
        return $staffs;
    }
	 public function generateCode($email) {
        $db = new DbConnect();
        $con = $db->connect();
        $result = mysqli_query($con, "SELECT * FROM staff WHERE staff_email='$email'");
		$staff_inf = mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $code = (md5($staff_inf['staff_password']).$staff_inf['staff_id']);
    }
	
	  public function add_staff($name, $email, $phone, $address, $role){
        $db = new DbConnect();
        $con = $db->connect();
		$ps = md5($phone); //passwprd = staff 's phone
        $new_staff = mysqli_query($con, "INSERT INTO staff (staff_name, staff_email, staff_password, staff_phone, staff_address, staff_role) VALUES ('$name','$email','$ps',$phone,'$address',$role)"); 
        return $new_staff;
    }
	public function del_staff($id){
        $db = new DbConnect();
        $con = $db->connect();
        $tar_staff = mysqli_query($con, "DELETE FROM staff WHERE staff_id=$id");
        return $tar_staff;
    }



    // Cart (cookie)

    public function initializeCookie() {
        $cart = array();
        setcookie("cart", json_encode($cart), time() + (86400 * 30), "/"); // one month
    }

    public function addCart($product_id, $quantity) {
        $product = array();
        $product['product_id'] = $product_id;
        $product['quantity'] = $quantity;
        $cart = json_decode($_COOKIE['cart']);
        array_push($cart, $product);
        setcookie("cart", json_encode($cart), time() + (86400 * 30), "/"); // one month
    }

    public function deleteCart($product_id) {
        $cart = json_decode($_COOKIE['cart']);
        foreach ($cart as $key => $c) {
            if ($c['product_id'] == $product_id) {
                unset($cart[$key]);
            }
        }
        setcookie("cart", json_encode($cart), time() + (86400 * 30), "/"); // one month
    }

    public function clearCart() {
        $this->initializeCookie();
    }
	
	//report fuction
	public function reportGetMember(){
    $db = new DbConnect();
    $con =$db->connect();
    $result_member =mysqli_query($con, "SELECT * FROM member");
        $result = mysqli_fetch_array($result_member,MYSQLI_ASSOC);
        return $result;
    }
}


?>