<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $agenda_aktif ?></h3>
                  <p>Daftar Agenda Aktif</p>
                </div>
                <div class="icon">
                  <i class="fa fa-calendar"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/agenda_aktif" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $agenda_nonaktif; ?></h3>
                  <p>Daftar Agenda Tidak Aktif</p>
                </div>
                <div class="icon">
                  <i class="fa fa-calendar-o"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/agenda_nonaktif" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $agenda_marquee; ?></h3>
                  <p>Daftar Agenda Marquee</p>
                </div>
                <div class="icon">
                  <i class="fa fa-newspaper-o"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/agenda_marquee" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
          </div>
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box 
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $jenis; ?></h3>
                  <p>Jenis Agenda</p>
                </div>
                <div class="icon">
                  <i class="fa fa-tag"></i>
                </div>
                <a href="<?php echo base_url(); ?>admin/jenis_surat" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
