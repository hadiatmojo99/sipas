<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
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
          <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $surat_masuk?></h3>

                <p>Jumlah Surat Masuk</p>
              </div>
              <div class="icon">                
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?= $surat_keluar?></h3>

                <p>Jumlah Surat Keluar</p>
              </div>
              <div class="icon">                
              </div>
            </div>
          </div>
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
            <center><h5>Data Surat Tahun <?= date('Y')?></h5></center>
        </div>        
        <!-- Card Body -->
        <div class="card-body">
        <canvas class="chart chartjs-render-monitor" id="diagram"width="578" height="130"></canvas>
        </div>
    </div>
</div>

</div>          

          </section>
      </div>
    </section>
</div>