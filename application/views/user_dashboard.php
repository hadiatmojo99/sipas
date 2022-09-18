<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">            
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $surat_masuk?></h3>

                <p>Jumlah Surat Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          
        </div>
        <!-- /.row -->

        <!-- Main row -->
          <section class="connectedSortable ui-sortable">            

              <div class="row">

<!-- Pie Chart -->

<!-- Bar Chart -->

<div class="col-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header">                    
            <h5>Dashboard</h5>
        </div>        
        <!-- Card Body -->
        <div class="card-body">
        <p>Hai, Selamat datang <?= $this->session->userdata('nama');?>! Data diatas adalah jumlah surat yang ditujukan kepada Anda.</p>
        </div>
    </div>
</div>

</div>          

          </section>
      </div>
    </section>
</div>