<?php
session_start();
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <base href="../" />
    <title>Technology Bookstore:Shop Now</title>
    <link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<?php include"_head.php";?>
</head>
<body>
    <?php include"_header.php";?>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $db->addCart($_POST['book_id'],$_POST['quantity']);
        }
 ?>

       <div class="login">
         <div class="wrap">
		<div>
			    <div class="box1">
                    <?php
                    if(isset($_GET['genre'])) {
                        $books = $db->getBookGenre($_GET['genre']);


                        foreach ($books as $book) {
                            echo '<form method="post"><div class="col_1_of_single1 span_1_of_single1"><a href="singles/'.$book['book_id'].'">
                    <input type="hidden" name="book_id" value="' . $book['book_id'] . '"/>
                    <input type="hidden" name="quantity" value="1"/>
				     <div class="view1 view-fifth1">
                       
				  	  <div class="top_box">
					  	<h3 class="m_1">  ' . $book['book_title'] . '</h3>
				         <div class="grid_img">
						   <div class="css3"><img src="images/Products/' . $book['book_id'] . '"  alt=""/></div>
					          <div class="mask1">
	                       		<div class="info">Quick View</div>
			                  </div>
	                    </div>
                       <div class="price">RM&nbsp; ' . $book['book_price'] . '</div>
					   </div>
					    </div>
					 
						  <ul class="list2">
							<button style="background-color: transparent;color: white;border: none; width: 100%;">Add To Cart</button>	  
					     </ul>
			    	    <div class="clear"></div>
			    	</a></div></form>';

                        }
                    }
                    ?>

			    	    <div class="clear"></div>
			    	</a></div>
				  <div class="clear"></div>
			  </div>
			  </div>
			  <div class="clear"></div>
			</div>
		   </div>
	    <?php include"_footer.php";?>
</body>
</html>