<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Login | Tempolate Demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url('public/assets/main/images/favicon.ico') ?> ">

        <!-- Bootstrap Css -->
        <link href="<?= base_url('public/assets/main/css/bootstrap.min.css') ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= base_url('public/assets/main/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('public/assets/main/css/toastr.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?= base_url('public/assets/main/css/app.min.css') ?>" id="app-style" rel="stylesheet" type="text/css" />
        <script> var base_url = '<?= base_url(); ?>'; </script> 
        <style>
            .redBorder {
                border: 1px solid #f76565 !important;
            }
        </style>
    </head>

    <body class="auth-body-bg">
        <div class="home-btn d-none d-sm-block">
            <a href="index.html"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div>
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4">
                        <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                            <div class="w-100">
                                <div class="row justify-content-center">
                                    <div class="col-lg-9">
                                        <div>
                                            <div class="text-center">
                                                <div>
                                                    <a href="index.html" class="logo"><img src="<?= base_url('public/assets/main/images/logo-dark.png') ?>" height="20" alt="logo"></a>
                                                </div>
    
                                                <h4 class="font-size-18 mt-4">Welcome Back !</h4>
                                                <p class="text-muted">Sign in to continue to Nazox.</p>
                                            </div>

                                            <div class="p-2 mt-5">
                                                <form class="">
                    
                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                        <label for="username">Username</label>
                                                        <input type="text" class="form-control" id="username" placeholder="Enter username">
                                                    </div>
                            
                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-eye-close-fill auti-custom-input-icon" id="passIcon" onclick="showPassword()"></i>
                                                        <label for="userpassword">Password</label>
                                                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                                    </div>
                            
                                                    <!-- <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customControlInline">
                                                        <label class="form-check-label" for="customControlInline">Remember me</label>
                                                    </div> -->

                                                    <div class="mt-4 text-center">
                                                        <button class="btn btn-primary w-md waves-effect waves-light loginbtn" type="button" onclick="submitDetails()">Log In</button>
                                                    </div>

                                                    <div class="mt-4 text-center">
                                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- <div class="mt-5 text-center">
                                                <p>Don't have an account ? <a href="auth-register.html" class="fw-medium text-primary"> Register </a> </p>
                                                <p>© <script>document.write(new Date().getFullYear())</script> Nazox. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="authentication-bg">
                            <div class="bg-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="<?= base_url('public/assets/main/libs/jquery/jquery.min.js') ?> "></script>
        <script src="<?= base_url('public/assets/main/libs/bootstrap/js/bootstrap.bundle.min.js') ?> "></script>
        <script src="<?= base_url('public/assets/main/libs/metismenu/metisMenu.min.js') ?> "></script>
        <script src="<?= base_url('public/assets/main/libs/simplebar/simplebar.min.js') ?> "></script>
        <script src="<?= base_url('public/assets/main/libs/node-waves/waves.min.js') ?> "></script>
        <script src="<?= base_url('public/assets/main/js/app.js') ?> "></script>
        
        
        <script src="<?= base_url('public/assets/main/js/toastr.min.js') ?> "></script>
        <!-- Axios -->
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <!-- Login page js -->
        <script src="<?= base_url('public/assets/main/ajaxPages/commonFunctions.js') ?> "></script>
        <script src="<?= base_url('public/assets/main/ajaxPages/login.js') ?> "></script>
        
    </body>
</html>
