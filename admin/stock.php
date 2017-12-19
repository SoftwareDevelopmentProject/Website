<?php
    $page = 'stock';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Stock</title>
    <?php include_once '_head.php'; ?>
</head>
<body>

    <?php include_once '_header.php';?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li><a href="stock.php">Stock</a></li>
			</ol>
		</div><!--/.row-->
		<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'&& isset($_POST['bookTitle'], $_POST['author'], $_POST['genre'],$_POST['description'], $_POST['publisher'], $_POST['year'], $_POST['price'], $_POST['amount'],$_POST['add_book_submit_btn'])){
				$db->add_book($_POST['bookTitle'], $_POST['author'], $_POST['genre'],$_POST['description'], $_POST['publisher'], $_POST['year'], $_POST['price'], $_POST['amount']);
	
			} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['del'])){
				$db->delBook($_POST['id']);
			}
		
		
		?>
		

	<!--confirmation message--//-->
		<div id="confirmBox">
						<div id="confirmContent" class="popup-content">
							<div class="popup-header">
								<span class="close">&times;</span>
								<h2>Remove Confirmation</h2>
							</div>
							<div class="popup-body" id="confirmMessage">
							</div>
							<div class="popup-footer">
								<button class="btn btn-primary btn-md" id="yes" >Yes</button>
								<button class="btn btn-primary btn-md" id="no" >No</button>
							</div>
						</div>

					</div>
			
				
		<div class="padding" style="overflow: auto; height: auto;">
					<tr>
				<td colspan="7" align="right" height="50px" >
				<button style="float: right; margin: 10px 10px;" id="addBtn" class="btn btn-primary btn-md">Add New Book</button>
				<button style="float: right; margin: 10px 0;" class="btn btn-primary btn-md">Place book request</button>
				
				</td>
				
			</tr>
			<table class="padding table-striped" style="text-align:center" width="100%" border=1 bordercolor="white">
				<tr class="staff_tr" style="color: #fff; background-color: #30a5ff; text-align: center " height="50px">
					<td width="" >Book ID</td>
					<td width="">Book Title</td>
					<td width="">Author</td>
					<td width="">Genre</td>
					<td width="">Publisher</td>
					<td width="">Years</td>
					<td width="">Price</td>
					<td width="">In stock amount</td>
					<td width=""></td>
					<td width=""></td>
					
				</tr>
				<?php
					$books = $db->getBooks();
					foreach($books as $book) :
                ?>
					<tr>
						<td><?php echo $book['book_id']; ?></td>
						<td><?php echo $book['book_title']; ?></td>
                        <td><?php echo $book['book_author']; ?></td>
                        <td><?php echo $book['genre_name']; ?></td>
                        <td><?php echo $book['book_publisher']; ?></td>
						<td><?php echo $book['book_years']; ?></td>
						<td><?php echo $book['book_price']; ?></td>
						<td><?php echo $book['book_stock']; ?></td>
						<td>
                            <button class="btn btn-default btn-sm" id="editBtn<?php echo $book['book_id'];?>" name="" value="Edit"></button>
						</td>
						<td>
							<form id="delete<?php echo $book['book_id']; ?>" method="post">
                                <input type="button" value="Remove" onClick="removeBook(<?php echo $book['book_id']; ?> ,'<?php echo $book['book_title']; ?>')" class="btn btn-default btn-sm" id="revBtn">
							    <input type="hidden" name="id" value="<?php echo $book['book_id']; ?>">
                                <input type="submit" name="del" style="display:none" id="sub<?php echo $book['book_id']; ?>"></form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </table>
			  			
        </div>
						
		
				<!-- Form  -->
	<div id=filter>					
	<div class="panel panel-default" id="form">
		<div class="panel-heading" style="display: none">
			Add Book
			<span class="pull-right close">&times;</span></div>
				<div class="panel-body" id="form-body">
					<form class="form-horizontal" method="post" id="realForm" >
						<fieldset style="padding: 20px; padding-right: 60px;">
						<h2>Add Book </h2>
							<!-- Book Title input-->
							<div class="form-group">
								<label class="col-md-3 control-label" for="booktitle">Book Title</label>
									<div class="col-md-9">
										<input id="bookTitle" name="bookTitle" type="text" placeholder="Book Title" class="form-control" required>
									</div>
							</div>

							<!-- Author input-->
							<div class="form-group">
								<label class="col-md-3 control-label" for="author">Author</label>
									<div class="col-md-9">
										<input id="author" name="author" type="text" placeholder="Author" class="form-control" required>
									</div>
							</div>

							<!-- publisher body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="publisher">Publisher</label>
									<div class="col-md-9">
										<input id="publisher" name="publisher" type="text" placeholder="Publisher" class="form-control" required>
									</div>
							</div>
							<!-- years body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="years">Years</label>
									<div class="col-md-9">
										<select class="form-control" style="width: 30%" name="year" id="year">
										<?php for($i=date("Y");$i>=date("Y")-50;$i--){
												echo '<option value="'.$i.'">'.$i.'</option>';
											}
											?>
										</select>
									</div>
								</div>
							<!-- genre body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="genre">Genre</label>
									<div class="col-md-9">
										<select class="form-control" style="width: 30%" name="genre" id="genre">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">4</option>
										</select>
										
									</div>
							</div>
							
							<!-- des body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="description">Description</label>
									<div class="col-md-9">
										<textarea class="form-control" id="des" name="description" placeholder="Description" rows="5"></textarea>
									</div>
							</div>
							<!-- amount body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="amount">Amount</label>
									<div class="col-md-9">
										<input id="amount" name="amount" type="text" placeholder="Amount" class="form-control" onKeyUp="amountValid(this.value)" required>
										<p class="err" id="err">Only number allowed !</p>
									</div>
							</div>
							
								<!-- price body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="price">Price (RM) </label>
									<div class="col-md-9">
										<input id="price" name="price" type="text" placeholder="Price(RM)" class="form-control" onKeyUp="priceValid(this.value)" required>
										<p class="err" id="priceErr">Invalid currency</p>
									</div>
							</div>
							

							<!-- Form actions -->
							<div class="form-group">
								<div class="col-md-12 widget-right" style="text-align: center">
									<input type="submit" class="btn btn-primary" style="margin-right: 20px" id="newBookSub" value="Submit" name="add_book_submit_btn">
									<button type="reset" class="btn btn-default" style="margin-right: 20px;">Reset</button>
									<input type="button" class="btn btn-default" value="Cancel" id="close" />
								</div>
							</div>
						</div>
					</div>
		</div>
	
		
		
            <?php include_once '_footer.php'; ?>

	</div>	<!--/.main-->
	
	<script>
	
		var form = document.getElementById("form");
		var box = document.getElementById("popupBox");
		var boxBody = document.getElementById("popupcontent");
		var span = document.getElementsByClassName("close")[0];
		var addBtn = document.getElementById("addBtn");
		var cancel = document.getElementById("close");
		var ok = document.getElementById("ok");
		var formBody = document.getElementById("form-body");
		var no = document.getElementById("no");
		var confirBox = document.getElementById("confirmBox");
		var confirmContent = document.getElementById("confirmContent");

		
		addBtn.onclick = function() {
			form.style.display = "block";

		}
		
		
		
		
			
			cancel.onclick = function() {
				formBody.style.animationName="animateback"; 
				formBody.style.animationDuration="0.4s";
				formBody.style.webkitAnimationDuration="0.4s";
				formBody.style.webkitAnimationName="animateback";	
				setTimeout(function() {
					form.style.display = "none";
					formBody.style.animationName= formBody.style.webkitAnimationDuration = formBody.style.webkitAnimationName = formBody.style.animationDuration = "";
					
				}, 400);
				

		}
			
		window.onclick = function(event) {
			if (event.target == form) {
				
				formBody.style.animationName="animateback"; 
				formBody.style.animationDuration="0.4s";
				formBody.style.webkitAnimationDuration="0.4s";
				formBody.style.webkitAnimationName="animateback";	
				setTimeout(function() {
					form.style.display = "none";
					formBody.style.animationName= formBody.style.webkitAnimationDuration = formBody.style.webkitAnimationName = formBody.style.animationDuration = "";
					
				}, 400);
				
			}
		}
		
		span.onclick = ok.onclick = function() {
				boxBody.style.animationName="animateback"; 
				boxBody.style.animationDuration="0.4s";
				boxBody.style.webkitAnimationDuration="0.4s";
				boxBody.style.webkitAnimationName="animateback";	
				setTimeout(function() {
					box.style.display = "none";
					boxBody.style.animationName= boxBody.style.webkitAnimationDuration = boxBody.style.webkitAnimationName = boxBody.style.animationDuration = "";
					
				}, 400);
				

		}
		
		no.onclick = function() {
				confirmContent.style.animationName="animateback"; 
				confirmContent.style.animationDuration="0.4s";
				confirmContent.style.webkitAnimationDuration="0.4s";
				confirmContent.style.webkitAnimationName="animateback";	
				setTimeout(function() {
					confirBox.style.display = "none";
					confirmContent.style.animationName= confirmContent.style.webkitAnimationDuration = confirmContent.style.webkitAnimationName = confirmContent.style.animationDuration = "";
					
				}, 400);
				

		}
			
		window.onclick = function(event) {
			if (event.target == box) {
				
				boxBody.style.animationName="animateback"; 
				boxBody.style.animationDuration="0.4s";
				boxBody.style.webkitAnimationDuration="0.4s";
				boxBody.style.webkitAnimationName="animateback";	
				setTimeout(function() {
					box.style.display = "none";
					boxBody.style.animationName= boxBody.style.webkitAnimationDuration = boxBody.style.webkitAnimationName = boxBody.style.animationDuration = "";
					
				}, 400);
				
			}
		}
		//disabling save button
		
			function changeRole(changedVal, oriVal, id) {
				if (oriVal!= changedVal) {
					document.getElementById('saveBtn'+ id).disabled = false;
				} else {
					document.getElementById('saveBtn'+ id).disabled = true;
				}				
			}
		//delete confirmation
	
			function removeBook(id, title){
				$("#confirmBox").css("display","block");
				$("#confirmMessage").html("Are you sure to remove " + title + " ?");
				$("#yes").attr("onclick", "delBook(" + id + ")");
			}
	
	
		//DELETE STAFF
			function delBook(id){
				
				$("#sub" + id).click();
			}
		//registration form data validity
			function amountValid(text){
				if (/^\d+$/.test(text)) {
					document.getElementById("err").style.display = "none";
					document.getElementById("newBookSub").disabled = false;
					
					
				}else{
					document.getElementById("err").style.display = "block";
					document.getElementById("newBookSub").disabled = true;
					
			
				}
			}
		
		function priceValid(text){
				if (/^-{0,1}\d*\.{0,1}\d+$/.test(text)) {
					document.getElementById("priceErr").style.display = "none";
					document.getElementById("newBookSub").disabled = false;
					
					
				}else{
					document.getElementById("priceErr").style.display = "block";
					document.getElementById("newBookSub").disabled = true;
					
			
				}
			}
		//check email 
			function checkEmail(str) {
				  var xhttp;    
				  if (str == "") {
					  document.getElementById("email_err").style.display = "none";
					  document.getElementById("email").style.borderColor = "";
					  document.getElementById("newBookSub").disabled = false;
					  
					return;
				  }
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("email_err").innerHTML = this.responseText;
						document.getElementById("email_err").style.display = "block";
						if (this.response!=''){
							document.getElementById("newBookSub").disabled = true;
						}
					}
				  };
				  xhttp.open("GET", "checkemail.php?email="+str, true);
				  xhttp.send();
				}
		
	</script>
	

</body>
</html>