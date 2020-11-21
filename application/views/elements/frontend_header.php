<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Makanan Online</title>
    <link href="<?php echo base_url('assets/frontend/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/css/font-awesome.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/css/prettyPhoto.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/css/price-range.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/frontend/css/animate.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/frontend/css/main.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/frontend/css/responsive.css')?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('assets/frontend/js/html5shiv.js')?>"></script>
    <script src="<?php echo base_url('assets/frontend/js/respond.min.js')?>"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png')?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png')?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png')?>">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png')?>">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +0822-40436203</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> Toko online</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo base_url('')?>"><img src="<?php echo base_url('assets/frontend/images/home/logo.jpg')?>" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							<?php if ($this->session->userdata('login_status') == FALSE) { ?>
								<li><a href="<?php echo base_url('')?>"><i class="fa fa-home"></i> Home</a></li>
								<li><a href="<?php echo base_url('frontendc/cara_beli')?>"><i class="fa fa-list"></i> Cara Pembelian</a></li>
								<li><a href="<?php echo base_url('frontendc/tentang_kami')?>"><i class="fa fa-star"></i> Tentang Kami</a></li>
								<li><a href="<?php echo base_url('frontendc/login')?>"><i class="fa fa-lock"></i> Login/Daftar</a></li>
							<?php } else { ?>
								<li><a href="<?php echo base_url('userc/data_user')?>"><i class="fa fa-user"></i> <?php echo $this->session->userdata('NAME'); ?></a></li>
								<li><a href="<?php echo base_url('produkc/data_produk')?>"><i class="fa fa-star"></i> Produk Saya</a></li>
								<li><a href="<?php echo base_url('frontendc/pembelian')?>"><i class="fa fa-crosshairs"></i> Pembelian</a></li>
								<li><a href="<?php echo base_url('frontendc/keranjang')?>"><i class="fa fa-shopping-cart"></i> Keranjang (<?php echo $this->cart->total_items(); ?>)</a></li>
								<li><a href="<?php echo base_url('loginc/logout')?>"><i class="fa fa-lock"></i> Keluar</a></li>
							<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->