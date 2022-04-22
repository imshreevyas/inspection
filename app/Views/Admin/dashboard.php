
<!-- header -->
<?php  include(VIEWPATH.'Admin/inc/header.php') ?>

<div class="main-content">

<!-- Main Content starts -->
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Nazox</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-1 overflow-hidden">
                                        <p class="text-truncate font-size-14 mb-2">Number of Clients</p>
                                        <h4 class="mb-0">1452</h4>
                                    </div>
                                    <div class="text-primary ms-auto">
                                        <i class="ri-stack-line font-size-24"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body border-top py-3">
                                <div class="text-truncate">
                                    <span class="badge badge-soft-success font-size-11"><i class="mdi mdi-menu-up"> </i>
                                        2.4% </span>
                                    <span class="text-muted ms-2">From previous period</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-1 overflow-hidden">
                                        <p class="text-truncate font-size-14 mb-2">Total Products</p>
                                        <h4 class="mb-0">38452</h4>
                                    </div>
                                    <div class="text-primary ms-auto">
                                        <i class="ri-store-2-line font-size-24"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-top py-3">
                                <div class="text-truncate">
                                    <span class="badge badge-soft-success font-size-11"><i class="mdi mdi-menu-up"> </i>
                                        2.4% </span>
                                    <span class="text-muted ms-2">From previous period</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-1 overflow-hidden">
                                        <p class="text-truncate font-size-14 mb-2">Total Inspections</p>
                                        <h4 class="mb-0">1544</h4>
                                    </div>
                                    <div class="text-primary ms-auto">
                                        <i class="ri-briefcase-4-line font-size-24"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-top py-3">
                                <div class="text-truncate">
                                    <span class="badge badge-soft-success font-size-11"><i class="mdi mdi-menu-up"> </i>
                                        2.4% </span>
                                    <span class="text-muted ms-2">From previous period</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="card">
                    <div class="card-body">
                        <div class="float-end d-none d-md-inline-block">
                            <div class="btn-group mb-2">
                                <button type="button" class="btn btn-sm btn-light">Today</button>
                                <button type="button" class="btn btn-sm btn-light active">Weekly</button>
                                <button type="button" class="btn btn-sm btn-light">Monthly</button>
                            </div>
                        </div>
                        <h4 class="card-title mb-4">Inspection Analytics</h4>
                        <div>
                            <div id="line-column-chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>

                    <div class="card-body border-top text-center">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="d-inline-flex">
                                    <h5 class="me-2">12,253</h5>
                                    <div class="text-success">
                                        <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                                    </div>
                                </div>
                                <p class="text-muted text-truncate mb-0">This month</p>
                            </div>

                            <div class="col-sm-4">
                                <div class="mt-4 mt-sm-0">
                                    <p class="mb-2 text-muted text-truncate"><i
                                            class="mdi mdi-circle text-primary font-size-10 me-1"></i> This Year :</p>
                                    <div class="d-inline-flex">
                                        <h5 class="mb-0 me-2">34,254</h5>
                                        <div class="text-success">
                                            <i class="mdi mdi-menu-up font-size-14"> </i>2.1 %
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mt-4 mt-sm-0">
                                    <p class="mb-2 text-muted text-truncate"><i
                                            class="mdi mdi-circle text-success font-size-10 me-1"></i> Previous Year :
                                    </p>
                                    <div class="d-inline-flex">
                                        <h5 class="mb-0">32,695</h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end">
                            <select class="form-select form-select-sm">
                                <option selected>Apr</option>
                                <option value="1">Mar</option>
                                <option value="2">Feb</option>
                                <option value="3">Jan</option>
                            </select>
                        </div>
                        <h4 class="card-title mb-4">Sales Analytics</h4>

                        <div id="donut-chart" class="apex-charts"></div>

                        <div class="row">
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <p class="mb-2 text-truncate"><i
                                            class="mdi mdi-circle text-primary font-size-10 me-1"></i> Product A</p>
                                    <h5>42 %</h5>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <p class="mb-2 text-truncate"><i
                                            class="mdi mdi-circle text-success font-size-10 me-1"></i> Product B</p>
                                    <h5>26 %</h5>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <p class="mb-2 text-truncate"><i
                                            class="mdi mdi-circle text-warning font-size-10 me-1"></i> Product C</p>
                                    <h5>42 %</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="card-title mb-4">Inspection Reports</h4>
                        <div class="text-center">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <div class="mb-3">
                                            <div id="radialchart-1" class="apex-charts"></div>
                                        </div>

                                        <p class="text-muted text-truncate mb-2">Weekly Inspection</p>
                                        <h5 class="mb-0">2,523</h5>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mt-5 mt-sm-0">
                                        <div class="mb-3">
                                            <div id="radialchart-2" class="apex-charts"></div>
                                        </div>

                                        <p class="text-muted text-truncate mb-2">Monthly Inspection</p>
                                        <h5 class="mb-0">11,235</h5>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="card-title mb-3">Inspections in State</h4>

                        <div>
                            <div class="text-center">
                                <p class="mb-2">Total State</p>
                                <h4>75</h4>
                                <div class="text-success">
                                    <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                                </div>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table table-hover mb-0 table-centered table-nowrap">
                                    <tbody>
                                        <tr>
                                            <td style="width: 60px;">
                                                <div class="avatar-xs">
                                                    <div class="avatar-title rounded-circle bg-light">
                                                        <img src="<?= base_url('public/assets/main/images/companies/img-1.png') ?>" alt="img-1"
                                                            height="20">
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <h5 class="font-size-14 mb-0">State 1</h5>
                                            </td>
                                            <td>
                                                <div id="spak-chart1"></div>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-0">2478</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="avatar-xs">
                                                    <div class="avatar-title rounded-circle bg-light">
                                                        <img src="<?= base_url('public/assets/main/images/companies/img-2.png') ?>" alt="img-2"
                                                            height="20">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 class="font-size-14 mb-0">State 2</h5>
                                            </td>

                                            <td>
                                                <div id="spak-chart2"></div>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-0">2625</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="avatar-xs">
                                                    <div class="avatar-title rounded-circle bg-light">
                                                        <img src="<?= base_url('public/assets/main/images/companies/img-3.png') ?>" alt="img-3"
                                                            height="20">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 class="font-size-14 mb-0">State 3</h5>
                                            </td>
                                            <td>
                                                <div id="spak-chart3"></div>
                                            </td>
                                            <td>
                                                <p class="text-muted mb-0">2856</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="text-center mt-4">
                                <a href="#" class="btn btn-primary btn-sm">View more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="card-title mb-4">Recent Users Activity Feed</h4>

                        <div data-simplebar style="max-height: 330px;">
                            <ul class="list-unstyled activity-wid">
                                <li class="activity-list">
                                    <div class="activity-icon avatar-xs">
                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                            <i class="ri-edit-2-fill"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <div>
                                            <h5 class="font-size-13">28 Apr, 2020 <small class="text-muted">12:07
                                                    am</small></h5>
                                        </div>

                                        <div>
                                            <p class="text-muted mb-0">Responded to need “Volunteer Activities”</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="activity-list">
                                    <div class="activity-icon avatar-xs">
                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                            <i class="ri-user-2-fill"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <div>
                                            <h5 class="font-size-13">21 Apr, 2020 <small class="text-muted">08:01
                                                    pm</small></h5>
                                        </div>

                                        <div>
                                            <p class="text-muted mb-0">Added an interest “Volunteer Activities”</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="activity-list">
                                    <div class="activity-icon avatar-xs">
                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                            <i class="ri-bar-chart-fill"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <div>
                                            <h5 class="font-size-13">17 Apr, 2020 <small class="text-muted">09:23
                                                    am</small></h5>
                                        </div>

                                        <div>
                                            <p class="text-muted mb-0">Joined the group “Boardsmanship Forum”</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="activity-list">
                                    <div class="activity-icon avatar-xs">
                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                            <i class="ri-mail-fill"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <div>
                                            <h5 class="font-size-13">11 Apr, 2020 <small class="text-muted">05:10
                                                    pm</small></h5>
                                        </div>

                                        <div>
                                            <p class="text-muted mb-0">Responded to need “In-Kind Opportunity”</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="activity-list">
                                    <div class="activity-icon avatar-xs">
                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                            <i class="ri-calendar-2-fill"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <div>
                                            <h5 class="font-size-13">07 Apr, 2020 <small class="text-muted">12:47
                                                    pm</small></h5>
                                        </div>

                                        <div>
                                            <p class="text-muted mb-0">Created need “Volunteer Activities”</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="activity-list">
                                    <div class="activity-icon avatar-xs">
                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                            <i class="ri-edit-2-fill"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <div>
                                            <h5 class="font-size-13">05 Apr, 2020 <small class="text-muted">03:09
                                                    pm</small></h5>
                                        </div>

                                        <div>
                                            <p class="text-muted mb-0">Attending the event “Some New Event”</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="activity-list">
                                    <div class="activity-icon avatar-xs">
                                        <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                            <i class="ri-user-2-fill"></i>
                                        </span>
                                    </div>
                                    <div>
                                        <div>
                                            <h5 class="font-size-13">02 Apr, 2020 <small class="text-muted">12:07
                                                    am</small></h5>
                                        </div>

                                        <div>
                                            <p class="text-muted mb-0">Responded to need “In-Kind Opportunity”</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="card-title mb-4">Revenue by Locations</h4>

                        <div id="usa-vectormap" style="height: 196px"></div>

                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-md-6">
                                <div class="mt-2">
                                    <div class="clearfix py-2">
                                        <h5 class="float-end font-size-16 m-0">$ 2542</h5>
                                        <p class="text-muted mb-0 text-truncate">California :</p>

                                    </div>
                                    <div class="clearfix py-2">
                                        <h5 class="float-end font-size-16 m-0">$ 2245</h5>
                                        <p class="text-muted mb-0 text-truncate">Nevada :</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 offset-xl-1 col-md-6">
                                <div class="mt-2">
                                    <div class="clearfix py-2">
                                        <h5 class="float-end font-size-16 m-0">$ 2156</h5>
                                        <p class="text-muted mb-0 text-truncate">Montana :</p>

                                    </div>
                                    <div class="clearfix py-2">
                                        <h5 class="float-end font-size-16 m-0">$ 1845</h5>
                                        <p class="text-muted mb-0 text-truncate">Texas :</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="#" class="btn btn-primary btn-sm">Learn more</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body border-bottom">

                        <div class="user-chat-border">
                            <div class="row">
                                <div class="col-md-5 col-9">
                                    <h5 class="font-size-15 mb-1">Frank Vickery</h5>
                                    <p class="text-muted mb-0"><i
                                            class="mdi mdi-circle text-success align-middle me-1"></i> Active now</p>
                                </div>
                                <div class="col-md-7 col-3">
                                    <ul class="list-inline user-chat-nav text-end mb-0">
                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="mdi mdi-magnify"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-0">
                                                    <form class="p-2">
                                                        <div class="search-box">
                                                            <div class="position-relative">
                                                                <input type="text"
                                                                    class="form-control rounded bg-light border-0"
                                                                    placeholder="Search...">
                                                                <i class="mdi mdi-magnify search-icon"></i>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-inline-item d-none d-sm-inline-block">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="mdi mdi-cog"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">View Profile</a>
                                                    <a class="dropdown-item" href="#">Clear chat</a>
                                                    <a class="dropdown-item" href="#">Muted</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else</a>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chat-widget">
                            <div class="chat-conversation" data-simplebar style="max-height: 295px;">
                                <ul class="list-unstyled mb-0 pe-3">
                                    <li>
                                        <div class="conversation-list">
                                            <div class="chat-avatar">
                                                <img src="<?= base_url('public/assets/main/images/users/avatar-2.jpg') ?>" alt="avatar-2">
                                            </div>
                                            <div class="ctext-wrap">
                                                <div class="conversation-name">Frank Vickery</div>
                                                <div class="ctext-wrap-content">
                                                    <p class="mb-0">
                                                        Hey! I am available
                                                    </p>
                                                </div>
                                                <p class="chat-time mb-0"><i
                                                        class="mdi mdi-clock-outline align-middle me-1"></i> 12:09</p>
                                            </div>

                                        </div>
                                    </li>

                                    <li class="right">
                                        <div class="conversation-list">
                                            <div class="ctext-wrap">
                                                <div class="conversation-name">Ricky Clark</div>
                                                <div class="ctext-wrap-content">
                                                    <p class="mb-0">
                                                        Hi, How are you? What about our next meeting?
                                                    </p>
                                                </div>

                                                <p class="chat-time mb-0"><i
                                                        class="bx bx-time-five align-middle me-1"></i> 10:02</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="chat-day-title">
                                            <span class="title">Today</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="conversation-list">
                                            <div class="chat-avatar">
                                                <img src="<?= base_url('public/assets/main/images/users/avatar-2.jpg') ?>" alt="avatar-2">
                                            </div>
                                            <div class="ctext-wrap">
                                                <div class="conversation-name">Frank Vickery</div>
                                                <div class="ctext-wrap-content">
                                                    <p class="mb-0">
                                                        Hello!
                                                    </p>
                                                </div>
                                                <p class="chat-time mb-0"><i
                                                        class="mdi mdi-clock-outline align-middle me-1"></i> 10:00</p>
                                            </div>

                                        </div>
                                    </li>

                                    <li class="right">
                                        <div class="conversation-list">
                                            <div class="ctext-wrap">
                                                <div class="conversation-name">Ricky Clark</div>
                                                <div class="ctext-wrap-content">
                                                    <p class="mb-0">
                                                        Hi, How are you? What about our next meeting?
                                                    </p>
                                                </div>

                                                <p class="chat-time mb-0"><i
                                                        class="bx bx-time-five align-middle me-1"></i> 10:02</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="conversation-list">
                                            <div class="chat-avatar">
                                                <img src="<?= base_url('public/assets/main/images/users/avatar-2.jpg') ?>" alt="avatar-2">
                                            </div>
                                            <div class="ctext-wrap">
                                                <div class="conversation-name">Frank Vickery</div>
                                                <div class="ctext-wrap-content">
                                                    <p class="mb-0">
                                                        Yeah everything is fine
                                                    </p>
                                                </div>

                                                <p class="chat-time mb-0"><i
                                                        class="bx bx-time-five align-middle me-1"></i> 10:06</p>
                                            </div>

                                        </div>
                                    </li>

                                    <li>
                                        <div class="conversation-list">
                                            <div class="chat-avatar">
                                                <img src="<?= base_url('public/assets/main/images/users/avatar-2.jpg') ?>" alt="avatar-2">
                                            </div>
                                            <div class="ctext-wrap">
                                                <div class="conversation-name">Frank Vickery</div>
                                                <div class="ctext-wrap-content">
                                                    <p class="mb-0">& Next meeting tomorrow 10.00AM</p>
                                                </div>
                                                <p class="chat-time mb-0"><i
                                                        class="bx bx-time-five align-middle me-1"></i> 10:06</p>
                                            </div>

                                        </div>
                                    </li>

                                    <li class="right">
                                        <div class="conversation-list">
                                            <div class="ctext-wrap">
                                                <div class="conversation-name">Ricky Clark</div>
                                                <div class="ctext-wrap-content">
                                                    <p class="mb-0">
                                                        Wow that's great
                                                    </p>
                                                </div>

                                                <p class="chat-time mb-0"><i
                                                        class="bx bx-time-five align-middle me-1"></i> 10:07</p>
                                            </div>
                                        </div>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 chat-input-section border-top">
                        <div class="row">
                            <div class="col">
                                <div>
                                    <input type="text" class="form-control rounded chat-input ps-3"
                                        placeholder="Enter Message...">
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit"
                                    class="btn btn-primary chat-send w-md waves-effect waves-light"><span
                                        class="d-none d-sm-inline-block me-2">Send</span> <i
                                        class="mdi mdi-send"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="card-title mb-4">Latest Transactions</h4>

                        <div class="table-responsive">
                            <table class="table table-centered datatable dt-responsive nowrap" data-bs-page-length="5"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="ordercheck">
                                                <label class="form-check-label mb-0" for="ordercheck">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Billing Name</th>
                                        <th>Total</th>
                                        <th>Payment Status</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="ordercheck1">
                                                <label class="form-check-label mb-0" for="ordercheck1">&nbsp;</label>
                                            </div>
                                        </td>

                                        <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1572</a> </td>
                                        <td>
                                            04 Apr, 2020
                                        </td>
                                        <td>Walter Brown</td>

                                        <td>
                                            $172
                                        </td>
                                        <td>
                                            <div class="badge badge-soft-success font-size-12">Paid</div>
                                        </td>
                                        <td id="tooltip-container1">
                                            <a href="javascript:void(0);" class="me-3 text-primary"
                                                data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="javascript:void(0);" class="text-danger"
                                                data-bs-container="#tooltip-container1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete"><i
                                                    class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="ordercheck2">
                                                <label class="form-check-label mb-0" for="ordercheck2">&nbsp;</label>
                                            </div>
                                        </td>

                                        <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1571</a> </td>
                                        <td>
                                            03 Apr, 2020
                                        </td>
                                        <td>Jimmy Barker</td>

                                        <td>
                                            $165
                                        </td>
                                        <td>
                                            <div class="badge badge-soft-warning font-size-12">unpaid</div>
                                        </td>
                                        <td id="tooltip-container2">
                                            <a href="javascript:void(0);" class="me-3 text-primary"
                                                data-bs-container="#tooltip-container2" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="javascript:void(0);" class="text-danger"
                                                data-bs-container="#tooltip-container2" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete"><i
                                                    class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="ordercheck3">
                                                <label class="form-check-label mb-0" for="ordercheck3">&nbsp;</label>
                                            </div>
                                        </td>

                                        <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1570</a> </td>
                                        <td>
                                            03 Apr, 2020
                                        </td>
                                        <td>Donald Bailey</td>

                                        <td>
                                            $146
                                        </td>
                                        <td>
                                            <div class="badge badge-soft-success font-size-12">Paid</div>
                                        </td>
                                        <td id="tooltip-container3">
                                            <a href="javascript:void(0);" class="me-3 text-primary"
                                                data-bs-container="#tooltip-container3" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="javascript:void(0);" class="text-danger"
                                                data-bs-container="#tooltip-container3" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete"><i
                                                    class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="ordercheck4">
                                                <label class="form-check-label mb-0" for="ordercheck4">&nbsp;</label>
                                            </div>
                                        </td>

                                        <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1569</a> </td>
                                        <td>
                                            02 Apr, 2020
                                        </td>
                                        <td>Paul Jones</td>

                                        <td>
                                            $183
                                        </td>
                                        <td>
                                            <div class="badge badge-soft-success font-size-12">Paid</div>
                                        </td>
                                        <td id="tooltip-container41">
                                            <a href="javascript:void(0);" class="me-3 text-primary"
                                                data-bs-container="#tooltip-container41" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="javascript:void(0);" class="text-danger"
                                                data-bs-container="#tooltip-container41" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete"><i
                                                    class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="ordercheck5">
                                                <label class="form-check-label mb-0" for="ordercheck5">&nbsp;</label>
                                            </div>
                                        </td>

                                        <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1568</a> </td>
                                        <td>
                                            01 Apr, 2020
                                        </td>
                                        <td>Jefferson Allen</td>

                                        <td>
                                            $160
                                        </td>
                                        <td>
                                            <div class="badge badge-soft-danger font-size-12">Chargeback</div>
                                        </td>
                                        <td id="tooltip-container4">
                                            <a href="javascript:void(0);" class="me-3 text-primary"
                                                data-bs-container="#tooltip-container4" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="javascript:void(0);" class="text-danger"
                                                data-bs-container="#tooltip-container4" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete"><i
                                                    class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="ordercheck6">
                                                <label class="form-check-label mb-0" for="ordercheck6">&nbsp;</label>
                                            </div>
                                        </td>

                                        <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1567</a> </td>
                                        <td>
                                            31 Mar, 2020
                                        </td>
                                        <td>Jeffrey Waltz</td>

                                        <td>
                                            $105
                                        </td>
                                        <td>
                                            <div class="badge badge-soft-warning font-size-12">unpaid</div>
                                        </td>
                                        <td id="tooltip-container5">
                                            <a href="javascript:void(0);" class="me-3 text-primary"
                                                data-bs-container="#tooltip-container5" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="javascript:void(0);" class="text-danger"
                                                data-bs-container="#tooltip-container5" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete"><i
                                                    class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="ordercheck7">
                                                <label class="form-check-label mb-0" for="ordercheck7">&nbsp;</label>
                                            </div>
                                        </td>

                                        <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1566</a> </td>
                                        <td>
                                            30 Mar, 2020
                                        </td>
                                        <td>Jewel Buckley</td>

                                        <td>
                                            $112
                                        </td>
                                        <td>
                                            <div class="badge badge-soft-success font-size-12">Paid</div>
                                        </td>
                                        <td id="tooltip-container6">
                                            <a href="javascript:void(0);" class="me-3 text-primary"
                                                data-bs-container="#tooltip-container6" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="javascript:void(0);" class="text-danger"
                                                data-bs-container="#tooltip-container6" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete"><i
                                                    class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="ordercheck8">
                                                <label class="form-check-label mb-0" for="ordercheck8">&nbsp;</label>
                                            </div>
                                        </td>

                                        <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1565</a> </td>
                                        <td>
                                            29 Mar, 2020
                                        </td>
                                        <td>Jamison Clark</td>

                                        <td>
                                            $123
                                        </td>
                                        <td>
                                            <div class="badge badge-soft-success font-size-12">Paid</div>
                                        </td>
                                        <td id="tooltip-container7">
                                            <a href="javascript:void(0);" class="me-3 text-primary"
                                                data-bs-container="#tooltip-container7" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="javascript:void(0);" class="text-danger"
                                                data-bs-container="#tooltip-container7" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete"><i
                                                    class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="ordercheck9">
                                                <label class="form-check-label mb-0" for="ordercheck9">&nbsp;</label>
                                            </div>
                                        </td>

                                        <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1564</a> </td>
                                        <td>
                                            28 Mar, 2020
                                        </td>
                                        <td>Eddy Torres</td>

                                        <td>
                                            $141
                                        </td>
                                        <td>
                                            <div class="badge badge-soft-success font-size-12">Paid</div>
                                        </td>
                                        <td id="tooltip-container8">
                                            <a href="javascript:void(0);" class="me-3 text-primary"
                                                data-bs-container="#tooltip-container8" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="javascript:void(0);" class="text-danger"
                                                data-bs-container="#tooltip-container8" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete"><i
                                                    class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="ordercheck10">
                                                <label class="form-check-label mb-0" for="ordercheck10">&nbsp;</label>
                                            </div>
                                        </td>

                                        <td><a href="javascript: void(0);" class="text-dark fw-bold">#NZ1563</a> </td>
                                        <td>
                                            28 Mar, 2020
                                        </td>
                                        <td>Frank Dean</td>

                                        <td>
                                            $164
                                        </td>
                                        <td>
                                            <div class="badge badge-soft-warning font-size-12">unpaid</div>
                                        </td>
                                        <td id="tooltip-container9">
                                            <a href="javascript:void(0);" class="me-3 text-primary"
                                                data-bs-container="#tooltip-container9" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="javascript:void(0);" class="text-danger"
                                                data-bs-container="#tooltip-container9" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete"><i
                                                    class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>

</div>
<!-- Main content ends -->

</div>

<?php  include(VIEWPATH.'Admin/inc/footer.php') ?>
<!-- footer -->
