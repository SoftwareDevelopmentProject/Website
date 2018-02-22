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
<title>Technology BookStore:Top Seller</title>

<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<?php include"_head.php";?>
</head>
<body>
 <?php include"_header.php";?>
       <div class="login">
         <div class="wrap">
		<div>
			    <div class="box1">
                    <?php
                    $books = $db->getTop10Books();

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
						  <li>
						  	<img src="images/plus.png" alt=""/>
						  	<ul class="icon1 sub-icon1 profile_img">
							  <li><button style="background-color: transparent;border: none;color: white;"> Add To Cart</button>
								<ul class="sub-icon1 list">
									<li><h3>sed diam nonummy</h3><a href=""></a></li>
									<li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
								</ul>
							  </li>
							 </ul>
						   </li>
					     </ul>
			    	    <div class="clear"></div>
			    	</a></div></form>';
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