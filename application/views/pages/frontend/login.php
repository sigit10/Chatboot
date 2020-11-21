	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Masuk ke akun anda</h2>
						<form method="post" action="<?php echo base_url('loginc/proses_login')?>">
							<input name="username" type="text" placeholder="Username" />
							<input name="password" type="password" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Tetap Masuk
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Atau</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Daftar!</h2>
	                    <?php
	                      $message = $this->session->flashdata('notif');
	                      $message2 = $this->session->flashdata('notif_berhasil');
	                      if($message){

	                      echo '<div class="alert btn-block alert-error fade in btn btn-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'.$message .'</strong></div>';
	                       
                         } elseif ($message2) {
	                      echo '<div class="alert btn-block alert-success fade in btn btn-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'.$message2 .'</strong></div>';
                         } ?>   
						<form method="post" action="<?php echo base_url('loginc/proses_signup')?>">
							<input name="nm_user" type="text" placeholder="Nama"/>
							<input name="username" type="text" placeholder="Username"/>
							<input name="password" type="password" placeholder="Password"/>
							<input name="email_user" type="email" placeholder="Email"/>
							<input name="alamt_user" type="text" placeholder="Alamat Anda"/>
							<input name="notelp_user" type="number" placeholder="No telpon"/>
							<button type="submit" class="btn btn-default">Daftar</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->