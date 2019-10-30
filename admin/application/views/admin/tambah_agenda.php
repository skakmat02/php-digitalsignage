
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Tambah
              <small>Agenda</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/agenda_aktif">Agenda Aktif</a></li>
              <li class="active">Tambah</li>
              <!--
              <li><a href="#">Layout</a></li>
              <li class="active">Top Navigation</li>
              -->
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Data Tambah Agenda</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open('admin/insert_agenda'); ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Agenda</label>
                      <select name="jenis" id="jenis" class="form-control">
                        <?php  
                        $jenis = $this->db->query("SELECT * FROM tb_jenis_agenda")->result();
                        foreach ($jenis as $l_agenda) {
                          echo "<option  value='$l_agenda->jenis_id'>".ucwords($l_agenda->jenis_agenda)."</option>"; 
                        }
                        ?>
                        
                      </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tgl Agenda</label>
                      <input type="text" class="form-control" name="tgl" id="tgl_agenda" data-date-format="yyyy-mm-dd" placeholder="Tgl agenda" data-provide="datepicker" value="<?php echo date("Y-m-d"); ?>" required />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Judul</label>
                      <input type="text" class="form-control" name="judul" placeholder="Judul" required />
                  </div>
              <!--    <div class="form-group" id="isi">
                    <label for="exampleInputEmail1">Isi</label>
                      <textarea name="isi" class="form-control" cols="30" rows="10"></textarea>
                  </div> -->
                  <div class="form-group">
                    <label for="exampleInputEmail1" id="labelurl">URL/Gambar</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="CyUwtnIIkcw" /><sup id="url" name="url">*https://www.youtube.com/watch?v=<strong>CyUwtnIIkcw </strong> - Youtube ID nya saja yang diambil </sup>
                    <div id="uploaded_image"></div>
                    
    
                  </div>
                 <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Durasi</label>
                    <input type="text" class="form-control" name="durasi" placeholder="Durasi"/>
                  </div> -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select name="status" class="form-control" required>
					<option value="Aktif">Aktif</option>
					<option value="Tidak Aktif">Tidak Aktif</option>
					</select>
                  </div>
                  <div class="form-group">
                    
                    <input readonly type="hidden" value="<?php  echo $this->session->userdata('admin_nama');?>" class="form-control" name="user" placeholder="<?php  echo $this->session->userdata('admin_nama');?>"/>
                  </div>
                  <a href="<?php echo base_url(); ?>admin/agenda_aktif" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php echo form_close(); ?> 
                
                 <div style="border:solid black;padding:10px;background:white;position:absolute;right:5%;top:10vh;" class="form-group" id="upload">
					 <form method="post" id="upload_form" align="center" enctype="multipart/form-data"> 
					 <label id="upload">Pilih Gambar</label> 
                <input type="file" name="image_file" id="image_file" />  
                                <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />  
           </form>
                </div>
               
                
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>

 
