<?php
session_start();
include_once '../include/DbFunction.php';
$db = new DbFunction;
$books=$db->getBookToEdit($_GET['id']);
		foreach($books as $book){
				echo'
						<div class="form-group">
								<label class="col-md-3 control-label" for="image">Privew</label>
									<div class="col-md-9">
										<div>
										<img src="../images/Products/'.$book['book_id'].'.jpg" alt="/" id="imgToRemove" class="myImg" data-toggle="modal" data-target="#previewModal2" onClick="showLarge(\'../images/Products/'.$book['book_id'].'.jpg\')">
										</div>
										<strong><p id="image_name2">'.$book['book_title'].'.jpg</p></strong>
									</div>
							</div>						
							<div class="form-group">
								<label class="col-md-3 control-label" for="image">Book Imange</label>
									<div class="col-md-9">
										<input type="button" class="btn btn-primary" id="selectIMG" value="Change Image" onClick="trigger2()">
										<input type="file" name="fileToUpload" id="fileToUpload2" onChange="readURL2(this)"  accept=".jpg,.jpeg">
									</div>
							</div>
				
					<form class="form-horizontal" method="post" action="stock.php">
						<fieldset style="padding: 20px; padding-right: 60px;">
							<!-- Book Title input-->
							<div class="form-group">
								<label class="col-md-3 control-label" for="booktitle">Book Title</label>
									<div class="col-md-9">
										<input id="bookTitle" name="bookTitle" type="text" placeholder="Book Title" class="form-control" value="'. $book['book_title'].'" onChange="checkChanges()" required>
									</div>
							</div>

							<!-- Author input-->
							<div class="form-group">
								<label class="col-md-3 control-label" for="author">Author</label>
									<div class="col-md-9">
										<input id="author" name="author" type="text" placeholder="Author" class="form-control" value="'.$book['book_author'].'" onChange="checkChanges()" required>
									</div>
							</div>

							<!-- publisher body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="publisher">Publisher</label>
									<div class="col-md-9">
										<input id="publisher" name="publisher" type="text" placeholder="Publisher" class="form-control" value=" '.$book['book_publisher'].'" onChange="checkChanges()" required>
									</div>
							</div>
							<!-- years body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="years">Years</label>
									<div class="col-md-9">
										<select class="form-control" style="width: 30%" name="year" id="year" onChange="checkChanges()">';
										for($i=date("Y");$i>=date("Y")-50;$i--){
												echo '<option value="'.$i.'"';if($i==$book['book_years']){echo 'selected';}echo'>'.$i.'</option>';
											}
											echo'
										</select>
									</div>
								</div>
							<!-- genre body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="genre">Genre</label>
									<div class="col-md-9">
										<select class="form-control" style="width: 30%" name="genre" id="genre">
											<option value="1"';if($book['genre_id']==1) {echo 'selected';}echo'>1</option>
											<option value="2"';if($book['genre_id']==2) {echo 'selected';}echo'>2</option>
											<option value="2"';if($book['genre_id']==3) {echo 'selected';}echo'>3</option>
											<option value="4"';if($book['genre_id']==4) {echo 'selected';}echo'>4</option>
											<option value="5"';if($book['genre_id']==5) {echo 'selected';}echo'>5</option>
											<option value="6"';if($book['genre_id']==6) {echo 'selected';}echo'>6</option>
											<option value="7"';if($book['genre_id']==7) {echo 'selected';}echo'>7</option>
											<option value="8"';if($book['genre_id']==8) {echo 'selected';}echo'>8</option>
											<option value="9"';if($book['genre_id']==9) {echo 'selected';}echo'>9</option>
											<option value="10"';if($book['genre_id']==10) {echo 'selected';}echo'>10</option>
										</select>
										
									</div>
							</div>
							
							<!-- des body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="description">Description</label>
									<div class="col-md-9">
										<textarea class="form-control" id="des" name="description" placeholder="Description" rows="5" onChange="checkChanges()">'.$book['book_description'].'</textarea>
									</div>
							</div>
							<!-- amount body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="amount">Amount</label>
									<div class="col-md-9">
										<input id="amount" name="amount" type="text" placeholder="Amount" class="form-control" onChange="amountValid(this.value)" onChange="checkChanges()" value="'.$book['book_stock'].'" required>
										<p class="err" id="err">Only number allowed !</p>
									</div>
							</div>
							
								<!-- price body -->
							<div class="form-group">
								<label class="col-md-3 control-label" for="price">Price (RM) </label>
									<div class="col-md-9">
										<input id="price" name="price" type="text" placeholder="Price(RM)" class="form-control" onChange="priceValid(this.value)" value="'.$book['book_price'].'" onChange="checkChanges()" required>
										<p class="err" id="priceErr">Invalid currency</p>
									</div>
							</div>
							
							<div class="col-md-12 widget-right" style="text-align: center">
								<input type="submit" class="btn btn-primary" style="margin-right: 20px" id="editBookSub" value="Submit" name="edit_book_submit_btn" id="submit" disabled>
								<input type="hidden" name="id" value="'.$book['book_id'].'">
          						<button type="button" class="btn btn-primary" data-dismiss="modal">Back</button>
							</div>
							
							</form>';
}