<section class="panel">
	<header class="panel-heading">
		<div class="panel-btn">
			<a class="btn btn-default btn-circle icon" data-toggle="tooltip" data-original-title="<?=translate('refresh_mail')?>" 
			href="<?=base_url('communication/mailbox/sent')?>">
				<i class="fas fa-sync"></i>
			</a>
			<button class="btn btn-circle btn-danger icon" id="msgAction" data-type="delete"><i class="far fa-trash-alt"></i></button>
		</div>
		<h4 class="panel-title">
		<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 9V2L10 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 2L14 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M1.97998 13H6.38998C6.76998 13 7.10998 13.21 7.27998 13.55L8.44998 15.89C8.78998 16.57 9.47998 17 10.24 17H13.77C14.53 17 15.22 16.57 15.56 15.89L16.73 13.55C16.9 13.21 17.25 13 17.62 13H21.98" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7 5.12988C3.46 5.64988 2 7.72988 2 11.9999V14.9999C2 19.9999 4 21.9999 9 21.9999H15C20 21.9999 22 19.9999 22 14.9999V11.9999C22 7.72988 20.54 5.64988 17 5.12988" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('sent')?>
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
					<th><?=translate('receiver')?></th>
					<th><?=translate('subjects')?></th>
					<th><?=translate('message')?></th>
					<th><?=translate('time')?></th>
				</tr>
			</thead>
			<tbody>
			<?php
			$this->db->order_by('id', 'desc');
			$messages = $this->db->get_where('message', array('sender' => $active_user, 'trash_sent' => 0))->result();
			foreach ($messages as $message):
				$get_sender 	= explode('-', $message->reciever);
				$recieverRoleID = $get_sender[0];
				$recieverUserID = $get_sender[1];
			?>
				<tr <?=($message->reply_status == 1 ? 'class="text-weight-bold"' : '');?>>
					<td class="checked-area" width="30px">
						<div class="checkbox-replace">
							<label class="i-checks">
								<input type="checkbox" class="msg_checkbox" id="<?=$message->id?>"><i></i>
							</label>
						</div>
					</td>
					<td width="20%">
						<a data-id="<?=$message->id?>" href="javascript:void(0);" class="mailbox-fav" data-toggle="tooltip"
						data-original-title="Click to teach if this conversation is important"><i class="text-warning <?=($message->fav_sent == 0 ? 'far fa-bell' : 'fas fa-bell');?>"></i></a><a href="<?=base_url('communication/mailbox/read?type=sent&id='.$message->id)?>" class="text-dark mail-subj"><?='&nbsp;&nbsp;&nbsp;'. $this->application_model->getUserNameByRoleID($recieverRoleID, $recieverUserID)['name']?></a>
					</td>
					<td>
						<?php echo (!empty($message->file_name) ? '<i class="fas fa-paperclip"></i>' : ''); ?> 
						<a href="<?=base_url('communication/mailbox/read?type=sent&id='.$message->id)?>" class="text-dark mail-subj"><?php echo $message->subject; ?></a>
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