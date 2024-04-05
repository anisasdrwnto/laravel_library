<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Perpustakaan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
     <!-- Toastr -->
    <!-- <link rel="stylesheet" href="plugins/toastr/toastr.min.css"> -->
    <!-- jQuery -->
    <!-- <script src="plugins/jquery/jquery.min.js"></script> -->
    <!-- jQuery UI 1.11.4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    
            <!-- jQuery -->
        <script src="<?php echo url(''); ?>/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo url(''); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo url(''); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="<?php echo url(''); ?>/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="<?php echo url(''); ?>/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="<?php echo url(''); ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php echo url(''); ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo url(''); ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="<?php echo url(''); ?>/plugins/moment/moment.min.js"></script>
        <script src="<?php echo url(''); ?>/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?php echo url(''); ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="<?php echo url(''); ?>/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="<?php echo url(''); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo url(''); ?>/dist/js/adminlte.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js"></script>
        <!-- Toastr -->
        <script src="<?php echo url(''); ?>/plugins/toastr/toastr.min.js"></script>
        <script src="assets/js/global.js"></script>
        <!-- bikin script js nanti di bawah sini -->

</head>
<body>
    <div class="container">
        @yield('content')  <!--// @yield('content') digunakan untuk menentukan lokasi di dalam template induk/layout 
        di mana konten spesifik dari halaman anak (child page) akan diisikan.
        Misalnya, di halaman anak, kita dapat menggunakan @section('content') untuk
        menentukan blok konten yang akan diisi pada bagian ini.--->
    </div>
</body>
</html>