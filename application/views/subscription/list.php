<style type="text/css">
/* Package Subscription */
.package ul.nav-tabs {
    text-align: center;
}

.package .nav-tabs li a {
    font-size: 1.4rem;
}

.panel.single-pricing-pack {
    transition: all 0.2s ease 0s;
    border-radius: 1rem !important;
    border: 2px solid #ced0d2;
    margin-top: 30px;
    position: relative;
    overflow: hidden;
    -webkit-transition: all 0.5s ease 0s;
    -moz-transition: all 0.5s ease 0s;
    transition: all 0.5s ease 0s;
}

.package-name {
    position: relative;
    background: transparent;
    padding: 35px 15px 20px;
}

.package-name h5 {
    margin-bottom: 0;
    font-size: 27px;
}

.package-name h5 span {
	height: 30px;
	line-height: 30px;
	position: absolute;
	top: 20px;
	right: -7px;
	background: #0372ec;
	text-align: center;
	color: #ffffff;
	font-size: 12px;
	padding: 0 15px;
	font-weight: 500;
}

.pricing-header {
    position: relative;
    background: transparent;
    padding: 10px 15px 20px;
    border: none;
}

.single-pricing-pack .panel-body {
    color: rgb(132, 146, 166);
    flex: 1 1 auto;
    padding: 40px 55px;
}

.pricing-feature-list li {
    font-size: 16px;
    line-height: 24px;
    color: #7c8088;
    padding: 6px 0;
    text-align: left;
}

.pricing-header .price {
    font-size: 30px;
    font-weight: 700;
    color: #404040;
}

html.dark .pricing-header .price,
html.dark .pricing-header .price span {
    color: #fff;
}

.pricing-header::after {
    content: "";
    display: block;
    width: 50%;
    position: absolute;
    bottom: 0;
    left: 65%;
    margin-left: -40%;
    height: 1px;
    background: radial-gradient(at center center, rgb(0, 115, 236) 0px, rgba(255, 255, 255, 0) 75%);
}

.pricing-header .price span {
    font-size: 20px;
    font-weight: 300;
    color: #404040;
}

.pricing-feature-list li span {
    font-weight: 500;
    color: #404040;
    font-size: 16px;
}

html.dark .pricing-feature-list li span {
    color: #fff;
}

.pricing-feature-list li i {
    color: #ffbd2e;
    font-size: 16px;
}

.pricing-feature-list li i.fa-times-circle {
    color: #ff4049 !important;
}

.single-pricing-pack:hover {
    box-shadow: 3px 5px 15px rgba(0, 0, 0, 0.2);
    border-color: #ffbd2e;
}

.pricing-header .discount {
    font-size: 20px;
    font-weight: 400;
    text-decoration: line-through;
    display: inline;
}
</style>

<?php 
$getType = $this->input->get('type');
$getType = (empty($getType)) ? 'all' : $getType;
$getPeriodType = $this->saas_model->getPeriodType();
unset($getPeriodType['']);
?>
<section class="panel">
	<div class="tabs-custom package">
		<ul class="nav nav-tabs justify-content-center">
			<li class="nav-item <?php if ('all' == $getType) echo 'active'; ?>">
				<a class="nav-link" href="<?php echo base_url('subscription/list'); ?>">
					<i class="far fa-dot-circle"></i> <?php echo translate('all') . " " . translate('plan') ?>
				</a>
			</li>
			<?php foreach ($getPeriodType as $key => $value) {  ?>
			<li class="nav-item <?php if ($key == $getType) echo 'active'; ?>">
				<a class="nav-link" href="<?php echo base_url('subscription/list?type='. $key); ?>">
					<i class="far fa-dot-circle"></i> <?php echo $value ?>
				</a>
			</li>
		<?php } ?>
			
		</ul>
		<div class="tab-content">
			<div class="tab-pane box active">
				<div class="row">
				<?php
				$sql = "SELECT * FROM `saas_package` WHERE `status` = '1' AND `free_trial` = '0'";
				if ($getType !== 'all')
					$sql .= " AND `period_type` = " . $this->db->escape($getType);
				$packages = $this->db->query($sql)->result_array();
				if (!empty($packages)) {
					foreach ($packages as $key => $value) {
					$periodType = $value['period_type'];
					?>
					<div class="col-lg-4 col-md-4 col-sm-6">
					    <div class="panel text-center single-pricing-pack popular-price">
					        <div class="package-name">
					            <h5><?php echo $value['name'] ?> <?php echo ($value['recommended'] == 1 ) ? '<span class="badge color-1 color-1-bg">Populer</span>' : ""; ?></h5>
					        </div>
					        <div class="panel-header pricing-header">
					            <div class="price text-center">
								<?php if ( $value['discount'] == 0) { ?>
									<?php echo $currency_symbol . " " .  $value['price'] ?><span>/ <?php 
									
									echo ($periodType == 1 ? $getPeriodType[$periodType] : ($value['period_value'] . " " . $getPeriodType[$periodType]));
								?></span>
								<?php } else { ?>
									<div class="discount"><?php echo $currency_symbol . " " . number_format($value['price'], 1, '.', '') ?></div> <?php echo $currency_symbol . " " . number_format(($value['price'] - $value['discount']), 1, '.', ''); ?><span> / <?php echo ($periodType == 1 ? $getPeriodType[$periodType] : ($value['period_value'] . " " . $getPeriodType[$periodType])) ?></span>
								<?php } ?>
					            </div>
					        </div>
					        <div class="panel-body">
					            <ul class="list-unstyled pricing-feature-list">
					                <li><?=translate('student') . " " . translate('limit')?> : <b><?=$value['student_limit']?></b></li>
					                <li><?=translate('staff') . " " . translate('limit')?> : <b><?=$value['staff_limit']?></b></li>
					                <li><?=translate('teacher') . " " . translate('limit')?> : <b><?=$value['teacher_limit']?></b></li>
					                <li><?=translate('parents') . " " . translate('limit')?> : <b><?=$value['parents_limit']?></b></li>
								<?php 
								if (empty($value['permission']) || $value['permission'] == 'null' ) {
									$permissions = [];
								} else {
									$permissions = json_decode($value['permission'], true);
								}
								$this->db->select('*');
								$this->db->from('permission_modules');
								$this->db->where('permission_modules.in_module', 1);
								$this->db->order_by('permission_modules.prefix', 'asc');
								$modules = $this->db->get()->result();
								foreach ($modules as $key2 => $value2) {
									?>
					                <li><i class="<?php echo (in_array($value2->id, $permissions) ? 'far fa-check-circle' : 'far fa-times-circle'); ?>"></i> <?php echo $value2->name ?></li>
					            <?php } ?>
					            </ul>
					            <a href="<?php echo base_url('subscription/renew?id=' . $value['id']); ?>" class="btn btn btn-default btn-block mt-lg"><?php echo translate('purchase_now'); ?></a>
					        </div>
					    </div>
					</div>
				<?php } } else {
					echo '<div class="text-center mb-lg mt-xs text-danger">' . translate('no_information_available') . '</div>';
				} ?>
				</div>
			</div>
		</div>
	</div>
</section>