<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<?php echo form_open('parents/disable_authentication', array('class' => 'validate')); ?>
			<header class="panel-heading">
				<h4 class="panel-title">
				<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10.1992 12C12.9606 12 15.1992 9.76142 15.1992 7C15.1992 4.23858 12.9606 2 10.1992 2C7.43779 2 5.19922 4.23858 5.19922 7C5.19922 9.76142 7.43779 12 10.1992 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M1 22C1.57038 20.0332 2.74795 18.2971 4.36438 17.0399C5.98081 15.7827 7.95335 15.0687 10 15C14.12 15 17.63 17.91 19 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.8205 4.44006C18.5822 4.83059 19.1986 5.45518 19.579 6.22205C19.9594 6.98891 20.0838 7.85753 19.9338 8.70032C19.7838 9.5431 19.3674 10.3155 18.7458 10.9041C18.1243 11.4926 17.3302 11.8662 16.4805 11.97" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.3203 14.5701C18.6543 14.91 19.8779 15.5883 20.8729 16.5396C21.868 17.4908 22.6007 18.6827 23.0003 20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('parents_list')?>
				</h4>
			</header>
			<div class="panel-body">
				<table class="table table-bordered table-condensed table-hover table-export">
					<thead>
						<tr>
							<th width="40px">
								<div class="checkbox-replace">
									<label class="i-checks"><input type="checkbox" id="selectAllchkbox"><i></i></label>
								</div>
							</th>
							<th><?=translate('guardian_name')?></th>
							<th><?=translate('occupation')?></th>
							<th><?=translate('mobile_no')?></th>
							<th><?=translate('email')?></th>
							<th><?=translate('action')?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($parentslist as $parent): ?>	
						<tr>
							<td class="checked-area">
								<div class="checkbox-replace">
									<label class="i-checks"><input type="checkbox" class="user_checkbox" name="views_bulk_operations[]" value="<?=html_escape($parent->id)?>"><i></i></label>
								</div>
							</td>
							<td><?php echo html_escape($parent->name);?></td>
							<td><?php echo html_escape($parent->occupation);?></td>
							<td><?php echo html_escape($parent->mobileno);?></td>
							<td><?php echo html_escape($parent->email);?></td>
							<td>
								<!-- update link -->
								<a href="<?php echo base_url('parents/profile/'.$parent->id);?>" class="btn btn-circle btn-default"><i class="fas fa-user-alt"></i> <?=translate('profile')?></a>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		<?php if(get_permission('parent_disable_authentication', 'is_add')): ?>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-md-offset-10 col-md-2">
						<button type="submit" name="auth" value="1" class="btn btn-default btn-block"> <svg viewBox="-0.5 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.5 9.32001H7.5C6.37366 9.25709 5.2682 9.64244 4.42505 10.3919C3.5819 11.1414 3.06958 12.1941 3 13.32V18.32C3.06958 19.446 3.5819 20.4986 4.42505 21.2481C5.2682 21.9976 6.37366 22.3829 7.5 22.32H16.5C17.6263 22.3829 18.7318 21.9976 19.575 21.2481C20.4181 20.4986 20.9304 19.446 21 18.32V13.32C20.9304 12.1941 20.4181 11.1414 19.575 10.3919C18.7318 9.64244 17.6263 9.25709 16.5 9.32001Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17 9.32001V7.32001C17 5.99392 16.4732 4.72217 15.5355 3.78448C14.5978 2.8468 13.3261 2.32001 12 2.32001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?=translate('authentication_activate')?></button>
					</div>
				</div>
			</footer>
		<?php endif; ?>
			<?php echo form_close();?>
		</section>
	</div>
</div>