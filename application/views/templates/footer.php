</div>
</div>
<!-- Required Jquery -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="<?= base_url(); ?>assets/pages/widget/amchart/amcharts.min.js"></script>
<script src="<?= base_url(); ?>assets/pages/widget/amchart/serial.min.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="<?= base_url(); ?>assets/pages/todo/todo.js "></script>
<!-- Custom js -->
<script type="text/javascript" src="<?= base_url(); ?>assets/pages/dashboard/custom-dashboard.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/script.js"></script>
<script type="text/javascript " src="<?= base_url(); ?>assets/js/SmoothScroll.js"></script>
<script src="<?= base_url(); ?>assets/js/pcoded.min.js"></script>
<script src="<?= base_url(); ?>assets/js/demo-12.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?= base_url(); ?>assets/fontawesome/js/fontawesome.min.js"></script>
<script>
    var $window = $(window);
    var nav = $('.fixed-button');
    $window.scroll(function() {
        if ($window.scrollTop() >= 200) {
            nav.addClass('active');
        } else {
            nav.removeClass('active');
        }
    });
</script>

<script>
    // upload file gambar
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $('.form-check-input').on('click', function() {
        const id_menu = $(this).data('menu');
        const id_role = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/menu/gantiaccess'); ?>",
            type: 'post',
            data: {
                id_menu: id_menu,
                id_role: id_role
            },
            success: function() {
                document.location.href = "<?= base_url('admin/menu/role/'); ?>" + id_role;
            }
        });
    });
</script>
</body>

</html>