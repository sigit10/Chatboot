   <!DOCTYPE html>

     <!-- BEGIN HEAD -->
    <head>
         <meta charset="UTF-8" />
    <title>Makanan Online</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/bootstrap/css/bootstrap.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/main.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/theme.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/MoneAdmin.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/Font-Awesome/css/font-awesome.css')?>" />

    <!-- PAGE LEVEL DataTables STYLES -->
    <link href="<?php echo base_url('assets/admin/plugins/dataTables/dataTables.bootstrap.css')?>" rel="stylesheet" />
    <!-- END PAGE LEVEL  STYLES -->

    <!-- PAGE LEVEL FormValidation STYLES -->
     <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/validationengine/css/validationEngine.jquery.css')?>" />
    <!-- END PAGE LEVEL  STYLES -->

    <!-- PAGE LEVEL FileUpload STYLES -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/bootstrap-fileupload.min.css')?>" />
    <!-- SWITCH PAGE LEVEL  STYLES -->
    
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/switch/static/stylesheets/bootstrap-switch.css')?>" />
    
    <!-- akhir -->
    
</head>
     <!-- END HEAD -->
     <!-- BEGIN BODY -->
<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">
         <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="<?php echo base_url('')?>" class="navbar-brand">
                    <p>sistem Informasi Makanan Online</p>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">
                    <!--ADMIN SETTINGS SECTIONS -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?php echo site_url('loginc/logout')?>"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>
            </nav>
        </div>
        <!-- END HEADER SECTION -->
        <!-- MENU SECTION -->
       <div id="left">
            <div class="media user-media well-small">
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> <?php echo $this->session->userdata('NAME')?></h5>
                    <ul class="list-unstyled user-info">
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                        </li>
                       
                    </ul>
                </div>
                <br />
            </div>
            <ul id="menu" class="collapse">
                <li class="panel">
                    <a href="<?php echo base_url('')?>" >
                        <i class="icon-home"></i> Home
                    </a>                   
                </li>
                <?php if ($this->session->userdata('LEVEL') == 'Admin') { ?>
                <li><a href="<?php echo site_url('adminc/data_admin')?>"><i class="icon-user-md"></i> Admin </a></li>
                <?php } ?>
                <li><a href="<?php echo site_url('userc/data_user')?>"><i class="icon-user"></i> User </a></li>
                <li><a href="<?php echo site_url('produkc/data_produk')?>"><i class="icon-leaf"></i> Produk</a></li>
                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav">
                        <i class="icon-shopping-cart"></i> Transaksi
       
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="collapse" id="chart-nav">
                        <li><a href="<?php echo site_url('transaksic/data_penjualan')?>"><i class="icon-angle-right"></i> Penjualan </a></li>
                        <li><a href="<?php echo site_url('transaksic/data_pembelian')?>"><i class="icon-angle-right"></i> Pembelian</a></li>
                    </ul>
                </li>
                <?php if ($this->session->userdata('LEVEL') == 'Admin') { ?>
                <li><a href="<?php echo site_url('laporanc/data_laporan')?>"><i class="icon-book"></i> Laporan </a></li>
                <?php } ?>

                <li><a href="<?php echo site_url('loginc/logout')?>"><i class="icon-off"></i> Logout </a></li>
            </ul>
        </div>
        <!--END MENU SECTION -->
        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> <?php echo $headerTitle?> </h2>
                    </div>
                </div>

                <hr />
    <!--END GLOBAL STYLES -->
