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
    <title>Technology Bookstore:Home</title>
    <?php include "_head.php"; ?>
</head>
<body>
    <?php include "_header.php"; ?>
        <div class="index-banner">
       	  <div class="wmuSlider example1" style="height: 560px;">
			  <div class="wmuSliderWrapper">
				  <article style="position: relative; width: 100%; opacity: 1;"> 
				   	<div class="banner-wrap">
					   	<div class="slider-left">
							<img src="images/banner1.jpg" alt=""/> 
						</div>
						 <div class="slider-right">
						    <h1>Maleficent</h1>
						    <p>The Curse of Maleficent</p>
						    <div class="btn"><a href="singles/11">Shop Now</a></div>
						 </div>
						 <div class="clear"></div>
					 </div>
					</article>
				   <article style="position: absolute; width: 100%; opacity: 0;"> 
				   	 <div class="banner-wrap">
					   	<div class="slider-left">
							<img src="images/banner2.jpg" alt=""/> 
						</div>
						 <div class="slider-right">
						    <h1>Harry Potter</h1>
						    <p>The Complete Series</p>
						    <div class="btn"><a href="singles/8">Shop Now</a></div>
						 </div>
						 <div class="clear"></div>
					 </div>
				   </article>
				</div>
                <a class="wmuSliderPrev">Previous</a><a class="wmuSliderNext">Next</a>
                <ul class="wmuSliderPagination">
                	<li><a href="#" class="">0</a></li>
                	<li><a href="#" class="">1</a></li>
                  </ul>
                 <a class="wmuSliderPrev">Previous</a><a class="wmuSliderNext">Next</a><ul class="wmuSliderPagination"><li><a href="#" class="wmuActive">0</a></li><li><a href="#" class="">1</a></li></div>
            	 <script src="js/jquery.wmuSlider.js"></script> 
				 <script type="text/javascript" src="js/modernizr.custom.min.js"></script> 
						<script>
       						 $('.example1').wmuSlider();         
   						</script> 	           	      
             </div>
             <div class="main">
                <div class="wrap">
             	  <div class="content-top">
             		<div class="lsidebar span_1_of_c1">
					  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing</p>
					</div>
					<div class="cont span_2_of_c1">
					  <div class="social">	
					     <ul>	
						  <li class="facebook"><a href="#"><span> </span></a><div class="radius"> <img src="images/radius.png"><a href="#"> </a></div><div class="border hide"><p class="num">1.51K</p></div></li>
						 </ul>
			   		   </div>
					   <div class="social">	
						   <ul>	
							  <li class="twitter"><a href="#"><span> </span></a><div class="radius"> <img src="images/radius.png"></div><div class="border hide"><p class="num">1.51K</p></div></li>
						  </ul>
			     		</div>
						 <div class="social">	
						   <ul>	
							  <li class="google"><a href="#"><span> </span></a><div class="radius"> <img src="images/radius.png"></div><div class="border hide"><p class="num">1.51K</p></div></li>
						   </ul>
			    		 </div>
						 <div class="social">	
						   <ul>	
							  <li class="dot"><a href="#"><span> </span></a><div class="radius"> <img src="images/radius.png"></div><div class="border hide"><p class="num">1.51K</p></div></li>
						  </ul>
			     		</div>
						<div class="clear"> </div>
					  </div>
					  <div class="clear"></div>			
				   </div>
				  <div class="content-bottom">
				   <div class="box1">
                       <?php
                       $books6 = $db->get6book();
                       foreach($books6 as $book6) {
                           echo ' <div class="col_1_of_3 span_1_of_3"><a href="singles/'.$book6['book_id'].'">
				     <div class="view view-fifth">

				  	  <div class="top_box">
					  	<h3 class="m_1">'.$book6['book_title'].'</h3>
				         <div class="grid_img">
						   <div class="css3"><img src="images/Products/'.$book6['book_id'].'.jpg" alt=""/></div>
					          <div class="mask">
	                       		<div class="info">Quick View</div>
			                  </div>
	                    </div>
                       <div class="price">RM '.$book6['book_price'].'</div>
					   </div>
					    </div>
					
						 <ul class="list" style="margin-bottom: 0px;">
						  <li>
						  	<img src="images/plus.png" alt=""/>
						  	<ul class="icon1 sub-icon1 profile_img">
							  <li><a class="active-icon c1" href="#">Add To Cart </a>
								<ul class="sub-icon1 list">
									<li><h3>sed diam nonummy</h3><a href=""></a></li>
									<li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
								</ul>
							  </li>
							 </ul>
						   </li>
					     </ul>
			    	    <div class="clear"></div>
			    	</a></div>';
                       }

			  ?>

				  <div class="clear"></div>
			    </div>
			  </div>
			 </div>
        </div>
<?php include "_footer.php"; ?>

</body>
</html>