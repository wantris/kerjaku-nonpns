<div class="msg" style="display:none;">
    <?= @$this->session->flashdata('msg'); ?>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#settings" data-toggle="tab">Edit SKP</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="password">
                    <div class="box-header">
                        <h3 class="box-title font-weight-bold">Edit SKP</h3>
                    </div>
                    <div class="box-body">
                        <?php
                        foreach ($skp as $skp) :
                        ?>
                            <form class="form-horizontal" action="<?php echo base_url('pegawai/skp/update/' . $skp->id) ?>" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Uraian</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?= $skp->uraian ?>" class="form-control" placeholder="Uraian" name="uraian">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Output</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?= $skp->output ?>" class="form-control" placeholder="Output" name="output">
                                    </div>
                                </div>
                                <div class=" form-group">
                                    <label class="col-sm-2 control-label">Mutu</label>
                                    <div class="col-sm-10">
                                        <input type="number" value="<?= $skp->mutu ?>" class="form-control" placeholder="Mutu" name="mutu">
                                    </div>
                                </div>
                                <div class=" form-group">
                                    <label class="col-sm-2 control-label">Waktu</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?= $skp->waktu ?>" class="form-control" placeholder="Waktu" name="waktu">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Biaya</label>
                                    <div class="col-sm-10">
                                        <input type="number" value="<?= $skp->biaya ?>" class="form-control" placeholder="Biaya" name="biaya">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
                                    </div>
                                </div>
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