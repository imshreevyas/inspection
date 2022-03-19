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

                                <h4 class="card-title">Enter Employee Details</h4>

                                <!-- Vendor Fullname -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Employee FullName : </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text"  placeholder="eg: Jhon Smith Pvt Ltd" id="companyName" value="<?= $singleEmployees['name'] ?>">
                                    </div>
                                </div>

                                <!-- vendor username -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Username : </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="eg: jhonsmith"  id="username" value="<?= $singleEmployees['username'] ?>">
                                    </div>
                                </div>

                                <!-- Vendor Email -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email : </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="eg: jhonsmith@gmail.com" id="companyEmail" value="<?= $singleEmployees['email'] ?>">
                                    </div>
                                </div>

                                <!-- Vendor Contact number -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Contact Number : </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="eg: 7894561230 " id="companyNumber" value="<?= $singleEmployees['mobile'] ?>">
                                    </div>
                                </div>
                                
                                <!-- Select Package dropdown -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Select Role : </label>
                                    <div class="col-sm-10">
                                        <select name="role_id" class="form-control" id="role_id">
                                            <?php foreach($allRoles as $key => $singleRoles){ ?>
                                            <option value="<?= $singleEmployees['role_id'] ?>" <?= $singleEmployees['role_id'] == $singleRoles['id'] ? 'selected' : '' ?> > <?= $singleRoles['role_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">New Password :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Enter Password" id="password">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-3">
                                        <button id="editvendor" type="button" class="btn btn-primary">Edit Employee</button>
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

<script src="<?= base_url('public/assets/main/ajaxPages/vendor/editEmployee.js') ?> "></script>
