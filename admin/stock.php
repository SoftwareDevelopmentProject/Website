<?php
    session_start();
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
			} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_book_submit_btn'])) {
				$db->updateBook($_POST['id'],$_POST['bookTitle'], $_POST['author'], $_POST['genre'],$_POST['description'], $_POST['publisher'], $_POST['year'], $_POST['price'], $_POST['amount']);
			} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['request'])){
				$b = array();
				foreach($_POST as $book_id => $quantity) {
					if ($quantity > 0)
						array_push($b, array('id' => $book_id, 'quantity' => $quantity));
				}
			$db->insertBookRequest($_SESSION['staff'],$b);
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
				<td colspan="11" align="right" height="50px" >
				<button style="float: right; margin: 10px 10px;" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addBook">Add New Book</button>
				<button style="float: right; margin: 10px 0;" class="btn btn-primary btn-md" data-toggle="modal" data-target="#requestBook" onClick="">Place book request</button>
				
				</td>
				
			</tr>
			<h2>Book Stock</h2>
			<table class="padding table-striped" style="text-align:center" width="100%" border=1 bordercolor="white">
				<tr class="staff_tr" style="color: #fff; background-color: #30a5ff; text-align: center" height="50px">
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
						<td><?php echo 'RM '.$book['book_price']; ?></td>
						<td><?php echo $book['book_stock']; ?></td>
						<td><button type="button" class="btn btn-primary" onClick="editBook(<?php echo $book['book_id'];?>)" data-toggle="modal" data-target="#editBook">Edit</button>
						</td>
						<td>
                                <input type="button" value="Remove" onClick="removeBook(<?php echo $book['book_id']; ?> ,'<?php echo $book['book_title']; ?>')" class="btn btn-default btn-sm" data-toggle="modal" data-target="#deleteBook">
							 
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </table>
			  			
        </div>	

		
			<!--modal start -->
	<div class="modal fade" id="editBook">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h2 class="modal-title">Edit Book</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
		<div class="panel panel-default">
			<div class="panel-body">
       			 <div class="modal-body " id="modalBody">
       			 </div>
			</div>
		</div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        
        </div>
        
      </div>
    </div>
  </div>
  <!-- del modal -->
	<div class="modal fade" id="deleteBook">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h2 class="modal-title">Delete Book</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
       	<div class="modal-body popup-body" id="modalBodyDel">
       	</div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <form method="post">
        	<input type="submit"class="btn btn-primary btn-md" value="Yes" name="del">
        	<input type="hidden" id="delBookid" name="id">
        	<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        	</form>
        </div>
        
      </div>
    </div>
  </div>
  <!-- add book modal -->
	<div class="modal fade" id="addBook">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h2 class="modal-title">Add Book</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
       	<div class="modal-body">
       		<div class="panel panel-default">
				<div class="panel-body">
					<form class="form-horizontal" method="post">
						<fieldset style="padding: 20px; padding-right: 60px;">
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
									<input type="button" class="btn btn-default" value="Cancel" data-dismiss="modal">
									</form>
								</div>
							</div>
						</div>
					</div>
       	</div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        </div>
        
      </div>
    </div>
  </div>
  
  <!--request  Modal  -->
  <div class="modal fade" id="requestBook">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h2 class="modal-title">Request Book</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
       	<div class="modal-body" id="modalBodyRequest">
       		<div class="padding" style="overflow: auto; height: auto;">
			<h4>Place Book Request</h4>
			<table class="padding table-striped" style="text-align:center" width="100%" border=1 bordercolor="white">
				<tr class="staff_tr" style="color: #fff; background-color: #30a5ff; text-align: center " height="50px">
					<td width="" >Book ID</td>
					<td width="">Book Title</td>
					<td width="">Author</td>
					<td width="">Genre</td>
					<td width="">Years</td>
					<td width="">Price</td>
					<td width="">In Stock Quantity</td>
					<td width="">Request Amount</td>
					
				</tr><form method="post">
				<?php
					$books = $db->getBooks();
					foreach($books as $book) :
                ?>
					<tr>
						<td><?php echo $book['book_id']; ?></td>
						<td><?php echo $book['book_title']; ?></td>
                        <td><?php echo $book['book_author']; ?></td>
                        <td><?php echo $book['genre_name']; ?></td>
						<td><?php echo $book['book_years']; ?></td>
						<td><?php echo 'RM '.$book['book_price']; ?></td>
						<td><?php echo $book['book_stock']; ?></td>
						<td>
								<select name="<?php echo $book['book_id'];?>" required class="drop_down" style="width: 80%">
									<option value="0">0</option>
									<option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="150">150</option>
                                    <option value="200">200</option>
                                </select>
                        </td>
                    </tr>
                    <?php endforeach; ?>
				</table>
                    <tr>
						<td colspan="9" align="right" height="50px" >
							<input type="submit" class="btn btn-primary btn-md pull-right" style="float: right; margin: 10px 10px;" name="request"/>
							</form>
							<button class="btn btn- btn-md pull-right" style="float: right; margin: 10px 10px;" data-dismiss="modal">Back</button>
							
						</td>
					</tr>
        	</div>
       	</div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        </div>
        
      </div>
    </div>
  </div>
  
  
  <!--//modal end -->
		
		
            <?php include_once '_footer.php'; ?>

	</div>	<!--/.main-->
	
	<script>
	
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
				$("#modalBodyDel").html("Are you sure to remove " + title + " ?");
				$('#delBookid').val(id);
			}
	
		//add book form data validity
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
		
		// edit book
			function editBook(id){
				  var xhttp;
				$('#hidden').val(id);
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("modalBody").innerHTML = this.responseText;
					}
				  };
				  xhttp.open("GET", "editBook1.php?id="+id, true);
				  xhttp.send();
				}
		// check changes edit
		function checkChanges(){
			var $new=$('#title').val() + $('#author').val() + $('#publisher').val() + $('#year').val() + $('#genre').val() + $('#des').val() + $('#amount').val() + $('#price').val();
			var $old='<?php echo trim(preg_replace('/\s\s+/', ' ', $book['book_title'].$book['book_author'].$book['book_publisher'].$book['book_years'].$book['genre_name'].$book['book_description'].$book['book_stock'].$book['book_price']));?>';
				if($new==$old){
					$('#editBookSub').attr('disabled','disabled');
				}else{
					$('#editBookSub').removeAttr('disabled');
				}
			}


		
	</script>
	

</body>
</html>