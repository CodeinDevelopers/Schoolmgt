<div class="row">
	<div class="col-md-5">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><?=translate('add_session')?></h4>
			</header>
			<?php echo form_open($this->uri->uri_string()); ?>
			<div class="panel-body">
				<div class="form-group mb-md">
					<label class="control-label"><?=translate('session')?> <span class="required">*</span></label>
					<input type="text" class="form-control" name="session" value="<?=set_value('session')?>" />
					<span class="error"><?=form_error('session')?></span>
				</div>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-default pull-right" type="submit" name="save" value="1">
							<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('save')?>
						</button>
					</div>	
				</div>
			</div>
			<?php echo form_close();?>
		</section>
	</div>

	<div class="col-md-7">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><?=translate('sessions_list')?></h4>
			</header>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-condensed mb-md">
						<thead>
							<tr>
								<th><?=translate('session')?></th>
								<th><?=translate('status')?></th>
								<th><?=translate('created_at')?></th>
								<th><?=translate('action')?></th>
							</tr>
						</thead>
						<tbody>

						<?php
						$result = $this->db->get('schoolyear')->result_array();
						if (count($result)):
							foreach ($result as $row):
						?>
							<tr>
								<td><?php echo $row['school_year']; ?></td>
								<td>
									<?php if (get_session_id() == $row['id']) :?>
									<span class="label label-primary"> <?=translate('selected_session')?></span>
									<?php endif;?>
								</td>
								<th><?php echo _d($row['created_at']);?></th>
								<td>
									<!-- update link -->
									<a class="btn btn-default btn-circle icon editModal" href="javascript:void(0);" data-id="<?=$row['id']?>" data-session="<?=$row['school_year']?>">
										<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
									</a>
									
									<!-- delete link -->
									<?php 
									if (get_session_id() != $row['id'])
										echo btn_delete('sessions/delete/' . $row['id']);
									?>
								</td>
							</tr>
						<?php endforeach; endif;?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>

<div class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" id="modal">
	<section class="panel">
		<?php echo form_open('sessions/edit', array('class' => 'frm-submit')); ?>
			<header class="panel-heading">
				<h4 class="panel-title">
					<i class="far fa-edit"></i> <?=translate('edit_session')?>
				</h4>
			</header>
			<div class="panel-body">
				<input type="hidden" name="schoolyear_id" id="schoolyear_id" value="" >
				<div class="form-group mb-md">
					<label class="control-label"><?=translate('sessions')?> <span class="required">*</span></label>
					<input type="text" class="form-control" value="" name="session" id="session" />
					<span class="error"></span>
				</div>
			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-12 text-right">
						<button type="submit" class="btn btn-default" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing"><?=translate('update')?></button>
						<button class="btn btn-default modal-dismiss"><?=translate('cancel')?></button>
					</div>
				</div>
			</footer>
		<?php echo form_close();?>
	</section>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('.editModal').on('click', function() {
			var id = $(this).data('id');
			var session = $(this).data('session'); 
			$('.error').html("");
			$('#schoolyear_id').val(id);
			$('#session').val(session);
			mfp_modal('#modal');
		});
	});
</script>