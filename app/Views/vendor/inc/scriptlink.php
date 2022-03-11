<!-- JAVASCRIPT -->
<script src="<?= base_url('public/assets/main/libs/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('public/assets/main/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('public/assets/main/libs/metismenu/metisMenu.min.js') ?>"></script>
<script src="<?= base_url('public/assets/main/libs/simplebar/simplebar.min.js') ?>"></script>
<script src="<?= base_url('public/assets/main/libs/node-waves/waves.min.js') ?>"></script>
<script src="<?= base_url('public/assets/main/libs/jquery-sparkline/jquery.sparkline.min.js') ?>"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>
<script src="<?= base_url('public/assets/main/js/app.js') ?>"></script>

<!-- dashboard -->

<?php if($url == 'dashboard') { ?>
    <!-- apexcharts -->
    <script src="<?= base_url('public/assets/main/libs/apexcharts/apexcharts.min.js') ?>"></script>
    <!-- jquery.vectormap map -->
    <script src="<?= base_url('public/assets/main/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/js/pages/dashboard.init.js') ?>"></script>
<?php  } ?>





<?php if($pageHas == 'form') { ?>
    <!-- Forms Js -->
    <script src="<?= base_url('public/assets/main/libs/select2/js/select2.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/spectrum-colorpicker2/spectrum.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/js/pages/form-advanced.init.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/js/pages/form-element.init.js') ?>"></script>
<?php  } ?>


<?php if($pageHas == 'tableView') { ?>

    <!-- Responsive examples -->
    <script src="<?= base_url('public/assets/main/libs/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>
    <!-- Required datatable js -->
    <script src="<?= base_url('public/assets/main/libs/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
    <!-- Buttons examples -->
    <script src="<?= base_url('public/assets/main/libs/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/jszip/jszip.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/pdfmake/build/pdfmake.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/pdfmake/build/vfs_fonts.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/datatables.net-buttons/js/buttons.colVis.min.js') ?>"></script>

    <script src="<?= base_url('public/assets/main/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/datatables.net-select/js/dataTables.select.min.js') ?>"></script>

    <!-- Responsive examples -->
    <script src="<?= base_url('public/assets/main/libs/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/main/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>

    <!-- Datatable init js -->
    <script src="<?= base_url('public/assets/main/js/pages/datatables.init.js') ?>"></script>
<?php  } ?>


<script src="<?= base_url('public/assets/main/js/toastr.min.js') ?> "></script>
<!-- Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src="<?= base_url('public/assets/main/ajaxPages/commonFunctions.js') ?> "></script>

