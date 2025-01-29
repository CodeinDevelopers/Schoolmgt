



<a href="#" class="back-to-top"><i class="far fa-arrow-alt-circle-up"></i></a>
<!-- JS Files -->
<script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/js/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/plugins/shuffle/jquery.shuffle.modernizr.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/select2/js/select2.full.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/sweetalert/sweetalert.min.js');?>"></script>
<script src="<?php echo base_url('assets/frontend/plugins/magnific-popup/jquery.magnific-popup.min.js');?>"></script>
<script src="<?php echo base_url('assets/frontend/js/custom.js'); ?>"></script>

<?php
$alertclass = "";
if($this->session->flashdata('alert-message-success')){
    $alertclass = "success";
} else if ($this->session->flashdata('alert-message-error')){
    $alertclass = "error";
} else if ($this->session->flashdata('alert-message-info')){
    $alertclass = "info";
}
if($alertclass != ''):
    $alert_message = $this->session->flashdata('alert-message-'. $alertclass);
?>
<script type="text/javascript">
    swal({
        toast: true,
        position: 'top-end',
        type: '<?php echo $alertclass?>',
        title: '<?php echo $alert_message?>',
        confirmButtonClass: 'btn btn-1',
        buttonsStyling: false,
        timer: 8000
    })
</script>
<?php endif; ?>
