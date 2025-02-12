<section class="panel">
	<header class="panel-heading">
		<div class="panel-btn">
			<a class="btn btn-default btn-circle icon" data-toggle="tooltip" data-original-title="<?=translate('refresh_mail')?>" 
			href="<?=base_url('communication/mailbox/important')?>">
				<i class="fas fa-sync"></i>
			</a>
		</div>
		<h4 class="panel-title">
		<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 7.75V13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21.08 8.58003V15.42C21.08 16.54 20.48 17.58 19.51 18.15L13.57 21.58C12.6 22.14 11.4 22.14 10.42 21.58L4.47998 18.15C3.50998 17.59 2.90997 16.55 2.90997 15.42V8.58003C2.90997 7.46003 3.50998 6.41999 4.47998 5.84999L10.42 2.42C11.39 1.86 12.59 1.86 13.57 2.42L19.51 5.84999C20.48 6.41999 21.08 7.45003 21.08 8.58003Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 16.2V16.2999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('important')?>
		</h4>
	</header>
	<div class="panel-body">
		<table class="table text-dark table-hover table-condensed mb-none table-export">
			<thead>
				<tr>
					<th>#</th>
					<th><?=translate('type')?></th>
					<th><?=translate('sender').' / '.translate('receiver')?></th>
					<th><?=translate('subjects')?></th>
					<th><?=translate('message')?></th>
					<th><?=translate('time')?></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$type 	= "";
					$count 	= 1;


					$sql = "SELECT * FROM message WHERE (sender = " . $this->db->escape($active_user) . " AND fav_sent = 1 AND trash_sent = 0) OR (reciever = " .
					$this->db->escape($active_user) . " AND fav_inbox = 1 AND trash_inbox = 0) ORDER BY id DESC";
					$messages = $this->db->query($sql)->result();


					foreach ($messages as $message):
						// defining the user to show
						if ($message->sender == $active_user){
							$type = 'inbox';
							$getUser = explode('-', $message->reciever);
						}
						if ($message->reciever == $active_user){
							$type = 'sent';
							$getUser = explode('-', $message->sender);
						}
						$userRoleID = $getUser[0];
						$userID = $getUser[1];
				?>
				<tr>
					<td><?php echo $count++;?></td>
					<td><?php echo ($type == 'inbox' ? '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M1.97998 13H5.76998C6.52998 13 7.21998 13.43 7.55998 14.11L8.44998 15.9C8.99998 17 9.99998 17 10.24 17H13.77C14.53 17 15.22 16.57 15.56 15.89L16.45 14.1C16.79 13.42 17.48 12.99 18.24 12.99H21.98" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19 8C20.6569 8 22 6.65685 22 5C22 3.34315 20.6569 2 19 2C17.3431 2 16 3.34315 16 5C16 6.65685 17.3431 8 19 8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>' : '<i class="fas fa-share-square"></i>');?></td>
					<td width="20%"><a href="<?php echo base_url('communication/mailbox/read?type='.$type.'&id='.$message->id); ?>" class="text-dark mail-subj"><?php echo $this->application_model->getUserNameByRoleID($userRoleID, $userID)['name']; ?></a></td>
					<td><a href="<?php echo base_url('communication/mailbox/read?type='.$type.'&id='.$message->id); ?>" class="text-dark mail-subj"><?php echo $message->subject; ?></a></td>
					<td>
					<?php
						$body = strip_tags($message->body);
						echo strlen($body) > 60 ? substr($body, 0, 60)."..." : $body;
					?>
					</td>
					<td><?php echo get_nicetime(html_escape($message->created_at));?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</section>
