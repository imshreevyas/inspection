<!-- header -->
<?php  include(VIEWPATH.'Vendor/inc/header.php') ?>

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
                                        <th>Name</th>
                                        <th>Product Code</th>
                                        <th>Client Name</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                        <th>Status</th>

                                        <!-- if given option to edit, update, delete -->
                                        <th>Edit</th>
                                        <th>Activate / Deactivate</th>
                                    </tr>
                                </thead>


                                <tbody>

                                <?php $i =1; if(count($allClients) > 0){
                                    foreach($allClients as $singleData){
                                    ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $singleData['name'] ?></td>
                                        <td><?= $singleData['product_code'] ?></td>
                                        <td><?= getDirectValue('vendor_clients','name','id',$singleData['client_id']) ?></td>
                                        <td><?= getDirectValue('vendor_emp','name','id',$singleData['created_by']) ?></td>
                                        <td><?= $singleData['created_date'] ?></td>
                                        <td><?= $singleData['status'] == 1 ? '<span class="badge badge-soft-success font-size-13">Active</span>' : '<span class="badge badge-soft-danger font-size-13">Deactive</span>' ?></td>
                                        <td>
                                            <a href="<?= base_url('/vendor/'.$vendorUsername.'/editAsset/'.$singleData['id']) ?>" class="btn btn-sm btn-primary">
                                                <i class="ri-pencil-fill"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <input type="checkbox" id="switch1" switch="bool" <?= $singleData['status'] == 1 ? 'checked' : '' ?> />
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

<?php  include(VIEWPATH.'Vendor/inc/footer.php') ?>
<!-- footer -->