</main>
    <!-- DataTable -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src='<?= base_url()?>assets/js/datatable/init.js'></script>
    <!-- END DataTable -->

    <!-- Essential javascripts for application to work-->
    <script src="<?=base_url()?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/popper.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url('assets/js/main.js')?>"></script>
    <script src="<?= base_url() ?>assets/js/jquery.toast.min.js"></script>
    <script src="<?= base_url() ?>assets/js/custom.js"></script>

    <!-- The javascript plugin to display page loading on top-->
    <script src="<?=base_url()?>assets/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="<?=base_url()?>assets/js/plugins/chart.js"></script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>