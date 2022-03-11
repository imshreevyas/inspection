<!-- header -->
<?php  include(VIEWPATH.'vendor/inc/header.php') ?>

    <div class="main-content">

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
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Role Name</th>
                                        <th>Panel Name</th>
                                        <th>Created Date</th>
                                        <th>Status</th>

                                        <!-- if given option to edit, update, delete -->
                                        <th>Edit</th>
                                        <th>Activate / Deactivate</th>
                                        <!-- if given option to edit, update, delete -->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; if(count($allRoles) > 0){ 
                                    foreach($allRoles as $singleData){ ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $singleData['role_name'] ?></td>
                                        <td>Vendor</td>
                                        <td><?= date('d M Y h:i:s a' , strtotime($singleData['created_date'])) ?></td>
                                        <td><?= $singleData['status'] == 1 ? '<span class="badge badge-soft-success font-size-13">Active</span>' : '<span class="badge badge-soft-danger font-size-13">Deactive</span>' ?></td>
                                        <!-- if given option to edit, update, delete -->
                                        <td>
                                            <a  href="<?= base_url('/vendor/'.$username.'/editRole/'.$singleData['id']) ?>" type="button" class="btn btn-sm btn-primary">
                                                <i class="ri-pencil-fill"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <input type="checkbox" id="switch<?= $i ?>" switch="bool" checked />
                                            <label for="switch<?= $i ?>" data-on-label="Yes" data-off-label="No"></label>
                                        </td>
                                        <!-- if given option to edit, update, delete -->
                                        
                                    </tr>
                                <?php $i++; } } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>

    </div>

    <?php include VIEWPATH . 'vendor/inc/footer.php'?>
<!-- footer -->