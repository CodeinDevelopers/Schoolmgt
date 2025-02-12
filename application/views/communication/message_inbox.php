<section class="panel">
	<header class="panel-heading">
		<div class="panel-btn">
			<a class="btn btn-default btn-circle icon" data-toggle="tooltip" data-original-title="<?=translate('refresh_mail')?>" 
			href="<?=base_url('communication/mailbox/inbox')?>">
			<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 12C22 17.52 17.52 22 12 22C6.48 22 3.11 16.44 3.11 16.44M3.11 16.44H7.63M3.11 16.44V21.44M2 12C2 6.48 6.44 2 12 2C18.67 2 22 7.56 22 7.56M22 7.56V2.56M22 7.56H17.56" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
			</a>
			<button class="btn btn-circle btn-danger icon" id="msgAction" data-type="delete" ><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="currentColor" stroke-width="2.232" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="currentColor" stroke-width="2.232" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18.85 9.14001L18.2 19.21C18.09 20.78 18 22 15.21 22H8.79002C6.00002 22 5.91002 20.78 5.80002 19.21L5.15002 9.14001" stroke="currentColor" stroke-width="2.232" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M10.33 16.5H13.66" stroke="currentColor" stroke-width="2.232" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9.5 12.5H14.5" stroke="currentColor" stroke-width="2.232" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></button>
		</div>
		<h4 class="panel-title">
		<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M1.97998 13H5.76998C6.52998 13 7.21998 13.43 7.55998 14.11L8.44998 15.9C8.99998 17 9.99998 17 10.24 17H13.77C14.53 17 15.22 16.57 15.56 15.89L16.45 14.1C16.79 13.42 17.48 12.99 18.24 12.99H21.98" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19 8C20.6569 8 22 6.65685 22 5C22 3.34315 20.6569 2 19 2C17.3431 2 16 3.34315 16 5C16 6.65685 17.3431 8 19 8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('inbox')?>
		</h4>
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
					<th><?=translate('sender')?></th>
					<th><?=translate('subjects')?></th>
					<th><?=translate('message')?></th>
					<th><?=translate('time')?></th>
				</tr>
			</thead>
			<tbody>
			<?php
			$this->db->order_by('id', 'desc');
			$messages = $this->db->get_where('message', array('reciever' => $active_user, 'trash_inbox' => 0))->result();
			foreach ($messages as $message):
				$get_sender = explode('-', $message->sender);
				$senderRoleID = $get_sender[0];
				$senderUserID = $get_sender[1];
			?>
				<tr <?php if($message->read_status == 0) { ?> class="text-weight-bold" <?php } ?>>
					<td class="checked-area" width="30px">
						<div class="checkbox-replace">
							<label class="i-checks">
								<input type="checkbox" class="msg_checkbox" id="<?=$message->id?>"><i></i>
							</label>
						</div>
					</td>
					<td width="20%">
						<a data-id="<?=$message->id?>" href="javascript:void(0);" class="mailbox-fav"
						data-toggle="tooltip" data-original-title="Click to teach if this conversation is important"><i class="text-warning <?=($message->fav_inbox == 0 ? 'far fa-bell' : 'fas fa-bell')?>"></i></a><a href="<?=base_url('communication/mailbox/read?type=inbox&id='.$message->id)?>" class="text-dark mail-subj"><?='&nbsp;&nbsp;&nbsp;'.$this->application_model->getUserNameByRoleID($senderRoleID, $senderUserID)['name']?></a>
					</td>
					<td>
						<?php echo (!empty($message->file_name) ? '<i class="fas fa-paperclip"></i>' : ''); ?>
						<a href="<?=base_url('communication/mailbox/read?type=inbox&id='.$message->id)?>" class="text-dark mail-subj"><?php echo $message->subject ?></a>
					</td>
					<td>
						<?php
						$body = strip_tags($message->body);
						echo mb_strimwidth($body, 0, 60, "...");
						?>
					</td>
					<td><?php echo get_nicetime($message->created_at);?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</section>