<section class="panel">
	<header class="panel-heading">
		<div class="panel-btn">
			<a class="btn btn-default btn-circle icon" data-toggle="tooltip" data-original-title="<?=translate('refresh_mail')?>" 
			href="<?=base_url('communication/mailbox/trash')?>">
				<i class="fas fa-sync"></i>
			</a>
			<button class="btn btn-circle btn-default icon" id="msgAction" data-type="restore" data-toggle="tooltip" data-original-title="<?=translate('restore')?>"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0)matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.8701 18.3101H8.87012C6.11012 18.3101 3.87012 16.0701 3.87012 13.3101C3.87012 10.5501 6.11012 8.31006 8.87012 8.31006H19.8701" stroke="currentColor" stroke-width="2.4" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.5701 10.8099L20.1301 8.24994L17.5701 5.68994" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></button>
			<button class="btn btn-circle btn-danger icon" id="msgAction" data-type="forever" data-toggle="tooltip" data-original-title="<?=translate('delete_forever')?>"><i class="far fa-trash-alt"></i></button>
		</div>
		<h4 class="panel-title"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true" ><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18.85 9.14001L18.2 19.21C18.09 20.78 18 22 15.21 22H8.79002C6.00002 22 5.91002 20.78 5.80002 19.21L5.15002 9.14001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M10.33 16.5H13.66" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9.5 12.5H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('trash')?></h4>
	</header>
	<div class="panel-body">
		<table class="table text-dark table-hover table-condensed mb-none table-export">
			<thead>
				<tr>
					<th>
						<div class="checkbox-replace">
							<label class="i-checks"><input type="checkbox" id="selectAllchkbox"><i></i></label>
						</div>
					</th>
					<th><?=translate('receiver')?></th>
					<th><?=translate('subjects')?></th>
					<th><?=translate('message')?></th>
					<th><?=translate('time')?></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT * FROM message WHERE (sender = " . $this->db->escape($active_user) . " AND trash_sent = 1) OR (reciever = " .
					$this->db->escape($active_user) . " AND trash_inbox = 1) ORDER BY id DESC";
					$messages = $this->db->query($sql)->result();
					foreach ($messages as $message):
						// defining the user to show
						if ($message->sender == $active_user)
							$getUser = explode('-', $message->reciever);
						if ($message->reciever == $active_user)
							$getUser = explode('-', $message->sender);
						$userRoleID = $getUser[0];
						$userID 	= $getUser[1];
				?>
				<tr>
					<td class="checked-area" width="30px">
						<div class="checkbox-replace">
							<label class="i-checks">
								<input type="checkbox" class="msg_checkbox" id="<?=$message->id?>"><i></i>
							</label>
						</div>
					</td>
					<td width="20%"><?=$this->application_model->getUserNameByRoleID($userRoleID, $userID)['name']; ?></td>
					<td><?php echo $message->subject; ?></td>
					<td>
					<?php
						$body = strip_tags($message->body);
						echo mb_strimwidth($body, 0, 60, "...");
					?>
					</td>
					<td><?php echo get_nicetime($message->created_at); ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</section>
