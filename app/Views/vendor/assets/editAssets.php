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

                                <h4 class="card-title">Enter Assets Details</h4>

                                <!-- Vendor Assets Name -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Asset name : </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text"  placeholder="eg: Printing Machine" id="assetName" oninput="FirstLetterCapital('#assetName')">
                                    </div>
                                </div>

                                <!-- Vendor Assets Code -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Asset Code : </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text"  placeholder="eg: ASD465A4SD1333" id="assetCode" oninput="FirstLetterCapital('#assetCode')">
                                    </div>
                                </div>

                                <!-- Vendor Assets Client Dropdown -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Select Client : </label>
                                    <div class="col-sm-10">
                                        <select name="clients" id="clients" class="form-control">
                                            <option value="0" selected disabled>Select Client Name</option>
                                            <?php if(count($allClients) > 0): foreach($allClients as $singleClients) : ?>
                                                <option value="<?= $singleClients['id'] ?>"><?= $singleClients['name'] ?></option>
                                            <?php endforeach; endif; ?>
                                            <option value="-1">Other Client</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Vendor Assets Other Client Name  -->
                                <div class="row mb-3 d-none" id="assetOtherClientDiv">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Other Client Name : </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text"  placeholder="eg: Jhon" id="assetOtherClient">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <button id="addasset" type="button" class="btn btn-primary">Add Asset</button>
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

<script src="<?= base_url('public/assets/main/ajaxPages/vendor/assets/addAssets.js') ?> "></script>
