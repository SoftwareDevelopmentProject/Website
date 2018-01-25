<?php
session_start();
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
					$db->updateRequest($_POST['id'],2);
				}else if(isset($_POST['deny'])){
					$db->updateRequest($_POST['id'],1);
				}
			}
		?>
	<div class="padding" style="overflow: auto; height: auto;">
		<img src="../images/logo.png" style="border-radius: 99px;opacity: 0.75">
			<h2>Book Request</h2>
			<table class="table table-hover">
				<tr>
					<td width="">Staff Name</td>
					<td width="">Request Date</td>
					<td width="">Status</td>
					<td></td>
				</tr>
				<?php
					$requests=$db->getRequest();
					foreach ($requests as $request):
                ?>
					<tr>
						<td><?php echo $request['staff_name'];?></td>
						<td><?php echo $request['request_created_time'];?></td>
                        <td><?php echo $request['status_name'];?></td>
                        <td> <button type="button" class="btn btn-primary" onClick="getDetail(<?php echo $request['request_id'];?>)" data-toggle="modal" data-target="#viewRequest">View</button></td>
                    </tr>
                    <?php endforeach; ?>
            </table>
		</div>
			  			
        </div>
						
				
            <?php include_once '_footer.php'; ?>

	</div>	<!--/.main-->
	<!--modal start -->
	<div class="modal fade" id="viewRequest">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
         <img src="../images/logo.png" style="border-radius: 99px;">
          <h2 class="modal-title" style="color: rgba(235,165,64,1.00);">Request Detail</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body " id="modalBody">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer"><form method="post">
         <input type="submit" class="btn btn-primary" value="Approve" name="approve">
         <input type="submit" class="btn btn-primary" value="Deny" name="deny">
         <input type="hidden" name="id" id="r_id" >
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
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
						$('#r_id').val(id);
						
						
					}
				  };
				  xhttp.open("GET", "requestDetail?id="+id, true);
				  xhttp.send();
				}
		
	</script>
	

</body>
</html>