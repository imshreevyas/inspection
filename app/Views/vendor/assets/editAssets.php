<!-- header -->
<?php  include(VIEWPATH.'vendor/inc/header.php') ?>

    <div class="main-content">

        <!-- Main content -->
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0"><?= $pageName ?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="<?= base_url($adminURL.'dashboard') ?>">Dashboard</a></li>
                                    <li class="breadcrumb-item active"><?= $pageName ?></li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Enter Client Details</h4>

                                <!-- Vendor Client Fullname -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Client FullName : </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text"  placeholder="eg: Jhon Smith Pvt Ltd" id="clientName" oninput="FirstLetterCapital('#employeeName')">
                                    </div>
                                </div>

                                <!-- Vendor Client Email -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email : </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="eg: jhonsmith@gmail.com" id="clientEmail">
                                    </div>
                                </div>

                                <!-- Vendor Client Contact number -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Contact Number : </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="eg: 7894561230 " id="clientNumber" oninput="OnlyNumber('#clientNumber')">
                                    </div>
                                </div>

                                <!-- vendor Client Full Address -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Full Address : </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="eg: jhonsmith"  id="address">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <button id="addclient" type="button" class="btn btn-primary">Add Client</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- Main content -->

    </div>




<?php  include(VIEWPATH.'vendor/inc/footer.php') ?>
<!-- footer -->

<script src="<?= base_url('public/assets/main/ajaxPages/vendor/clients/addClients.js') ?> "></script>
