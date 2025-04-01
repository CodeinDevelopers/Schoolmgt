<!-- Header Starts -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
<style>
    .vercel-header {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(16px);
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }
    .btn-vercel {
        background: #000;
        color: #fff;
        transition: all 0.2s;
    }
    .btn-vercel:hover {
        background: rgba(0, 0, 0, 0.8);
        transform: translateY(-1px);
    }
    @media (max-width: 768px) {
        .mobile-menu {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(16px);
        }
    }
    .btn-vercel {
            background-color: black;
            color: white;
            transition: background-color 0.2s;
        }
        .btn-vercel:hover {
            background-color: #333;
        }
</style>

<header class="main-header">
    <!-- Top Bar Starts -->
    <div class="hidden md:block bg-gray-50 border-b border-gray-100">
        <div class="container mx-auto px-4 py-2">
            <div class="flex justify-between items-center">
                <div class="text-sm text-gray-600"><?php echo $cms_setting['working_hours']; ?></div>
                <div class="flex items-center space-x-6">
                    <a href="mailto:<?php echo $cms_setting['email']; ?>" class="text-sm text-gray-600 hover:text-gray-900 flex items-center">
                        <i class="far fa-envelope mr-2"></i>
                        <span><?php echo $cms_setting['email']; ?></span>
                    </a>
                    <div class="text-sm text-gray-600 flex items-center">
                        <i class="fas fa-phone-volume mr-2"></i>
                        <span><?php echo $cms_setting['mobile_no']; ?></span>
                    </div>
                    <?php if (!is_loggedin()) { 
                        $authenticationURL = base_url($cms_setting['url_alias'] . '/login');
                        $saasExisting = $this->app_lib->isExistingAddon('saas');
                        if ($saasExisting && $this->db->table_exists("custom_domain")) {
                            $getDomain = $this->home_model->getCurrentDomain();
                            if(!empty($getDomain)) {
                                $authenticationURL = base_url('login');
                            }
                        }
                    ?>
                       
                    <?php } ?>
                </div>
            </div>
    <!-- Top Bar Ends -->
    <?php
$news_list = $this->home_model->getLatestNews($branchID);
if (!empty($news_list)) {
	$url_alias = $cms_setting['url_alias'];
	?>
<div class="latest--news">
    <div class="container">
        <div class="d-lg-flex align-items-center">
            <div class="latest-title d-flex align-items-center text-nowrap text-white text-uppercase">
                <i class="fa-solid fa-bolt"></i> Latest News
            </div>
			<div class="news-updates-list overflow-hidden mt-2 mb-2" data-marquee="true">
				<ul class="nav">
				<?php foreach ($news_list as $key => $value) { ?>
					<li><a class="text-white" href="<?php echo base_url($url_alias . '/news_view/' . $value->alias); ?>"><strong><?php echo str_pad($key + 1, 2, '0', STR_PAD_LEFT); ?>.</strong> <?php echo $value->title . " - <span class='date-text'>" .  _d($value->date); ?></span></a></li>
				<?php } ?>
				</ul>
			</div>
			<div class="current-date text-nowrap text-white">
				<span class="date-now"><i class="fa-regular fa-clock"></i> <?php echo _d(date('Y-m-d')) ?></span>
			</div>
        </div>
    </div>
</div>
<?php } ?>
</header>
<!-- Header Ends -->