<style type="text/css">
	#my_details .text-dark {
		font-weight: 600;
	}
</style>
<?php
$widget = (is_superadmin_loggedin() ? 3 : 4);
$getParent = $this->student_model->get('parent', array('id' => $student['parent_id']), true);
$branchID = $student['branch_id'];
if (empty($student['previous_details'])) {
	$previous_details = ['school_name' => '', 'qualification' => '', 'remarks' => ''];
} else {
	$previous_details = json_decode($student['previous_details'], true);
}
$currency_symbol = $global_config['currency_symbol'];

$last_name = $this->student_fields_model->getStatusProfile('last_name', $branchID);
$gender = $this->student_fields_model->getStatusProfile('gender', $branchID);
$blood_group = $this->student_fields_model->getStatusProfile('blood_group', $branchID);
$birthday = $this->student_fields_model->getStatusProfile('birthday', $branchID);
$religion = $this->student_fields_model->getStatusProfile('religion', $branchID);
$mother_tongue = $this->student_fields_model->getStatusProfile('mother_tongue', $branchID);
$caste = $this->student_fields_model->getStatusProfile('caste', $branchID);
$present_address = $this->student_fields_model->getStatusProfile('present_address', $branchID); 
$permanent_address = $this->student_fields_model->getStatusProfile('permanent_address', $branchID);
$student_mobile_no = $this->student_fields_model->getStatusProfile('student_mobile_no', $branchID); 
$student_email = $this->student_fields_model->getStatusProfile('student_email', $branchID);
$city = $this->student_fields_model->getStatusProfile('city', $branchID); 
$state = $this->student_fields_model->getStatusProfile('state', $branchID);
$student_photo = $this->student_fields_model->getStatusProfile('student_photo', $branchID);
$previous_school_details = $this->student_fields_model->getStatusProfile('previous_school_details', $branchID);

$personal = false;
if ($last_name['status'] == 1 || $gender['status'] == 1 || $blood_group['status'] == 1 || $birthday['status'] == 1 || $religion['status'] == 1 || $mother_tongue['status'] == 1 || $caste['status'] == 1 || $present_address['status'] == 1 || $permanent_address['status'] == 1 || $student_mobile_no['status'] == 1 || $student_email['status'] == 1 || $city['status'] == 1 || $state['status'] == 1 || $student_photo['status'] == 1) {
	$personal = true;
}
?>
	<div class="col-md-12">
	<div class="student-profile-card">
    <div class="profile-content">
        <div class="profile-image">
		<img src="<?php echo get_image_url('student', $student['photo']);?>">
        </div>
        
        <div class="profile-details">
		<h2><?=$student['first_name'] . ' ' . $student['last_name']?></h2>
		<p><?=translate('student') ?></p>
            
            <div class="info-grid">
                <div class="info-item">
                    <div class="icon-wrapper" title="<?=translate('class')?>">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M10.948 1.25H13.052C13.9505 1.24997 14.6997 1.24995 15.2945 1.32991C15.9223 1.41432 16.4891 1.59999 16.9445 2.05546C17.4 2.51093 17.5857 3.07773 17.6701 3.70552C17.734 4.18061 17.7468 4.75423 17.7494 5.42375C18.4941 5.5639 19.1312 5.8279 19.6517 6.34835C20.2536 6.95027 20.5125 7.70814 20.6335 8.60825C20.75 9.47522 20.75 10.5775 20.75 11.9451V13.0962C20.75 14.2647 20.75 15.1991 20.6714 15.96C20.59 16.747 20.4197 17.4117 20.0406 18.0251C19.6615 18.6385 19.1431 19.0881 18.4756 19.5128C17.8303 19.9234 16.9945 20.3413 15.9493 20.8639L15.9131 20.882C15.8561 20.9105 15.7998 20.9387 15.7441 20.9665C14.153 21.7628 13.1236 22.2779 12 22.2779C10.8764 22.2779 9.84703 21.7628 8.25588 20.9665C8.20024 20.9387 8.14392 20.9105 8.08688 20.882L8.05069 20.8639C7.00554 20.3413 6.16974 19.9234 5.52437 19.5128C4.85691 19.0881 4.33853 18.6385 3.95941 18.0251C3.58029 17.4117 3.41002 16.747 3.32865 15.96C3.24998 15.1991 3.24999 14.2647 3.25 13.0962L3.25 11.9451C3.24998 10.5775 3.24996 9.47522 3.36652 8.60825C3.48754 7.70814 3.74643 6.95027 4.34835 6.34835C4.8688 5.8279 5.50586 5.5639 6.25063 5.42375C6.2532 4.75423 6.26604 4.18061 6.32991 3.70552C6.41432 3.07773 6.59999 2.51093 7.05546 2.05546C7.51093 1.59999 8.07773 1.41432 8.70552 1.32991C9.3003 1.24995 10.0495 1.24997 10.948 1.25ZM7.75163 5.27562C8.39049 5.24998 9.11946 5.24999 9.94512 5.25H14.0549C14.8805 5.24999 15.6095 5.24998 16.2484 5.27562C16.2444 4.69342 16.2306 4.25606 16.1835 3.90539C16.1214 3.44393 16.0142 3.24644 15.8839 3.11612C15.7536 2.9858 15.5561 2.87858 15.0946 2.81654C14.6116 2.7516 13.964 2.75 13 2.75H11C10.036 2.75 9.38843 2.7516 8.90539 2.81654C8.44393 2.87858 8.24643 2.9858 8.11612 3.11612C7.9858 3.24644 7.87858 3.44393 7.81654 3.90539C7.76939 4.25606 7.75563 4.69342 7.75163 5.27562ZM6.80812 6.85315C6.07435 6.9518 5.68577 7.13225 5.40901 7.40901C5.13225 7.68578 4.9518 8.07435 4.85315 8.80812C4.75159 9.56347 4.75 10.5646 4.75 12V13.0557C4.75 14.2739 4.75093 15.1309 4.8207 15.8058C4.88868 16.4633 5.01711 16.8833 5.23539 17.2365C5.45367 17.5897 5.7719 17.8924 6.32962 18.2472C6.902 18.6114 7.6681 18.9955 8.7577 19.5403C10.5807 20.4518 11.2744 20.7779 12 20.7779C12.7256 20.7779 13.4193 20.4518 15.2423 19.5403C16.3319 18.9955 17.098 18.6114 17.6704 18.2472C18.2281 17.8924 18.5463 17.5897 18.7646 17.2365C18.9829 16.8833 19.1113 16.4633 19.1793 15.8058C19.2491 15.1309 19.25 14.2739 19.25 13.0557V12C19.25 10.5646 19.2484 9.56347 19.1469 8.80812C19.0482 8.07435 18.8678 7.68578 18.591 7.40901C18.3142 7.13225 17.9257 6.9518 17.1919 6.85315C16.4365 6.7516 15.4354 6.75 14 6.75H10C8.56459 6.75 7.56347 6.7516 6.80812 6.85315ZM12 11.0345C11.9419 11.1351 11.8772 11.251 11.801 11.3877L11.7027 11.564C11.6958 11.5765 11.6884 11.5901 11.6804 11.6047C11.6019 11.7483 11.4718 11.9861 11.255 12.1507C11.0336 12.3188 10.7673 12.3766 10.6116 12.4104C10.596 12.4138 10.5815 12.4169 10.5683 12.4199L10.3774 12.4631C10.2022 12.5028 10.0595 12.5351 9.9375 12.5658C10.0169 12.6634 10.1199 12.7847 10.254 12.9415L10.3842 13.0937C10.3934 13.1045 10.4035 13.1161 10.4141 13.1284C10.5221 13.2527 10.6963 13.4535 10.7769 13.7126C10.8566 13.9687 10.8291 14.2324 10.8118 14.3988C10.81 14.4154 10.8084 14.431 10.807 14.4456L10.7873 14.6487C10.7691 14.8369 10.7549 14.9872 10.7455 15.1094C10.8497 15.0635 10.9682 15.0089 11.109 14.9441L11.2878 14.8618C11.3001 14.8561 11.3136 14.8498 11.3281 14.8429C11.4716 14.7752 11.7213 14.6575 12 14.6575C12.2787 14.6575 12.5284 14.7752 12.6719 14.8429C12.6864 14.8498 12.6999 14.8561 12.7122 14.8618L12.891 14.9441C13.0318 15.0089 13.1503 15.0635 13.2545 15.1094C13.2451 14.9872 13.2309 14.8369 13.2127 14.6487L13.193 14.4456C13.1916 14.4311 13.19 14.4154 13.1882 14.3988C13.1709 14.2324 13.1434 13.9687 13.2231 13.7126C13.3037 13.4535 13.4779 13.2527 13.5859 13.1284C13.5966 13.1161 13.6066 13.1045 13.6158 13.0937L13.746 12.9415C13.8801 12.7847 13.9831 12.6634 14.0625 12.5658C13.9405 12.5351 13.7978 12.5028 13.6226 12.4631L13.4317 12.4199C13.4185 12.4169 13.404 12.4138 13.3884 12.4104C13.2327 12.3766 12.9664 12.3188 12.745 12.1507C12.5282 11.9861 12.3981 11.7483 12.3196 11.6047C12.3116 11.5901 12.3042 11.5765 12.2973 11.564L12.199 11.3877C12.1228 11.251 12.0581 11.1351 12 11.0345ZM11.0135 9.79963C11.1857 9.57481 11.4983 9.25 12 9.25C12.5017 9.25 12.8143 9.57481 12.9865 9.79963C13.1508 10.0142 13.3163 10.3112 13.486 10.6158C13.4937 10.6296 13.5014 10.6435 13.5091 10.6573L13.6075 10.8337C13.6303 10.8746 13.6482 10.9068 13.6639 10.9343C13.6912 10.9407 13.723 10.9479 13.7627 10.9569L13.9536 11.0001C13.9693 11.0036 13.9849 11.0072 14.0006 11.0107C14.3284 11.0848 14.6542 11.1584 14.9042 11.257C15.1804 11.3658 15.5547 11.5777 15.6989 12.0416C15.8407 12.4973 15.6618 12.8834 15.5056 13.1315C15.3611 13.3611 15.1414 13.6179 14.9165 13.8808C14.9063 13.8926 14.8961 13.9045 14.886 13.9164L14.7558 14.0686C14.7213 14.1089 14.6954 14.1394 14.6735 14.1657C14.6764 14.202 14.6805 14.2443 14.686 14.3009L14.7057 14.504C14.7072 14.5195 14.7087 14.5349 14.7102 14.5504C14.7444 14.9023 14.7774 15.2424 14.7653 15.5145C14.7526 15.7997 14.6841 16.2315 14.2969 16.5254C13.8975 16.8286 13.4564 16.7626 13.1767 16.6824C12.9189 16.6086 12.6144 16.4682 12.3077 16.3269C12.293 16.3201 12.2783 16.3134 12.2636 16.3066L12.0849 16.2243C12.0514 16.2089 12.024 16.1963 12 16.1854C11.976 16.1963 11.9486 16.2089 11.9151 16.2243L11.7364 16.3066C11.7217 16.3134 11.707 16.3201 11.6923 16.3269C11.3856 16.4682 11.081 16.6086 10.8233 16.6824C10.5436 16.7626 10.1025 16.8286 9.70306 16.5254C9.3159 16.2315 9.24743 15.7997 9.23473 15.5145C9.22261 15.2424 9.25564 14.9023 9.28981 14.5504C9.29131 14.5349 9.29282 14.5195 9.29432 14.504L9.31399 14.3009C9.31948 14.2443 9.32356 14.202 9.32655 14.1657C9.30465 14.1394 9.27866 14.1089 9.24418 14.0686L9.11403 13.9164C9.10385 13.9045 9.09367 13.8926 9.08351 13.8807C8.85859 13.6179 8.63891 13.3611 8.49436 13.1315C8.33817 12.8834 8.15934 12.4973 8.30106 12.0416C8.44532 11.5777 8.81962 11.3658 9.09576 11.257C9.34584 11.1584 9.67163 11.0848 9.99943 11.0107C10.0151 11.0072 10.0307 11.0036 10.0464 11.0001L10.2373 10.9569C10.277 10.9479 10.3088 10.9407 10.3361 10.9343C10.3518 10.9068 10.3697 10.8746 10.3925 10.8337L10.4909 10.6573C10.4986 10.6435 10.5063 10.6296 10.514 10.6158C10.6837 10.3112 10.8492 10.0142 11.0135 9.79963Z" fill="currentColor"></path> </g></svg><span class="icon-text"><?=translate('class')?>:</span>
                    </div>
                    <span><?=$student['class_name'] ?></span>
                </div>
                
                <div class="info-item">
                    <div class="icon-wrapper" title="<?=translate('section')?>">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M7.25013 6C7.25013 3.37665 9.37678 1.25 12.0001 1.25C14.6235 1.25 16.7501 3.37665 16.7501 6C16.7501 8.62335 14.6235 10.75 12.0001 10.75C9.37678 10.75 7.25013 8.62335 7.25013 6ZM12.0001 2.75C10.2052 2.75 8.75013 4.20507 8.75013 6C8.75013 7.79493 10.2052 9.25 12.0001 9.25C13.7951 9.25 15.2501 7.79493 15.2501 6C15.2501 4.20507 13.7951 2.75 12.0001 2.75Z" fill="currentColor"></path> <path d="M18.0001 13.9167C18.4143 13.9167 18.7501 14.2524 18.7501 14.6667V15.25H19.3333C19.7475 15.25 20.0833 15.5858 20.0833 16C20.0833 16.4142 19.7475 16.75 19.3333 16.75H18.7501V17.3333C18.7501 17.7475 18.4143 18.0833 18.0001 18.0833C17.5859 18.0833 17.2501 17.7475 17.2501 17.3333V16.75H16.6666C16.2524 16.75 15.9166 16.4142 15.9166 16C15.9166 15.5858 16.2524 15.25 16.6666 15.25H17.2501V14.6667C17.2501 14.2524 17.5859 13.9167 18.0001 13.9167Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7748 12.5129C13.9021 12.3421 12.9686 12.25 12.0001 12.25C9.68658 12.25 7.55506 12.7759 5.97558 13.6643C4.41962 14.5396 3.25013 15.8661 3.25013 17.5L3.25007 17.602C3.24894 18.7638 3.24752 20.222 4.52655 21.2635C5.15602 21.7761 6.03661 22.1406 7.22634 22.3815C8.41939 22.6229 9.97436 22.75 12.0001 22.75C14.8682 22.75 16.81 22.4961 18.1197 22.0085C19.2986 21.5697 19.9974 20.9266 20.3705 20.1172C21.7928 19.2966 22.7501 17.7601 22.7501 16C22.7501 13.3766 20.6235 11.25 18.0001 11.25C16.755 11.25 15.6218 11.7291 14.7748 12.5129ZM6.71098 14.9717C5.37151 15.7251 4.75013 16.6487 4.75013 17.5C4.75013 18.8078 4.79045 19.544 5.47372 20.1004C5.84425 20.4022 6.46366 20.6967 7.52392 20.9113C8.58087 21.1252 10.0259 21.25 12.0001 21.25C14.5781 21.25 16.2402 21.0366 17.311 20.7004C15.0142 20.3666 13.2501 18.3893 13.2501 16C13.2501 15.2322 13.4323 14.5069 13.7558 13.865C13.1941 13.79 12.6062 13.75 12.0001 13.75C9.89541 13.75 8.02693 14.2315 6.71098 14.9717ZM14.7501 16C14.7501 14.2051 16.2052 12.75 18.0001 12.75C19.7951 12.75 21.2501 14.2051 21.2501 16C21.2501 17.7949 19.7951 19.25 18.0001 19.25C16.2052 19.25 14.7501 17.7949 14.7501 16Z" fill="currentColor"></path> </g></svg><span class="icon-text"><?=translate('section')?>:</span>
                    </div>
                    <span><?=$student['section_name'] ?></span>
                </div>
                
                <div class="info-item">
                    <div class="icon-wrapper" title="<?=translate('register_no')?>">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M17 2.75C14.6528 2.75 12.75 4.65279 12.75 7C12.75 7.68122 12.9098 8.32298 13.1931 8.89186C13.3521 9.2111 13.418 9.60224 13.3131 9.99416L13.06 10.94L14.0059 10.6869C14.3978 10.5821 14.7889 10.6479 15.1082 10.8069C15.6771 11.0903 16.3188 11.25 17 11.25C19.3472 11.25 21.25 9.34721 21.25 7C21.25 4.65279 19.3472 2.75 17 2.75ZM11.25 7C11.25 3.82436 13.8244 1.25 17 1.25C20.1757 1.25 22.75 3.82436 22.75 7C22.75 10.1756 20.1757 12.75 17 12.75C16.0816 12.75 15.2114 12.5341 14.4394 12.1496C14.4221 12.141 14.4082 12.1376 14.3998 12.1366C14.3959 12.1361 14.3936 12.1362 14.3926 12.1362L13.2806 12.4338C12.2399 12.7122 11.2878 11.7601 11.5663 10.7195L11.8638 9.60744C11.8639 9.60649 11.8639 9.60415 11.8634 9.6002C11.8624 9.5918 11.859 9.5779 11.8504 9.56061C11.4659 8.78866 11.25 7.91847 11.25 7ZM3.7177 4.09213C4.94388 2.80119 6.9721 3.04305 7.98569 4.47663L9.24668 6.26012C10.0574 7.40678 9.98893 9.00095 9.02135 10.0196L8.7765 10.2774C8.77582 10.2792 8.7751 10.2811 8.77436 10.2832C8.76142 10.3196 8.7287 10.4354 8.7609 10.6551C8.82765 11.1106 9.1793 12.0363 10.607 13.5394C12.0391 15.0472 12.9078 15.4025 13.3103 15.4679C13.484 15.4961 13.5748 15.4716 13.6038 15.4614L14.0124 15.0312C14.8862 14.1113 16.2485 13.93 17.347 14.5623L19.2575 15.662C20.8904 16.6019 21.2705 18.901 19.9655 20.2749L18.545 21.7705C18.1016 22.2373 17.497 22.6357 16.75 22.7095C14.9261 22.8895 10.701 22.655 6.27161 17.9917C2.13844 13.6403 1.35326 9.85536 1.25401 8.00613C1.20497 7.09246 1.61224 6.30877 2.14809 5.74462L2.69189 6.26114L2.1481 5.74462L3.7177 4.09213ZM6.7609 5.3426C6.24855 4.61795 5.32812 4.57471 4.80528 5.12516L3.23568 6.77765C2.90429 7.12654 2.73042 7.52644 2.75185 7.92574C2.83289 9.43555 3.48307 12.8778 7.35919 16.9587C11.4234 21.2375 15.1676 21.3584 16.6026 21.2167C16.8864 21.1887 17.1783 21.0313 17.4574 20.7375L18.8779 19.2419C19.4907 18.5968 19.3301 17.4345 18.5092 16.962L16.5987 15.8623C16.086 15.5672 15.4854 15.6584 15.1 16.0642L14.6445 16.5437L14.1008 16.0272C14.6445 16.5437 14.6439 16.5444 14.6432 16.5452L14.6417 16.5467L14.6388 16.5497L14.6324 16.5562L14.6181 16.5703C14.6078 16.5803 14.5959 16.5913 14.5825 16.6031C14.5556 16.6266 14.5223 16.6535 14.4824 16.6819C14.4022 16.7387 14.2955 16.8012 14.1606 16.8544C13.8846 16.9632 13.5201 17.0216 13.0699 16.9485C12.1923 16.806 11.0422 16.1757 9.51937 14.5724C7.99202 12.9644 7.40746 11.7647 7.27675 10.8726C7.21022 10.4185 7.26346 10.0549 7.36116 9.78033C7.40921 9.64531 7.46594 9.53764 7.51826 9.45588C7.54435 9.41512 7.56922 9.38098 7.5912 9.3532C7.60219 9.33931 7.61246 9.32701 7.62182 9.31625L7.63514 9.30127L7.64125 9.29463L7.64415 9.29152L7.64556 9.29002C7.64626 9.28929 7.64695 9.28856 8.19074 9.80507L7.64695 9.28856L7.93376 8.9866C8.3793 8.51753 8.44403 7.72315 8.02189 7.12608L6.7609 5.3426ZM17 4.25C17.4143 4.25 17.75 4.58579 17.75 5V6.25H19C19.4143 6.25 19.75 6.58579 19.75 7C19.75 7.41421 19.4143 7.75 19 7.75H17.75V9C17.75 9.41421 17.4143 9.75 17 9.75C16.5858 9.75 16.25 9.41421 16.25 9V7.75L15 7.75C14.5858 7.75 14.25 7.41421 14.25 7C14.25 6.58579 14.5858 6.25 15 6.25L16.25 6.25V5C16.25 4.58579 16.5858 4.25 17 4.25Z" fill="currentColor"></path> </g></svg><span class="icon-text"><?=translate('register_no')?>:</span>
                    </div>
                    <span><?=$student['register_no']?></span>
                </div>
				<div class="info-item">
                    <div class="icon-wrapper" title="<?=translate('guardian_name')?>">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M4 6h16M4 10h16M4 14h16M4 18h16" stroke-width="2" stroke-linecap="round"/>
                        </svg><span class="icon-text"><?=translate('guardian_name')?>:</span>
                    </div>
                    <span><?=(!empty($getParent['name']) ? $getParent['name'] : 'N/A'); ?></span>
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>

	<div class="col-md-12">
		<section class="panel">
			<div class="tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#my_details" data-toggle="tab"><i class="far fa-user-circle"></i> <?=translate('profile') . " " . translate('details')?></a>
					</li>
					<li>
						<a href="#promotion_history" data-toggle="tab"><i class="fas fa-arrow-trend-up"></i> <?=translate('promotion_history')?></a>
					</li>
					<li>
						<a href="#fees" data-toggle="tab"><i class="fas fa-money-check"></i> <?=translate('fees')?></a>
					</li>
					<li>
						<a href="#parents" data-toggle="tab"><i class="fas fa-users"></i> <?=translate('parent_information')?></a>
					</li>
					<li>
						<a href="#book_issue" data-toggle="tab"><i class="fas fa-book-reader"></i> <?=translate('book_issue')?></a>
					</li>
					<li>
						<a href="#documents" data-toggle="tab"><i class="fas fa-folder-open"></i> <?=translate('documents')?></a>
					</li>
					<?php if ($personal == true || $previous_school_details['status'] == 1) { ?>
					<li class="">
						<a href="#profile" data-toggle="tab"><i class="far fa-edit"></i> <span class="hidden-xs">Edit Profile</span></a>
					</li>
					<?php } ?>
				</ul>
				<div class="tab-content">
					<div id="my_details" class="tab-pane active">
						<!-- academic details-->
						<div class="headers-line">
							<i class="fas fa-school"></i> <?=translate('academic_details')?>
						</div>
						<div class="row">
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('branch')?></label>
									<p class="text-dark"><?php
										$arrayBranch = $this->app_lib->getSelectList('branch');
										echo $arrayBranch[$branchID];
									?></p>
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('academic_year')?></label>
									<p class="text-dark"><?php 
									$row = $this->db->where('id', $student['session_id'])->get('schoolyear')->row();
									echo $row->school_year;
									?></p>
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('register_no')?></label>
									<p class="text-dark"><?=$student['register_no']?></p>
								</div>
							</div>

							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('roll')?></label>
									<p class="text-dark"><?php echo empty($student['roll']) ? "N/A" : $student['roll'] ?></p>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('admission_date')?></label>
									<p class="text-dark"><?php echo $student['admission_date'] ?></p>
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('class')?></label>
									<p class="text-dark"><?php $arrayClass = $this->app_lib->getClass($branchID); echo $arrayClass[$student['class_id']] ?></p>
									
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('section')?> <span class="required">*</span></label>
									<p class="text-dark"><?php
										$arraySection = $this->app_lib->getSections( $student['class_id'], true);
										echo $arraySection[$student['section_id']];
									?></p>
								</div>
							</div>
							
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('category')?></label>
									<p class="text-dark"><?php
										$arrayCategory = $this->app_lib->getStudentCategory($branchID);
										echo $arrayCategory[$student['category_id']];
									?></p>
								</div>
							</div>
						</div>

						<!-- student details -->
						<div class="headers-line mt-md">
							<i class="fas fa-user-check"></i> <?=translate('student_details')?>
						</div>

						<div class="row">
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('first_name')?> <span class="required">*</span></label>
									<p class="text-dark"><?php echo $student['first_name'] ?></p>
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('last_name')?></label>
									<p class="text-dark"><?php echo $student['last_name'] ?></p>
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('gender')?></label>
									<p class="text-dark"><?php
									$arrayGender = array(
									'male' => translate('male'),
									'female' => translate('female')
									);
									echo $arrayGender[$student['gender']];
									?></p>
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('blood_group')?></label>
									<p class="text-dark"><?php
										$bloodArray = $this->app_lib->getBloodgroup();
										echo $bloodArray[$student['blood_group']];
									?></p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('birthday')?></label>
									<p class="text-dark"><?php echo $student['birthday'] ?></p>
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('mother_tongue')?></label>
									<p class="text-dark"><?php echo $student['mother_tongue'] ?></p>
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('religion')?></label>
									<p class="text-dark"><?php echo $student['religion'] ?></p>
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('caste')?></label>
									<p class="text-dark"><?php echo $student['caste'] ?></p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('mobile_no')?></label>
									<p class="text-dark"><?php echo $student['mobileno'] ?></p>
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('email')?></label>
									<p class="text-dark"><?php echo $student['email'] ?></p>
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('city')?></label>
									<p class="text-dark"><?php echo $student['city'] ?></p>
								</div>
							</div>
							<div class="col-md-3 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('state')?></label>
									<p class="text-dark"><?php echo $student['state'] ?></p>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('present_address')?></label>
									<p class="text-dark"><?php echo $student['current_address'] ?></p>
								</div>
							</div>
							<div class="col-md-6 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('permanent_address')?></label>
									<p class="text-dark"><?php echo $student['permanent_address'] ?></p>
								</div>
							</div>
						</div>
					</div>

					<div id="promotion_history" class="tab-pane">
						<div class="table-responsive mb-md">
							<table class="table table-bordered table-hover table-condensed mb-none">
								<thead>
									<tr>
										<th width="50">#</th>
										<th><?=translate('from_class') . " / " . translate('section')?></th>
										<th><?=translate('from_session')?></th>
										<th><?=translate('promoted_class') . " / " . translate('section')?></th>
										<th><?=translate('promoted_session')?></th>
										<th><?=translate('due_amount')?></th>
										<th><?=translate('promoted_date')?></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$count = 1;
									$this->db->order_by('id', 'asc');
									$this->db->where(array('student_id' => $student['id']));
									$historys = $this->db->get('promotion_history')->result();
										if (count($historys)) {
											foreach($historys as $history):
												?>
										<tr>
											<td><?php echo $count++;?></td>
											<td><?php echo get_type_name_by_id('class', $history->pre_class) . " (" . get_type_name_by_id('section', $history->pre_section) . ")"; ?></td>
											<td><?php echo get_type_name_by_id('schoolyear', $history->pre_session, 'school_year'); ?></td>
											<td><?php echo get_type_name_by_id('class', $history->pro_class) . " (" . get_type_name_by_id('section', $history->pro_section) . ")"; ?></td>
											<td><?php echo get_type_name_by_id('schoolyear', $history->pro_session, 'school_year'); ?></td>
											<td><?php echo currencyFormat($history->prev_due); ?></td>
											<td><?php echo _d($history->date);?></td>
											
										</tr>
									<?php
										endforeach;
									} else {
										echo '<tr><td colspan="7"><h5 class="text-danger text-center">' . translate('no_information_available') . '</td></tr>';
									}
									?>
								</tbody>
							</table>
						</div>
					</div>

					<div id="fees" class="tab-pane">
						<div class="table-responsive mb-md">
							<table class="table table-bordered table-condensed table-hover mb-none tbr-top">
								<thead>
									<tr class="text-dark">
										<th>#</th>
										<th><?=translate("fees_type")?></th>
										<th><?=translate("due_date")?></th>
										<th><?=translate("status")?></th>
										<th><?=translate("amount")?></th>
										<th><?=translate("discount")?></th>
										<th><?=translate("fine")?></th>
										<th><?=translate("paid")?></th>
										<th><?=translate("balance")?></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$count = 1;
										$total_fine = 0;
										$total_discount = 0;
										$total_paid = 0;
										$total_balance = 0;
										$total_amount = 0;
										$allocations = $this->fees_model->getInvoiceDetails($student['enrollid']);
										if (!empty($allocations)) {
										foreach ($allocations as $fee) {
											$deposit = $this->fees_model->getStudentFeeDeposit($fee['allocation_id'], $fee['fee_type_id']);
											$type_discount = $deposit['total_discount'];
											$type_fine = $deposit['total_fine'];
											$type_amount = $deposit['total_amount'];
											$balance = $fee['amount'] - ($type_amount + $type_discount);
											$total_discount += $type_discount;
											$total_fine += $type_fine;
											$total_paid += $type_amount;
											$total_balance += $balance;
											$total_amount += $fee['amount'];
			
										?>
									<tr>
										<td><?php echo $count++;?></td>
										<td><?=$fee['name']?></td>
										<td><?=_d($fee['due_date'])?></td>
										<td><?php 
											$status = 0;
											$labelmode = '';
											if($type_amount == 0) {
												$status = translate('unpaid');
												$labelmode = 'label-danger-custom';
											} elseif($balance == 0) {
												$status = translate('total_paid');
												$labelmode = 'label-success-custom';
											} else {
												$status = translate('partly_paid');
												$labelmode = 'label-info-custom';
											}
											echo "<span class='label ".$labelmode." '>".$status."</span>";
										?></td>
										<td><?php echo currencyFormat($fee['amount']);?></td>
										<td><?php echo currencyFormat($type_discount);?></td>
										<td><?php echo currencyFormat($type_fine);?></td>
										<td><?php echo currencyFormat($type_amount);?></td>
										<td><?php echo currencyFormat($balance);?></td>
									</tr>
									<?php } } else { 
										echo '<tr><td colspan="9"><h5 class="text-danger text-center">' . translate('no_information_available') . '</td></tr>';
									} ?>
								</tbody>
								<tfoot>
									<tr class="text-dark">
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th><?php echo currencyFormat($total_amount); ?></th>
										<th><?php echo currencyFormat($total_discount); ?></th>
										<th><?php echo currencyFormat($total_fine); ?></th>
										<th><?php echo currencyFormat($total_paid); ?></th>
										<th><?php echo currencyFormat($total_balance); ?></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>

					<div id="parents" class="tab-pane">
						<div class="table-responsive mb-md">
							<table class="table table-striped table-bordered table-condensed mb-none">
								<tbody>
									<tr>
										<th><?=translate('guardian_name')?></th>
										<td><?php echo $getParent['name']?></td>
										<th><?=translate('relation')?></th>
										<td><?php echo $getParent['relation']?></td>
									</tr>
									<tr>
										<th><?=translate('father_name')?></th>
										<td><?php echo $getParent['father_name']?></td>
										<th><?=translate('mother_name')?></th>
										<td><?php echo $getParent['mother_name']?></td>
									</tr>
									<tr>
										<th><?=translate('occupation')?></th>
										<td><?php echo $getParent['occupation']?></td>
										<th><?=translate('income')?></th>
										<td><?php echo $global_config['currency_symbol'] . $getParent['income']?></td>
									</tr>
									<tr>
										<th><?=translate('education')?></th>
										<td><?php echo $getParent['education']?></td>
										<th><?=translate('city')?></th>
										<td><?php echo $getParent['city']?></td>
									</tr>
									<tr>
										<th><?=translate('state')?></th>
										<td><?php echo $getParent['state']?></td>
										<th><?=translate('mobile_no')?></th>
										<td><?php echo $getParent['mobileno']?></td>
									</tr>
									<tr>
										<th><?=translate('email')?></th>
										<td colspan="3"><?php echo $getParent['email']?></td>
									</tr>
									<tr class="quick-address">
										<th><?=translate('address')?></th>
										<td colspan="3" height="80px;"><?php echo $getParent['address']?></td>
									</tr>
									<tr>
										<th><?=translate('guardian_picture')?></th>
										<td colspan="3"><img class="img-border" width="100" height="100" src="<?=get_image_url('parent', $getParent['photo'])?>"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div id="book_issue" class="tab-pane">
						<div class="table-responsive mb-md">
							<table class="table table-bordered table-hover table-condensed mb-none">
								<thead>
									<tr>
										<th width="50">#</th>
										<th><?=translate('book_title')?></th>
										<th><?=translate('date_of_issue')?></th>
										<th><?=translate('date_of_expiry')?></th>
										<th><?=translate('fine')?></th>
										<th><?=translate('status')?></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$count = 1;
									$this->db->order_by('id', 'desc');
									$this->db->where(array('session_id' => get_session_id(),'role_id' => 7, 'user_id' => $student['id']));
									$book_result = $this->db->get('book_issues')->result_array();
										if (count($book_result)) {
											foreach($book_result as $book):
												?>
										<tr>
											<td><?php echo $count++;?></td>
											<td><?php echo get_type_name_by_id('book', $book['book_id'], 'title');?></td>
											<td><?php echo _d($book['date_of_issue']);?></td>
											<td><?php echo _d($book['date_of_expiry']);?></td>
											<td>
												<?php
												if(empty($book['fine_amount'])){ 
													echo $global_config['currency_symbol'] . "0.00";
												} else {
													echo $global_config['currency_symbol'] . $book['fine_amount'];
												}
												?>
											</td>
											<td>
												<?php
												if($book['status'] == 0)
													echo '<span class="label label-warning-custom">' . translate('pending') . '</span>';
												if ($book['status'] == 1)
													echo '<span class="label label-success-custom">' . translate('issued') . '</span>';
												if($book['status'] == 2)
													echo '<span class="label label-danger-custom">' . translate('rejected') . '</span>';
												if($book['status'] == 3)
													echo '<span class="label label-primary-custom">' . translate('returned') . '</span>';
												?>
											</td>
										</tr>
									<?php
										endforeach;
									}else{
										echo '<tr><td colspan="6"><h5 class="text-danger text-center">' . translate('no_information_available') . '</td></tr>';
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div id="documents" class="tab-pane">
                        <div class="table-responsive mb-md">
                            <table class="table table-bordered table-hover table-condensed mb-none">
                            <thead>
                                <tr>
                                    <th><?php echo translate('sl'); ?></th>
                                    <th><?php echo translate('title'); ?></th>
                                    <th><?php echo translate('document') . " " . translate('type'); ?></th>
                                    <th><?php echo translate('file'); ?></th>
                                    <th><?php echo translate('remarks'); ?></th>
                                    <th><?php echo translate('created_at'); ?></th>
                                    <th><?php echo translate('actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                $this->db->where('student_id', $student['id']);
                                $documents = $this->db->get('student_documents')->result();
                                if (count($documents)) {
                                    foreach($documents as $row):
                                    	?>
                                <tr>
                                    <td><?php echo $count++?></td>
                                    <td><?php echo $row->title; ?></td>
                                    <td><?php echo $row->type; ?></td>
                                    <td><?php echo $row->file_name; ?></td>
                                    <td><?php echo $row->remarks; ?></td>
                                    <td><?php echo _d($row->created_at); ?></td>
                                    <td class="min-w-c">
                                        <a href="<?php echo base_url('student/documents_download?file=' . $row->enc_name); ?>" class="btn btn-default btn-circle icon" data-toggle="tooltip" data-original-title="<?=translate('download')?>">
                                            <i class="fas fa-cloud-download-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                    endforeach;
                                }else{
                                    echo '<tr> <td colspan="7"> <h5 class="text-danger text-center">' . translate('no_information_available') . '</h5> </td></tr>';
                                }
                                ?>
                            </tbody>
                            </table>
                        </div>
					</div>
					<?php if ($personal == true || $previous_school_details['status'] == 1) { ?>
					<div id="profile" class="tab-pane">
						<?php 
						echo form_open_multipart($this->uri->uri_string(), array('class' => 'frm-submit-data'));
						$category = $this->student_fields_model->getStatusProfile('category', $branchID);
						$admission_date = $this->student_fields_model->getStatusProfile('admission_date', $branchID);
						if ($category['status'] == 1 || $admission_date['status'] == 1) {
			                $v = (floatval($category['status']) + floatval($admission_date['status']));
			                $div = floatval(12 / $v);
						?>
						<input type="hidden" name="student_id" value="<?php echo get_loggedin_user_id() ?>">
						<!-- academic details-->
						<div class="headers-line">
							<i class="fas fa-school"></i> <?=translate('academic_details')?>
						</div>
						<div class="row">
							<div class="col-md-<?php echo $div ?> mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('admission_date')?><?php echo $admission_date['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
										<input type="text" class="form-control" name="admission_date" value="<?=set_value('admission_date', $student['admission_date'])?>" data-plugin-datepicker data-plugin-options='{ "todayHighlight" : true }' />
									</div>
									<span class="error"><?=form_error('admission_date')?></span>
								</div>
							</div>


							<?php if ($category['status'] == 1) { ?>
							<div class="col-md-<?php echo $div; ?> mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('category')?><?php echo $category['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
									<?php
										$arrayCategory = $this->app_lib->getStudentCategory($branchID);
										echo form_dropdown("category_id", $arrayCategory, set_value('category_id', $student['category_id']), "class='form-control'
										data-plugin-selectTwo data-width='100%' id='category_id' data-minimum-results-for-search='Infinity' ");
									?>
									<span class="error"><?=form_error('category_id')?></span>
								</div>
							</div>
							<?php } ?>
						</div>
					<?php } ?>

					<?php if ($personal == true) { ?>
						<!-- student details -->
						<div class="headers-line mt-md">
							<i class="fas fa-user-check"></i> <?=translate('student_details')?>
						</div>

						<?php
						$v = (1 + floatval($last_name['status']) + floatval($gender['status']));
						$div = ($v == 0) ? 12 : floatval(12 / $v);
						?>
						<div class="row">
							<div class="col-md-<?php echo $div ?> mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('first_name')?> <span class="required">*</span></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fas fa-user-graduate"></i></span>
										<input type="text" class="form-control" name="first_name" value="<?=set_value('first_name', $student['first_name'])?>"/>
									</div>
									<span class="error"></span>
								</div>
							</div>
							<?php if ($last_name['status'] == 1) { ?>
							<div class="col-md-<?php echo $div ?> mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('last_name')?><?php echo $last_name['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fas fa-user-graduate"></i></span>
										<input type="text" class="form-control" name="last_name" value="<?=set_value('last_name', $student['last_name'])?>" />
									</div>
									<span class="error"></span>
								</div>
							</div>
							<?php } if ($gender['status'] == 1) { ?>
							<div class="col-md-<?php echo $div ?> mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('gender')?><?php echo $gender['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
									<?php
										$arrayGender = array(
											'male' => translate('male'),
											'female' => translate('female')
										);
										echo form_dropdown("gender", $arrayGender, set_value('gender', $student['gender']), "class='form-control'
										data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
									?>
									<span class="error"></span>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="row">
							<?php 
							$v = (floatval($blood_group['status']) + floatval($birthday['status']));
							$div = ($v == 0) ? 12 : floatval(12 / $v);
							if ($blood_group['status'] == 1) {
								?>
							<div class="col-md-<?php echo $div ?> mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('blood_group')?><?php echo $blood_group['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
									<?php
										$bloodArray = $this->app_lib->getBloodgroup();
										echo form_dropdown("blood_group", $bloodArray, set_value("blood_group", $student['blood_group']), "class='form-control populate' data-plugin-selectTwo 
										data-width='100%' data-minimum-results-for-search='Infinity' ");
									?>
									<span class="error"></span>
								</div>
							</div>
							<?php } if ($birthday['status'] == 1) { ?>
							<div class="col-md-<?php echo $div ?> mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('birthday')?><?php echo $birthday['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fas fa-birthday-cake"></i></span>
										<input type="text" class="form-control" name="birthday" value="<?=set_value('birthday', $student['birthday'])?>" data-plugin-datepicker
										data-plugin-options='{ "startView": 2 }' />
									</div>
									<span class="error"></span>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="row">
							<?php
							$v = (floatval($religion['status']) + floatval($mother_tongue['status']) + floatval($caste['status']));
							$div = ($v == 0) ? 12 : floatval(12 / $v);

							if ($mother_tongue['status'] == 1) {
								?>
							<div class="col-md-<?php echo $div ?> mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('mother_tongue')?><?php echo $mother_tongue['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
									<input type="text" class="form-control" name="mother_tongue" value="<?=set_value('mother_tongue', $student['mother_tongue'])?>" />
									<span class="error"></span>
								</div>
							</div>
							<?php } if ($religion['status'] == 1) { ?>
							<div class="col-md-<?php echo $div ?> mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('religion')?><?php echo $religion['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
									<input type="text" class="form-control" name="religion" value="<?=set_value('religion', $student['religion'])?>" />
									<span class="error"></span>
								</div>
							</div>
							<?php } if ($mother_tongue['status'] == 1) { ?>
							<div class="col-md-<?php echo $div ?> mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('caste')?><?php echo $caste['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
									<input type="text" class="form-control" name="caste" value="<?=set_value('caste', $student['caste'])?>" />
									<span class="error"></span>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="row">
							<?php
							$v = (floatval($student_mobile_no['status']) + floatval($student_email['status']) + floatval($city['status']) + floatval($state['status']));
							$div = ($v == 0) ? 12 : floatval(12 / $v);
							if ($student_mobile_no['status'] == 1) {
								?>
							<div class="col-md-<?php echo $div ?> mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('mobile_no')?><?php echo $student_mobile_no['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fas fa-phone-volume"></i></span>
										<input type="text" class="form-control" name="mobileno" value="<?=set_value('mobileno', $student['mobileno'])?>" />
									</div>
									<span class="error"></span>
								</div>
							</div>
						<?php } if ($student_email['status'] == 1) { ?>
							<div class="col-md-<?php echo $div ?> mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('email')?><?php echo $student_email['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
									<div class="input-group">
										<span class="input-group-addon"><i class="far fa-envelope-open"></i></span>
										<input type="text" class="form-control" name="email" id="email" value="<?=set_value('email', $student['email'])?>" />
									</div>
									<span class="error"></span>
								</div>
							</div>
						<?php } if ($city['status'] == 1) { ?>
							<div class="col-md-<?php echo $div ?> mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('city')?><?php echo $city['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
									<input type="text" class="form-control" name="city" value="<?=set_value('city', $student['city'])?>" />
									<span class="error"></span>
								</div>
							</div>
						<?php } if ($state['status'] == 1) { ?>
							<div class="col-md-<?php echo $div ?> mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('state')?><?php echo $state['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
									<input type="text" class="form-control" name="state" value="<?=set_value('state', $student['state'])?>" />
									<span class="error"></span>
								</div>
							</div>
						<?php } ?>
						</div>
						<div class="row">
							<?php 
							$v = (floatval($present_address['status']) + floatval($permanent_address['status']));
							$div = ($v == 0) ? 12 : floatval(12 / $v);
							if ($present_address['status'] == 1) {
								?>
							<div class="col-md-<?php echo $div ?> mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('present_address')?><?php echo $present_address['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
									<textarea name="current_address" rows="2" class="form-control" aria-required="true"><?=set_value('current_address', $student['current_address'])?></textarea>
									<span class="error"></span>
								</div>
							</div>
							<?php } if ($permanent_address['status']) { ?>
							<div class="col-md-<?php echo $div ?> mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('permanent_address')?><?php echo $permanent_address['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
									<textarea name="permanent_address" rows="2" class="form-control" aria-required="true"><?=set_value('permanent_address', $student['permanent_address'])?></textarea>
									<span class="error"></span>
								</div>
							</div>
							<?php } ?>
						</div>
						<?php if ($student_photo['status'] == 1) { ?>
						<div class="row mb-md">
							<div class="col-md-12">
								<div class="form-group">
									<label for="input-file-now"><?=translate('profile_picture')?><?php echo $student_photo['required'] == 1 ? ' <span class="required">*</span>' : ''; ?></label>
									<input type="file" name="user_photo" class="dropify" data-default-file="<?=get_image_url('student', $student['photo'])?>" />
									<input type="hidden" name="old_user_photo" value="<?php echo $student['photo']; ?>" />
									<span class="error"></span>
								</div>
							</div>
						</div>
						<?php } ?>
					
						<?php } if ($previous_school_details['status'] == 1) { ?>
						<!-- previous school details -->
						<div class="headers-line">
							<i class="fas fa-bezier-curve"></i> <?=translate('previous_school_details')?>
						</div>
						<div class="row">
							<div class="col-md-6 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('school_name')?></label>
									<input type="text" class="form-control" name="school_name" value="<?=$previous_details['school_name']?>" />
									<span class="error"></span>
								</div>
							</div>
							<div class="col-md-6 mb-sm">
								<div class="form-group">
									<label class="control-label"><?=translate('qualification')?></label>
									<input type="text" class="form-control" name="qualification" value="<?=$previous_details['qualification']?>" />
								</div>
							</div>
						</div>
						<div class="row mb-lg">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label"><?=translate('remarks')?></label>
									<textarea name="previous_remarks" rows="2" class="form-control"><?=$previous_details['remarks']?></textarea>
								</div>
							</div>
						</div>
						<?php } ?>
						<div class="panel-footer">
							<div class="row">
								<div class="col-md-offset-9 col-md-3">
									<button class="btn btn-default btn-block" type="submit" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 20V15H9V20M18 20H6C4.89543 20 4 19.1046 4 18V6C4 4.89543 4.89543 4 6 4H14.1716C14.702 4 15.2107 4.21071 15.5858 4.58579L19.4142 8.41421C19.7893 8.78929 20 9.29799 20 9.82843V18C20 19.1046 19.1046 20 18 20Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> <?php echo translate('update'); ?></button>
								</div>	
							</div>
						</div>
					<?php echo form_close(); ?>
					</div>
					<?php } ?>
				</div>
			</div>
			
		</section>
	</div>
</div>