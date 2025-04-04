<?php
$widget = (is_superadmin_loggedin() ? 3 : 4);
$currency_symbol = $global_config['currency_symbol'];
?>
<section class="panel">
	<header class="panel-heading">
		<h4 class="panel-title">Select Type & Date</h4>
	</header>
	<?php echo form_open($this->uri->uri_string(), array('class' => 'validate')); ?>
		<div class="panel-body">
			<div class="row mb-sm">
				<?php if (is_superadmin_loggedin() ): ?>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label"><?=translate('branch')?> <span class="required">*</span></label>
							<?php
								$arrayBranch = $this->app_lib->getSelectList('branch');
								echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' id='branch_id'
								data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
							?>
						</div>
					</div>
				<?php endif; ?>
				<div class="col-md-<?php echo $widget; ?> mb-sm">		
					<div class="form-group">
						<label class="control-label"><?php echo translate('account'); ?> <span class="required">*</span></label>
						<?php
							$accountlist = $this->app_lib->getSelectByBranch('accounts', $branch_id);
							echo form_dropdown("account_id", $accountlist, set_value('account_id'), "class='form-control' id='account_id' required
							data-plugin-selectTwo data-width='100%'");
						?>
					</div>
				</div>
				<div class="col-md-<?php echo $widget; ?> mb-sm">		
					<div class="form-group">
						<label class="control-label"><?php echo translate('type'); ?> <span class="required">*</span></label>
						<?php
							$typelList =array(
								'' => translate('select'),
								'all' => translate('all'),
								'expense' => translate('expense') . ' (Dr.)',
								'deposit' => translate('income') . ' (Cr.)',
							);
							echo form_dropdown("type", $typelList, set_value('type'), "class='form-control' required
							data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
						?>
					</div>
				</div>
				<div class="col-md-<?php echo $widget; ?>">		
					<div class="form-group">
						<label class="control-label"><?php echo translate('date'); ?> <span class="required">*</span></label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fas fa-calendar-check"></i></span>
							<input type="text" class="form-control daterange" name="daterange" value="<?php echo set_value('daterange', date("Y/m/d") . ' - ' . date("Y/m/d")); ?>" required />
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-offset-10 col-md-2">
					<button type="submit" name="search" value="1" class="btn btn btn-default btn-block"><svg fill="currentColor" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 22.471h-5.98c-0.412-0.006-0.744-0.338-0.75-0.749v-5.721c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 5.721c0.002 1.794 1.456 3.248 3.25 3.25h5.981c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM16 9.27h5.721c0.412 0.006 0.744 0.338 0.75 0.749v5.981c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-5.98c-0.002-1.794-1.456-3.248-3.25-3.25h-5.721c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0zM13.25 10v-6c-0.002-1.794-1.456-3.248-3.25-3.25h-6c-1.794 0.002-3.248 1.456-3.25 3.25v6c0.002 1.794 1.456 3.248 3.25 3.25h6c1.794-0.002 3.248-1.456 3.25-3.25v-0zM3.25 10v-6c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v6.001c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-0.001zM28 18.75h-6c-1.794 0.001-3.249 1.456-3.25 3.25v6c0.001 1.794 1.456 3.249 3.25 3.25h6c1.794-0.001 3.249-1.456 3.25-3.25v-6c-0.001-1.794-1.456-3.249-3.25-3.25h-0zM28.75 28c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-6.001c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v0.001z"></path> </g></svg>  <?php echo translate('filter'); ?></button>
				</div>
			</div>
		</footer>
	<?php echo form_close(); ?>
</section>
<?php if (isset($results)): ?>
<section class="panel appear-animation" data-appear-animation="<?php echo $global_config['animations'];?>" data-appear-animation-delay="100">
	<header class="panel-heading">
		<h4 class="panel-title"><i class="fas fa-list-ol"></i> <?php echo translate('account') . " " . translate('statement'); ?></h4>
	</header>
	<div class="panel-body">
		<!-- Hidden information for printing -->
		<div class="export_title"><?php echo get_type_name_by_id('accounts', set_value('account_id')) ?> Statement : <?php echo _d($daterange[0]); ?> To <?php echo _d($daterange[1]); ?></div>
		<table class="table table-bordered table-hover table-condensed table-export" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th><?php echo translate('sl'); ?></th>
					<th><?php echo translate('voucher') . " " . translate('head'); ?></th>
					<th><?php echo translate('ref_no'); ?></th>
					<th><?php echo translate('description'); ?></th>
					<th><?php echo translate('date'); ?></th>
					<th><?php echo translate('dr'); ?>.</th>
					<th><?php echo translate('cr'); ?>.</th>
					<th><?php echo translate('balance'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$total_dr = 0;
				$total_cr = 0;
				$total_bal = 0;
				if(!empty($results)) {
					$count = 1; 
					foreach($results as $row):
						$total_dr += $row['dr'];
						$total_cr += $row['cr'];
				?>	
				<tr>
					<td><?php echo $count++; ?></td>
					<td><?php echo html_escape($row['v_head']); ?></td>
					<td><?php echo html_escape($row['ref']); ?></td>
					<td><?php echo html_escape($row['description']); ?></td>
					<td><?php echo html_escape(_d($row['date'])); ?></td>
					<td><?php echo html_escape(currencyFormat($row['dr']));?></td>
					<td><?php echo html_escape(currencyFormat($row['cr']));?></td>
					<td><?php echo (set_value('type') == 'all' ? currencyFormat($row['bal']) : currencyFormat(0)); ?>
					</td>
				</tr>
				<?php endforeach; } ?>
			</tbody>
			<tfoot>
				<tr>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th><?php echo html_escape(currencyFormat($total_dr)); ?></th>
					<th><?php echo html_escape(currencyFormat($total_cr)); ?></th>
					<th><?php echo html_escape(set_value('type') == 'all' ? currencyFormat($total_cr - $total_dr) : currencyFormat(0)); ?></th>
				</tr>
			</tfoot>
		</table>
	</div>
</section>
<?php endif; ?>

<script type="text/javascript">
    $(document).ready(function () {
		$('#branch_id').on("change", function(){
		    var branchID = $(this).val();
		    $.ajax({
		        url: base_url + 'ajax/getDataByBranch',
		        type: "POST",
		        data: {
		            'branch_id': branchID,
		            'table': 'accounts'
		        },
		        success: function (data) {
		        	$('#account_id').html(data);
		        }
		    });
		});
    });
</script>