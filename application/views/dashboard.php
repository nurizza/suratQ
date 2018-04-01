<section id="main-content">
    <section class="wrapper">
     <?php if($this->session->userdata('jabatan') == "Sekretaris"){?>
                 <div class="market-updates">
                    <a href="<?php echo base_url();?>index.php/surat/lihat_surat_masuk">
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-2">
                     <div class="col-md-8 market-update-left">
                     <h4>Surat </h4>
                    <h3>Masuk</h3>
                    <p>Sekretris</p>
                  </div>
                  <div class="clearfix"> </div>
                </div>
            </div>
            </a>
            <a href="<?php echo base_url();?>index.php/surat/lihat_surat_keluar">
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-1">
                    <div class="col-md-8 market-update-left">
                    <h4>Surat </h4>
                    <h3>Keluar</h3>
                    <p>Sekretris</p>
                    </div>
                  <div class="clearfix"> </div>
                </div>
            </div> 
            </a>
          <?php  }else{?>
                  
                     
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-3">
                    <div class="col-md-8 market-update-left">
                        <h4>Lihat </h4>
                        <h3>Disposisi</h3>
                        <p>Pegawai</p>
                    </div>
                  <div class="clearfix"> </div>
                </div>
            </div>
           <div class="clearfix"> </div>
        </div>  
 
                  
          <?php  }?>
       

       
        <!-- //calendar -->
       
            <!-- tasks -->  
