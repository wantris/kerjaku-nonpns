<div class="msg" style="display:none;">
    <?= @$this->session->flashdata('msg'); ?>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#settings" data-toggle="tab">Data Aktivitas</a></li>
                <li><a href="#password" data-toggle="tab">Tambah Aktivitas</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="settings">
                    <div class="box-header">
                        <h3 class="box-title font-weight-bold">Aktivitas Pegawai</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Uraian Aktivitas</th>
                                    <th>Kuantitas/Output</th>
                                    <th>Waktu</th>
                                    <th>Catatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($ak->result() as $item) :
                                ?>
                                    <tr>
                                        <td><?= $item->id ?></td>
                                        <td><?= $item->first_name ?> <?= $item->last_name ?></td>
                                        <td><?= $item->tanggal ?></td>
                                        <td><?= $item->uraian_aktifitas ?></td>
                                        <td><?= $item->kuantitas ?></td>
                                        <td><?= $item->waktu ?></td>
                                        <td><?= $item->catatan ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary" style="margin-right: 10px;">Edit</button>
                                                <button type="button" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Uraian Aktivitas</th>
                                    <th>Kuantitas/Output</th>
                                    <th>Waktu</th>
                                    <th>Catatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="password">
                    <div class="box-header">
                        <h3 class="box-title font-weight-bold">Tambah Aktivitas Pegawai</h3>
                    </div>
                    <div class="box-body">
                        <form action="<?php echo base_url(); ?>Pegawai/Aktivitas/save" method="post">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label>Pegawai</label>

                                <div class="input-group">
                                    <select name="user_id" class="form-control">
                                        <option>Pilih Pegawai</option>
                                        <?php
                                        $role =  $this->db->get('tbl_user');
                                        foreach ($role->result() as $role) :
                                        ?>
                                            <option value="<?= $role->id ?>"><?= $role->first_name ?> <?= $role->last_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="date" class="form-control" name="tanggal">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <!-- phone mask -->
                            <div class="form-group">
                                <label>Uraian Aktivitas:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-address-card" aria-hidden="true"></i>

                                    </div>
                                    <input type="text" class="form-control" name="aktivitas">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <!-- phone mask -->
                            <div class="form-group">
                                <label>Kuantitas:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clone" aria-hidden="true"></i>

                                    </div>
                                    <input type="text" class="form-control" name="kuantitas">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <!-- IP mask -->
                            <div class="form-group">
                                <label>Waktu:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>

                                    </div>
                                    <input type="text" class="form-control" name="waktu">
                                </div>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Catatan:</label>


                                <textarea name="catatan" class="form-control" style="height: 100px;"></textarea>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-primary">
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>
</div>