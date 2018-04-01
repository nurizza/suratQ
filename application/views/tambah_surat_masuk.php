<section id="main-content">
    <section class="wrapper">
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tambah Surat Masuk
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <?php
                                    $notif = $this->session->flashdata('notif');
                                    if($notif != NULL){
                                    echo '<div class="alert alert-danger">'.$notif.'</div>';
                                    }
                                ?>
                                <form role="form" action="<?php echo base_url('index.php/surat/tambah_surat_masuk');?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Surat</label>
                                    <input required type="text" class="form-control" id="exampleInputEmail1" name="no_surat" placeholder="Nomor Surat">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Kirim</label>
                                    <input required type="date" class="form-control" id="exampleInputEmail1" name="tgl_kirim" placeholder="Tanggal Kirim">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Terima</label>
                                    <input required type="date" class="form-control" id="exampleInputEmail1" name="tgl_terima" placeholder="Tanggal Terima">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pengirim</label>
                                    <input required type="text" class="form-control" id="exampleInputEmail1" name="pengirim" placeholder="Pengirim">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Perihal</label>
                                    <input required type="text" class="form-control" id="exampleInputEmail1" name="perihal" placeholder="Perihal">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input required type="file" id="exampleInputFile" name="file_surat">
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>