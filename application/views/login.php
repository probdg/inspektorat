<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="<?= base_url() ?>">
    <meta charset="utf-8" />
    <title>Login </title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--begin::Page Custom Styles(used by this page)-->
    <link href="assets/css/pages/login/classic/login-2.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->

    <link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->

    <!-- <link rel="shortcut icon" href="assets/media/logos/favicon.ico" /> -->

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid" id="kt_login">
            <!--begin::Aside-->
            <div class="login-aside order-2 order-lg-1 d-flex flex-column-fluid flex-lg-row-auto bg-white bgi-size-cover bgi-no-repeat p-7 p-lg-10">
                <!--begin: Aside Container-->
                <div class="d-flex flex-row-fluid flex-column justify-content-between">
                    <!--begin::Aside body-->
                    <div class="d-flex flex-column-fluid flex-column flex-center mt-5 mt-lg-0">
                        <a href="#" class="mb-15 text-center">

                        </a>

                        <!--begin::Signin-->
                        <div class="login-form login-signin bg-white">
                            <?php if ($this->session->flashdata('pesan') != '') { ?>
                                <div class="alert alert-custom alert-outline-2x alert-outline-danger fade show mb-5" role="alert">
                                    <div class="alert-icon"><i class="flaticon-close"></i></div>
                                    <div class="alert-text"><?= $this->session->flashdata('pesan');  ?></div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="text-center mb-10 mb-lg-20">
                                <h2 class="font-weight-bold">Login</h2>
                                <p class="text-muted font-weight-bold">Masukan username dan password</p>
                            </div>

                            <!--begin::Form-->
                            <?= form_open(base_url('login/verify')) ?>
                            <div>
                                <div class="form-group py-3 m-0">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Username" name="username" autocomplete="off" required />
                                </div>
                                <div class="form-group py-3 border-top m-0">
                                    <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="Password" placeholder="Password" name="password" required />
                                </div>

                                <div class="form-group d-flex flex-wrap justify-content-right align-items-right mt-2">
                                    <button id="kt_login_signin_submit" class="btn btn-success font-weight-bold px-9 py-4 my-3">Login</button>
                                </div>
                            </div>
                            <?= form_close() ?>
                            <!--end::Form-->
                        </div>
                        <!--end::Signin-->
                    </div>
                    <!--end::Aside body-->

                    <!--begin: Aside footer for desktop-->
                    <div class="d-flex flex-column-auto justify-content-between mt-15">
                        <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">
                            &copy 2022 PT.Sawarga Digital Indonesia
                        </div>
                    </div>
                    <!--end: Aside footer for desktop-->
                </div>
                <!--end: Aside Container-->
            </div>
            <!--begin::Aside-->

            <!--begin::Content-->
            <div class="d-sm-none d-md-block order-1 order-lg-2 p-7" style="background-image:url('<?= base_url('assets/media/bg/bg-login-ins.png') ?>');background-size:cover;width:100%;background-position:center;overflow:hidden; height:100%;background-repeat:no-repeat">
                <!--begin::Content body-->
                <div class="d-flex flex-column-fluid flex-lg-center ">
                    <div class="d-flex flex-column justify-content-center">
                        <!-- <center><img style="width:50%;" src="<?= base_url('assets/media/images/icon/the_gaun_logo.png') ?>"></center>
                    </div> -->
                    </div>
                    <!--end::Content body-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Login-->
        </div>
        <!--end::Main-->


        <!--begin::Global Config(global config for global JS scripts)-->
        <script>
            var KTAppSettings = {
                "breakpoints": {
                    "sm": 576,
                    "md": 768,
                    "lg": 992,
                    "xl": 1200,
                    "xxl": 1400
                },
                "colors": {
                    "theme": {
                        "base": {
                            "white": "#ffffff",
                            "primary": "#3699FF",
                            "secondary": "#E5EAEE",
                            "success": "#1BC5BD",
                            "info": "#8950FC",
                            "warning": "#FFA800",
                            "danger": "#F64E60",
                            "light": "#E4E6EF",
                            "dark": "#181C32"
                        },
                        "light": {
                            "white": "#ffffff",
                            "primary": "#E1F0FF",
                            "secondary": "#EBEDF3",
                            "success": "#C9F7F5",
                            "info": "#EEE5FF",
                            "warning": "#FFF4DE",
                            "danger": "#FFE2E5",
                            "light": "#F3F6F9",
                            "dark": "#D6D6E0"
                        },
                        "inverse": {
                            "white": "#ffffff",
                            "primary": "#ffffff",
                            "secondary": "#3F4254",
                            "success": "#ffffff",
                            "info": "#ffffff",
                            "warning": "#ffffff",
                            "danger": "#ffffff",
                            "light": "#464E5F",
                            "dark": "#ffffff"
                        }
                    },
                    "gray": {
                        "gray-100": "#F3F6F9",
                        "gray-200": "#EBEDF3",
                        "gray-300": "#E4E6EF",
                        "gray-400": "#D1D3E0",
                        "gray-500": "#B5B5C3",
                        "gray-600": "#7E8299",
                        "gray-700": "#5E6278",
                        "gray-800": "#3F4254",
                        "gray-900": "#181C32"
                    }
                },
                "font-family": "Poppins"
            };
        </script>
        <!--end::Global Config-->

        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="assets/plugins/global/plugins.bundle.js"></script>
        <script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
        <script src="assets/js/scripts.bundle.js"></script>
        <!--end::Global Theme Bundle-->


</body>
<!--end::Body-->

</html>