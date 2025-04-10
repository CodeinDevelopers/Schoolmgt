<div class="row">
	<div class="col-md-12">
		<?php if (empty($query_language)):?>
			<section class="panel">
				<header class="panel-heading">
					<h4 class="panel-title">
						<i class="fas fa-globe"></i> <?=translate('language_list');?>
						<?php if(get_permission('translations', 'is_add')){ ?>
						<div class="panel-btn">
							<a href="javascript:void(0);" class="add_lang btn btn-default btn-circle">
								<i class="far fa-plus-square"></i> <?=translate('add_language');?>
							</a>
						</div>
						<?php } ?>
					</h4>
				</header>
				<div class="panel-body">
	                <div class="table-responsive mt-md mb-md">
						<table class="table table-bordered table-hover table-condensed">
							<thead>
								<tr>
									<th>#</th>
									<th><?=translate('language')?></th>
									<th><?=translate('flag')?></th>
									<th width="85"><?=translate('stats')?></th>
									<th width="85">RTL</th>
									<th><?=translate('created_at')?></th>
									<th><?=translate('updated_at')?></th>
									<th><?=translate('action')?></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$count = 1;
								$languages = $this->db->get('language_list')->result();
								foreach($languages as $row) {
									?>
								<tr>
									<td><?php echo $count++;?></td>
									<td><?php echo ucwords($row->name);?></td>
									<td><img class="img-fs" src="<?=$this->application_model->getLangImage($row->id, false)?>" /></td>
									<td>
										<input data-size="mini" data-lang="<?=$row->id?>" class="toggle-switch stats" data-width="70" data-on="<i class='fas fa-check'></i> ON" data-off="<i class='fas fa-times'></i> OFF" <?=($row->status == 1 ? 'checked' : '');?> data-style="bswitch" type="checkbox">
									</td>
									<td>
										<input data-size="mini" data-lang="<?=$row->id?>" class="toggle-switch rtl" data-width="70" data-on="<i class='fas fa-check'></i> ON" data-off="<i class='fas fa-times'></i> OFF" <?=($row->rtl == 1 ? 'checked' : '');?> data-style="bswitch" type="checkbox">
									</td>
									<td><?php echo _d($row->created_at);?></td>
									<td><?php echo _d($row->updated_at);?></td>
									<td>
										<?php if(get_permission('translations', 'is_view')){ ?>
										<!-- word update link -->
										<a href="<?php echo base_url('translations/update?lang=' . $row->lang_field);?>" class="btn btn-default btn-circle">
											<i class="glyphicon glyphicon-link"></i> <?=translate('edit_word');?> 
										</a>

										<!-- language rename link -->
										<a class="btn btn-default btn-circle edit_modal" href="javascript:void(0);" data-id="<?=$row->id?>">
											<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"width="15px" height="15px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('rename');?>
										</a>
										<?php } if(get_permission('translations', 'is_delete')){  ?>
										<!-- delete link -->
										<?php echo btn_delete('translations/submitted_data/delete/' . $row->id);?>
										<?php } ?>
									</td>
								</tr>
								<?php  }?>
							</tbody>
						</table>
					</div>
				</div>
			</section>
		<?php 
		else:
		$get_name = $this->db->select('name')->where('lang_field',$select_language)->get('language_list')->row()->name;
		?>
			<!-- word update -->
			<section class="panel appear-animation" data-appear-animation="<?=$global_config['animations'] ?>" data-appear-animation-delay="100">
				<header class="panel-heading">
					<h4 class="panel-title"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 21H12" stroke="currentColor" stroke-width="2.3280000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=ucfirst($get_name) . ' - ' . translate('translation_update');?></h4>
				</header>
				<?php echo form_open('translations/update?lang=' . $select_language, array('class' => 'validate')); ?>
				<div class="panel-body">
					<table class="table table-bordered table-condensed mb-none table-export">
						<thead>
							<tr>
								<th>ID</th>
								<th><?=translate('word')?></th>
								<th><?=translate('translations')?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$count = 1;
							$words = $query_language->result();
								foreach($words as $row) {
							?>
							<tr>
								<td><?php echo $count++;?></td>
								<td><?php echo ucwords(str_replace('_', ' ',  $row->word));?></td>
								<td>
									<div style="width:  100%">
									<div class="input-group">
										<span class="input-group-addon">
											<span class="icon"><i class="far fa-comment-alt"></i></span>
										</span>
										<input  type="text" placeholder="Set Word Translation" name="word_<?=$row->word?>" value="<?=$row->$select_language?>" class="form-control" />
									</div>
									</div>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<footer class="panel-footer">
				<div class="row">
					<div class="col-md-offset-10 col-md-2">
						<button class="btn btn btn-default btn-block" name="submit" value="update"><i class="fas fa-edit"></i> <?=translate('update')?></button>
					</div>
				</div>
				</footer>
				<?php echo form_close();?>
			</section>
		<?php endif;?>
		
	<?php if(get_permission('translations', 'is_add')){ ?>
		<!-- language add modal -->
		<div id="add_modal" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
			<section class="panel">
				<?php
					echo form_open_multipart(base_url('translations/submitted_data/create'), array(
						'class' 	=> 'validate',
						'method' 	=> 'post'
					));
				?>
				<div class="panel-heading">
					<h4 class="panel-title">
						<i class="far fa-plus-square"></i> <?=translate('add_language')?>
					</h4>
				</div>

				<div class="panel-body">
					<div class="form-group mb-md">
						<label class="control-label"><?=translate('language')?> <span class="required">*</span></label>
						<input type="text" class="form-control" name="name" required  value="">
					</div>
					<div class="form-group mb-md">
						<label class="control-label"><?=translate('flag_icon')?></label>
						<input type="file" name="flag" data-height="90" class="dropify" data-allowed-file-extensions="jpg png bmp" />
					</div>
				</div>
				<footer class="panel-footer">
					<div class="text-right">
						<button type="submit" class="btn btn-default"><?=translate('save')?></button>
						<button class="btn btn-default modal-dismiss"><?=translate('cancel')?></button>
					</div>
				</footer>
				<?php echo form_close();?>
			</section>
		</div>
	<?php } ?>
		
		<!-- language edit modal -->
		<div class="zoom-anim-dialog modal-block modal-block-primary mfp-hide" id="modal">
			<section class="panel">
				<?php
					echo form_open_multipart(base_url(''), array(
						'id' => 'modalfrom',
						'class' => 'validate',
						'method' => 'post'
					));
				?>
					<header class="panel-heading">
						<h4 class="panel-title"><i class="far fa-edit"></i> <?=translate('rename')?></h4>
					</header>
					<div class="panel-body">
						<div class="form-group mb-md">
							<label class="control-label"><?=translate('name')?> <span class="required">*</span></label>
							<input type="text" class="form-control" name="rename" id="modal_name" required  value="" />
						</div>
						<div class="form-group mb-md">
							<label class="control-label"><?=translate('flag_icon')?></label>
							<input type="file" name="flag" data-height="80" class="dropify" data-allowed-file-extensions="jpg png bmp" />
						</div>

					</div>
					<footer class="panel-footer">
						<div class="row">
							<div class="col-md-12 text-right">
								<button type="submit" class="btn btn-default"><?=translate('update')?></button>
								<button class="btn btn-default modal-dismiss"><?=translate('cancel')?></button>
							</div>
						</div>
					</footer>
				<?php echo form_close();?>
			</section>
		</div>
		
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$(document).on('click', '.edit_modal', function () {
			var id = $(this).data('id');
			$.ajax({
				url: "<?=base_url('translations/get_details')?>",
				type: 'POST',
				data: {id: id},
				dataType: 'json',
				success: function (res) {
					$('#modal_name').val(res.name);
					$('#modalfrom').attr('action', '<?php echo base_url("translations/submitted_data/rename/");?>' + res.id); 
					mfp_modal('#modal');
				}
			});
		});
		
		$(document).on('click', '.add_lang', function () {
			mfp_modal('#add_modal');
		});
		
		$(document).on('change', '.toggle-switch.stats', function() {
			var state = $(this).prop('checked');
			var lang_id = $(this).data('lang');
			
			$.ajax({
				type: 'POST',
				url: "<?=base_url('translations/status')?>",
				data: {
					lang_id: lang_id,
					status: state
				},
				dataType: "html",
				success: function(data) {
					swal({
						type: 'success',
						title: "<?=translate('successfully')?>",
						text: data,
						showCloseButton: true,
						focusConfirm: false,
						buttonsStyling: false,
						confirmButtonClass: 'btn btn-default swal2-btn-default',
						footer: '*Note : You can undo this action at any time'
					});
				}
			});
		});

		$(document).on('change', '.toggle-switch.rtl', function() {
			var state = $(this).prop('checked');
			var lang_id = $(this).data('lang');
			$.ajax({
				type: 'POST',
				url: "<?=base_url('translations/isRTL')?>",
				data: {
					lang_id: lang_id,
					status: state
				},
				dataType: "html",
				success: function(data) {
					swal({
						type: 'success',
						title: "<?=translate('successfully')?>",
						text: data,
						showCloseButton: true,
						focusConfirm: false,
						buttonsStyling: false,
						confirmButtonClass: 'btn btn-default swal2-btn-default',
						footer: '*Note : You can undo this action at any time'
					}).then((result) => {
						if (result.value) {
							location.reload();
						}
					});
				}
			});
		});
	});
</script>