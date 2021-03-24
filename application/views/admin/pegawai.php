<div class="msg" style="display:none;">
    <?= @$this->session->flashdata('msg'); ?>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#settings" data-toggle="tab">Data Pegawai</a></li>
                <li><a href="#password" data-toggle="tab">Tambah Pegawai</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="settings">
                    <div class="box-header">
                        <h3 class="box-title font-weight-bold">Data Pegawai</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Bidang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($pegawai as $item) :
                                ?>
                                    <tr>
                                        <td><?= $item->id ?></td>
                                        <td><?= $item->first_name ?> <?= $item->last_name ?></td>
                                        <td><?= $item->nik ?></td>
                                        <td><?= $item->email ?></td>
                                        <td><?= $item->phone ?></td>
                                        <td><?= $item->id_bidang ?></td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Bidang</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="password">
                    <div class="box-header">
                        <h3 class="box-title font-weight-bold">Tambah Pegawai</h3>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal" action="<?php echo base_url('admin/Pegawai/save') ?>" method="POST" enctype="multipart/form-data">

                            <!-- select -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Role Pegawai</label>
                                <div class="col-sm-10">
                                    <select name="role" class="form-control">
                                        <option>Role Pegawai</option>
                                        <?php
                                        $role =  $this->db->get('tbl_role');
                                        foreach ($role->result() as $role) :
                                        ?>
                                            <option value="<?= $role->id ?>"><?= $role->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Bidang</label>
                                <div class="col-sm-10">
                                    <select name="bidang" class="form-control">
                                        <option>Bidang Pegawai</option>
                                        <?php
                                        $bidang =  $this->db->get('tbl_bidang');
                                        foreach ($bidang->result() as $bidang) :
                                        ?>
                                            <option value="<?= $bidang->id ?>"><?= $bidang->bidang ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">NIK</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="NIK" name="nik">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Depan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama Depan" name="first_name">
                                </div>
                            </div>
                            <div class=" form-group">
                                <label class="col-sm-2 control-label">Nama Belakang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama Belakang" name="last_name">
                                </div>
                            </div>
                            <div class=" form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Telp</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Telp" name="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="passLama" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="pass">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>
</div>