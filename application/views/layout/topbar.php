<header class="header">
	<div class="logo-env">
		<a href="<?php echo base_url('#');?>" class="logo">
			<img src="<?=$this->application_model->getBranchImage(get_loggedin_branch_id(), 'logo-small')?>" height="40">
		</a>

		<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
		<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M4 5C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H4ZM3 12C3 11.4477 3.44772 11 4 11H20C20.5523 11 21 11.4477 21 12C21 12.5523 20.5523 13 20 13H4C3.44772 13 3 12.5523 3 12ZM3 18C3 17.4477 3.44772 17 4 17H20C20.5523 17 21 17.4477 21 18C21 18.5523 20.5523 19 20 19H4C3.44772 19 3 18.5523 3 18Z" fill="currentColor"></path> </g></svg>
		</div>
	</div>

	<div class="header-left hidden-xs">
		<ul class="header-menu">
			<!-- sidebar toggle button -->
			<li>
				<div class="header-menu-icon sidebar-toggle" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.97 15V9C21.97 4 19.97 2 14.97 2H8.96997C3.96997 2 1.96997 4 1.96997 9V15C1.96997 20 3.96997 22 8.96997 22H14.97C19.97 22 21.97 20 21.97 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7.96997 2V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14.97 9.43994L12.41 11.9999L14.97 14.5599" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
				</div>
			</li>
			<!-- full screen button -->
			<li>
				<div class="header-menu-icon s-expand">
					<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M9.94358 1.25L10 1.25C10.4142 1.25 10.75 1.58579 10.75 2C10.75 2.41421 10.4142 2.75 10 2.75C8.09318 2.75 6.73851 2.75159 5.71085 2.88976C4.70476 3.02502 4.12511 3.27869 3.7019 3.7019C3.27869 4.12511 3.02502 4.70476 2.88976 5.71085C2.75159 6.73851 2.75 8.09318 2.75 10C2.75 10.4142 2.41421 10.75 2 10.75C1.58579 10.75 1.25 10.4142 1.25 10L1.25 9.94358C1.24998 8.10582 1.24997 6.65019 1.40314 5.51098C1.56076 4.33856 1.89288 3.38961 2.64124 2.64124C3.38961 1.89288 4.33856 1.56076 5.51098 1.40314C6.65019 1.24997 8.10582 1.24998 9.94358 1.25ZM18.2892 2.88976C17.2615 2.75159 15.9068 2.75 14 2.75C13.5858 2.75 13.25 2.41421 13.25 2C13.25 1.58579 13.5858 1.25 14 1.25L14.0564 1.25C15.8942 1.24998 17.3498 1.24997 18.489 1.40314C19.6614 1.56076 20.6104 1.89288 21.3588 2.64124C22.1071 3.38961 22.4392 4.33856 22.5969 5.51098C22.75 6.65019 22.75 8.10583 22.75 9.94359V10C22.75 10.4142 22.4142 10.75 22 10.75C21.5858 10.75 21.25 10.4142 21.25 10C21.25 8.09318 21.2484 6.73851 21.1102 5.71085C20.975 4.70476 20.7213 4.12511 20.2981 3.7019C19.8749 3.27869 19.2952 3.02502 18.2892 2.88976ZM2 13.25C2.41421 13.25 2.75 13.5858 2.75 14C2.75 15.9068 2.75159 17.2615 2.88976 18.2892C3.02502 19.2952 3.27869 19.8749 3.7019 20.2981C4.12511 20.7213 4.70476 20.975 5.71085 21.1102C6.73851 21.2484 8.09318 21.25 10 21.25C10.4142 21.25 10.75 21.5858 10.75 22C10.75 22.4142 10.4142 22.75 10 22.75H9.94359C8.10583 22.75 6.65019 22.75 5.51098 22.5969C4.33856 22.4392 3.38961 22.1071 2.64124 21.3588C1.89288 20.6104 1.56076 19.6614 1.40314 18.489C1.24997 17.3498 1.24998 15.8942 1.25 14.0564L1.25 14C1.25 13.5858 1.58579 13.25 2 13.25ZM22 13.25C22.4142 13.25 22.75 13.5858 22.75 14V14.0564C22.75 15.8942 22.75 17.3498 22.5969 18.489C22.4392 19.6614 22.1071 20.6104 21.3588 21.3588C20.6104 22.1071 19.6614 22.4392 18.489 22.5969C17.3498 22.75 15.8942 22.75 14.0564 22.75H14C13.5858 22.75 13.25 22.4142 13.25 22C13.25 21.5858 13.5858 21.25 14 21.25C15.9068 21.25 17.2615 21.2484 18.2892 21.1102C19.2952 20.975 19.8749 20.7213 20.2981 20.2981C20.7213 19.8749 20.975 19.2952 21.1102 18.2892C21.2484 17.2615 21.25 15.9068 21.25 14C21.25 13.5858 21.5858 13.25 22 13.25Z" fill="currentColor"></path> </g></svg>
				</div>
			</li>
			<!-- shortcut box -->
            <?php
            if(get_permission('student', 'is_add') ||
            get_permission('salary_payment', 'is_add') ||
            get_permission('leave_manage', 'is_view') ||
            get_permission('live_class', 'is_view') ||
            get_permission('due_invoice', 'is_view') ||
            get_permission('invoice', 'is_view')) {
            ?>
			<li>
				<div class="header-menu-icon dropdown-toggle" data-toggle="dropdown">
				<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18 7.75V14.5C18 13.4 17.1 12.5 16 12.5H8C6.9 12.5 6 13.4 6 14.5V7.75C6 6.65 6.9 5.75 8 5.75H16C17.1 5.75 18 6.65 18 7.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19 15.75H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 15.75H5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18 14V11C18 9.9 17.1 9 16 9H8C6.9 9 6 9.9 6 11V14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M18 14.5V15.75H14.5C14.5 17.13 13.38 18.25 12 18.25C10.62 18.25 9.5 17.13 9.5 15.75H6V14.5C6 13.4 6.9 12.5 8 12.5H16C17.1 12.5 18 13.4 18 14.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
				</div>
				<div class="dropdown-menu header-menubox qk-menu">
					<div class="qk-menu-p">
						<div class="menu-icon-grid">
						<?php if(get_permission('student', 'is_add')){ ?>
							<a href="<?php echo base_url('student/add');?>"><i class="fas fa-users"></i> <?php echo translate('student_admission');?></a>
						<?php } if(get_permission('salary_payment', 'is_add')) { ?>
							<a href="<?php echo base_url('payroll'); ?>"><i class="fas fa-donate"></i> <?php echo translate('salary_payment');?></a>
						<?php } if(get_permission('leave_manage', 'is_view')) { ?>
							<a href="<?php echo base_url('leave');?>"><i class="fas fa-fill-drip"></i> <?php echo translate('leave_application');?></a>
						<?php } if(get_permission('live_class', 'is_view')) { ?>
							<a href="<?php echo base_url('live_class');?>"><i class="fas fa-video"></i> <?php echo translate('live_class_rooms');?></a>
						<?php } if(get_permission('due_invoice', 'is_view')) { ?>
							<a href="<?php echo base_url('fees/due_invoice');?>"><i class="fas fa-hand-holding-usd"></i> <?php echo translate('due_fees_invoice');?></a>
						<?php } if(get_permission('invoice', 'is_view')) { ?>
							<a href="<?php echo base_url('fees/invoice_list');?>"><i class="fab fa-wpforms"></i> <?php echo translate('payments_history');?></a>
						<?php } ?>
						</div>
					</div>
				</div>
			</li>
			<?php } ?>
		</ul>

		<!-- search bar -->
		<?php if (get_permission('student', 'is_view')): ?>
			<span class="separator hidden-sm"></span>
			<?php echo form_open('student/search', array('class' => 'search nav-form'));?>
				<div class="input-group input-search">
					<input type="text" class="form-control" name="search_text" id="search_text" placeholder="<?php echo translate('search');?>">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>
		<?php endif;?>
	</div>

	<div class="header-right">
		<ul class="header-menu" style="display: flex; align-items: center; margin-right: 0px;">
<?php 
if (is_student_loggedin()):
	$this->db->select('enroll.id,class.name as class_name,section.name as section_name');
	$this->db->from('enroll');
	$this->db->join('class', 'class.id = enroll.class_id', 'inner');
	$this->db->join('section', 'section.id = enroll.section_id', 'inner');
	$this->db->where('enroll.student_id', get_loggedin_user_id());
	$this->db->where('enroll.session_id', get_session_id());
	$this->db->order_by('enroll.id', 'asc');
	$multiClass = $this->db->get()->result();
	if (count($multiClass) > 1) {
	?>
			<!-- switch class -->
			<li>
				<a href="#" class="dropdown-toggle header-menu-icon" data-toggle="dropdown">
					<i class="fa-solid fa-retweet"></i>
				</a>
				<div class="dropdown-menu header-menubox mh-oh">
					<div class="notification-title">
						<i class="fa-solid fa-retweet"></i> <?php echo translate('switch_class');?>
					</div>
					<div class="content hbox lb-pr">
						<div class="scrollable visible-slider dh-tf" data-plugin-scrollable>
							<div class="scrollable-content">
								<ul>
<?php
if ($this->session->has_userdata('enrollID')) {
	$currentClass = $this->session->userdata('enrollID');
} else {
	$currentClass = get_global_setting('translation');
}
foreach ($multiClass as $key => $class):
		?>
	<li>
		<a href="<?php echo base_url('userrole/switchClass/' . $class->id);?>">
			<?php echo $class->class_name . " (" . $class->section_name . ")";  ?>  <?php echo $class->id == $currentClass ? '<i class="fas fa-check"></i>' : ''; ?>
		</a>
	</li>
<?php endforeach;?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</li>
<?php  } 
	endif;
	?>

		<?php 
		$showwebURL = false;
		$webURL = "";
		if (is_superadmin_loggedin()) {
			$showwebURL = true;
			$webURL = base_url();
		} else {
			$cmsRow = $this->db->select('cms_active,url_alias')
			->where('branch_id', get_loggedin_branch_id())
			->get('front_cms_setting')->row_array();
			if (isset($cmsRow['cms_active']) && $cmsRow['cms_active'] == 1) {
				$showwebURL = true;
			}
			$webURL = base_url((isset($cmsRow['url_alias']) ? $cmsRow['url_alias'] : '') );
		}
		if ($showwebURL) {
		?>
			<!-- website link -->
			<li>
				<a href="<?php echo $webURL; ?>" target="_blank" class="header-menu-icon" data-toggle="tooltip" data-placement="bottom"
				data-original-title="<?php echo translate('visit_home_page'); ?>">
				<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.5" d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z" stroke="#717171" stroke-width="1.5"></path> <path d="M15 18H9" stroke="#717171" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
				</a>
			</li>
		<?php } ?>
			<!-- session switcher box -->
			<li>
				<a href="#" class="dropdown-toggle header-menu-icon" data-toggle="dropdown">
				<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12Z" stroke="#717171" stroke-width="1.5"></path> <path d="M7 4V2.5" stroke="#717171" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17 4V2.5" stroke="#717171" stroke-width="1.5" stroke-linecap="round"></path> <path d="M2.5 9H21.5" stroke="#717171" stroke-width="1.5" stroke-linecap="round"></path> <path d="M18 17C18 17.5523 17.5523 18 17 18C16.4477 18 16 17.5523 16 17C16 16.4477 16.4477 16 17 16C17.5523 16 18 16.4477 18 17Z" fill="#717171"></path> <path d="M18 13C18 13.5523 17.5523 14 17 14C16.4477 14 16 13.5523 16 13C16 12.4477 16.4477 12 17 12C17.5523 12 18 12.4477 18 13Z" fill="#717171"></path> <path d="M13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17Z" fill="#717171"></path> <path d="M13 13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13C11 12.4477 11.4477 12 12 12C12.5523 12 13 12.4477 13 13Z" fill="#717171"></path> <path d="M8 17C8 17.5523 7.55228 18 7 18C6.44772 18 6 17.5523 6 17C6 16.4477 6.44772 16 7 16C7.55228 16 8 16.4477 8 17Z" fill="#717171"></path> <path d="M8 13C8 13.5523 7.55228 14 7 14C6.44772 14 6 13.5523 6 13C6 12.4477 6.44772 12 7 12C7.55228 12 8 12.4477 8 13Z" fill="#717171"></path> </g></svg>
				</a>
				<div class="dropdown-menu header-menubox mh-oh">
					<div class="notification-title">
					<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12Z" stroke="#717171" stroke-width="1.5"></path> <path d="M7 4V2.5" stroke="#717171" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17 4V2.5" stroke="#717171" stroke-width="1.5" stroke-linecap="round"></path> <path d="M2.5 9H21.5" stroke="#717171" stroke-width="1.5" stroke-linecap="round"></path> <path d="M18 17C18 17.5523 17.5523 18 17 18C16.4477 18 16 17.5523 16 17C16 16.4477 16.4477 16 17 16C17.5523 16 18 16.4477 18 17Z" fill="#717171"></path> <path d="M18 13C18 13.5523 17.5523 14 17 14C16.4477 14 16 13.5523 16 13C16 12.4477 16.4477 12 17 12C17.5523 12 18 12.4477 18 13Z" fill="#717171"></path> <path d="M13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17Z" fill="#717171"></path> <path d="M13 13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13C11 12.4477 11.4477 12 12 12C12.5523 12 13 12.4477 13 13Z" fill="#717171"></path> <path d="M8 17C8 17.5523 7.55228 18 7 18C6.44772 18 6 17.5523 6 17C6 16.4477 6.44772 16 7 16C7.55228 16 8 16.4477 8 17Z" fill="#717171"></path> <path d="M8 13C8 13.5523 7.55228 14 7 14C6.44772 14 6 13.5523 6 13C6 12.4477 6.44772 12 7 12C7.55228 12 8 12.4477 8 13Z" fill="#717171"></path> </g></svg>  <?php echo translate('academic_session');?>
					</div>
					<div class="content hbox pr-none">
						<div class="scrollable visible-slider dh-tf" data-plugin-scrollable>
							<div class="scrollable-content">
								<ul>
<?php
$get_session = $this->db->get('schoolyear')->result();
foreach ($get_session as $session) : 
?>
	<li>
		<a href="<?php echo base_url('sessions/set_academic/' . $session->id);?>">
			<?php echo $session->school_year;?> <?php echo get_session_id() == $session->id ? '<i class="fas fa-check"></i>' : ''; ?>
		</a>
	</li>
<?php endforeach;?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</li>
			
	
			<!-- message alert box -->
			<li>
				<a href="#" class="dropdown-toggle header-menu-icon" data-toggle="dropdown">
				<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M18.7491 9.70957V9.00497C18.7491 5.13623 15.7274 2 12 2C8.27256 2 5.25087 5.13623 5.25087 9.00497V9.70957C5.25087 10.5552 5.00972 11.3818 4.5578 12.0854L3.45036 13.8095C2.43882 15.3843 3.21105 17.5249 4.97036 18.0229C9.57274 19.3257 14.4273 19.3257 19.0296 18.0229C20.789 17.5249 21.5612 15.3843 20.5496 13.8095L19.4422 12.0854C18.9903 11.3818 18.7491 10.5552 18.7491 9.70957Z" stroke="#717171" stroke-width="1.5"></path> <path d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19" stroke="#717171" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
					<?php 
						$unreadMessage	= $this->application_model->unread_message_alert();
						if (count($unreadMessage) > 0) {
							echo '<span class="badge">' . count($unreadMessage) . '</span>';
						} 
					?>
				</a>
				<div class="dropdown-menu header-menubox qmsg-box-mw">
					<div class="notification-title">
					<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M18.7491 9.70957V9.00497C18.7491 5.13623 15.7274 2 12 2C8.27256 2 5.25087 5.13623 5.25087 9.00497V9.70957C5.25087 10.5552 5.00972 11.3818 4.5578 12.0854L3.45036 13.8095C2.43882 15.3843 3.21105 17.5249 4.97036 18.0229C9.57274 19.3257 14.4273 19.3257 19.0296 18.0229C20.789 17.5249 21.5612 15.3843 20.5496 13.8095L19.4422 12.0854C18.9903 11.3818 18.7491 10.5552 18.7491 9.70957Z" stroke="#717171" stroke-width="1.5"></path> <path d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19" stroke="#717171" stroke-width="1.5" stroke-linecap="round"></path> </g></svg> <?php echo translate('message');?>
					</div>
					<div class="content">
						<ul>
							<?php
								if (count($unreadMessage) > 0) {
									foreach ($unreadMessage as $message):
										?>
								<li>
									<a href="<?php echo base_url('communication/mailbox/read?type='.$message['msg_type'].'&id='.$message['id']);?>" class="clearfix">
										<!-- preview of sender image -->
										<figure class="image pull-right">
											<img src="<?php echo $message['message_details']['imgPath']; ?>" height="40px" width="40px" class="img-circle">
										</figure>
										<!-- preview of sender name and date -->
										<span class="title line"><strong><?php echo $message['message_details']['userName']; ?></strong>
										<small>- <?php echo get_nicetime($message['created_at']);?></small>  </span>
										<!-- preview of the last unread message sub-string -->
										<span class="message"><?php echo mb_strimwidth(strip_tags($message['body']), 0, 35, "..."); ?></span>
									</a>
								</li>
							<?php
									endforeach; 
								}else{
									echo '<li class="text-center">You do not have any new messages</li>';
								}
							?>
						</ul>
					</div>
					<div class="notification-footer">
						<div class="text-right">
							<a href="<?php echo base_url('communication/mailbox/inbox');?>" class="view-more">All Messages</a>
						</div>
					</div>
				</div>
			</li>
			<?php if (get_permission('student_attendance', 'is_add')): ?>
<li>
    <a href="<?php echo base_url('attendance/student_entry'); ?>" 
       style="display: flex; align-items: center; padding: 4px 2px; border: 2px solid #eee; border-radius: 6px; text-decoration: none; transition: all 0.3s ease;"
       onmouseover="this.style.backgroundColor='#f0f0f0';  this.querySelector('span').style.color='#666666'; this.querySelectorAll('path').forEach(path => path.style.stroke='#666666')"
       onmouseout="this.style.backgroundColor='';  this.querySelector('span').style.color='#808080'; this.querySelectorAll('path').forEach(path => path.style.stroke='#808080')">
        <span style="display: flex; align-items: center;">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M16 4.00195C18.175 4.01406 19.3529 4.11051 20.1213 4.87889C21 5.75757 21 7.17179 21 10.0002V16.0002C21 18.8286 21 20.2429 20.1213 21.1215C19.2426 22.0002 17.8284 22.0002 15 22.0002H9C6.17157 22.0002 4.75736 22.0002 3.87868 21.1215C3 20.2429 3 18.8286 3 16.0002V10.0002C3 7.17179 3 5.75757 3.87868 4.87889C4.64706 4.11051 5.82497 4.01406 8 4.00195" stroke="#808080" stroke-width="1.5"></path>
                    <path d="M10.5 14L17 14" stroke="#808080" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M7 14H7.5" stroke="#808080" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M7 10.5H7.5" stroke="#808080" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M7 17.5H7.5" stroke="#808080" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M10.5 10.5H17" stroke="#808080" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M10.5 17.5H17" stroke="#808080" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M8 3.5C8 2.67157 8.67157 2 9.5 2H14.5C15.3284 2 16 2.67157 16 3.5V4.5C16 5.32843 15.3284 6 14.5 6H9.5C8.67157 6 8 5.32843 8 4.5V3.5Z" stroke="#808080" stroke-width="1.5"></path>
                </g>
            </svg>
            <span style="margin-left: 0px; color: #808080; font-size: 14px;">Take Attendance</span>
        </span>
    </a>
</li>
<?php endif; ?>
		</ul>

		<!-- user profile box -->
		<span class="separator"></span>
		<div id="userbox" class="userbox">
			<a href="#" data-toggle="dropdown">
				<figure class="profile-picture">
					<img src="<?php echo get_image_url(get_loggedin_user_type(), $this->session->userdata('logger_photo'));?>" alt="user-image" class="img-circle" height="35">
				</figure>
			</a>
			<div class="dropdown-menu">
				<ul class="dropdown-user list-unstyled">
					<li class="user-p-box">
						<div class="dw-user-box">
							<div class="u-img">
								<img src="<?php echo get_image_url(get_loggedin_user_type(), $this->session->userdata('logger_photo'));?>" alt="user">
							</div>
							<div class="u-text">
								<h4><?php echo $this->session->userdata('name');?></h4>
								<p class="text-muted"><?php echo ucfirst(loggedin_role_name());?></p>
								<a href="<?php echo base_url('authentication/logout'); ?>" class="btn btn-danger btn-xs"><i class="fas fa-sign-out-alt"></i> <?php echo translate('logout');?></a>
							</div>
						</div>
					</li>
					<li role="separator" class="divider"></li>
					<li><a href="<?php echo base_url('profile');?>"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1,.cls-2{fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px;}.cls-1{fill-rule:evenodd;}</style> </defs> <g id="ic-security-secured-profile"> <path class="cls-1" d="M22,8.44c0-1.4-.16-2.64-.21-3.11a1.15,1.15,0,0,0-1.3-1c-.3,0-.95.12-1.68.15a7.35,7.35,0,0,1-2-.16,7.46,7.46,0,0,1-2.19-1.19A14.91,14.91,0,0,1,13,1.81a1.15,1.15,0,0,0-1.57,0A18.08,18.08,0,0,1,9.89,3.1a7.77,7.77,0,0,1-2.2,1.22,8,8,0,0,1-2.28.18,17.22,17.22,0,0,1-1.87-.18,1.14,1.14,0,0,0-1.3,1C2.19,5.8,2.06,7.05,2,8.44a16.94,16.94,0,0,0,.26,4.15,13,13,0,0,0,3.85,5.85,32.09,32.09,0,0,0,4.62,3.62,2.65,2.65,0,0,0,3,0,31.88,31.88,0,0,0,4.36-3.67,13.3,13.3,0,0,0,3.63-5.76A17.34,17.34,0,0,0,22,8.44Z"></path> <path class="cls-1" d="M17,19.33V18a5,5,0,0,0-5-5h0a5,5,0,0,0-5,5v1.33"></path> <circle class="cls-2" cx="12" cy="9.5" r="2.5"></circle> </g> </g></svg> <?php echo translate('profile');?></a></li>
					<li><a href="<?php echo base_url('profile/password');?>"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 10V8C6 4.69 7 2 12 2C17 2 18 4.69 18 8V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17 22H7C3 22 2 21 2 17V15C2 11 3 10 7 10H17C21 10 22 11 22 15V17C22 21 21 22 17 22Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M15.9965 16H16.0054" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11.9955 16H12.0045" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7.99451 16H8.00349" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('reset_password');?></a></li>
					<li><a href="<?php echo base_url('communication/mailbox/inbox');?>"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <circle cx="3" cy="3" r="3" transform="matrix(-1 0 0 1 22 2)" stroke="currentColor" stroke-width="1.5"></circle>
                                    <path d="M14 2.20004C13.3538 2.06886 12.6849 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22C17.5228 22 22 17.5228 22 12C22 11.3151 21.9311 10.6462 21.8 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </g>
                            </svg> <?php echo translate('mailbox');?></a></li>
					<?php if(get_permission('global_settings', 'is_view')):?>
						<li role="separator" class="divider"></li>
						<li><a href="<?php echo base_url('settings/universal');?>"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5"></circle> <path d="M13.7654 2.15224C13.3978 2 12.9319 2 12 2C11.0681 2 10.6022 2 10.2346 2.15224C9.74457 2.35523 9.35522 2.74458 9.15223 3.23463C9.05957 3.45834 9.0233 3.7185 9.00911 4.09799C8.98826 4.65568 8.70226 5.17189 8.21894 5.45093C7.73564 5.72996 7.14559 5.71954 6.65219 5.45876C6.31645 5.2813 6.07301 5.18262 5.83294 5.15102C5.30704 5.08178 4.77518 5.22429 4.35436 5.5472C4.03874 5.78938 3.80577 6.1929 3.33983 6.99993C2.87389 7.80697 2.64092 8.21048 2.58899 8.60491C2.51976 9.1308 2.66227 9.66266 2.98518 10.0835C3.13256 10.2756 3.3397 10.437 3.66119 10.639C4.1338 10.936 4.43789 11.4419 4.43786 12C4.43783 12.5581 4.13375 13.0639 3.66118 13.3608C3.33965 13.5629 3.13248 13.7244 2.98508 13.9165C2.66217 14.3373 2.51966 14.8691 2.5889 15.395C2.64082 15.7894 2.87379 16.193 3.33973 17C3.80568 17.807 4.03865 18.2106 4.35426 18.4527C4.77508 18.7756 5.30694 18.9181 5.83284 18.8489C6.07289 18.8173 6.31632 18.7186 6.65204 18.5412C7.14547 18.2804 7.73556 18.27 8.2189 18.549C8.70224 18.8281 8.98826 19.3443 9.00911 19.9021C9.02331 20.2815 9.05957 20.5417 9.15223 20.7654C9.35522 21.2554 9.74457 21.6448 10.2346 21.8478C10.6022 22 11.0681 22 12 22C12.9319 22 13.3978 22 13.7654 21.8478C14.2554 21.6448 14.6448 21.2554 14.8477 20.7654C14.9404 20.5417 14.9767 20.2815 14.9909 19.902C15.0117 19.3443 15.2977 18.8281 15.781 18.549C16.2643 18.2699 16.8544 18.2804 17.3479 18.5412C17.6836 18.7186 17.927 18.8172 18.167 18.8488C18.6929 18.9181 19.2248 18.7756 19.6456 18.4527C19.9612 18.2105 20.1942 17.807 20.6601 16.9999C21.1261 16.1929 21.3591 15.7894 21.411 15.395C21.4802 14.8691 21.3377 14.3372 21.0148 13.9164C20.8674 13.7243 20.6602 13.5628 20.3387 13.3608C19.8662 13.0639 19.5621 12.558 19.5621 11.9999C19.5621 11.4418 19.8662 10.9361 20.3387 10.6392C20.6603 10.4371 20.8675 10.2757 21.0149 10.0835C21.3378 9.66273 21.4803 9.13087 21.4111 8.60497C21.3592 8.21055 21.1262 7.80703 20.6602 7C20.1943 6.19297 19.9613 5.78945 19.6457 5.54727C19.2249 5.22436 18.693 5.08185 18.1671 5.15109C17.9271 5.18269 17.6837 5.28136 17.3479 5.4588C16.8545 5.71959 16.2644 5.73002 15.7811 5.45096C15.2977 5.17191 15.0117 4.65566 14.9909 4.09794C14.9767 3.71848 14.9404 3.45833 14.8477 3.23463C14.6448 2.74458 14.2554 2.35523 13.7654 2.15224Z" stroke="currentColor" stroke-width="1.5"></path> </g></svg> <?php echo translate('global_settings');?></a></li>
					<?php endif; ?>
					<?php if(get_permission('school_settings', 'is_view') && !is_superadmin_loggedin()):?>
						<li role="separator" class="divider"></li>
						<li><a href="<?php echo base_url('school_settings');?>"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 22L2 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17 22V6C17 4.11438 17 3.17157 16.4142 2.58579C15.8284 2 14.8856 2 13 2H11C9.11438 2 8.17157 2 7.58579 2.58579C7 3.17157 7 4.11438 7 6V22" stroke="currentColor" stroke-width="1.5"></path> <path d="M21 22V11.5C21 10.0955 21 9.39331 20.6629 8.88886C20.517 8.67048 20.3295 8.48298 20.1111 8.33706C19.6067 8 18.9045 8 17.5 8" stroke="currentColor" stroke-width="1.5"></path> <path d="M3 22V11.5C3 10.0955 3 9.39331 3.33706 8.88886C3.48298 8.67048 3.67048 8.48298 3.88886 8.33706C4.39331 8 5.09554 8 6.5 8" stroke="currentColor" stroke-width="1.5"></path> <path d="M12 22V19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M10 5H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M10 8H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M10 11H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M10 14H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>  <?php echo translate('school_settings');?></a></li>
					<?php endif; ?>
					<li role="separator" class="divider"></li>
					<li><a href="<?php echo base_url('authentication/logout');?>"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1,.cls-2{fill:none;stroke:currentColor;stroke-linecap:round;stroke-width:1.5px;}.cls-1{stroke-linejoin:round;}.cls-2{stroke-linejoin:bevel;}</style> </defs> <g id="ic-actions-log-out"> <path class="cls-1" d="M15.71,15v4a2,2,0,0,1-2,2h-6a2,2,0,0,1-2-2V5a2,2,0,0,1,2-2h6a2,2,0,0,1,2,2V9"></path> <line class="cls-2" x1="12.5" y1="11.95" x2="22.5" y2="11.95"></line> <path class="cls-2" d="M18.82,8l3.44,3.44a.83.83,0,0,1,0,1.18L18.88,16"></path> </g> </g></svg> <?php echo translate('logout');?></a></li>
				</ul>
			</div>
		</div>
	</div>
</header>
