<?php
include_once '../include/DbFunction.php';
$db = new DbFunction();
if(isset($_SESSION['staff'])) {
  $user = $db->getStaff();
} else {
	$user = null;
	echo '<script>window.location.replace("login.php")</script>';
	die();
}
?>
   <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="index.php"><span><img src="../images/logo.png" style="border-radius: 99px;opacity: 0.75" width="250px" height="28px"> TP Bookstore </span>
				<?php if(isset($user)){
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
				?>
				</a>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="../images/9780545162074_p0_v2_s550x406.jpg" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"><?php if(isset($user)) echo $user['staff_name']; ?></div>
            <div class="profile-usertitle-status"><i class="fa fa-bookmark" aria-hidden="true" style="color:#30a5ff"></i><h4><?php if(isset($user)){
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
				?></h4></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
         <li <?php if (isset($page) && ($page == 'stock')) echo 'class="active"'; ?>><a href="stock.php"><em class="fa fa-list-ol">&nbsp;</em> Stock</a></li>
         <?php if ($user['staff_role'] > 1) : ?>
        <li <?php if (isset($page) && ($page == 'staff')) echo 'class="active"'; ?>><a href="staffs.php"><em class="fa fa-users">&nbsp;</em> Staff</a></li>
        <?php endif; ?>
        <?php if ($user['staff_role'] > 2) : ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-line-chart">&nbsp;</em> Report <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children <?php if (isset($page) && (($page == 'member report')||($page == 'sale report') || ($page == 'activityLog'))){ echo '';}else{ echo 'collapse';} ?>" id="sub-item-1">
                <li><a <?php if (isset($page) && ($page == 'sale report')) echo 'class="active"'; ?>class="" href="charts.php">
                        <span class="fa fa-book">&nbsp;</span> Sale report
                    </a></li>
                <li><a <?php if (isset($page) && ($page == 'member report')) echo 'class="active"'; ?> href="memberReport.php">
                        <span class="fa fa-book">&nbsp;</span> Member report
                    </a></li>
                     <li><a <?php if (isset($page) && ($page == 'activityLog')) echo 'class="active"'; ?>class="" href="activityLog.php">
                        <span class="fa fa-book">&nbsp;</span> Member Activity Log
                    </a></li>
            </ul>
        </li>
        <?php endif ;?>
        <li <?php if (isset($page) && ($page == 'member')) echo 'class="active"'; ?>><a href="member.php"><em class="fa fa-address-card">&nbsp;</em> Member</a></li>
        <?php if ($user['staff_role'] > 1) : ?>
        <li <?php if (isset($page) && ($page == 'bookRequest')) echo 'class="active"'; ?>><a href="bookRequest.php"><em class="fa fa-list-ol">&nbsp;</em> Book Request</a></li>
        <?php endif; ?>
        <li <?php if (isset($page) && ($page == 'message')) echo 'class="active"'; ?>><a href="message.php"><em class="fa fa-reply">&nbsp;</em> Messages</a></li>
        <li data-toggle="modal" data-target="#OutModal"><a href="#"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div><!--/.sidebar-->

<div class="modal fade" id="OutModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
         <img src="../images/logo.png" style="border-radius: 99px;">
          <h2 class="modal-title" style="color: rgba(235,165,64,1.00);">Log out</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body popup-body">
          Are you sure to logout?
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         <button type="button" class="btn btn-primary" onClick="window.open('logout.php','_self')">Logout</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


