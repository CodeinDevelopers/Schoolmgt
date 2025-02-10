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
.quick-action-btn.btn-primary { background-color: rgba(52, 152, 219, 0.85); }
.quick-action-btn.btn-info { background-color: rgba(91, 192, 222, 0.85); }
.quick-action-btn.btn-success { background-color: rgba(46, 204, 113, 0.85); }
.quick-action-btn.btn-warning { background-color: rgba(241, 196, 15, 0.85); }
.quick-action-btn.btn-danger { background-color: rgba(231, 76, 60, 0.85); }
.quick-action-btn.btn-purple { background-color: rgba(155, 89, 182, 0.85); }

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
    font-size: 1.90rem;
    font-weight: 700;
    margin: 0;
    color: #1e293b;
}

.ramom-user-name {
    font-weight: 1000;
    color: #2563eb;
}

.ramom-subtitle {
    margin: 0.25rem 0 0 0;
    font-size: 1.40rem;
    color: #64748b;
}

.ramom-header-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.ramom-action-btn {
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

.ramom-action-btn:hover {
    background: #f1f5f9;
    color: #2563eb;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    border-color: #cbd5e1;
}

.ramom-action-btn:active {
    transform: translateY(0);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.ramom-action-btn i {
    transition: transform 0.3s ease;
}

.ramom-action-btn:hover i {
    transform: scale(1.1);
    color: #2563eb;
}

.ramom-logout-btn {
    background: #fef2f2;
    border-color: #fecaca;
    color: #dc2626;
}

.ramom-logout-btn:hover {
    background: #fee2e2;
    color: #dc2626;
    border-color: #fca5a5;
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
    border: 0px solid #e2e8f0;
    transition: transform 0.3s ease, border-color 0.3s ease;
}

.ramom-profile-img:hover {
    transform: scale(1.05);
    border-color: #2563eb;
}

@media (max-width: 768px) {
    .ramom-modern-header {
        padding: 1.5rem 1rem;
    }
    
    .ramom-welcome-text {
        font-size: 1.25rem;
    }
    
    .ramom-subtitle {
        font-size: 0.875rem;
    }
    
    .ramom-header-actions {
        gap: 0.5rem;
    }

    .ramom-action-btn span {
        display: none;
    }

    .ramom-action-btn {
        width: 40px;
        height: 40px;
        padding: 0;
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