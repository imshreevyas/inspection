<!-- header -->
<?php  include(VIEWPATH.'Admin/inc/header.php') ?>

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
                                        <th>Parent Name</th>
                                        <th>Name</th>
                                        <th>Url</th>
                                        <th>Icon</th>
                                        <th>Panel</th>
                                        <th>Add Access</th>
                                        <th>Edit Access</th>
                                        <th>View Access</th>
                                        <th>Update Access</th>
                                        <th>Created Date</th>
                                        <th>Status</th>

                                        <!-- if given option to edit, update, delete -->
                                        <th>Edit</th>
                                        <th>Activate / Deactivate</th>
                                    </tr>
                                </thead>


                                <tbody>

                                <?php $i = 1; if(count($allSidebar) > 0){ 
                                    foreach($allSidebar as $singleData){ ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $singleData['parent_name'] ?></td>
                                        <td><?= $singleData['sidebar_name'] ?></td>
                                        <td><?= $singleData['sidebar_url'] ?></td>
                                        <td><?= $singleData['sidebar_icon'] ?></td>
                                        <td><?= $singleData['panel_type'] == 1 ? 'Admin' : 'Vendor' ?></td>
                                        <td><?= $singleData['add_access'] == 1 ? '<span class="badge badge-soft-success font-size-13">Has Access</span>' : '<span class="badge badge-soft-danger font-size-13">No Access</span>' ?></td>
                                        <td><?= $singleData['edit_access'] == 1 ? '<span class="badge badge-soft-success font-size-13">Has Access</span>' : '<span class="badge badge-soft-danger font-size-13">No Access</span>' ?></td>
                                        <td><?= $singleData['view_access'] == 1 ? '<span class="badge badge-soft-success font-size-13">Has Access</span>' : '<span class="badge badge-soft-danger font-size-13">No Access</span>' ?></td>
                                        <td><?= $singleData['update_access'] == 1 ? '<span class="badge badge-soft-success font-size-13">Has Access</span>' : '<span class="badge badge-soft-danger font-size-13">No Access</span>' ?></td>
                                        <td><?= $singleData['created_date'] ?></td>
                                        <td><?= $singleData['status'] == 1 ? '<span class="badge badge-soft-success font-size-13">Active</span>' : '<span class="badge badge-soft-danger font-size-13">Deactive</span>' ?></td>
                                        <td>
                                            <a href="<?= base_url('/mainAdmin/editSidebar/'.$singleData['id']) ?>" class="btn btn-sm btn-primary">
                                                <i class="ri-pencil-fill"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <input type="checkbox" id="switch1" switch="bool" checked />
                                            <label for="switch1" data-on-label="Yes" data-off-label="No"></label>
                                        </td>
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

<?php  include(VIEWPATH.'Admin/inc/footer.php') ?>
<!-- footer -->