<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="<?php echo $global_config['institute_name'] ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="<?php echo $global_config['institute_name'] ?>">
	<meta name="author" content="<?php echo $global_config['institute_name'] ?>">
	<title><?php echo $title;?></title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<!-- include stylesheet -->
	<?php include 'stylesheet.php';?>
<style>.quick-actions-grid {
    display: flex;
    flex-wrap: wrap;
    margin: -5px;
}

.quick-action-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    aspect-ratio: 1;
    padding: 10px;
    border-radius: 8px;
    text-decoration: none !important; /* Prevents underline */
    transition: all 0.3s ease;
    opacity: 0.9;
}

/* Modern, softer colors */
.quick-action-btn.btn-primary { background-color: rgb(0, 193, 51); }
.quick-action-btn.btn-info { background-color: rgb(36, 95, 224); }
.quick-action-btn.btn-success { background-color: rgb(247, 192, 74) ;}
.quick-action-btn.btn-warning { background-color: rgb(53, 206, 218); }
.quick-action-btn.btn-danger { background-color: rgb(255, 0, 51); }
.quick-action-btn.btn-purple { background-color: rgb(0, 198, 252); }

.quick-action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    opacity: 1;
}

.quick-action-btn i {
    margin-bottom: 8px;
    color: white;
}

.quick-action-btn span {
    color: white;
    font-size: 12px;
    font-weight: 500;
}

.p-5 {
    padding: 5px;
}
.ramom-modern-header {
    background: #ffffff;
    padding: 2rem 2rem;
    margin-bottom: 1rem;
    border-radius: 0.75rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    border: 1px solid #e5e7eb;
}

.ramom-header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    min-height: 80px;
}

.ramom-user-welcome {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.ramom-welcome-text {
    font-size: 1.75rem;
    font-weight: 600;
    margin: 0;
    color: #1e293b;
}

.ramom-user-name {
    font-weight: 700;
    color: #2563eb;
}

.ramom-subtitle {
    margin: 0.25rem 0 0 0;
    font-size: 0.95rem;
    color: #64748b;
}

.ramom-header-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
}

/* Changed to target anchor specifically */
a.ramom-action-btn {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    color: #475569;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none !important;
    font-weight: 500;

}

/* Updated hover states for anchor */
a.ramom-action-btn:hover {
    background: #f1f5f9;
    color: #2563eb;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    border-color: #cbd5e1;
    text-decoration: none !important;
}

a.ramom-action-btn:active {
    transform: translateY(0);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.ramom-action-btn i {
    transition: transform 0.3s ease;
}

.ramom-action-btn:hover i {
    transform: scale(1.1);
    color: #2563eb;
    text-decoration: none !important;
}

/* Updated logout specific styling */
a.ramom-logout-btn {
    background: rgb(234, 248, 242);
    border-color: rgb(196, 248, 224);
    color: #2ad385;
}

a.ramom-logout-btn:hover {
    background: rgb(223, 252, 239);
    color:rgb(30, 192, 117);
    border-color: rgb(196, 248, 224);
    text-decoration: none;
}

.ramom-user-profile {
    width: 52px;
    height: 52px;
}

.ramom-profile-img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #e2e8f0;
    transition: transform 0.3s ease, border-color 0.3s ease;
}

.ramom-profile-img:hover {
    transform: scale(1.05);
    border-color: #2563eb;
}

a.ramom-action-btn span {
        font-size: 12px; 
        white-space: nowrap; 
    }

/* Mobile-specific styles */
@media (max-width: 768px) {
    .ramom-modern-header {
        padding: 1.5rem 1rem;
    }

    .ramom-header-content {
        flex-direction: column; /* Stack elements vertically */
        align-items: flex-start; /* Align items to the start */
        gap: 1rem; /* Add spacing between stacked elements */
    }

    .ramom-user-welcome {
        width: 100%; 
    }

    .ramom-header-actions {
        width: 100%; 
        justify-content: flex-start;
        gap: 0.5rem; 
    }

   
    a.ramom-action-btn span {
        font-size: 10px; 
        white-space: nowrap; 
    }


    a.ramom-action-btn {
        width: auto; 
        padding: 0.5rem 1rem;
    }
    
}
@media (max-width: 480px) {
    a.ramom-action-btn span {
        font-size: 10px;
    }
}
.student-profile-card {
    background: #ffffff;
    padding: 2rem 2rem;
    margin-bottom: 1rem;
    border-radius: 0.75rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    border: 17px ;
}

.profile-content {
    padding: 24px;
    display: flex;
    gap: 24px;
}

.profile-image img {
    width: 128px;
    height: 128px;
    border-radius: 50%;
    object-fit: cover;
}

.profile-details {
    flex-grow: 1;
}

.student-name {
    font-size: 24px;
    font-weight: 600;
    color: #1a1a1a;
    margin: 0 0 4px 0;
}

.student-type {
    font-size: 14px;
    color: #666;
    margin: 0 0 16px 0;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 12px;
    color: #4a5568;
}

.icon-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: fit-content; /* Allow width to expand based on content */
    height: 32px;
    background-color: #f3f4f6;
    border-radius: 16px; /* Changed from 50% to fixed value to make it pill-shaped */
    color: #4a5568;
    padding: 0 12px; /* Add horizontal padding for text */
    gap: 8px; /* Space between icon and text */
}

.icon-wrapper svg {
    width: 16px;
    height: 16px;
}

.icon-text {
    font-size: 14px;
    font-weight: 500;
    white-space: nowrap; /* Prevents text from wrapping */
}

.action-area {
    margin-left: auto;
    display: flex;
    align-items: flex-start;
}

.dashboard-button {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    background-color: #2563eb;
    color: white;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: background-color 0.2s;
}

.dashboard-button:hover {
    background-color:rgb(229, 236, 252);
    text-decoration: none !important;
}

.dashboard-button svg {
    width: 16px;
    height: 16px;
}

/* Responsive Design */
@media (max-width: 768px) {
.profile-content {
flex-direction: column;
}

.profile-image {
margin: 0 auto;
}

 .profile-details {
text-align: center;
}

 .info-grid {
   grid-template-columns: 1fr;
}
.action-area {
margin: 16px auto 0;
}

.info-item {
 justify-content: center;
 }

}
</style>
	<?php
	if(isset($headerelements)) {
		foreach ($headerelements as $type => $element) {
			if($type == 'css') {
				if(count($element)) {
					foreach ($element as $keycss => $css) {
						echo '<link rel="stylesheet" href="'. base_url('assets/' . $css) . '">' . "\n";
					}
				}
			} elseif($type == 'js') {
				if(count($element)) {
					foreach ($element as $keyjs => $js) {
						echo '<script type="text/javascript" src="' . base_url('assets/' . $js). '"></script>' . "\n";
					}
				}
			}
		}
	}
	?>
	<!-- ramom css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/ramom.css');?>">
	<?php if ($theme_config["border_mode"] == 'false'): ?>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/skins/square-borders.css');?>">
	<?php endif; ?>

	<!-- If user have enabled CSRF proctection this function will take care of the ajax requests and append custom header for CSRF -->
	<script type="text/javascript">
		var base_url = '<?php echo base_url(); ?>';
		var isRTLenabled = '<?php echo $this->app_lib->isRTLenabled(); ?>';
		var csrfData = <?php echo json_encode(csrf_jquery_token()); ?>;
		$(function($) {
			$.ajaxSetup({
				cache: false,
				data: csrfData
			});
		});
	</script>
</head>