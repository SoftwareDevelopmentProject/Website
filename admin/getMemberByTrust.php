<?php

include_once '../include/DbFunction.php';
$db = new DbFunction;
?>
<tr>
					<td width="">Member ID</td>
					<td width="">Member Name</td>
					<td width="">Status</td>
					<td width="">Login time</td>
					<td></td>
				</tr>
				<?php
					if ($_GET['filter']=="all"){
					$members=$db->getMemberLog();
					}else{
					$members=$db->getMemberLogByTrust($_GET['filter']);
					}
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