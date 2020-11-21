<!-- 
Source Code by : Aldy Muldani
Email : dieabra@gmail.com
Github : https://github.com/alldie1207
Line : alldie1207
Phone : 082295673583
Web : alldie.co.id / alldie.web.id
 -->
   <!-- FOOTER -->
    <div id="footer">
        <p> 2017  &copy; copyright Team Project by Sigit</p>
    </div>
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo base_url('assets/admin/plugins/jquery-2.0.3.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/modernizr-2.6.2-respond-1.1.0.min.js')?>"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL DataTables SCRIPTS -->
    <script src="<?php echo base_url('assets/admin/plugins/dataTables/jquery.dataTables.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/dataTables/dataTables.bootstrap.js')?>"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->

    <script type="text/javascript" src="<?php echo base_url('assets/print_page/jquery.printPage.js')?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".btnPrint").printPage();
        })
    </script>

    <!-- PAGE LEVEL SCRIPTS -->

    <script src="<?php echo base_url('assets/admin/plugins/validationengine/js/jquery.validationEngine.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/validationengine/js/languages/jquery.validationEngine-en.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/js/validationInit.js')?>"></script>
    <script>
        $(function () { formValidation(); });
    </script>
     <!--SWTICH PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url('assets/admin/plugins/switch/static/js/bootstrap-switchs.min.js')?>"></script>
    <!-- PAGE LEVEL Upload File SCRIPTS -->
    <script src="<?php echo base_url('assets/admin/plugins/jasny/js/bootstrap-fileupload.js')?>"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
     
</body>
   <!--END GLOBAL STYLES -->
