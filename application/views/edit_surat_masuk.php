<section id="main-content">
    <section class="wrapper">
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Edit Surat Masuk
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <?php
                                    $notif = $this->session->flashdata('notif');
                                    if($notif != NULL){
                                    echo '<div class="alert alert-danger">'.$notif.'</div>';
                                    }
                                ?>
                                <form role="form" action="<?php echo base_url();?>index.php/surat/edit_surat_masuk/<?php echo $surat->id_surat_masuk; ?>" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Surat</label>
                                    <input required type="hidden" name="id_surat_masuk" value="<?php echo $surat->id_surat_masuk ?>">
                                    <input required type="text" class="form-control" id="exampleInputEmail1" name="no_surat" placeholder="Nomor Surat" value="<?php echo $surat->no_surat ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Kirim</label>
                                    <input required type="date" class="form-control" id="exampleInputEmail1" name="tgl_kirim" placeholder="Tanggal Kirim" value="<?php echo $surat->tgl_kirim ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Terima</label>
                                    <input required type="date" class="form-control" id="exampleInputEmail1" name="tgl_terima" placeholder="Tanggal Terima" value="<?php echo $surat->tgl_terima ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pengirim</label>
                                    <input required type="text" class="form-control" id="exampleInputEmail1" name="pengirim" placeholder="Pengirim" value="<?php echo $surat->pengirim ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Perihal</label>
                                    <input required type="text" class="form-control" id="exampleInputEmail1" name="perihal" placeholder="Perihal" value="<?php echo $surat->perihal ?>">
                                </div>
                                
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>