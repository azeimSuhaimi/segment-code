
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Personal Bootstrap Template</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets_portfolio');?>/img/favicon.png" rel="icon">
  <link href="<?= base_url('assets_portfolio');?>/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets_portfolio');?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets_portfolio');?>/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url('assets_portfolio');?>/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url('assets_portfolio');?>/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url('assets_portfolio');?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets_portfolio');?>/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets_portfolio');?>/css/style.css" rel="stylesheet">


  <script src="<?= base_url();?>asset/jquery/jquery-3.4.1.js"></script>
  <script src="<?= base_url();?>asset/swal/sweetalert2.all.min.js"></script>


  <style>

body {
  font-family: "Open Sans", sans-serif;
  background-color: #040404;
  color: #fff;
  position: relative;
  background: transparent;
}

body::before {
  content: "";
  position: fixed;
  background: #040404 url("<?= base_url('assets_portfolio/img/'.$home['image']);?>") top right no-repeat;
  background-size: cover;
  left: 0;
  right: 0;
  top: 0;
  height: 100vh;
  z-index: -1;
}

  </style>
  
</head>

<body>

