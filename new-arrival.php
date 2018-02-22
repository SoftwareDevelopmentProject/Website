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
    <title>Technology BookStore:New-Arrival</title>
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
		        <div class="cont span_2_of_3" style="width: 98.1%;">
		            <div class="mens-toolbar">
                        <div class="sort">
                            <div class="sort-by">
		                        <label>Sort By</label>
		                                <select>
                                            <option value="">Popularity</option>
                                            <option value="">Price : High to Low</option>
                                            <option value="">Price : Low to High</option>
		                                </select>
		                                <a href=""><img src="images/arrow2.gif" alt="" class="v-middle"></a>
                            </div>
    		            </div>
	                    <div class="pager">
	                        <div class="limiter visible-desktop">
	                            <label>Show</label>
	            <select>
	                            <option value="" selected="selected">
	                    9                </option>
	                            <option value="">
	                    15                </option>
	                            <option value="">
	                    30                </option>
	                        </select> per page        
	             </div>
	       		<ul class="dc_pagination dc_paginationA dc_paginationA06">
				    <li><a href="#" class="previous">Pages</a></li>
				    <li><a href="#">1</a></li>
				    <li><a href="#">2</a></li>
			  	</ul>
		   		<div class="clear"></div>
	    	</div>
     	    <div class="clear"></div>
	       </div>
            <?php
            $books9 = $db->get9book();
            foreach ($books9 as $book9){
                echo '
                <form method="post">
                <input type="hidden" name="book_id" value="'.$book9['book_id'].'"/>
                <input type="hidden" name="quantity" value="1" />
				   <div class="col_1_of_single1 span_1_of_single1"><a href="singles/'.$book9['book_id'].'">
				     <div class="view1 view-fifth1">
				  	  <div class="top_box">
					  	<h3 class="m_1">'.$book9['book_title'].'</h3>
				         <div class="grid_img">
						   <div class="css3"><img src="images/Products/'.$book9['book_id'].'.jpg" alt=""/></div>
					          <div class="mask1">
	                       		<div class="info">Quick View</div>
			                  </div>
	                    </div>
                       <div class="price">RM&nbsp;'.$book9['book_price'].'</div>
					   </div>
					    </div>
						 <ul class="list2">
							<button style="background-color: transparent;color: white;border: none; width: 100%;">Add To Cart</button>	  
					     </ul>
			    	    <div class="clear"></div>
			    	</a></div>
                </form>				 
			';
            }
            ?>
            <div class="clear"></div>
			  </div>
			  <div class="clear"></div>
			</div>
		   </div>
	    <?php include"_footer.php";?>
</body>
</html>