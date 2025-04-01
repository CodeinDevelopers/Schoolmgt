<div class="text-center px-4">
    <!-- Logo Container -->
    <div class="flex justify-center">
        <a href="<?php echo base_url('#'); ?>" class="flex-shrink-0">
            <img src="<?=$this->application_model->getBranchImage($branch_id, 'logo')?>" alt="Logo" style="height: 60px;">
        </a>
    </div>

    <!-- Welcome Text -->
    <h2 class="text-gray-900 text-2xl font-bold mb-8">
        <?php echo $global_config['institute_name'];?> Portal
    </h2>

    <!-- Fixed Width Button Container -->
    <div class="w-48 mx-auto flex flex-col gap-4">
        <div>
            <?php if (!is_loggedin()) { ?>
                <a href="<?php echo base_url('login'); ?>" class="bg-gray-100 text-gray-900 hover:text-black hover:bg-gray-200 border border-gray-200 transition-colors duration-200 rounded-lg px-6 py-3 font-medium w-full text-center inline-block">
                    Login
                </a>
            <?php } else { ?>
                <a href="<?php echo base_url('dashboard'); ?>" class="bg-gray-100 text-gray-900 hover:text-black hover:bg-gray-200 border border-gray-200 transition-colors duration-200 rounded-lg px-6 py-3 font-medium w-full text-center inline-block">
                    Dashboard
                </a>
            <?php } ?>
        </div>
        <a href="<?php echo base_url('admission'); ?>" class="bg-gray-100 text-gray-900 hover:text-black hover:bg-gray-200 border border-gray-200 transition-colors duration-200 rounded-lg px-6 py-3 font-medium w-full text-center">
            Admission
        </a>
        <a href="<?php echo base_url('userrole/online_exam'); ?>" class="bg-gray-100 text-gray-900 hover:text-black hover:bg-gray-200 border border-gray-200 transition-colors duration-200 rounded-lg px-6 py-3 font-medium w-full text-center">
            CBT Exam
        </a>
        <a href="<?php echo base_url('exam_results'); ?>" class="bg-gray-100 text-gray-900 hover:text-black hover:bg-gray-200 border border-gray-200 transition-colors duration-200 rounded-lg px-6 py-3 font-medium w-full text-center">
            Exam Results
        </a>
    </div>
</div>
