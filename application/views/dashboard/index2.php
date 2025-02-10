<div class="dashboard-page">
<?php if ($widget1 > 0) { ?> 
	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="panel">
				<div class="row widget-row-in">
				
				<!-- Students First -->
				<?php if (get_permission('student_count_widget', 'is_view')) { ?>
					<div class="col-lg-<?php echo $widget1; ?> col-sm-6">
						<div class="panel-body">
							<div class="widget-col-in row">
								<div class="col-md-6 col-sm-6 col-xs-6"> 
									<h5><?php echo translate('students'); ?></h5> 
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<h3 class="counter text-right mt-md text-primary"><?=$get_total_student?></h3>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="box-top-line line-color-primary">
										<span class="text-uppercase"><?php echo translate('total_strength'); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>

				<!-- Parents Second -->
				<?php if (get_permission('parent_count_widget', 'is_view')) { ?>
					<div class="col-lg-<?php echo $widget1; ?> col-sm-6">
						<div class="panel-body">
							<div class="widget-col-in row">
								<div class="col-md-6 col-sm-6 col-xs-6"> 
								<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="38px" height="38px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <defs>
                                            <style>
                                                .cls-1,
                                                .cls-2 {
                                                    fill: none;
                                                    stroke: currentColor;
                                                    stroke-linecap: round;
                                                    stroke-width: 1.5px;
                                                }

                                                .cls-1 {
                                                    stroke-linejoin: round;
                                                }

                                                .cls-2 {
                                                    stroke-linejoin: bevel;
                                                }
                                            </style>
                                        </defs>
                                        <g id="ic-users-more">
                                            <path class="cls-1" d="M3,21l.79-2.88C5.1,13.39,8.55,11,12,11"></path>
                                            <circle class="cls-2" cx="12" cy="5.98" r="5"></circle>
                                            <circle class="cls-1" cx="17" cy="18" r="5"></circle>
                                            <circle class="cls-1" cx="17" cy="18" r="0.21"></circle>
                                            <circle class="cls-1" cx="14.35" cy="18" r="0.21"></circle>
                                            <circle class="cls-1" cx="19.48" cy="18" r="0.21"></circle>
                                        </g>
                                    </g>
                                </svg>
									<h5><?php echo translate('parents'); ?></h5>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<h3 class="counter text-right mt-md text-primary"><?php
										if (!empty($school_id))
											$this->db->where('branch_id', $school_id);
										echo $this->db->select('id')->get('parent')->num_rows();
									?></h3>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="box-top-line line-color-primary">
										<span class="text-uppercase"><?php echo translate('total_strength'); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
<!-- Teachers (Remained Unchanged) -->
<?php if (get_permission('teacher_count_widget', 'is_view')) { ?>
					<div class="col-lg-<?php echo $widget1; ?> col-sm-6">
						<div class="panel-body">
							<div class="widget-col-in row">
								<div class="col-md-6 col-sm-6 col-xs-6"> 
								
									<h5><?php echo translate('teachers'); ?></h5>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<h3 class="counter text-right mt-md text-primary"><?php
										$staff = $this->dashboard_model->getstaffcounter(3, $school_id);
										echo $staff['snumber'];
									?></h3>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="box-top-line line-color-primary">
										<span class="text-uppercase"><?=translate('total_strength')?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				<!-- Employees Last -->
				<?php if (get_permission('admission_count_widget', 'is_view')) { ?>
					<div class="col-lg-<?php echo $widget2; ?> col-sm-6 ">
						<div class="panel-body">
							<div class="widget-col-in row">
								<div class="col-md-6 col-sm-6 col-xs-6">   
									<h5><?php echo translate('admission'); ?></h5>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<h3 class="counter text-right mt-md text-primary"><?=$get_monthly_admission;?></h3>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="box-top-line line-color-primary">
										<span class="text-uppercase"><?php echo translate('interval_month'); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>

				
				</div>
			</div>
		</div>
	</div>
<?php } ?>