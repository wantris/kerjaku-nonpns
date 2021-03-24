<div class="msg" style="display:none;">
	<?= @$this->session->flashdata('msg'); ?>
</div>
<div class="row">
	<div class="col-md-3">
		<!-- Profile Image -->
		<div class="box box-primary">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/uploads/images/foto_profil/' . $data['userdata']->photo); ?>" style="width:125px; height:125px">

				<h3 class="profile-username text-center"><?= $data['userdata']->first_name; ?> <?= $data['userdata']->last_name; ?></h3>

				<p class="text-muted text-center">
					<?= $data['userdata']->name; ?>
				</p>

				<ul class="list-group list-group-unbordered">
					<li class="list-group-item" style="text-align:center">
						<b>Username</b><br><a><?= $data['userdata']->username; ?></a>
					</li>
					<li class="list-group-item" style="text-align:center">
						<b>Bidang</b><br><a><?= $data['userdata']->id_bidang; ?></a>
					</li>
					<li class="list-group-item" style="text-align:center">
						<b>Terakhir Login</b><br><a><?= $data['userdata']->last_login; ?></a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-9">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#settings" data-toggle="tab">Ubah Identitas</a></li>
				<li><a href="#password" data-toggle="tab">Ubah Password</a></li>
			</ul>
			<div class="tab-content">
				<div class="active tab-pane" id="settings">
					<form class="form-horizontal" action="<?php echo base_url('auth/updateProfile') ?>" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-2 control-label">Username</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Username" name="username" value="<?= $data['userdata']->username; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Depan</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Nama Depan" name="first_name" value="<?= $data['userdata']->first_name; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Belakang</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Nama Belakang" name="last_name" value="<?= $data['userdata']->last_name; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" placeholder="Email" name="email" value="<?= $data['userdata']->email; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Telp</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" placeholder="Telp" name="phone" value="<?= $data['userdata']->phone; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Foto</label>
							<div class="col-sm-10">
								<input type="file" class="form-control" placeholder="Foto" name="photo">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
							</div>
						</div>
					</form>
				</div>
				<div class="tab-pane" id="password">
					<form class="form-horizontal" action="<?php echo base_url('auth/updatePassword') ?>" method="POST">
						<div class="form-group">
							<label for="passLama" class="col-sm-2 control-label">Password Lama</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" placeholder="Password Lama" name="passLama">
							</div>
						</div>
						<div class="form-group">
							<label for="passBaru" class="col-sm-2 control-label">Password Baru</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" placeholder="Password Baru" name="passBaru">
							</div>
						</div>
						<div class="form-group">
							<label for="passKonf" class="col-sm-2 control-label">Konfirmasi Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" placeholder="Konfirmasi Password" name="passKonf">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>