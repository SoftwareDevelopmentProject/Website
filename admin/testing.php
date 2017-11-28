<?php
    $page = 'staff';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Staff</title>
    <?php include_once '_head.php'; ?>
    
</head>
<body>

    <?php include_once '_header.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db->add_staff($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['address'],$_POST['role']);
    }

?>
		



<h2>Animated Modal with Header and Footer</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Update successful</h2>
    </div>
    <div class="modal-body">
      <p>Add staff successful !</p>
      <p></p>
    </div>
    <div class="modal-footer">
      <button class="btn-primary btn-md">OK</button>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
	
}

// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	modal.style.animationName="animatedown"; 
	modal.style.animationDuration="0.4s";
	modal.style.webkitAnimationDuration="0.4";
	modal.style.webkitAnimationName="animatedown";
	
		
	
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
		modal.style.animationName="animatedown"; 
		modal.style.animationDuration="0.4s";
		modal.style.webkitAnimationDuration="0.4";
		modal.style.webkitAnimationName="animatedown";
		
    }
}
</script>
	
			
		
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
		
		$(document).ready(function() {
			document.getElementById('click').click();
		});
	
		
	</script>
		
</body>
</html>