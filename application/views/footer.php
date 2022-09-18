 <!-- /.card -->
 </section>
          <!-- /.Left col -->          
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->  
<footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://instagram.com/hadiatmojo99">Hadi Atmojo</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> BETA
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- SweetAlert -->
<script src="<?=base_url() ?>assets/package/dist/sweetalert2.all.min.js"></script>
<script src="<?=base_url() ?>assets/js/myscript.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script>

<!-- Chart (Diagram) -->
<script>
const ctx = document.getElementById('diagram').getContext('2d');
const diagram = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Surat Masuk', 'Surat Keluar'],    
        datasets: [{
          label: '',
          data: [<?= $graphh;?>,<?= $graph;?>],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {    
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }    
});
</script>
<script>
  $( function() {
    $( "#tgl_keluar" ).datepicker({
      dateFormat : 'yy-mm-dd',
      changeMonth: true,
      changeYear: true
    });
    $( "#tgl_masuk" ).datepicker({
      dateFormat : 'yy-mm-dd',
      changeMonth: true,
      changeYear: true
    });
    $( "#tgl_surat" ).datepicker({
      dateFormat : 'yy-mm-dd',
      changeMonth: true,
      changeYear: true
    });
    $( "#tgl_disposisi" ).datepicker({
      dateFormat : 'yy-mm-dd',
      changeMonth: true,
      changeYear: true
    });
    $( "#tgl_mulai" ).datepicker({
      dateFormat : 'yy-mm-dd',
      changeMonth: true,
      changeYear: true
    });
    $( "#tgl_akhir" ).datepicker({
      dateFormat : 'yy-mm-dd',
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
  <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<script>
    function goBack() {
        window.history.back();
    }
</script>
</body>
</html>
