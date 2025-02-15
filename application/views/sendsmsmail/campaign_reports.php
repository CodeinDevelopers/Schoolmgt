<?php $widget = (is_superadmin_loggedin() ? 3 : 4); ?>
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <h4 class="panel-title">Select Campaign Type & Send Type</h4>
            </header>
            <?php echo form_open($this->uri->uri_string(), array('class' => 'validate')); ?>
                <div class="panel-body">
                    <div class="row mb-sm">
                    <?php if (is_superadmin_loggedin()): ?>
                        <div class="col-md-3 mb-sm">
                            <div class="form-group">
                                <label class="control-label"><?php echo translate('branch'); ?> <span class="required">*</span></label>
                                <?php
                                    $arrayBranch = $this->app_lib->getSelectList('branch');
                                    echo form_dropdown("branch_id", $arrayBranch, set_value('branch_id'), "class='form-control' required
                                    data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                        <div class="col-md-<?=$widget?> mb-sm">
                            <div class="form-group">
                                <label class="control-label"><?php echo translate('campaign_type'); ?> <span class="required">*</span></label>
                                <?php
                                    $arrayType = array(
                                        '' => translate('select'), 
                                        '1' => 'Sms', 
                                        '2' => 'Email', 
                                    );;
                                    echo form_dropdown("campaign_type", $arrayType, set_value('campaign_type'), "class='form-control' required
                                    data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
                                ?>
                            </div>
                        </div>
                        <div class="col-md-<?=$widget?> mb-sm">
                            <div class="form-group">
                                <label class="control-label">Send <?php echo translate('type'); ?> <span class="required">*</span></label>
                                <?php
                                    $arrayType = array(
                                        'both' => translate('both'), 
                                        '2' => translate('regular'), 
                                        '1' => translate('Scheduled'),
                                    );;
                                    echo form_dropdown("send_type", $arrayType, set_value('send_type'), "class='form-control' required
                                    data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
                                ?>
                            </div>
                        </div>
                        <div class="col-md-<?=$widget?> mb-sm">
                            <div class="form-group">
                                <label class="control-label"><?php echo translate('date'); ?> <span class="required">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                                    <input type="text" class="form-control daterange" name="daterange" value="<?=set_value('daterange', date("Y/m/d", strtotime('-6day')) . ' - ' . date("Y/m/d"))?>" required />
                                </div>
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

        <?php if(isset($campaignlist)): ?>
            <section class="panel appear-animation" data-appear-animation="<?=$global_config['animations'] ?>" data-appear-animation-delay="100">
                <header class="panel-heading">
                    <h4 class="panel-title"><i class="fas fa-list"></i> <?php echo translate('campaign') . " " . translate('reports'); ?></h4>
                </header>
                <div class="panel-body">
                    <div class="export_title"><?=(set_value('campaign_type') == 1 ? 'Sms' : 'Email')?> Campaign Reports : <?=$startdate . " To " . $enddate ?> </div>
                    <div class="mb-sm mt-xs">
                        <table class="table table-bordered table-hover table-condensed table-export">
                            <thead>
                                <tr>
                                    <th><?=translate('sl')?></th>
                                    <th><?=translate('campaign_name')?></th>
                                <?php if (set_value('campaign_type') == 1): ?>
                                    <th><?=translate('sms_gateway')?></th>
                                <?php endif; ?>
                                    <th><?=translate('recipients_type')?></th>
                                    <th><?=translate('recipients_count')?></th>
                                    <th><?=translate('status')?></th>
                                    <th><?=translate('created_at')?></th>
                                    <th><?=translate('action')?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; foreach($campaignlist as $row) : ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $row['campaign_name']; ?></td>
                                <?php if (set_value('campaign_type') == 1): ?>
                                    <td><?php echo ucfirst($row['sms_gateway']); ?></td>
                                <?php endif; ?>
                                    <td><?php
                                    $array = array(
                                        '1' => translate('group'), 
                                        '2' => translate('individual'), 
                                        '3' => translate('class'), 
                                    );
                                    echo $array[$row['recipient_type']]; 
                                    ?></td>
                                    <td><?php echo $row['successfully_sent'] . " / " . $row['total_thread']; ?></td>
                                    <td><?php
                                    if ($row['posting_status'] == 0) {
                                        echo "In Process";
                                    }
                                    if ($row['posting_status'] == 1) {
                                        echo 'Scheduled at <br> <small>' . date('Y-M-d h:m A', strtotime($row['schedule_time'])) . '</small>';
                                    }
                                    if ($row['posting_status'] == 2) {
                                       echo 'Delivered'; 
                                    }
                                    ?></td>
                                    <td><?php echo _d($row['created_at']); ?></td>
                                    <td class="min-w-c">
                                        <!-- view link -->
                                        <a href="javascript:void(0);" onclick="getDetails('<?=$row['id']?>')" class="btn btn-default btn-circle icon">
                                            <i class="fas fa-list"></i>
                                        </a>
                                        <?php if (get_permission('sendsmsmail', 'is_delete')): ?>
                                            <!--deletion link-->
                                            <?php echo btn_delete('sendsmsmail/delete/' . $row['id']);?>
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

<div class="zoom-anim-dialog modal-block modal-block-lg mfp-hide" id="modal">
    <section class="panel">
        <header class="panel-heading">
            <h4 class="panel-title"><i class="fas fa-list"></i> <?=translate('details')?></h4>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-condensed text-dark tbr-top mb-xs" id="ev_table"></table>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-default modal-dismiss"><?=translate('close')?></button>
                </div>
            </div>
        </footer>
    </section>
</div>

<script type="text/javascript">

    // event modal showing
    function getDetails(id) {
        $.ajax({
            url: base_url + "sendsmsmail/getDetails",
            type: 'POST',
            data: {
                id: id
            },
            success: function (data) {
                $('#ev_table').html(data);
                mfp_modal('#modal');
            }
        });
    }
</script>