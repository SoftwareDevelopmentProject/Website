<?php
if(isset($_POST['id'])){
   $page='stock';
}else{
	header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Book</title>
    <?php include_once '_head.php'; ?>
</head>
<body>

    <?php include_once '_header.php';
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$books=$db->getBook($_POST['id']);
		foreach($books as $book);
	}
	?>	
    			
				<div class="panel-body" id="form-body">
					<form class="form-horizontal" method="post" id="realForm" action="stock.php">
						<fieldset style="padding: 20px; padding-right: 60px;">
						<h2>Edit Book </h2>
							<!-- Book Title input-->
							<div class="form-group">
								<label class="col-md-3 control-label" for="booktitle">Book Title</label>
									<div class="col-md-9">
										<input id="bookTitle" name="bookTitle" type="text" placeholder="Book Title" class="form-control" value="<?php echo $book['book_title'];?>" onKeyUp="checkChanges()" required>
									</div>
							</div>

							<!-- Author input-->
							<div class="form-group">
								<label class="col-md-3 control-label" for="author">Author</label>
									<div class="col-md-9">
										<input id="author" name="author" type="text" placeholder="Author" class="form-control" value="<?php echo $book['book_author'];?>" onKeyUp="checkChanges()" required>
									</div>
							</div>

							<!-- publisher body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="publisher">Publisher</label>
									<div class="col-md-9">
										<input id="publisher" name="publisher" type="text" placeholder="Publisher" class="form-control" value="<?php echo $book['book_publisher'];?>" onKeyUp="checkChanges()" required>
									</div>
							</div>
							<!-- years body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="years">Years</label>
									<div class="col-md-9">
										<select class="form-control" style="width: 30%" name="year" id="year" onChange="checkChanges()">
										<?php for($i=date("Y");$i>=date("Y")-50;$i--){
												echo '<option value="'.$i.'"';if($i==$book['book_years']){echo 'selected';}echo'>'.$i.'</option>';
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
											<option value="1"<?php if($book['genre_id']==1) {echo 'selected';}?>>1</option>
											<option value="2" <?php if($book['genre_id']==2) {echo 'selected';}?>>2</option>
											<option value="3" <?php if($book['genre_id']==3) {echo 'selected';}?>>3</option>
											<option value="4" <?php if($book['genre_id']==4) {echo 'selected';}?>>4</option>
											<option value="5" <?php if($book['genre_id']==5) {echo 'selected';}?>>5</option>
											<option value="6" <?php if($book['genre_id']==6) {echo 'selected';}?>>6</option>
											<option value="7" <?php if($book['genre_id']==7) {echo 'selected';}?>>7</option>
											<option value="8" <?php if($book['genre_id']==8) {echo 'selected';}?>>8</option>
											<option value="9" <?php if($book['genre_id']==9) {echo 'selected';}?>>9</option>
											<option value="10" <?php if($book['genre_id']==10) {echo 'selected';}?>>10</option>
										</select>
										
									</div>
							</div>
							
							<!-- des body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="description">Description</label>
									<div class="col-md-9">
										<textarea class="form-control" id="des" name="description" placeholder="Description" rows="5" onKeyUp="checkChanges()"><?php echo $book['book_description'];?></textarea>
									</div>
							</div>
							<!-- amount body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="amount">Amount</label>
									<div class="col-md-9">
										<input id="amount" name="amount" type="text" placeholder="Amount" class="form-control" onKeyUp="amountValid(this.value)" onChange="checkChanges()" value="<?php echo $book['book_stock'];?>" required>
										<p class="err" id="err">Only number allowed !</p>
									</div>
							</div>
							
								<!-- price body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="price">Price (RM) </label>
									<div class="col-md-9">
										<input id="price" name="price" type="text" placeholder="Price(RM)" class="form-control" onKeyUp="priceValid(this.value)" value="<?php echo $book['book_price'];?>" onChange="checkChanges()" required>
										<p class="err" id="priceErr">Invalid currency</p>
									</div>
							</div>
							

							<!-- Form actions -->
							<div class="form-group">
								<div class="col-md-12 widget-right" style="text-align: center">
									<input type="submit" class="btn btn-primary" style="margin-right: 20px" id="editBookSub" value="Submit" name="edit_book_submit_btn">
									<input type="hidden" value="<?php echo $_POST['id'];?>" name="id">
									<button type="reset" class="btn btn-default" style="margin-right: 20px;">Reset</button>
									<input type="button" class="btn btn-default" value="Back" id="close" onClick="window.open('stock.php','_self')" />
								</div>
							</div>
						</div>
					</div>
	
		<script>
			function checkChanges(){
			var $new=$('#title').val() + $('#author').val() + $('#publisher').val() + $('#year').val() + $('#genre').val() + $('#des').val() + $('#amount').val() + $('#price').val();
			var $old=<?php echo $book['book_title'].$book['book_author'].$book['book_publisher'].$book['book_years'].$book['genre_name'].$book['book_description'].$book['book_stock'].$book['book_price'];?>;
				if($new==$old){
					$('#editBookSub').attr('disabled','disabled');
				}else{
					$('#editBookSub').removeAttr('disabled');
				}
			}
					
					
					</script>
	
	

</body>
</html>