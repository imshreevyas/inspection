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

                                <!-- Vendor Schedule Inspection Task -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Inspection Task: </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text"  placeholder="eg: Printing Machine" id="inspectionTask">
                                    </div>
                                </div>

                                <!-- Vendor Schedule Inspection Task Deescription -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Asset Code : </label>
                                    <div class="col-sm-10">
                                        <textares class="form-control" type="text"  placeholder="eg: ASD465A4SD1333" id="inspectionTaskDesc" oninput="FirstLetterCapital('#assetCode')"></textarea>
                                    </div>
                                </div>

                                <!-- Vendor Schedule Inspection Employees to assign -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Select Employee : </label>
                                    <div class="col-sm-10">
                                        <select class="select2 form-control select2-multiple" inspection="inspectionEmp" multiple="multiple" data-placeholder="Choose Employees">
                                            <?php if(count($allEmployees) > 0): foreach($allEmployees as $singleEmployees) : ?>
                                                <option value="<?= $singleEmployees['id'] ?>"><?= $singleEmployees['name'] ?></option>
                                            <?php endforeach; endif; ?>
                                            <option value="-1">Other Employee</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Vendor Schedule Inspection Assets Dropdown -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Select Asset : </label>
                                    <div class="col-sm-10">
                                        <select class="select2 form-control" name="inspectionAssets" data-placeholder="Choose Assets">
                                            <?php if(count($allAssets) > 0): foreach($allAssets as $singleAssets) : ?>
                                                <option value="<?= $singleAssets['id'] ?>"><?= $singleAssets['name'] ?></option>
                                            <?php endforeach; endif; ?>
                                            <option value="-1">Other Asset</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Vendor Assets Other Employee Name  -->
                                <div class="row mb-3 d-none" id="assetOtherClientDiv">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Other Employee Name : </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text"  placeholder="eg: Jhon" id="otherInspectionEmp">
                                    </div>
                                </div>

                                <!-- Vendor Assets Other Assets Name  -->
                                <div class="row mb-3 d-none" id="assetOtherClientDiv">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Other Asset Name : </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text"  placeholder="eg: Jhon" id="otherInspectionAsset">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-3">
                                        <button id="addInspection" type="button" class="btn btn-primary">Add Asset</button>
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
