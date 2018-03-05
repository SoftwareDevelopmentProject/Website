<?php include_once '../include/DbFunction.php';
					$db = new DbFunction;
?>
		<h2>Order Details for <?php echo 'BID'.sprintf('%04d',$_GET['id']);?></h2>
			<table class="table" id="table">
				<tr>
					<td width="">Book ID</td>
					<td width="">Book Name</td>
					<td width="">Order Quantity</td>
					<td></td>	
				</tr>
				<?php
					
					$orders=$db->getOrderDetailsById($_GET['id']);
					foreach ($orders as $order):
                ?>
					<tr>
						<td><?php echo 'BID'.sprintf('%04d',$order['book_id']); ?></td>
						<td><?php echo $order['book_title']; ?></td>
                        <td><?php echo $order['order_detail_quantity']; ?></td>
                    </tr>
                    <?php endforeach; ?>