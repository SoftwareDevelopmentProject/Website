<?php
session_start();
    $page = 'order';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
    <?php include_once '_head.php'; ?>
</head>
<body>

    <?php include_once '_header.php';?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><em class="fa fa-home"></em></a></li>
				<li><a href="order.php">Order List</a></li>
			</ol>
		</div><!--/.row-->
		<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				$db->updateOrderStatus($_POST['status'],$_POST['id']);
				}
		?>	
			
		<div class="padding" style="overflow: auto; height: auto;">
			<img src="../images/logo.png" style="border-radius: 99px;opacity: 0.75">
			<h2>Order List</h2>
			<table class="table table-hover" id="table">
				<tr>
					<td width="">Order ID</td>
					<td width="">Order Date Time</td>
					<td width="">Status</td>
					<td width="">Order by</td>
					<td></td>
				</tr>
				<?php
					$orders=$db->getAllOrder();
					foreach ($orders as $order):
                ?>
					<tr>
						<td><?php echo 'OID'.sprintf('%04d',$order['order_id']); ?></td>
						<td><?php echo $order['order_created_time']; ?></td>
                        <td><form method="post" id="<?php echo $order['order_id'];?>">
                        <input type="hidden" name="id" value="<?php echo $order['order_id'];?>">
                        	<select name="status" onChange="edit(<?php echo $order['order_id'];?>)" class="drop_down" style="width: 50%">
                        		<option value="Processing" <?php if($order['order_status']=='Processing')echo 'selected';?>>Processing</option>
                        		<option value="Delivered" <?php if($order['order_status']=='Delivered')echo 'selected';?>>Delivered</option>
                        		<option value="Canceled" <?php if($order['order_status']=='Canceled')echo 'selected';?>>Canceled</option>
                        	</select>
                        </form>
                        </td>
                        <td><?php echo 'MID'.sprintf('%04d',$order['member_id']); ?></td>
                        <td><button type="button" class="btn btn-primary" onClick="getOrderDetail(<?php echo $order['order_id'];?>)" data-toggle="modal" data-target="#viewMember">View Details</button></td>
                    </tr>
                    <?php endforeach; ?>
            </table>
			  			
        </div>
						
				
            <?php include_once '_footer.php'; ?>

	</div>	<!--/.main-->
	
	<!-- start modal -->
	<div class="modal fade" id="viewMember">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
         <img src="../images/logo.png" style="border-radius: 99px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="modalBody">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <form method="post">
         	<input type="hidden" id="tmid" name="id">
         	<input type="hidden" id="t" name="trustfulness">
          	<input type="submit" id="subbtn" name="submitBtn" style="display: none">
          </form>
        </div>

      </div>
    </div>
  </div>
  
  <!--//end modal -->
	<script>
		//--view member js
		function getOrderDetail(id) {
				  var xhttp; 
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("modalBody").innerHTML = this.responseText;
					}
				  };
				  xhttp.open("GET", "getOrderDetails?id="+id, true);
				  xhttp.send();
				}
		function submitT(id,t){
			$('#tmid').val(id);
			$('#t').val(t);
			$('#subbtn').click();
		}
		
		function edit(id) {
			$('#'+id).submit();
		}
		
		
	</script>
	

</body>
</html>