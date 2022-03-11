<!-- header -->
<?php  include(VIEWPATH.'Admin/inc/header.php') ?>

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

                                <h4 class="card-title">Add Sidebar</h4>

                                <!-- sidebar parent name -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Parent Label Name : </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text"  placeholder="eg: Sidebar Section"
                                            id="parent">
                                    </div>
                                </div>

                                <!-- sidebar name -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Sidebar Name : </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="eg: Add Sidebar / Manage Sidebar"
                                            id="name">
                                    </div>
                                </div>

                                <!-- sidebar url -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Sidebar URL :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="eg: addSidebar "
                                            id="url">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Sidebar Icon :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="eg: ri-account-circle-line"
                                            id="icon">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Select Page Access <a onclick="showCheckBoxExplaination('largeModal')" style="cursor: pointer;"><i class="fa fa-info-circle"></i></a> : </label>
                                    <div class="col-md-10">
                                        <label class="form-check">
                                        <input type="checkbox" id="add" class="form-check-input">
                                        <span class="form-check-label">Add Access</span>
                                        </label>
                                        <label class="form-check">
                                        <input type="checkbox" id="view" class="form-check-input">
                                        <span class="form-check-label">View Access</span>
                                        </label>
                                        <label class="form-check">
                                        <input type="checkbox" id="edit" class="form-check-input">
                                        <span class="form-check-label">Edit Access</span>
                                        </label>
                                        <label class="form-check">
                                        <input type="checkbox" id="update_status" class="form-check-input">
                                        <span class="form-check-label">Update Status Access</span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row" id="largeModal" style="padding:10px;cursor:pointer;">
                                    <h6>* Explaination of Checkbox</h6>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul>
                                            <li> <b>Add Checkbox</b> : If the page has functionality of adding any data to database the check this </li>
                                            <li> <b>Edit Checkbox</b> : If the page has functionality of Editing any data then check this </li>
                                            <li> <b>View Checkbox </b>: If the page has functionality of Viewing any data like datatable or records then check this </li>
                                            <li> <b>Update Status Checkbox </b>: If the page has functionality of Updating any data like eg: activating / deactivating the user then check this </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <button id="addsidebar" type="button" class="btn btn-primary">Add Sidebar</button>
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




<?php  include(VIEWPATH.'Admin/inc/footer.php') ?>
<!-- footer -->

<script src="<?= base_url('public/assets/main/ajaxPages/addSidebar.js') ?> "></script>
