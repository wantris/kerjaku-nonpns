<div class="login-box">
	<div class="text-center">
		<h1 class="h4 text-black-900 mb-4">Pemerintahan Kabupaten Indramayu</h1>
		<h1 class="h4 text-black-900 mb-4">Dinas Komunikasi dan Informasi Kabupaten Indramayu </h1>
		<img src="assets/uploads/images/Indramayu.png" width="250" height="200"/>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg text"> Masuk Dengan NIK & Password Anda</p>
		<form method="post" action="<?php echo base_url('auth/login'); ?>" role="login">
			<div class="form-group has-feedback">
				<input type="nik" name="nik" class="form-control" required minlength="5" placeholder="nik" />
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="password" class="form-control" required minlength="5" placeholder="Password" />
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>

			<div class="row">
				<div class="checkbox icheck col-xs-12 col-sm-6 col-md-6">
					<label>
                        <?php echo form_checkbox('remember_code', '1', false, 'id="remember_code"'); ?>
                        Ingat Saya
                    </label>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6" style="padding-bottom: 5px">
					<button type="submit" name="submit" value="login" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Masuk</button>
				</div>
			</div>
			<a href="<?php echo base_url('auth/forgot_password'); ?>"> Lupa Kata Sandi?</a><br>
			<div id="myalert">
			<?php echo $this->session->flashdata('alert', true)?>
	</div>
			
		</form>

<script>
	$(function() {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
	$('#myalert').delay('slow').slideDown('slow').delay(4100).slideUp(600);
</script>
