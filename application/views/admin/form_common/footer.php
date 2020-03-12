<!-- Essential javascripts for application to work-->
    <script src="<?= base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.toast.min.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= base_url() ?>assets/js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
      });
    </script>
  </body>
  <?php
    if ($message = $this->session->flashdata('alert')) {
        $class = $this->session->flashdata('alert_class');
        if ($class === "red") {
            $icon = "error";
            $heading = "Error";
        } else {
            $icon = "success";
            $heading = "Success";
        }
        ?>
        <script>
            var message = "<?= $message ?>";
            var alert_class = "<?= $class ?>";
            var icon_show = "<?= $icon ?>";
            var heading_show = "<?= $heading ?>";
            $(document).ready(function () {
                $.toast({
                    text: message,
                    heading: heading_show,
                    icon: icon_show,
                    showHideTransition: 'slide', // It can be plain, fade or slide
                    bgColor: alert_class, // Background color for toast
                    textColor: '#fff', // text color
                    allowToastClose: true, // Show the close button or not
                    hideAfter: false, // `false` to make it sticky or time in miliseconds to hide after
                    stack: 5, // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
                    textAlign: 'left', // Alignment of text i.e. left, right, center
                    position: 'top-center'       // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
                });
            });
        </script>
    <?php } ?>
</html>