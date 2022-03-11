<!-- App favicon -->
<link rel="shortcut icon" href="<?= base_url('public/assets/main/images/favicon.ico') ?> ">
<!-- Dashboard css -->
<!-- jquery.vectormap css -->
<link href="<?= base_url('public/assets/main/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />

<!-- DataTables -->
<link href="<?= base_url('public/assets/main/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="<?= base_url('public/assets/main/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />

<?php if($pageHas == 'form') { ?>
<!-- Forms Css -->
<link href="<?= base_url('public/assets/main/libs/select2/css/select2.min.css') ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url('public/assets/main/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('public/assets/main/libs/spectrum-colorpicker2/spectrum.min.css') ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url('public/assets/main/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') ?>" rel="stylesheet">
<?php  } ?>

<?php if($pageHas == 'tableView') { ?>
<!-- DataTables -->
<link href="<?= base_url('public/assets/main/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('public/assets/main/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('public/assets/main/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="<?= base_url('public/assets/main/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
<?php  } ?>

<!-- Bootstrap Css -->
<link href="<?= base_url('public/assets/main/css/bootstrap.min.css') ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="<?= base_url('public/assets/main/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="<?= base_url('public/assets/main/css/app.min.css') ?>" id="app-style" rel="stylesheet" type="text/css" />
<!-- Custom Css -->
<link href="<?= base_url('public/assets/main/css/custom.css') ?>" rel="stylesheet" type="text/css" />


<link href="<?= base_url('public/assets/main/css/toastr.min.css') ?>" rel="stylesheet" type="text/css" />

<!-- Website base url -->
<script> var base_url = '<?= base_url(); ?>'; </script> 