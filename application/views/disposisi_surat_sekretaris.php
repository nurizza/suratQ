<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">

    <div class="panel-heading">
      Diposisi Surat
    </div>

    <div class="row w3-res-tb">

      <?php
        $notif = $this->session->flashdata('notif');
        if($notif != NULL){
        echo '<div class="alert alert-danger">'.$notif.'</div>';
       }
      ?>

      <div class="col-sm-5 m-b-xs">
        <a href="<?php echo base_url();?>index.php/surat/tambah_disposisi_sekretaris_view/<?php echo $this->uri->segment(3)?>" class="btn btn-success"><i class="fa fa-plus"></i>Tambah Disposisi</a><br><br>
                 
      </div>
      <div class="col-sm-4">
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>No</th>
            <th>Pengirim</th>
            <th>Penerima</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
            <?php 
              $no = 1;
              foreach ($surat as $data) {
                echo '
                <tr>
                <td>'.$no++.'</td>
                <td>'.$data->nama_jabatan.'</td>
                <td>'.$data->nama.'</td>
                <td>'.$data->keterangan.'</td>
                <td>
                  <a href="'.base_url('uploads/'.$data->file_surat).'" target="_blank" class="btn btn-info">Lihat</a>
                  <a href="'.base_url('index.php/surat/hapus_disposisi/'.$data->id_disposisi).'" class="btn btn-danger">Hapus</a>
                </td>
                </tr>
                ';
              }
                ?>
              
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section