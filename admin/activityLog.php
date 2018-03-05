<?php
session_start();
$page = 'activityLog';
?>

<!DOCTYPE html>
<html>

<head>
	<title>Member activity log</title>
	<?php include_once '_head.php'; ?>
</head>

<body>

	<?php include_once '_header.php'; 
	if($user['staff_role']<1){
	    echo '<script>window.location.replace("index.php", "_self")</script>';
	}
	?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a>
				


				</li>
				<li><a href="activityLog.php">Member activity log</a>
				</li>
			</ol>
		</div>
		<!--/.row-->

			<div class="padding" style="overflow: auto; height: auto;">
			<img src="../images/logo.png" style="border-radius: 99px;opacity: 0.75">
			<tr><form method="post">
				<td colspan="11" align="right" height="50px" >
				<select class="drop_down pull-right" style="width: 10%;margin-right: 1em" name="filter" onChange="loadMemberByTrust(this.value)">
					<option value="all">All</option>
					<option value="0">Non-Trusted</option>
					<option value="1">Trusted</option>
				</select>
				</td>
			</tr></form>
			<h2>Activity Log</h2>
			<table class="table table-hover" id="table">
				<tr>
					<td width="">Member ID</td>
					<td width="">Member Name</td>
					<td width="">Status</td>
					<td width="">Login time</td>
					<td></td>
				</tr>
				<?php
					$members=$db->getMemberLog();
					foreach ($members as $member):
                ?>
					<tr>
						<td><?php echo 'MID'.sprintf('%04d',$member['member_id']); ?></td>
						<td><?php echo $member['member_name']; ?></td>
                        <td><?php 
							switch ($member['member_trustfulness']) {
								case 0:
									echo 'Non-trusted';
									break;
								case 1:
									echo 'Trusted';
							} 
							?></td>
                        <td><?php echo $member['created_at']; ?></td>
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
		
		function loadMemberByTrust(trust) {
				  var xhttp; 
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("table").innerHTML = this.responseText;
					}
				  };
				  xhttp.open("GET", "getMemberByTrust?filter=" + trust, true);
				  xhttp.send();
				}
		
	</script>
	

</body>
</html>