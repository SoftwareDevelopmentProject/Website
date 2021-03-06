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
    <base href="../">
<title>Technology BookStore:Book</title>
    <?php include "_head.php";?>

<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src ="js/quantity.js"></script>
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
<!----details-product-slider--->
				<!-- Include the Etalage files -->
					<link rel="stylesheet" href="css/etalage.css">
					<script src="js/jquery.etalage.min.js"></script>
				<!-- Include the Etalage files -->
				<script>
						jQuery(document).ready(function($){
			
							$('#etalage').etalage({
								thumb_image_width: 300,
								thumb_image_height: 400,
								
								show_hint: true,
								click_callback: function(image_anchor, instance_id){
									alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
								}
							});
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

					});
				</script>
				<!----//details-product-slider--->	

</head>
<body>
  <?php include "_header.php";?>
       <div class="single">
         <div class="wrap">
		<div class="cont span_2_of_3" style ="width:100%;">
			  <div class="labout span_1_of_a1">

                  <?php
                  if (isset($_GET['book_id'])) {
                      $books = $db->getBook($_GET['book_id']);}?>
                      <img src="images/Products/<?php echo $books['book_id']; ?>.jpg" alt="" style="width:330px"/>
					
					
		
			</div>

			<div class="cont1 span_2_of_a1">

                        <h3 class="m_3"><?php echo $books['book_title']; ?></h3>

				<div class="price_single">
							  <span class="">RM<?php echo $books['book_price']; ?></span>

							</div>
                <?php
                if(isset($_POST['book_id'], $_POST['qty'])){
                    $db->addCart($_POST['book_id'],$_POST['qty']);
                }
                if (isset($_POST['scale'])) {
                    $db->addFeedback($user['member_id'], $_GET['book_id'], $_POST['scale'], $_POST['review']);
                    //echo '<script>window.location.replace("' . $_GET['book_id'] . '");</script>';
                }


                ?>


				<ul class="options">
					<h4 class="m_9">Select Quantity</h4>


                        <li class="quantity" onclick="quantityCtrl(0)">-</li>
                        <li class="quantity" id="qty">1</li>
                        <li class="quantity" onclick="quantityCtrl(1)">+</li>


					<div class="clear"></div>
				</ul>
                <form method="post">
                <div class="btn_form">
                    <input type="hidden" value ="1" id="hidden-qty" name="qty" />
                 <input type="hidden" value="<?php echo $books['book_id']; ?>" name="book_id">
					 <input type="submit" value="Add to Cart" style="" title="">

                </div>
                </form>
				</div>


				<ul class="add-to-links">
    			   <li><img src="images/wish.png" alt=""/>book stock left: <?php echo $books['book_stock']; ?></li>
    			</ul>
    			<p class="m_desc" style="text-align: justify;"><?php echo $books['book_description']; ?></p>


			</div>
			<div class="clear"></div>
     
     
         <ul id="flexiselDemo3">
             <?php $books5 = $db->get5book();
             foreach($books5 as $book5){
                 echo'	<li><a href="singles/'.$book5['book_id'].'"><img src="images/Products/'.$book5['book_id'].'.jpg" /></a><div class="grid-flex"><a href="singles/'.$book5['book_id'].'">'.$book5['book_title'].'</a><p>RM '.$book5['book_price'].'</p></div></li>';
             }?>

		 </ul>
	    <script type="text/javascript">
		 $(window).load(function() {
			$("#flexiselDemo1").flexisel();
			$("#flexiselDemo2").flexisel({
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
	 <div class="toogle">
     	<h3 class="m_3">Book Details</h3>
     	<table>
     	<tr><td width="200">Author:</td>
     	    <td><?php echo $books['book_author']; ?></td>
     	</tr>
     	<tr>
     		<td width="200">Publisher:</td>
     	    <td><?php echo $books['book_publisher']; ?></td>
     	</tr>
     	<tr>
     		<td width="200">Year of publish:</td>
     	    <td><?php echo $books['book_years']; ?></td>
     	</tr>
     	
     	
    </table>
     
     </div>					
	 <div class="toogle">
     	<h3 class="m_3">Product Reviews</h3>
         <?php if ($user != null) : ?>
         <form method="post" action="singles/<?php echo $_GET['book_id'] ?>">
             <select name="scale">
                 <option selected disabled>Rating scale</option>
                 <option value="1">1</option>
                 <option value="2">2</option>
                 <option value="3">3</option>
                 <option value="4">4</option>
                 <option value="5">5</option>
                 <option value="6">6</option>
                 <option value="7">7</option>
                 <option value="8">8</option>
                 <option value="9">9</option>
                 <option value="10">10</option>
             </select>
             <br>
             <br>
             <textarea name="review" style="width: 100%; height: 80px" placeholder="Write a review..."></textarea>
             <input type="submit" value="Submit" />
         </form>

         <?php endif; ?>

         <div class="review-container" style="margin-top: 30px;">
             <?php foreach($books['feedback'] as $feedback) : ?>
            <p style="margin: 15px 0; padding: 5px;">
                <span style="font-weight: bold"><?php echo $feedback['member_name']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp; &#9733; <?php echo $feedback['feedback_scale']; ?> / 10<br/>
                <?php echo $feedback['feedback_comment']; ?><br/>
                <span style="font-size: 12px">Rate as:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:#FFAF02;" href="rate_feedback.php?id=<?php echo $feedback['feedback_id']; ?>&scale=2&book_id=<?php echo $_GET['book_id']; ?>">Very Useful</a> | <a style="color:#FFAF02;" href="rate_feedback.php?id=<?php echo $feedback['feedback_id']; ?>&scale=1&book_id=<?php echo $_GET['book_id']; ?>">Useful</a> | <a style="color:#FFAF02;" href="rate_feedback.php?id=<?php echo $feedback['feedback_id']; ?>&scale=0&book_id=<?php echo $_GET['book_id']; ?>">Not Useful</a></span>
            </p>
             <?php endforeach; ?>
         </div>
     </div>
     </div>
     <div class="clear"></div>
	 </div>
     </div>

	  <?php include "_footer.php";?>
</body>
</html>