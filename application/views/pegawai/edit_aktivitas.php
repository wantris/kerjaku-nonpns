<div class="msg" style="display:none;">
    <?= @$this->session->flashdata('msg'); ?>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#settings" data-toggle="tab">Edit Aktivitas</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="password">
                    <div class="box-header">
                        <h3 class="box-title font-weight-bold">Edit Aktivitas</h3>
                    </div>
                    <div class="box-body">
                        <?php
                        foreach ($ak as $ak) :
                        ?>
                            <form action="<?php echo base_url('Pegawai/Aktivitas/update/' . $ak->id); ?>" method="post">
                                <div class="form-group">
                                    <label>Tanggal:</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" value="<?= $ak->tanggal ?> " class="form-control" name="tanggal">
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
                                        <input type="text" class="form-control" value="<?= $ak->uraian_aktifitas ?> " name="aktivitas">
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
                                        <input type="text" class="form-control" value="<?= $ak->kuantitas ?> " name="kuantitas">
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
                                        <input type="text" class="form-control" value="<?= $ak->waktu ?> " name="waktu">
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label>Catatan:</label>


                                    <textarea name="catatan" class="form-control" style="height: 100px;"><?= $ak->catatan ?> </textarea>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </form>
                        <?php
                        endforeach;
                        ?>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>
</div>