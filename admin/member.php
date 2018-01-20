<?php
session_start();
    $page = 'member';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Member</title>
    <?php include_once '_head.php'; ?>
</head>
<body>

    <?php include_once '_header.php';?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php"><em class="fa fa-home"></em></a></li>
				<li><a href="memberReport.php">Member</a></li>
			</ol>
		</div><!--/.row-->
		<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitBtn'])){
				$db->updateTrustfulness($_POST['id'],$_POST['trustfulness']);
				}
		?>	
			
		<div class="padding" style="overflow: auto; height: auto;">
			<h4>Member Report</h4>
			<table class="padding table-striped" style="text-align:center" width="100%" border=1 bordercolor="white" id="table">
				<tr class="staff_tr" style="color: #fff; background-color: #30a5ff; text-align: center " height="50px">
					<td width="">Member ID</td>
					<td width="">Member Name</td>
					<td width="">Created at</td>
					<td width="">Status</td>
					<td width="">Negative Feedback</td>
					<td width="">Positive Feedback</td>
					<td></td>
				</tr>
				<?php
					$members=$db->reportGetMember();
					foreach ($members as $member):
                ?>
					<tr>
						<td><?php echo 'MID'.sprintf('%04d',$member['member_id']); ?></td>
						<td><?php echo $member['member_name']; ?></td>
                        <td><?php echo $member['member_created_time']; ?></td>
                        <td><?php 
							switch ($member['member_trustfulness']) {
								case 0:
									echo 'Non-trusted';
									break;
								case 1:
									echo 'Trusted';
							} 
							?></td>
                        <td><?php echo $member['negative_feedback']; ?></td>
                        <td><?php echo $member['positive_feedback']; ?></td>
                        <td><button type="button" class="btn btn-primary" onClick="getMemberDetail(<?php echo $member['member_id'];?>)" data-toggle="modal" data-target="#viewMember">View Profile</button></td>
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
          <h2 class="modal-title">Member Profile</h2>
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
		function getMemberDetail(id) {
				  var xhttp; 
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("modalBody").innerHTML = this.responseText;
					}
				  };
				  xhttp.open("GET", "getMemberProfile?id="+id, true);
				  xhttp.send();
				}
		function submitT(id,t){
			$('#tmid').val(id);
			$('#t').val(t);
			$('#subbtn').click();
			
		}
		
	</script>
	

</body>
</html>