<div class="msg" style="display:none;">
    <?= @$this->session->flashdata('msg'); ?>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#settings" data-toggle="tab">Data SKP</a></li>
                <li><a href="#password" data-toggle="tab">Tambah SKP</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="settings">
                    <div class="box-header">
                        <h3 class="box-title font-weight-bold">Data SKP</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NIK</th>
                                    <th>Nama Pegawai</th>
                                    <th>Uraian</th>
                                    <th>Waktu</th>
                                    <th>Mutu</th>
                                    <th>Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($skp->result() as $item) :
                                ?>
                                    <tr>
                                        <td><?= $item->id ?></td>
                                        <td><?= $item->nik ?> </td>
                                        <td><?= $item->first_name ?> </td>
                                        <td><?= $item->uraian ?> </td>
                                        <td><?= $item->waktu ?></td>
                                        <td><?= $item->mutu ?></td>
                                        <td><?= $item->biaya ?></td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>NIK</th>
                                    <th>Nama Pegawai</th>
                                    <th>Uraian</th>
                                    <th>Waktu</th>
                                    <th>Mutu</th>
                                    <th>Biaya</th>
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
                        <form class="form-horizontal" action="<?php echo base_url('admin/skp/save') ?>" method="POST" enctype="multipart/form-data">

                            <!-- select -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pegawai</label>
                                <div class="col-sm-10">
                                    <select name="user_id" class="form-control">
                                        <option>Pegawai</option>
                                        <?php
                                        $user =  $this->db->get('tbl_user');
                                        foreach ($user->result() as $user) :
                                        ?>
                                            <option value="<?= $user->id ?>"><?= $user->first_name ?> <?= $user->last_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Uraian</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Uraian" name="uraian">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Output</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Output" name="output">
                                </div>
                            </div>
                            <div class=" form-group">
                                <label class="col-sm-2 control-label">Mutu</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" placeholder="Mutu" name="mutu">
                                </div>
                            </div>
                            <div class=" form-group">
                                <label class="col-sm-2 control-label">Waktu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Waktu" name="waktu">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Biaya</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" placeholder="Biaya" name="biaya">
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