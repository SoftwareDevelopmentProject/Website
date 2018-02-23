<?php session_start(); $page = 'dashboard'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Technology's Parck Bookstore Main Page</title>
    <?php include_once '_head.php'; ?>
</head>
<body>

    <?php include_once '_header.php'; ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
			</ol>
		</div><!--/.row-->
		
		<div class="padding" style="overflow: auto; height: auto;">
			<img src="../images/logo.png" style="border-radius: 99px;opacity: 0.75">
			<h2>Welcome to Technology's Parck Bookstore ( <?php if(isset($user)){
					switch ($user['staff_role']) {
						case 1:
							echo 'Staff';
							break;
						case 2:
							echo 'Admin';
							break;
						case 3:
							echo 'Manager';				
					}		
				} 
				?> Site)</h2>
				
			<div style="width: 45%;float: left;margin: 5px" <?php if($user['staff_role']<=1)echo'class="hidden"';?>>
			<h4 style="color:antiquewhite">Staff List</h4>
				<table class="table table-hover">
				<tr>
					<td>Name</td>
					<td>Phone</td>
					<td>Email</td>
					<td>Address</td>
					<td>Role</td>
				</tr>
				<?php
				$staffs = $db->get3Staff();
				foreach ( $staffs as $staff ):
					?>
				<tr>
					<td>
						<?php echo $staff['staff_name']; ?>
					</td>
					<td>
						<?php echo $staff['staff_phone']; ?>
					</td>
					<td>
						<a href="mailto:<?php echo $staff['staff_email']; ?>">
							<?php echo $staff['staff_email']; ?>
						</a>
					</td>
					<td>
						<?php echo $staff['staff_address']; ?>
					</td>
					<td>
						<?php switch ($staff['staff_role']) {
						case 1:
							echo 'Staff';
							break;
						case 2:
							echo 'Admin';
							break;
						case 3:
							echo 'Manager';				
					}		 
						?>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
			</div>
		 	<div style="width: 45%;float: left;margin: 5px">
	  		<h4 style="color:antiquewhite">Member List</h4>
		  		<table class="table table-hover" id="table">
				<tr>
					<td width="">Member ID</td>
					<td width="">Member Name</td>
					<td width="">Created at</td>
					<td width="">Status</td>
					<td width="">Negative Feedback</td>
					<td width="">Positive Feedback</td>
					
				</tr>
				<?php
					$members=$db->reportGet3Member();
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
                       
                    </tr>
                    <?php endforeach; ?>
            	</table>
			</div>
       
       		<div style="width: 45%;float: left;margin: 5px">
       		<h4 style="color:antiquewhite">Stock List</h4>
       			<table class="table table-hover">
				<tr>
					<th>Book ID</th>
					<th>Book Title</th>
					<th>Author</th>
					<th>Genre</th>
					<th>Publisher</th>
					<th>Years</th>
					<th>Price</th>
					<th>In stock amount</th>

					
				</tr>
				<?php
					$books = $db->get3Books();
					foreach($books as $book) :
                ?>
					<tr>
						<td><?php echo 'BID'.sprintf('%04d',$book['book_id']); ?></td>
						<td><?php echo $book['book_title']; ?></td>
                        <td><?php echo $book['book_author']; ?></td>
                        <td><?php echo $book['genre_name']; ?></td>
                        <td><?php echo $book['book_publisher']; ?></td>
						<td><?php echo $book['book_years']; ?></td>
						<td><?php echo 'RM '.$book['book_price']; ?></td>
						<td><?php echo $book['book_stock']; ?></td>
                    </tr>
                    <?php endforeach; ?>
            	</table>
			</div>
       <div style="width: 45%;float: left;margin: 5px"<?php if($user['staff_role']<=2)echo'class="hidden"';?>>
      		<h4 style="color:antiquewhite">Request List</h4>
       		<table class="table table-hover">
				<tr>
					<td width="">Staff Name</td>
					<td width="">Request Date</td>
					<td width="" id="status">Status</td>
				</tr>
				<?php
					$requests=$db->get3Request();
					foreach ($requests as $request):
                ?>
					<tr>
						<td><?php echo $request['staff_name'];?></td>
						<td><?php echo $request['request_created_time'];?></td>
                        <td id="status<?php echo $request['request_id'];?>"><?php echo $request['status_name'];?></td>
                    </tr>
                    <?php endforeach; ?>
            	</table>
            </div>
        </div>
		
            <?php include_once '_footer.php'; ?>
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>