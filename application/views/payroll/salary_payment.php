<?php $widget = (is_superadmin_loggedin() ? 4 : 6); ?>
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="panel-title">Select Role & Period</h4>
            </header>
            <?php echo form_open($this->uri->uri_string(), array('class' => 'validate')); ?>
                <div class="panel-body">
                    <div class="row mb-sm">
                    <?php if (is_superadmin_loggedin()): ?>
                        <div class="col-md-4 mb-sm">
                            <div class="form-group">
                                <label class="control-label"><?php echo translate('branch'); ?> <span class="required">*</span></label>
                                <?php
                                    $arrayBranch = $this->app_lib->getSelectList('branch');
                                    echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control'
                                    data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                        <div class="col-md-<?=$widget?> mb-sm">
                            <div class="form-group">
                                <label class="control-label"><?php echo translate('role'); ?> <span class="required">*</span></label>
                                <?php
                                    $role_list = $this->app_lib->getRoles();
                                    echo form_dropdown("staff_role", $role_list, set_value('staff_role'), "class='form-control' required data-plugin-selectTwo
                                    data-width='100%' data-minimum-results-for-search='Infinity' ");
                                ?>
                            </div>
                        </div>
                        <div class="col-md-<?=$widget?> mb-sm">
                            <div class="form-group">
                                <label class="control-label"><?php echo translate('month'); ?> <span class="required">*</span></label>
                                <input type="text" class="form-control monthyear" autocomplete="off" name="month_year" value="<?php echo set_value('month_year', date("Y-m")); ?>" required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-offset-10 col-md-2">
                            <button type="submit" name="search" value="1" class="btn btn-default btn-block"><svg fill="currentColor" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 22.471h-5.98c-0.412-0.006-0.744-0.338-0.75-0.749v-5.721c0-0.69-0.56-1.25-1.25-1.25s-1.25 0.56-1.25 1.25v0 5.721c0.002 1.794 1.456 3.248 3.25 3.25h5.981c0.69 0 1.25-0.56 1.25-1.25s-0.56-1.25-1.25-1.25v0zM16 9.27h5.721c0.412 0.006 0.744 0.338 0.75 0.749v5.981c0 0.69 0.56 1.25 1.25 1.25s1.25-0.56 1.25-1.25v0-5.98c-0.002-1.794-1.456-3.248-3.25-3.25h-5.721c-0.69 0-1.25 0.56-1.25 1.25s0.56 1.25 1.25 1.25v0zM13.25 10v-6c-0.002-1.794-1.456-3.248-3.25-3.25h-6c-1.794 0.002-3.248 1.456-3.25 3.25v6c0.002 1.794 1.456 3.248 3.25 3.25h6c1.794-0.002 3.248-1.456 3.25-3.25v-0zM3.25 10v-6c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v6.001c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-0.001zM28 18.75h-6c-1.794 0.001-3.249 1.456-3.25 3.25v6c0.001 1.794 1.456 3.249 3.25 3.25h6c1.794-0.001 3.249-1.456 3.25-3.25v-6c-0.001-1.794-1.456-3.249-3.25-3.25h-0zM28.75 28c-0.006 0.412-0.338 0.744-0.749 0.75h-6.001c-0.412-0.006-0.744-0.338-0.75-0.749v-6.001c0.006-0.412 0.338-0.744 0.749-0.75h6.001c0.412 0.006 0.744 0.338 0.75 0.749v0.001z"></path> </g></svg> <?php echo translate('filter'); ?></button>
                        </div>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </section>

        <?php if(isset($stafflist)): ?>
            <section class="panel appear-animation" data-appear-animation="<?=$global_config['animations'] ?>" data-appear-animation-delay="100">
                <header class="panel-heading">
                    <h4 class="panel-title"><?php echo translate('staff') . " " . translate('list'); ?></h4>
                </header>
                <div class="panel-body">
                    <div class="mb-sm mt-xs">
                        <table class="table table-bordered table-hover table-condensed table_default" >
                            <thead>
                                <tr>
                                    <th><?php echo translate('staff_id'); ?></th>
                                    <th><?php echo translate('name'); ?></th>
                                    <th><?php echo translate('designation'); ?></th>
                                    <th><?php echo translate('department'); ?></th>
                                    <th><?php echo translate('mobile_no'); ?></th>
                                    <th><?php echo translate('salary') . " " . translate('grade'); ?></th>
                                    <th><?php echo translate('basic') . " " . translate('salary'); ?></th>
                                    <th><?php echo translate('status'); ?></th>
                                    <th><?php echo translate('action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($stafflist as $row): ?>
                                <tr>
                                    <td><?php echo $row->staff_id; ?></td>
                                    <td><?php echo $row->name; ?></td>
                                    <td><?php echo $row->designation_name; ?></td>
                                    <td><?php echo $row->department_name; ?></td>
                                    <td><?php echo $row->mobileno; ?></td>
                                    <td><?php echo $row->template_name; ?></td>
                                    <td><?php echo $global_config['currency_symbol'] . $row->basic_salary; ?></td>
                                    <td>
                                        <?php
                                            $labelMode = '';
                                            $status = ($row->salary_id == 0 ? 'unpaid' : 'paid');
                                            if($status == 'paid') {
                                                $status_txt = translate('salary') . " " . translate('paid');
                                                $labelMode  = 'label-success-custom';
                                            } elseif($status == 'unpaid') {
                                                $status_txt = translate('salary') . " " . translate('unpaid');
                                                $labelMode  = 'label-info-custom';
                                            }
                                            echo "<span class='label " . $labelMode. "'>" . $status_txt . "</span>";
                                        ?>
                                    </td>
                                    <td class="min-w-c">
                                        <?php if($status == 'paid'): ?>
                                            <a href="<?php echo base_url('payroll/invoice/'.$row->salary_id.'/'.$row->salary_hash); ?>" class="btn btn-default btn-circle"><i class="fas fa-eye"></i> <?php echo translate('payslip'); ?></a>
                                         <?php else: ?>
                                            <a target="_blank" href="<?php echo base_url('payroll/create/' . $row->id . '/' . $month . '/' . $year); ?>" class="btn btn-default btn-circle"><i class="far fa-credit-card"></i> <?php echo translate('pay_now'); ?></a>
                                         <?php endif; ?>
                                    </td>
                                    <?php endforeach; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
</div>