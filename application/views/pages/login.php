<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>Maintenance Server</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
     <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/bootstrap/css/bootstrap.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/login.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/magic/magic.css')?>" />
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body background="<?php echo base_url('assets/admin/img/lapan_logo.jpg')?>">

   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="text-center">
        <img src="<?php echo base_url('assets/admin/img/DinasKominfo.png')?>"  width=10% alt=" Logo" />

<!-- 
 -->
    </div>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form action="<?php echo base_url('loginc/proses_login')?>"  method="post" class="form-signin">
                <?php
                $message = $this->session->flashdata('notif');
                if($message){

                echo '<div class="alert alert-block alert-error fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>'.$message .'</strong></div>';
                   
                }?>
                <p class="text-muted text-center btn-block btn btn-primary btn-rect disabled">
                    Sistem Monitoring Data
                </p>
                <input name="username" type="text" placeholder="Username" class="form-control" />
                <input name="password" type="password" placeholder="Password" class="form-control" />
                <button class="btn text-muted text-center btn-danger" type="submit">Masuk</button>
            </form>
        </div>
    </div>
</div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="<?php echo base_url('assets/admin/plugins/jquery-2.0.3.min.js')?>"></script>
      <script src="<?php echo base_url('assets/admin/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
   <script src="<?php echo base_url('assets/admin/js/login.js')?>"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
