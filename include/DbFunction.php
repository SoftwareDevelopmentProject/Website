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
        $result_book = mysqli_query($con, "SELECT book.book_id, book.book_title, book.book_author, book.book_publisher, book.book_description, book.book_stock, book.book_price, book.book_years, genre.genre_name FROM book INNER JOIN genre ON book.genre_id = genre.genre_id order by book.book_id");
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
	public function get3Books() {
        $db = new DbConnect();
        $con = $db->connect();
        $books = array();
        $result_book = mysqli_query($con, "SELECT book.book_id, book.book_title, book.book_author, book.book_publisher, book.book_description, book.book_stock, book.book_price, book.book_years, genre.genre_name FROM book INNER JOIN genre ON book.genre_id = genre.genre_id order by book.book_id LIMIT 3");
        while ($book = mysqli_fetch_array($result_book,MYSQLI_ASSOC)) {
            array_push($books, $book);
        }
        return $books;
    }
    //add new book
    public function add_book($title, $author, $genre, $description, $publisher, $years, $price, $amount,$file){
        $db = new DbConnect();
        $con = $db->connect();
        $new_book = mysqli_query($con, "INSERT INTO book (book_title, book_author, genre_id, book_description, book_publisher, book_years, book_price, book_stock) VALUES ('$title', '$author', $genre,'$description','$publisher',$years, $price ,$amount)");
		$id = mysqli_insert_id($con);
		$target_dir = "../images/Products/temp";
		$target_file = $target_dir . basename($file["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				rename($target_file, "../images/Products/$id.jpg");
			}
        return $new_book;
        //print_r($con);

	}

	public function contact($name, $email, $description) {
        $db = new DbConnect();
        $con = $db->connect();
        return mysqli_query($con, "INSERT INTO message (`name`, email, description) VALUES ('$name', '$email', '$description')");
    }

    public function getContact() {
        $db = new DbConnect();
        $con = $db->connect();
        $messages = array();
        $result = mysqli_query($con, "SELECT * FROM message");
        while ($message = mysqli_fetch_array($result)) {
            array_push($messages, $message);
        }
        return $messages;
    }
	
	public function previewImage($file){
		if (file_exists("../images/Products/preview.jpg")){
			unlink("../images/Products/preview.jpg");
		}
		$target_dir = "../images/Products/temp";
		$target_file = $target_dir . basename($file["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				rename($target_file, "../images/Products/preview.jpg");
			}
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

    public function addFeedback($user_id, $book_id, $scale, $feedback) {
        $db = new DbConnect();
        $con = $db->connect();
        mysqli_query($con, "INSERT INTO feedback(feedback_scale, feedback_comment, member_id, book_id) VALUES($scale, '$feedback', $user_id, $book_id)");

    }
    public function rateFeedback($user_id, $feedback_id, $scale) {
        $db = new DbConnect();
        $con = $db->connect();
        mysqli_query($con, "INSERT INTO feedback_rating(feedback_id, member_id, rating_scale) VALUES($feedback_id, $user_id, $scale)");
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
        $result_feedback = mysqli_query($con, "SELECT feedback.*, member_name FROM feedback INNER JOIN member ON member.member_id = feedback.member_id");
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
        return $books[0];
    }
    /*show limit 5 books*/
    public function get5book(){
        $db =new DbConnect();
        $con =$db->connect();
        $books5 = array();
        $result_book = mysqli_query($con,"SELECT * from book order by book_id DESC LIMIT 5");
        while($book5 = mysqli_fetch_array($result_book,MYSQLI_ASSOC)){
            array_push($books5,$book5);
        }
        return $books5;
    }
    /*show limit 6 books*/
    public function get6book(){
        $db =new DbConnect();
        $con =$db->connect();
        $books6 = array();
        $result_book = mysqli_query($con,"SELECT * from book order by book_id DESC LIMIT 6");
        while($book6 = mysqli_fetch_array($result_book,MYSQLI_ASSOC)){
            array_push($books6,$book6);
        }
        return $books6;
    }
    /*show limit 9 books*/
    public function get9book(){
        $db =new DbConnect();
        $con =$db->connect();
        $books9 = array();
        $result_book = mysqli_query($con,"SELECT * from book order by book_id DESC LIMIT 9");
        while($book9 = mysqli_fetch_array($result_book,MYSQLI_ASSOC)){
            array_push($books9,$book9);
        }
        return $books9;
    }
    public function getTop10Books() {
        $db = new DbConnect();
        $con = $db->connect();
        $books = array();
        $result = mysqli_query($con, "SELECT book.* FROM order_detail INNER JOIN book ON order_detail.book_id = book.book_id GROUP BY book_id ORDER BY SUM(order_detail_quantity) DESC LIMIT 10");
        while ($book = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($books, $book);
        }
        return $books;
    }
    /*show book by genre in shop page*/
    public function getBookGenre($genres_name){
        $db = new DbConnect();
        $con =$db->connect();
        $books = array();
        $genre_name = mysqli_real_escape_string($con,$genres_name);
        $result = mysqli_query($con,"SELECT * from book inner join genre ON book.genre_id = genre.genre_id where genre_name = '$genre_name'");
        while($book = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            array_push($books,$book);

        }
        return $books;

    }
    /* show a book in single page */
    public function getBookid($book_id){
        $db = new DbConnect();
        $con =$db->connect();
        $books_id = mysqli_real_escape_string($con,$book_id);
        $result = mysqli_query($con,"SELECT * from book inner join genre ON book.genre_id = genre.genre_id where book.book_id = '$books_id'");
        $books = mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $books;

    }
    /*member register*/
    public function register($name, $email, $password, $phone, $address, $country){
        $db = new DbConnect();
        $con = $db->connect();
        $password = password_hash($password, PASSWORD_DEFAULT);
        $register = mysqli_query($con, "INSERT INTO member(member_name, member_email, member_password, member_phone, member_address, member_country) VALUES ('$name','$email', '$password','$phone','$address','$country')");
        return $register;
    }
    /*member login*/
    public function login($email, $password) {
        $db = new DbConnect();
        $con = $db->connect();
        if($email != '' && $password != '') {
            $result = mysqli_query($con, "SELECT * FROM member WHERE member_email = '$email'");
            if (mysqli_num_rows($result) > 0) {
                $member = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if (password_verify($password, $member['member_password'])) {
                    $_SESSION['user'] = $member['member_id'];
                    $this->recordLoginAttempt($member['member_id'], true);
					$this->insertMemberLog($member['member_id']);
                    return LOGIN_SUCCESS;
                }
                $this->recordLoginAttempt($member['member_id'], false);
                return LOGIN_PASSWORD_INCORRECT;
            }
            return LOGIN_USER_NOT_FOUND;
        } else {
            return LOGIN_NULL;
        }
    }
    /*
     Member functions
     */
    /*member change password*/
    public function changepassword($member_id,$oldpassword,$newpassword)
    {
        $db = new DbConnect();
        $con = $db->connect();
        if ($oldpassword != '' && $newpassword != '') {
            $r_password = mysqli_query($con, "SELECT member_password from member where member_id = $member_id");
            $result_password = mysqli_fetch_array($r_password);
            $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
            if (password_verify($oldpassword, $result_password['member_password'])) {
                mysqli_query($con, "UPDATE member set member_password='$newpassword'");
                return PASSWORD_UPDATED;
            }
            return PASSWORD_INCORRECT;
        }else{
            return PASSWORD_NULL;
        }
    }
    /*get member information*/
    public function getmember(){
        $db = new DbConnect();
        $con =$db->connect();
        $result_member =mysqli_query($con, "SELECT * from member where member_id = '$_SESSION[user]'");
        $user = mysqli_fetch_array($result_member,MYSQLI_ASSOC);
        return $user;
    }
    /*member update own account*/
    public function myaccount($m_name,$m_email,$m_phone,$m_country,$m_id){
        $db = new DbConnect();
        $con =$db->connect();
        $result_account =mysqli_query($con,"UPDATE member set member_name = '$m_name', member_email='$m_email', member_phone ='$m_phone', member_country ='$m_country' where member_id = $m_id ");
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
	 public function get3Staff() {
        $db = new DbConnect();
        $con = $db->connect();
        $staffs= array();
        $result = mysqli_query($con, "SELECT * FROM staff LIMIT 3");
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
        $ps = md5($phone);
        $new_staff = mysqli_query($con, "INSERT INTO staff (staff_name, staff_email, staff_password, staff_phone, staff_address, staff_role) VALUES ('$name','$email','$ps',$phone,'$address',$role)");
        return $new_staff;
    }
    public function del_staff($id){
        $db = new DbConnect();
        $con = $db->connect();
        $tar_staff = mysqli_query($con, "DELETE FROM staff WHERE staff_id=$id");
        return $tar_staff;
    }
    //Order_History
    public  function getOrderbyorderid($order_id){
        $db = new DbConnect();
        $con  = $db->connect();
        $order = mysqli_query($con,"SELECT * from `order` WHERE order.order_id = $order_id");
        $result_orderid = mysqli_fetch_array($order);
        return $result_orderid;
    }
    public function getOrder($user_id){
        $db = new DbConnect();
        $con  = $db->connect();
        $result_order=array();
        $order = mysqli_query($con,"SELECT FLOOR(SUM(order_detail.order_detail_quantity*book.book_price)) as reward, `order`.order_id,`order`.order_recipient_name,`order`.order_recipient_phone,`order`.order_recipient_address,`order`.order_transaction_id,`order`.order_payment_method,`order`.order_created_time, `order`.order_status FROM `order_detail` INNER JOIN `order` ON order_detail.order_id = `order`.`order_id` INNER JOIN book ON book.book_id = order_detail.book_id where `order`.`member_id`= $user_id group by  `order`.order_id ");
        while($result_order1= mysqli_fetch_array($order)){
            array_push($result_order,$result_order1);
        }
        return $result_order;
    }
    public function getRewardPoint($member_id){
        $db = new DbConnect();
        $con  = $db->connect();
        $reward = mysqli_query($con,"SELECT FLOOR(SUM(order_detail.order_detail_quantity*book.book_price)) as reward FROM `order_detail` INNER JOIN `order` ON order_detail.order_id = `order`.`order_id` INNER JOIN book ON book.book_id = order_detail.book_id where `order`.`member_id` = $member_id");
        $result_reward = mysqli_fetch_array($reward);
        return $result_reward;
    }
    public function getOrderdetails($order_id){
        $db = new DbConnect();
        $con = $db->connect();
        $result_order_detail1 =array();
        $order_detail = mysqli_query($con,"SELECT * from `order` INNER JOIN order_detail on `order`.order_id = order_detail.order_id INNER JOIN book on order_detail.book_id = book.book_id where `order`.order_id = $order_id");
        while($result_order_detail=mysqli_fetch_array($order_detail)){
            array_push($result_order_detail1,$result_order_detail);
        }
        return $result_order_detail1;
    }

    // Cart (session)

    public function setSession() {
        $_SESSION['cart'] = array();
    }

    public function addCart($product_id, $quantity) {
        if(!isset($_SESSION['cart'])) {
            $this->setSession();
        }
        if(isset($_SESSION['cart'][$product_id])){
            $_SESSION['cart'][$product_id] += $quantity;
        }else {
            $_SESSION['cart'][$product_id] = $quantity;
        }
    }
    public function viewCart(){
        $db =new DbConnect();
        $con = $db->connect();
        $cart = array();
        foreach ($_SESSION['cart'] as $book_id => $quantity) {
            $result = mysqli_query($con,"SELECT * from book where book_id = $book_id");
            $book = mysqli_fetch_assoc($result);
            $book['quantity'] = $quantity;
            array_push($cart, $book);
        }

        return $cart;

    }
    public function insertOrderdetails($order_id,$book_id,$qty){
        $db = new DbConnect();
        $con =$db->connect();
        $detail = mysqli_query($con, "INSERT INTO order_detail(order_id,book_id,order_detail_quantity) VALUE ('$order_id','$book_id','$qty')");
        mysqli_query($con, "UPDATE member SET member_reward_points = member_reward_points + ((SELECT book_price FROM book WHERE book_id = $book_id) * $qty) WHERE member_id = (SELECT member_id FROM `order` WHERE order_id = $order_id)");
        return $detail;

    }
    public function delCart($book_id){
        unset ($_SESSION['cart'][$book_id]);
    }
    /*Checkout*/
    public function cartgetQuantity($book_id){
        return $_SESSION['cart'][$book_id];
    }
    public function checkout($order_name,$order_email,$order_phone,$order_address,$pm,$discount,$order_transaction,$member_id){
        $db =new DbConnect();
        $con =$db->connect();
        mysqli_query($con,"INSERT INTO `order`(order_recipient_name,order_recipient_email,order_recipient_phone,order_recipient_address,order_payment_method,order_discount,order_transaction_id,member_id)VALUES
('$order_name','$order_email','$order_phone','$order_address','$pm',$discount,'$order_transaction','$member_id') ");
        return mysqli_insert_id($con);
    }
    public function deductPoint($user_id, $points) {
        $db = new DbConnect();
        $con = $db->connect();
        mysqli_query($con, "UPDATE member SET member_reward_points = member_reward_points - $points WHERE member_id = $user_id");
    }


    /*Get member*/
    public function getMemberByYear($year){
        $db = new DbConnect();
        $con =$db->connect();
        $report = array();
        $result_member =mysqli_query($con, "SELECT `member`.`member_id`, `member`.`member_name`,`member`.`member_created_time`, `member`.`member_trustfulness`, COUNT(CASE WHEN `feedback_rating`.`feedback_id` IN (0) THEN 1 END) AS `negative_feedback`, COUNT(CASE WHEN `feedback_rating`.`feedback_id` IN (1,2) THEN 1 END) AS `positive_feedback` FROM `feedback` INNER JOIN `feedback_rating` ON `feedback`.`feedback_id` = `feedback_rating`.`feedback_id` RIGHT JOIN `member` ON `member`.`member_id` = `feedback`.`member_id` WHERE YEAR(member_created_time)=$year GROUP BY `member`.`member_id`");
        while($result = mysqli_fetch_assoc($result_member)) {
            array_push($report, $result);
        }
        return $report;
    }

    public function getMemberYear(){
        $db = new DbConnect();
        $con =$db->connect();
        $year = array();
        $result_year =mysqli_query($con, "SELECT  YEAR(member_created_time) AS year FROM member GROUP BY YEAR(member_created_time)");
        while($result = mysqli_fetch_assoc($result_year)) {
            array_push($year, $result['year']);
        }
        return $year;
    }
	
	 public function getMemberLog(){
        $db = new DbConnect();
        $con =$db->connect();
        $report = array();
        $result_member =mysqli_query($con, "SELECT * FROM login_attempt INNER JOIN member ON member.member_id=login_attempt.member_id ORDER BY member.member_trustfulness,login_attempt.created_at DESC");
        while($result = mysqli_fetch_assoc($result_member)) {
            array_push($report, $result);
        }
        return $report;
    }
	public function getMemberLogByTrust($trust){
        $db = new DbConnect();
        $con =$db->connect();
        $report = array();
        $result_member =mysqli_query($con, "SELECT * FROM login_attempt INNER JOIN member ON member.member_id=login_attempt.member_id WHERE member.member_trustfulness = '$trust' ORDER BY login_attempt.created_at DESC");
        while($result = mysqli_fetch_assoc($result_member)) {
            array_push($report, $result);
        }
        return $report;
	}
		
	    public function insertMemberLog($member){
        $db = new DbConnect();
        $con = $db->connect();
        $result= mysqli_query($con, "INSERT INTO activity_log (member_id) VALUES ($member)");
			return $result;
    }

    //upload book request
    public function insertBookRequest($staffid,$books){
        $db = new DbConnect();
        $con = $db->connect();
        $request= mysqli_query($con, "INSERT INTO request (staff_id) VALUES ('$staffid')");
        $id = mysqli_insert_id($con);
        foreach($books as $book) {
            $request= mysqli_query($con, "INSERT INTO request_detail (request_id, book_id, quantity) VALUES ($id, {$book['id']}, {$book['quantity']})");
        }
    }
    public function getRequest(){
        $db = new DbConnect();
        $con =$db->connect();
        $request = array();
        $result_request =mysqli_query($con, "SELECT * FROM request INNER JOIN staff ON staff.staff_id = request.staff_id INNER JOIN request_status ON request.request_status_id = request_status.request_status_id ORDER BY request_status.request_status_id DESC");
        while($result = mysqli_fetch_assoc($result_request)) {
            array_push($request, $result);
        }
        return $request;
    }
	public function get3Request(){
        $db = new DbConnect();
        $con =$db->connect();
        $request = array();
        $result_request =mysqli_query($con, "SELECT * FROM request INNER JOIN staff ON staff.staff_id = request.staff_id INNER JOIN request_status ON request.request_status_id = request_status.request_status_id ORDER BY request_status.request_status_id DESC LIMIT 3");
        while($result = mysqli_fetch_assoc($result_request)) {
            array_push($request, $result);
        }
        return $request;
    }
    public function getRequestDetail($id){
        $db = new DbConnect();
        $con =$db->connect();
        $detail = array();
        $result_detail =mysqli_query($con, "SELECT * FROM request INNER JOIN request_detail ON request.request_id = request_detail.request_id INNER JOIN book ON book.book_id = request_detail.book_id INNER JOIN genre ON book.genre_id = genre.genre_id WHERE request_detail.request_id =$id");
        while($result = mysqli_fetch_assoc($result_detail)) {
            array_push($detail, $result);
        }
        return $detail;
    }
    public function updateRequest($id,$status){
        $db = new DbConnect();
        $con = $db->connect();
        $result = mysqli_query($con, "UPDATE request SET request_status_id=$status WHERE request_id = $id");
        return $result;
    }

    //report fuction
    public function reportCountMemberByMonth($month,$year){
        $db = new DbConnect();
        $con =$db->connect();
        $result_member =mysqli_query($con, "SELECT COUNT(member_id) AS all_member, COUNT(CASE YEAR(member_created_time) WHEN $year THEN 1 ELSE NULL END) AS `y`, COUNT(CASE MONTH(member_created_time) WHEN ($month-0) THEN 1 ELSE NULL END) AS `m0`, COUNT(CASE MONTH(member_created_time) WHEN ($month-1) THEN 1 ELSE NULL END) AS `m1`, COUNT(CASE MONTH(member_created_time) WHEN ($month-2) THEN 1 ELSE NULL END) AS `m2`, COUNT(CASE MONTH(member_created_time) WHEN ($month-3) THEN 1 ELSE NULL END) AS `m3`, COUNT(CASE MONTH(member_created_time) WHEN ($month-4) THEN 1 ELSE NULL END) AS `m4`, COUNT(CASE MONTH(member_created_time) WHEN ($month-5) THEN 1 ELSE NULL END) AS `m5`, COUNT(CASE MONTH(member_created_time) WHEN ($month-6) THEN 1 ELSE NULL END) AS `m6`,COUNT(CASE MONTH(member_created_time) WHEN ($month-7) THEN 1 ELSE NULL END) AS `m7`,COUNT(CASE MONTH(member_created_time) WHEN ($month-8) THEN 1 ELSE NULL END) AS `m8`,COUNT(CASE MONTH(member_created_time) WHEN ($month-9) THEN 1 ELSE NULL END) AS `m9`,COUNT(CASE MONTH(member_created_time) WHEN ($month-10) THEN 1 ELSE NULL END) AS `m10`,COUNT(CASE MONTH(member_created_time) WHEN ($month-11) THEN 1 ELSE NULL END) AS `m11`,COUNT(CASE MONTH(member_created_time) WHEN ($month-12) THEN 1 ELSE NULL END) AS `m12` FROM member");
        $member = mysqli_fetch_array($result_member,MYSQLI_ASSOC);
        return $member;
    }


    public function reportGetMember(){
        $db = new DbConnect();
        $con =$db->connect();
        $report = array();
        $result_member =mysqli_query($con, "SELECT `member`.`member_id`, `member`.`member_name`,`member`.`member_created_time`, `member`.`member_trustfulness`, COUNT(CASE WHEN `feedback_rating`.`feedback_id` IN (0) THEN 1 END) AS `negative_feedback`, COUNT(CASE WHEN `feedback_rating`.`feedback_id` IN (1,2) THEN 1 END) AS `positive_feedback` FROM `feedback` INNER JOIN `feedback_rating` ON `feedback`.`feedback_id` = `feedback_rating`.`feedback_id` RIGHT JOIN `member` ON `member`.`member_id` = `feedback`.`member_id` GROUP BY `member`.`member_id`");
        while($result = mysqli_fetch_assoc($result_member)) {
            array_push($report, $result);
        }
        return $report;
    }
	 public function reportGet3Member(){
        $db = new DbConnect();
        $con =$db->connect();
        $report = array();
        $result_member =mysqli_query($con, "SELECT `member`.`member_id`, `member`.`member_name`,`member`.`member_created_time`, `member`.`member_trustfulness`, COUNT(CASE WHEN `feedback_rating`.`feedback_id` IN (0) THEN 1 END) AS `negative_feedback`, COUNT(CASE WHEN `feedback_rating`.`feedback_id` IN (1,2) THEN 1 END) AS `positive_feedback` FROM `feedback` INNER JOIN `feedback_rating` ON `feedback`.`feedback_id` = `feedback_rating`.`feedback_id` RIGHT JOIN `member` ON `member`.`member_id` = `feedback`.`member_id` GROUP BY `member`.`member_id` LIMIT 3");
        while($result = mysqli_fetch_assoc($result_member)) {
            array_push($report, $result);
        }
        return $report;
    }

    public function reportGetMemberById($id){
        $db = new DbConnect();
        $con =$db->connect();
        $result_member =mysqli_query($con, "SELECT * FROM member WHERE member_id=$id");
        $member = mysqli_fetch_array($result_member,MYSQLI_ASSOC);
        return $member;
    }
    public function getMemberByEmail($email) {
        $db = new DbConnect();
        $con =$db->connect();
        $result =mysqli_query($con, "SELECT member_id, MD5(member_password) as token FROM member WHERE member_email='$email'");
        $member = mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $member;
    }
    public function isRecoveryGranted($member_id, $token) {
        $db = new DbConnect();
        $con =$db->connect();
        $result =mysqli_query($con, "SELECT member_password FROM member WHERE member_id = $member_id AND MD5(member_password) = '$token'");
        $member = mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $member;
    }
    public function memberChangePassword($member_id, $new_password) {
        $db = new DbConnect();
        $con =$db->connect();
        return mysqli_query($con, "UPDATE member SET member_password = '$new_password' WHERE member_id = $member_id");
    }
    /*
    public function reportGetMemberById($id){
        $db = new DbConnect();
        $con =$db->connect();
        $report = array();
        $result_member =mysqli_query($con, "SELECT * FROM feedback_rating INNER JOIN feedback ON feedback_rating.feedback_id=feedback.feedback_id INNER JOIN member ON member.member_id=feedback.member_id INNER JOIN `order` ON `order`.member_id=member.member_id INNER JOIN order_detail ON order_detail.order_id=`order`.order_id WHERE member.member_id=$id");
            while($result = mysqli_fetch_assoc($result_member)) {
                array_push($report, $result);
            }
            return $report;
        }
        */
    public function updateTrustfulness($id,$trustfulness){
        $db = new DbConnect();
        $con = $db->connect();
        $result = mysqli_query($con, "UPDATE member SET member_trustfulness=$trustfulness WHERE member_id=$id");
        return $result;
    }


    public function getMemberMonth($year){
        $db = new DbConnect();
        $con =$db->connect();
        $month = array();
        $result_month =mysqli_query($con, "SELECT MONTH(member_created_time) AS month FROM member WHERE YEAR(member_created_time) = $year GROUP BY MONTH(member_created_time)");
        while($result = mysqli_fetch_assoc($result_month)) {
            array_push($month, $result['month']);
        }
        return $month;
    }
    public function getMemberByMonth($year,$month){
        $db = new DbConnect();
        $con =$db->connect();
        $report = array();
        $result_member =mysqli_query($con, "SELECT `member`.`member_id`, `member`.`member_name`,`member`.`member_created_time`, `member`.`member_trustfulness`, COUNT(CASE WHEN `feedback_rating`.`feedback_id` IN (0) THEN 1 END) AS `negative_feedback`, COUNT(CASE WHEN `feedback_rating`.`feedback_id` IN (1,2) THEN 1 END) AS `positive_feedback` FROM `feedback` INNER JOIN `feedback_rating` ON `feedback`.`feedback_id` = `feedback_rating`.`feedback_id` RIGHT JOIN `member` ON `member`.`member_id` = `feedback`.`member_id` WHERE (YEAR(member_created_time)=$year AND MONTH(member_created_time)=$month) GROUP BY `member`.`member_id` ");
        while($result = mysqli_fetch_assoc($result_member)) {
            array_push($report, $result);
        }
        return $report;
    }

    public function getMemberDate($month){
        $db = new DbConnect();
        $con =$db->connect();
        $date = array();
        $result_date =mysqli_query($con, "SELECT DAY(member_created_time) AS day FROM member WHERE MONTH(member_created_time) = $month GROUP BY DAY(member_created_time)");
        while($result = mysqli_fetch_assoc($result_date)) {
            array_push($date, $result['day']);
        }
        return $date;
    }
    public function getMemberByDay($year,$month,$day){
        $db = new DbConnect();
        $con =$db->connect();
        $report = array();
        $result_member =mysqli_query($con, "SELECT `member`.`member_id`, `member`.`member_name`,`member`.`member_created_time`, `member`.`member_trustfulness`, COUNT(CASE WHEN `feedback_rating`.`feedback_id` IN (0) THEN 1 END) AS `negative_feedback`, COUNT(CASE WHEN `feedback_rating`.`feedback_id` IN (1,2) THEN 1 END) AS `positive_feedback` FROM `feedback` INNER JOIN `feedback_rating` ON `feedback`.`feedback_id` = `feedback_rating`.`feedback_id` RIGHT JOIN `member` ON `member`.`member_id` = `feedback`.`member_id` WHERE (YEAR(member_created_time)=$year AND MONTH(member_created_time) = $month AND DAY(member_created_time)=$day) GROUP BY `member`.`member_id`");
        while($result = mysqli_fetch_assoc($result_member)) {
            array_push($report, $result);
        }
        return $report;
    }
    public function getMemberOrderHistory($id){
        $db = new DbConnect();
        $con =$db->connect();
        $report = array();
        $result_member_order =mysqli_query($con, "SELECT book.book_title,order_detail.order_detail_quantity,(order_detail.order_detail_quantity*book.book_price) AS price,`order`.`order_created_time` FROM book INNER JOIN order_detail ON book.book_id=order_detail.book_id INNER JOIN `order` ON `order`.`order_id`= order_detail.order_id WHERE `order`.`member_id`=$id");
        while($result = mysqli_fetch_assoc($result_member_order)) {
            array_push($report, $result);
        }
        return $report;
    }

    public function getMemberFeedback($id){
        $db = new DbConnect();
        $con =$db->connect();
        $feedback = array();
        $result_member_feedback =mysqli_query($con, "SELECT book.book_title,feedback.feedback_comment,feedback.feedback_scale,COUNT(CASE feedback_rating.rating_scale WHEN 0 THEN 1 ELSE NULL END) AS useless, COUNT(CASE feedback_rating.rating_scale WHEN 1 THEN 1 ELSE NULL END) AS usefull, COUNT(CASE feedback_rating.rating_scale WHEN 2 THEN 1 ELSE NULL END) AS veryusefull FROM book INNER JOIN feedback ON book.book_id = feedback.feedback_id INNER JOIN feedback_rating ON feedback_rating.feedback_id=feedback.feedback_id WHERE feedback.member_id=$id GROUP BY book.book_id;");
        while($result = mysqli_fetch_assoc($result_member_feedback)) {
            array_push($feedback, $result);
        }
        return $feedback;
    }

    //sales report

    public function getSaleByYear($year){
        $db = new DbConnect();
        $con =$db->connect();
        $sale = array();
        $result_sale =mysqli_query($con,"SELECT book.book_id,book.book_title,(SUM(order_detail.order_detail_quantity)*book.book_price) AS sale, (SUM(order_detail.order_detail_quantity)) AS sold_quantity FROM book INNER JOIN order_detail ON order_detail.book_id=book.book_id INNER JOIN `order` ON `order`.order_id=order_detail.order_id WHERE YEAR(`order`.order_created_time)= $year GROUP BY order_detail.book_id,book.book_title ORDER BY sale DESC");
        while($result = mysqli_fetch_assoc($result_sale)) {
            array_push($sale, $result);
        }
        return $sale;
    }

    public function getSaleByMonth($year, $month){
        $db = new DbConnect();
        $con =$db->connect();
        $sale = array();
        $result_sale =mysqli_query($con,"SELECT book.book_id,book.book_title,(SUM(order_detail.order_detail_quantity)*book.book_price) AS sale, (SUM(order_detail.order_detail_quantity)) AS sold_quantity FROM book INNER JOIN order_detail ON order_detail.book_id=book.book_id INNER JOIN `order` ON `order`.order_id=order_detail.order_id WHERE (YEAR(`order`.order_created_time)= $year AND MONTH(`order`.order_created_time)= $month) GROUP BY order_detail.book_id,book.book_title ORDER BY sale DESC");
        while($result = mysqli_fetch_assoc($result_sale)) {
            array_push($sale, $result);
        }
        return $sale;
    }

    public function getSalesReport() {
        $db = new DbConnect();
        $con =$db->connect();
        $report = array();
        $result = mysqli_query($con, "SELECT YEAR(`order`.`order_created_time`) as year, `month`.`name` as `month`, SUM(`book`.`book_price` * `order_detail`.`order_detail_quantity`) as `revenue` FROM `order_detail` INNER JOIN `order` ON `order_detail`.`order_id` = `order`.`order_id` INNER JOIN `book` ON `book`.`book_id` = `order_detail`.`book_id` INNER JOIN (SELECT 1 as `month_id`, 'Jan' as `name` UNION SELECT 2 as `month_id`, 'Feb' as `name` UNION SELECT 3 as `month_id`, 'Mar' as `name` UNION SELECT 4 as `month_id`, 'Apr' as `name` UNION SELECT 5 as `month_id`, 'May' as `name` UNION SELECT 6 as `month_id`, 'Jun' as `name` UNION SELECT 7 as `month_id`, 'Jul' as `name` UNION SELECT 8 as `month_id`, 'Aug' as `name` UNION SELECT 9 as `month_id`, 'Sept' as `name` UNION SELECT 10 as `month_id`, 'Oct' as `name` UNION SELECT 11 as `month_id`, 'Nov' as `name` UNION SELECT 12 as `month_id`, 'Dec' as `name`) as `month` ON `month`.`month_id` = MONTH(`order`.`order_created_time`) GROUP BY YEAR(`order`.`order_created_time`), `month`.`name`, `month`.`month_id` ORDER BY YEAR(`order`.`order_created_time`), `month`.`month_id` LIMIT 6");
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($report, $row);
        }
        return $report;
    }
	 public function getBookToEdit($book_id) {
        $db = new DbConnect();
        $con = $db->connect();
        $books = array();
        $result_book = mysqli_query($con, "SELECT book.genre_id, book.book_id, book.book_title, book.book_author, book.book_publisher, book.book_description, book.book_stock, book.book_price, book.book_years, genre.genre_name FROM book, genre WHERE book.genre_id = genre.genre_id AND book.book_id = $book_id");
		 while ($book = mysqli_fetch_array($result_book,MYSQLI_ASSOC)) {
            $book['feedback'] = array();
            array_push($books, $book);
		 }
		 return $books;
	 }

}



?>