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
						case 0:
							echo 'Staff';
							break;
						case 1:
							echo 'Admin';
							break;
						case 2:
							echo 'Manager';				
					}		
				} 
				?>
				</a>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-envelope"></em><span class="label label-danger">15</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box"><a href="profile.php" class="pull-left">
                                    <img alt="image" class="img-circle" src="../images/9780545162074_p0_v2_s550x406.jpg">
                                </a>
                                <div class="message-body"><small class="pull-right">3 mins ago</small>
                                    <a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
                                    <br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box"><a href="profile.php" class="pull-left">
                                    <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                </a>
                                <div class="message-body"><small class="pull-right">1 hour ago</small>
                                    <a href="#">New message from <strong>Jane Doe</strong>.</a>
                                    <br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="all-button"><a href="#">
                                    <em class="fa fa-inbox"></em> <strong>All Messages</strong>
                                </a></div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <em class="fa fa-bell"></em><span class="label label-info">5</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li><a href="#">
                                <div><em class="fa fa-envelope"></em> 1 New Message
                                    <span class="pull-right text-muted small">3 mins ago</span></div>
                            </a></li>
                        <li class="divider"></li>
                        <li><a href="#">
                                <div><em class="fa fa-heart"></em> 12 New Likes
                                    <span class="pull-right text-muted small">4 mins ago</span></div>
                            </a></li>
                        <li class="divider"></li>
                        <li><a href="#">
                                <div><em class="fa fa-user"></em> 5 New Followers
                                    <span class="pull-right text-muted small">4 mins ago</span></div>
                            </a></li>
                    </ul>
                </li>
            </ul>
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
						case 0:
							echo 'Staff';
							break;
						case 1:
							echo 'Admin';
							break;
						case 2:
							echo 'Manager';				
					}		
				} 
				?></h4></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search" style="border-radius: 99px">
        </div>
    </form>
    <ul class="nav menu">
        <?php if ($user['staff_role'] > 0) : ?>
         <li <?php if (isset($page) && ($page == 'stock')) echo 'class="active"'; ?>><a href="stock.php"><em class="fa fa-list-ol">&nbsp;</em> Stock</a></li>
        <li <?php if (isset($page) && ($page == 'staff')) echo 'class="active"'; ?>><a href="staffs.php"><em class="fa fa-users">&nbsp;</em> Staff</a></li>
        <?php endif; ?>
        <?php if ($user['staff_role'] > 1) : ?>
        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-line-chart">&nbsp;</em> Report <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children <?php if (isset($page) && (($page == 'member report')||($page == 'sale report'))){ echo '';}else{ echo 'collapse';} ?>" id="sub-item-1">
                <li><a class="" href="charts.php">
                        <span class="fa fa-book">&nbsp;</span> Sale report
                    </a></li>
                <li><a <?php if (isset($page) && ($page == 'member report')) echo 'class="active"'; ?> href="memberReport.php">
                        <span class="fa fa-book">&nbsp;</span> Member report
                    </a></li>
            </ul>
        </li>
        <?php endif ;?>
        <li <?php if (isset($page) && ($page == 'member')) echo 'class="active"'; ?>><a href="member.php"><em class="fa fa-address-card">&nbsp;</em> Member</a></li>
        <li <?php if (isset($page) && ($page == 'bookRequest')) echo 'class="active"'; ?>><a href="bookRequest.php"><em class="fa fa-list-ol">&nbsp;</em> Book Request</a></li>
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


