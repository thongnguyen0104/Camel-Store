<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Camel-Store</title>
  <link rel="icon" href="<?= PUBLIC_URL ?>/img/camel-logo.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= PUBLIC_URL . "/admin" ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= PUBLIC_URL . "/admin" ?>/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= PUBLIC_URL . "/admin" ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= PUBLIC_URL . "/admin" ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= PUBLIC_URL . "/admin" ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= PUBLIC_URL . "/admin" ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini">
  <?php require_once(VIEW . "/admin/shared/sidebar.php") ?>

  <?php require_once(VIEW . "/admin/shared/header.php") ?>

  <div class="content-wrapper">

    <?php require_once(VIEW . $view . '.php') ?>

  </div>

  <?php require_once(VIEW . "/admin/shared/footer.php") ?>

  <!-- jQuery -->
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= PUBLIC_URL . "/admin" ?>/dist/js/adminlte.js"></script>

  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/chart.js/Chart.min.js"></script>
  <!-- Page specific script -->

  <!-- DataTables  & Plugins -->
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/jszip/jszip.min.js"></script>
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= PUBLIC_URL . "/admin" ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
      myInput.focus()
    })
  </script>

  <script>
    $(function() {
      $('#myTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true, //Trung bor
        "autoWidth": false, //Trung bor
        "responsive": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#myTable_wrapper .col-md-6:eq(0)');
    });
  </script>



<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Sản phẩm',
          'Loại sản phẩm',
          'Hóa đơn',
          'Người dùng',
          'Bình luận',
          'Khuyến mãi',
      ],
      datasets: [
        {
          data: [65,9,27,12,37,7],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
  })
</script>


</body>

</html>