<section id="main-content">
    <section class="wrapper">
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit File Surat Masuk
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <?php
                                    $notif = $this->session->flashdata('notif');
                                    if($notif != NULL){
                                    echo '<div class="alert alert-danger">'.$notif.'</div>';
                                    }
                                ?>
                                <form role="form" action="<?php echo base_url();?>index.php/surat/edit_file_surat_masuk/<?php echo $surat->id_surat_masuk; ?>" method="post" enctype="multipart/form-data">
                               
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input required type="hidden" name="id_surat_masuk" value="<?php echo $surat->id_surat_masuk ?>">
                                    <input required type="file" id="exampleInputFile" name="file_surat">
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>