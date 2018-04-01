<section id="main-content">
    <section class="wrapper">
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tambah Surat Keluar
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <?php
                                    $notif = $this->session->flashdata('notif');
                                    if($notif != NULL){
                                    echo '<div class="alert alert-danger">'.$notif.'</div>';
                                    }
                                ?>
                                <form role="form" action="<?php echo base_url();?>index.php/surat/edit_surat_keluar/<?php echo $surat->id_surat; ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Surat</label>
                                    <input required type="hidden" name="id_surat_masuk" value="<?php echo $surat->id_surat; ?>">
                                    <input required type="text" class="form-control" id="exampleInputEmail1" name="no_surat" placeholder="Nomor Surat" value="<?php echo $surat->no_surat; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Kirim</label>
                                    <input required type="date" class="form-control" id="exampleInputEmail1" name="tgl_kirim" placeholder="Tanggal Kirim" value="<?php echo $surat->tgl_kirim; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Penerima</label>
                                    <input required type="text" class="form-control" id="exampleInputEmail1" name="penerima" placeholder="Penerima" value="<?php echo $surat->penerima; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Perihal</label>
                                    <input required type="text" class="form-control" id="exampleInputEmail1" name="perihal" placeholder="Perihal" value="<?php echo $surat->perihal; ?>"> 
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>