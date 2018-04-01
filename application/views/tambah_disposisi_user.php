<section id="main-content">
    <section class="wrapper">
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tambah Disposisi Sekretaris
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <?php
                                    $notif = $this->session->flashdata('notif');
                                    if($notif != NULL){
                                    echo '<div class="alert alert-danger">'.$notif.'</div>';
                                    }
                                ?>
                                <form role="form" action="<?php echo base_url();?>index.php/surat_user/tambah_disposisi/<?php echo $this->uri->segment(3);?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tujuan Unit</label>
                                     <select class="form-control m-bot15" name="id_pengirim" onchange="get_pegawai_by_jabatan(this.value)">
                                        <option>-- Pilih Nama Pegawai --</option>
                                        <?php
                                            foreach ($jabatan as $key) {
                                                if($key->id_jabatan != $this->session->userdata('level') && $key->id_jabatan > $this->session->userdata('level') ){
                                                    echo '
                                                    <option value="'.$key->id_jabatan.'">'.$key->nama_jabatan.'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tujuan Pegawai</label>
                                    <select class="form-control m-bot15"  name="id_pegawai_penerima" id="tujuan_pegawai">
                                        <option value="">-- Pilih Nama Pegawai --</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Keterangan</label>
                                    <textarea type="text" class="form-control" id="exampleInputEmail1" name="keterangan" placeholder="Keterangan"></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>

        <script type="text/javascript">
             function get_pegawai_by_jabatan(id_jabatan)
        {
            // empty - untuk hapus di tujuan pegawai biar 
            $('#tujuan_pegawai').empty();
            // append untuk nambah di tujuan pegawai
            //<option value="'+value.id_pegawai+'">'+value.nama+'</option> ini dari controller get_pegawai
            //+id_jabatan adalah parameter
            $.getJSON('<?php echo base_url(); ?>index.php/surat_user/get_pegawai_by_jabatan/'+id_jabatan, function(data){
                $.each(data, function(index,value){
                    $('#tujuan_pegawai').append('<option value="'+value.id_user+'">'+value.nama+'</option>');
                })
            });
        }
        </script>