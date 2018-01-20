<?php

include_once '../include/DbFunction.php';
$db = new DbFunction;
$member = $db->reportGetMemberById($_GET['id']);
?>
<div class="panel panel-default ">
					<div class="panel-heading">
						<?php echo $member['member_name'].' (MID'.sprintf('%04d',$member['member_id']).')';?>
						</div>
					<div class="panel-body timeline-container">
						<ul class="timeline">
							<li>
								<div class="timeline-badge primary">Status</div>
								<div class="timeline-panel" style="padding: 0px">
									<div class="timeline-body">
										<p>
											 <div class="dropdown">
												<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
													<?php 
														switch ($member['member_trustfulness']) {
															case 0:
																echo 'Non-trusted';
																break;
															case 1:
																echo 'Trusted';
														} 


													?>
												<span class="caret"></span></button>
												<ul class="dropdown-menu">
												  <li><a href="#" <?php if($member['member_trustfulness']==1){echo 'style="color: #30a5ff" disabled';}else{echo 'onClick="submitT('.$member['member_id'].',1)"';}?>>Trusted <?php if($member['member_trustfulness']==1)echo '<i class="fa fa-check" aria-hidden="true">';?> </i></a></li>
												  <li class="divider"></li>
												  <li><a href="#" <?php if($member['member_trustfulness']==0){echo 'style="color: #30a5ff" disabled';}else{echo 'onClick="submitT('.$member['member_id'].',0)"';}?>>Non-Trusted<?php if($member['member_trustfulness']==0)echo '<i class="fa fa-check" aria-hidden="true">';?></i></a></li>
												</ul>
											  </div>
										</p>
									</div>
								</div>
							</li>
							<li>
								<div class="timeline-badge primary">Email</div>
								<div class="timeline-panel">
									<div class="timeline-body">
										<p><?php echo $member['member_email'];?></p>
									</div>
								</div>
							</li>
							<li>
								<div class="timeline-badge primary">Phone</div>
								<div class="timeline-panel">
									<div class="timeline-body">
										<p><?php echo $member['member_phone'];?></p>
									</div>
								</div>
							</li>
							<li>
								<div class="timeline-badge primary">Address</div>
								<div class="timeline-panel">
									<div class="timeline-body">
										<p><?php echo $member['member_address'];?></p>
									</div>
								</div>
							</li>
							<li>
								<div class="timeline-badge primary">Point</div>
								<div class="timeline-panel">
									<div class="timeline-body">
										<p><?php echo $member['member_reward_points'];?></p>
									</div>
								</div>
							</li>
							<?php if($member['member_credit_card']!=NULL):?>
							<li>
								<div class="timeline-badge primary">Card</div>
								<div class="timeline-panel">
									<div class="timeline-body">
										<p><?php echo $member['member_credit_card'];?></p>
									</div>
								</div>
							</li>
							<?php endif; ?>
							<li>
								<div class="timeline-badge primary">Create At</div>
								<div class="timeline-panel">
									<div class="timeline-body">
										<p><?php echo $member['member_created_time'];?></p>
									</div>
								</div>
							</li>
							<li>
								<div class="timeline-badge primary">Ordered</div>
								<div class="timeline-panel">
									<div class="timeline-body">
										 <button type="button" class="btn btn-secondary pull-center" data-toggle="collapse" data-target="#orderHistory">View Order History</button>
										  <div id="orderHistory" class="collapse">
										  <table class="table">
											<tr>
												<th class="fixed-table-header">Book Name</th>
												<th class="fixed-table-header">Quantity</th>
												<th class="fixed-table-header">Price</th>	
												<th class="fixed-table-header">Order Date Time</th>
											</tr>
										<?php 
											$orders=$db->getMemberOrderHistory($_GET['id']);
											foreach ($orders as $order):
											?>
											<tr>
												<td><?php echo $order['book_title'];?></td>
												<td><?php echo $order['order_detail_quantity'];?></td>
												<td><?php echo 'RM '.$order['price'];?></td>
												<td><?php echo $order['order_created_time'];?></td>
											</tr>
										<?php endforeach; ?>
											</table>
  										</div>
											
									
									</div>
								</div>
							</li>
							<li>
								<div class="timeline-badge primary">Feedback</div>
								<div class="timeline-panel">
									<div class="timeline-body">
										 <button type="button" class="btn btn-secondary pull-center" data-toggle="collapse" data-target="#feedback">View All Feedback</button>
										  <div id="feedback" class="collapse">
										  <table class="table">
											<tr>
												<th class="fixed-table-header">Book Name</th>
												<th class="fixed-table-header">Comment</th>
												<th class="fixed-table-header">Rating For Book</th>	
												<th class="fixed-table-header">Useless</th>
												<th class="fixed-table-header">Usefull</th>
												<th class="fixed-table-header">Very Usefull</th>
											</tr>
										<?php 
											$feedbacks=$db->getMemberFeedback($_GET['id']);
											foreach ($feedbacks as $feedback):
											?>
											<tr>
												<td><?php echo $feedback['book_title'];?></td>
												<td><?php echo $feedback['feedback_comment'];?></td>
												<td><?php
													switch ($feedback['feedback_scale']){
														case 0:
															echo'<i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
															break;
														case 1:
															echo'<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
															break;
														case 2:
															echo'<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
															break;
															
														case 3:
															echo'<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
															break;
														case 4:
															echo'<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>';
															break;
														case 5:
															echo'<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>';
													}
																									
	
	?>
											
											
											<br><?php echo number_format($feedback['feedback_scale'],1);?>
											</td>
												<td><?php echo $feedback['useless'];?></td>
												<td><?php echo $feedback['usefull'];?></td>
												<td><?php echo $feedback['veryusefull'];?></td>
											</tr>
										<?php endforeach; ?>
											</table>
  										</div>
											
									
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>