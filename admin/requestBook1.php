<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$b = array();
	foreach($_POST as $book_id => $quantity) {
		if ($quantity > 0)
			array_push($b, array('id' => $book_id, 'quantity' => $quantity));
	}
	$db->insertBookRequest($_SESSION['staff'],$b);
}
		
	?>		
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
								<select name="<?php echo $book['book_id'];?>" required class="drop_down" style="width: 30%">
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
							<input type="submit" class="btn btn-primary btn-md pull-right" style="float: right; margin: 10px 10px;"/>
							</form>
							<button class="btn btn- btn-md pull-right" style="float: right; margin: 10px 10px;" onClick="window.open('stock.php', '_self')">Back</button>
							
						</td>
					</tr>
           
			  			
        </div>
						
		
				
							
						
					
		
	
		
		
      
		
	
	