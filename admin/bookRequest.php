<?php
    $page = 'bookRequest';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
    <?php include_once '_head.php'; ?>
</head>
<body>

    <?php include_once '_header.php';?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><em class="fa fa-home"></em></a></li>
				<li><a href="bookRequest.php">Book Request</a></li>
			</ol>
		</div><!--/.row-->
		<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				if(isset($_POST['approve'])){
					$db->updateRequest($_POST['id'],'Approved');
					echo "<script>alert(".$_POST['id']."+'Approved')</script>";
				}else if(isset($_POST['deny'])){
					$db->updateRequest($_POST['id'],'Denied');
				}
			}
		?>	
			<h4>Member Report</h4>
			<table class="padding table-striped" style="text-align:center" width="100%" border=1 bordercolor="white" id="table">
				<tr class="staff_tr" style="color: #fff; background-color: #30a5ff; text-align: center " height="50px">
					<td width="">Staff Name</td>
					<td width="">Request Date</td>
					<td width="" colspan="2">Status</td>
				</tr>
				<?php
					$requests=$db->getRequest();
					foreach ($requests as $request):
                ?>
					<tr>
						<td><?php echo $request['staff_name'];?></td>
						<td><?php echo $request['request_created_time'];?></td>
                        <td><?php echo $request['status'];?></td>
                        <td> <button type="button" class="btn btn-primary" onClick="getDetail(<?php echo $request['request_id'];?>)" data-toggle="modal" data-target="#viewRequest">View</button></td>
                    </tr>
                    <?php endforeach; ?>
            </table>
			  			
        </div>
						
				
            <?php include_once '_footer.php'; ?>

	</div>	<!--/.main-->
	<!--modal start -->
	<div class="modal fade" id="viewRequest">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Request Detail</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body " id="modalBody">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer"><form method="post">
         <input type="submit" class="btn btn-primary" value="Approve" name="approve">
         <input type="submit" class="btn btn-primary" value="Deny" name="deny">
         <input type="hidden" name="id" >
          <button type="button" class="btn btn-primary" data-dismiss="modal">Back</button>
        </div></form>
        
      </div>
    </div>
  </div>
  <!--//modal end -->
	<script>
		function getDetail(id) {
				  var xhttp;    
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("modalBody").innerHTML = this.responseText;
						
					}
				  };
				  xhttp.open("GET", "requestDetail?id="+id, true);
				  xhttp.send();
				}
		
	</script>
	

</body>
</html>