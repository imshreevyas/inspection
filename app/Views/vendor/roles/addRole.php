<!-- header -->
<?php include VIEWPATH . 'vendor/inc/header.php'?>
    <div class="main-content">

        <!-- Main content -->
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0"><?=$pageName?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="<?=base_url($adminURL . 'dashboard')?>">Dashboard</a></li>
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

                                <h4 class="card-title">Basic Roles Details</h4>
                                    <form action="<?= base_url('vendor/'.$username.'/dataInsertRole'); ?>" method="POST">
                                    <!-- vendor username -->
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Role Name : </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="roleName" type="text" placeholder="eg: jhonsmith"  id="username">
                                        </div>
                                    </div>
                                    <hr>
                                    <h3 class="card-title">Select Roles</h3>

                                    <!-- Vendor Fullname -->
                                    <div class="row mb-3">
                                        <?php if(count($vendorSidebar) > 0) { 
                                                foreach($vendorSidebar as $key=>$singleData){
                                        ?>
                                        <div class="col-sm-2" style="margin-bottom:15px;padding:10px;border-bottom:1px solid #363d4e">
                                        
                                            <label for="example-text-input" class="col-form-label">
                                                <strong><?= $singleData['sidebar_name'] ?></strong> 
                                            </label>

                                            <?php if($singleData['add_access'] == 1){  ?>
                                                <label class="form-check">
                                                    <input type="checkbox" name="role[<?= $singleData['sidebar_url'] ?>][]" value="add" id="add" class="form-check-input">
                                                    <span class="badge badge-soft-success">Add Access</span>
                                                </label>
                                            <?php } if($singleData['view_access'] == 1){  ?>
                                                <label class="form-check">
                                                    <input type="checkbox" name="role[<?= $singleData['sidebar_url'] ?>][]" value="view" id="view" class="form-check-input">
                                                    <span class="badge badge-soft-success">View Access</span>
                                                </label>
                                            <?php } if($singleData['edit_access'] == 1){  ?>
                                                <label class="form-check">
                                                    <input type="checkbox" name="role[<?= $singleData['sidebar_url'] ?>][]" value="edit" id="edit" class="form-check-input">
                                                    <span class="badge badge-soft-success">Edit Access</span>
                                                </label>
                                            <?php } if($singleData['update_access'] == 1){  ?>
                                                <label class="form-check">
                                                    <input type="checkbox" name="role[<?= $singleData['sidebar_url'] ?>][]" value="update" id="update_status" class="form-check-input">
                                                    <span class="badge badge-soft-success">Update Status Access</span>
                                                </label>
                                            <?php }  ?>
                                        </div>
                                        <?php
                                                }  
                                            }
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-primary" id="addrole">Add role</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- Main content -->
    </div>
<?php include VIEWPATH . 'vendor/inc/footer.php'?>

<?php $errors = session('errorMsg'); if($errors != ''){ 
    foreach($errors as $error){
?>
    <script>
        toastr['<?= session('errorType') ?>']('<?= $error ?>');
    </script>
<?php 
        }
    } 
    session()->remove(['errorMsg','errorType']);  
?>