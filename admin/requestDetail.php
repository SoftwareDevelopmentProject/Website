<?php
include_once '../include/DbFunction.php';
$db = new DbFunction;
$details = $db->getRequestDetail($_GET['id']);
echo'<table class="padding table-striped" style="text-align:center" width="100%" border=1 bordercolor="white"><tr class="staff_tr" style="color: #fff; background-color: #30a5ff; text-align: center " height="50px">
					<td width="">Book ID</td>
					<td width="">Book Title</td>
					<td width="">Author</td>
					<td width="">Genre</td>
					<td width="">Years</td>
					<td width="">Price</td>
					<td width="">In Stock Quantity</td>
					<td width="">Request Amount</td>
				</tr>';
foreach($details as $detail) {
	echo 	'<tr><td>'.$detail['book_id'].'</td>
			<td>'.$detail['book_title'].'</td>
			<td>'.$detail['book_author'].'</td>
            <td>'.$detail['genre_name'].'</td>
            <td>'.$detail['book_years'].'</td>
            <td>'.$detail['book_price'].'</td>
			<td>'.$detail['book_stock'].'</td>
			<td>'.$detail['quantity'].'</td>
			</tr>
			';
}
echo '</table>';

?>