<!DOCTYPE html>
<html lang="en">

<head>
    <base href="">
    <meta charset="utf-8" />
    <title><?= $title ?> </title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="./assets/css/pages/wizard/wizard-5.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="./assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

    <link href="./assets/plugins/custom/datatables/datatables.bundle.css?v=7.1.6" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="./assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="./assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!-- <link href="./assets/css/sweetalert2.min.css" rel="stylesheet" type="text/css" /> -->

    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <link href="./assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />

    <!--end::Layout Themes-->
    <!-- <link rel="shortcut icon" href="./assets/media/logos/favicon.ico" /> -->
    <script src="./assets/js/jquery.js"></script>
    <style>
        thead th,
        thead td {
            background-color: #eeece1;
            vertical-align: middle !important;
            text-align: center;
            border: 1px solid #000000;
        }




        table,
        tbody th,
        tbody td {
            border: 1px solid;
            padding: 6px;
        }

        table {
            border-collapse: collapse;
        }

        .custom-file-input:lang(en)~.custom-file-label::after {

            font-family: "Font Awesome 5 Free";
            content: "\f1c3";
            color: green
        }
    </style>

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed">
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <div id="kt_header" class="header header-fixed bg-success">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">

                        <!--begin::Header Menu Wrapper-->
                        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                            <!--begin::Header Menu-->
                            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                                <!--begin::Header Nav-->
                                <h4 class="m-auto text-white"> PEMKAB SUMEDANG</h4>
                                <!--end::Header Nav-->
                            </div>
                            <!--end::Header Menu-->
                        </div>
                        <!--end::Header Menu Wrapper-->
                        <!--begin::Topbar-->
                        <div class="topbar">
                            <!--begin::User-->
                            <div class="topbar-item">
                                <div class="btn btn-icon btn-icon-mobile w-auto btn-success d-flex align-items-center btn-lg px-2" onclick="logout()">

                                    <span class="text-white font-weight-bolder font-size-base d-none d-md-inline mr-4">Hi,</span>
                                    <span class="text-white font-weight-bolder font-size-base d-none d-md-inline mr-5"><?= $this->session->userdata('nama') ?></span>
                                    <span class="symbol symbol-35">
                                        <span class="symbol-label font-size-h5 font-weight-bold text-white bg-white-o-30"><i class="fa fa-user"></i></span>
                                    </span>
                                </div>
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--begin::Content-->
                <div class="d-flex flex-column flex-column-fluid" id="kt_content">

                    <!--Content area here-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Wizard 5-->
                        <div class="wizard wizard-5  d-flex flex-column flex-lg-row flex-row-fluid" id="kt_wizard" data-wizard-clickable="true">
                            <!--begin::Aside-->
                            <div class="wizard-aside bg-white d-flex flex-column flex-row-auto w-100 w-lg-300px w-xl-400px w-xxl-500px">
                                <!--begin::Aside Top-->
                                <div class="d-flex flex-column-fluid flex-column px-xxl-30 px-10">
                                    <!--begin: Wizard Nav-->
                                    <div class="wizard-nav d-flex d-flex justify-content-center pt-10 pt-lg-10 pb-5">
                                        <!--begin::Wizard Steps-->
                                        <div class="wizard-steps">
                                            <!--begin::Wizard Step 1 Nav-->
                                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">1</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            FORM 1 A
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            CEE Persepsi
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 1 Nav-->

                                            <!--begin::Wizard Step 2 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">2</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 1 A 1
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            Responden SPIP
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 2 Nav-->

                                            <!--begin::Wizard Step 3 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">3</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 1 B
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            Simpulan CEE Dokumen
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 3 Nav-->

                                            <!--begin::Wizard Step 4 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">4</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 1 C
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            Simpulan CEE
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 4 Nav-->

                                            <!--begin::Wizard Step 5 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">5</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 2 A
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            Konteks Strategis Pemda
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 5 Nav-->

                                            <!--begin::Wizard Step 6 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">6</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 2 B
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            Konteks Strategis OPD
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 6 Nav-->

                                            <!--begin::Wizard Step 7 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">7</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 2 C
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            Konteks Operasional OPD
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 7 Nav-->

                                            <!--begin::Wizard Step 8 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">8</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 3 A
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            Risk Strategis Pemda
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 8 Nav-->

                                            <!--begin::Wizard Step 9 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">9</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 3 B
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            Risk Strategis OPD
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 9 Nav-->

                                            <!--begin::Wizard Step 10 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">10</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 3 C
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            Risk Operasional OPD
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 10 Nav-->

                                            <!--begin::Wizard Step 11 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">11</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 4 </h3>
                                                        <div class="wizard-desc">
                                                            Analisis Risk
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 11 Nav-->

                                            <!--begin::Wizard Step 12 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">12</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 5
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            Risk Prioritas
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 12 Nav-->

                                            <!--begin::Wizard Step 13 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">13</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 6
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            RTP CE
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 13 Nav-->

                                            <!--begin::Wizard Step 14 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">14</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 7
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            RTP Risk
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 14 Nav-->

                                            <!--begin::Wizard Step 15 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">15</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 8
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            Infokom
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 15 Nav-->

                                            <!--begin::Wizard Step 16 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">16</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 9
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            Rencana Monitoring PI
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 16 Nav-->

                                            <!--begin::Wizard Step 17 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">17</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 10
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            Monitor Risk Event & RTP
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 17 Nav-->

                                        </div>
                                        <!--end::Wizard Steps-->
                                    </div>
                                    <!--end: Wizard Nav-->
                                </div>
                                <!--end::Aside Top-->
                            </div>
                            <!--begin::Aside-->

                            <!--begin::Content-->
                            <div class="wizard-content bg-gray-100 d-flex flex-column flex-row-fluid  px-5 px-lg-10">

                                <!--begin::Form-->
                                <div class="d-flex justify-content-center flex-row-fluid">
                                    <form class="pb-5 w-100" id="kt_form">
                                        <!--begin: Wizard Step 1-->
                                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    REKAPITULASI HASIL KUESIONER PENILAIAN LINGKUNGAN
                                                    PENGENDALIAN INTERN CONTROL ENVIRONMENT EVALUATION (CEE)
                                                </h3>
                                                <div class="text-muted font-weight-bold font-size-h5">
                                                    PEMERINTAH DAERAH KABUPATEN SUMEDANG
                                                </div>
                                            </div>

                                            <!--begin::Title-->
                                            <?php $this->load->view('form/1a.php'); ?>

                                        </div>

                                        <!--end: Wizard Step 1-->

                                        <!--begin: Wizard Step 2-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    KUESIONER PENILAIAN LINGKUNGAN PENGENDALIAN INTERN
                                                    CONTROL ENVIRONMENT EVALUATION (CEE)
                                                </h3>
                                                <div class="text-muted font-weight-bold font-size-h5">
                                                    PEMERINTAH DAERAH KABUPATEN SUMEDANG
                                                </div>
                                            </div>
                                            <!--begin::Title-->

                                            <?php $this->load->view('form/1a1.php'); ?>

                                        </div>
                                        <!--end: Wizard Step 2-->

                                        <!--begin: Wizard Step 3-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->

                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    Kondisi Kerentanan Lingkungan Pengendalian Intern di
                                                    Pemerintah Daerah Kabupaten Sumedang
                                                </h3>
                                            </div>
                                            <!--end::Title-->

                                            <?php $this->load->view('form/1b.php'); ?>
                                        </div>
                                        <!--end: Wizard Step 3-->

                                        <!--begin: Wizard Step 4-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    Simpulan Survei Persepsi atas Lingkungan Pengendalian Intern
                                                    Pemerintah Daerah Kabupaten Sumedang
                                                </h3>
                                            </div>
                                            <!--end::Title-->

                                            <?php $this->load->view('form/1c.php'); ?>

                                        </div>
                                        <!--end: Wizard Step 4-->

                                        <!--begin: Wizard Step 5-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    PENETAPAN KONTEKS RISIKO STRATEGIS PEMDA
                                                </h3>
                                            </div>
                                            <!--end::Title-->
                                            <?php $this->load->view('form/2a.php'); ?>


                                        </div>
                                        <!--end: Wizard Step 5-->

                                        <!--begin: Wizard Step 6-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    PENETAPAN KONTEKS RISIKO STRATEGIS OPD
                                                </h3>
                                            </div>
                                            <!--end::Title-->
                                            <?php $this->load->view('form/2b.php'); ?>


                                        </div>
                                        <!--end: Wizard Step 6-->

                                        <!--begin: Wizard Step 7-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    PENETAPAN KONTEKS RISIKO OPERASIONAL OPD
                                                </h3>
                                            </div>
                                            <!--end::Title-->
                                            <?php $this->load->view('form/2c.php'); ?>
                                        </div>
                                        <!--end: Wizard Step 7-->
                                        <!--begin: Wizard Step 8-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    Identifikasi Risiko Strategis Pemerintah Daerah
                                                </h3>
                                            </div>
                                            <!--end::Title-->
                                            <?php $this->load->view('form/3a.php'); ?>
                                        </div>
                                        <!--end: Wizard Step 8-->

                                        <!--begin: Wizard Step 9-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    Identifikasi Risiko Strategis OPD
                                                </h3>
                                            </div>
                                            <!--end::Title-->
                                            <?php $this->load->view('form/3b.php'); ?>
                                        </div>
                                        <!--end: Wizard Step 9-->

                                        <!--begin: Wizard Step 10-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    Identifikasi Risiko Operasional OPD
                                                </h3>
                                            </div>
                                            <!--end::Title-->
                                            <?php $this->load->view('form/3c.php'); ?>
                                        </div>
                                        <!--end: Wizard Step 10-->

                                        <!--begin: Wizard Step 11-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    Hasil Analisis Risiko
                                                </h3>
                                            </div>
                                            <!--end::Title-->
                                            <?php $this->load->view('form/4.php'); ?>
                                        </div>
                                        <!--end: Wizard Step 11-->
                                        <!--begin: Wizard Step 12-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    Daftar Risiko Prioritas
                                                </h3>
                                            </div>
                                            <!--end::Title-->
                                            <?php $this->load->view('form/5.php'); ?>
                                        </div>
                                        <!--end: Wizard Step 12-->

                                        <!--begin: Wizard Step 13-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    Penilaian atas Kegiatan Pengendalian yang Ada dan Masih Dibutuhkan/ RTP atas Kelemahan Lingkungan Pengendalian
                                                    <center>( RTP atas CEE)</center>
                                                </h3>
                                            </div>
                                            <!--end::Title-->

                                            <?php $this->load->view('form/6.php'); ?>

                                        </div>
                                        <!--end: Wizard Step 13-->

                                        <!--begin: Wizard Step 14-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    Penilaian atas Kegiatan Pengendalian yang Ada dan Masih Dibutuhkan
                                                    <center>(RTP atas Hasil Identifikasi Risiko) </center>
                                                </h3>
                                            </div>
                                            <!--end::Title-->

                                            <?php $this->load->view('form/7.php'); ?>

                                        </div>
                                        <!--end: Wizard Step 14-->

                                        <!--begin: Wizard Step 15-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    RENCANA DAN REALISASI ATAS PENGKOMUNIKASIAN ATAS KEGIATAN PENGENDALIAN YANG DIBANGUN
                                                </h3>
                                            </div>
                                            <!--end::Title-->

                                            <?php $this->load->view('form/8.php'); ?>

                                        </div>
                                        <!--end: Wizard Step 15-->
                                        <!--begin: Wizard Step 16-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    RENCANA DAN REALISASI PEMANTAUAN ATAS KEGIATAN PENGENDALIAN INTERN YANG DIBUTUHKAN
                                                </h3>
                                            </div>
                                            <!--end::Title-->

                                            <?php $this->load->view('form/9.php'); ?>

                                        </div>
                                        <!--end: Wizard Step 16-->

                                        <!--begin: Wizard Step 17-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    PENCATATAN KEJADIAN RISIKO (RISK EVENT) DAN PELAKSANAAN RTP
                                                </h3>
                                            </div>
                                            <!--end::Title-->

                                            <?php $this->load->view('form/10.php'); ?>

                                        </div>
                                        <!--end: Wizard Step 17-->

                                        <!--begin: Wizard Step 17-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    Daftar Risiko Prioritas
                                                </h3>
                                            </div>
                                            <!--end::Title-->

                                            <?php $this->load->view('form/11.php'); ?>

                                        </div>
                                        <!--end: Wizard Step 17-->

                                        <!--begin: Wizard Actions-->
                                        <div class="d-flex justify-content-between pt-3">
                                            <div class="mr-2">
                                                <button type="button" class="btn btn-light-success font-weight-bolder font-size-h6 pl-6 pr-8 py-4 my-3 mr-3" data-wizard-type="action-prev">
                                                    <span class="svg-icon svg-icon-md mr-1"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Left-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1" />
                                                                <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) " />
                                                            </g>
                                                        </svg><!--end::Svg Icon-->
                                                    </span> Sebelumnya
                                                </button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-success font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3" data-wizard-type="action-submit">
                                                    Submit
                                                    <span class="svg-icon svg-icon-md ml-2"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Right-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000) " x="7.5" y="7.5" width="2" height="9" rx="1" />
                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) " />
                                                            </g>
                                                        </svg><!--end::Svg Icon-->
                                                    </span>
                                                </button>

                                                <button type="button" class="btn btn-success font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3" data-wizard-type="action-next">
                                                    Selanjutnya
                                                    <span class="svg-icon svg-icon-md ml-1"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Right-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000) " x="7.5" y="7.5" width="2" height="9" rx="1" />
                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) " />
                                                            </g>
                                                        </svg><!--end::Svg Icon-->
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <!--end: Wizard Actions-->
                                    </form>
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wizard 5-->
                    </div>
                    <!--end::Card Body-->
                    <!--end::Card-->
                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>

    <!--end::Main-->
</body>
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
                    "success": "#3699FF",
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
                    "success": "#E1F0FF",
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
                    "success": "#ffffff",
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
<script src="./assets/plugins/global/plugins.bundle.js"></script>
<script src="./assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="./assets/js/scripts.bundle.js"></script>
<script src="./assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="./assets/js/pages/crud/datatables/extensions/responsive.min.js"></script>
<!--end::Global Theme Bundle-->

<!--begin::Page Vendors(used by this page)-->
<script src="./assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<!--end::Page Vendors-->

<!--begin::Page Scripts(used by this page)-->
<script src="./assets/js/pages/custom/wizard/wizard-5.js"></script>
<!--end::Page Scripts-->

<!--begin::Page Scripts(used by this page)-->
<script src="./assets/js/pages/widgets.js"></script>
<script src="./assets/js/sweetalert.min.js"></script>
<script src="./assets/js/numeral.js"></script>

<script>
    const logout = () => {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Anda akan keluar dari aplikasi ini",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
        }).then(result => {
            if (result.value) {
                window.location.href = "<?= base_url('login/out') ?>"
            }
        });
    }
    $('.select2').select2();
    var time;
    const changeTahun = (e) => {
        $('.tahun').val(e.value)

        clearTimeout(time);
        time = setTimeout(function() {
            $.ajax({
                type: "post",
                url: "<?= base_url('home/getRpjmd') ?>",
                data: {
                    tahun: e.value,
                },
                dataType: "JSON",
                success: function(res) {
                    if (res) {
                        $('[name=id_rpjmd]').val(res.id)
                        $('.rpjmd').val(res.nama_periode)
                        toastr.warning(res.nama_periode);
                        changeRpjmd(res.id)
                        $.ajax({
                            type: "post",
                            url: "<?= base_url('home/loadResponden') ?>",
                            data: {
                                tahun: e.value,
                                id_opd: $('[name=id]').val()
                            },
                            dataType: "html",
                            success: function(response) {
                                $('#responden').html(response);
                            }
                        });

                    } else {
                        toastr.error('Tidak di temukan RPJMD');

                    }
                }
            });
        }, 500);
    }
    const changeRpjmd = (value) => {

        $.ajax({
            type: "post",
            url: "<?= base_url('home/referensi') ?>",
            data: {
                rpjmd: value,
                opd: $('[name=id_opd]').val()
            },
            async: false,

            dataType: "JSON",
            success: function(res) {
                $('.misi , .sasaran , .tujuan').html('');
                $.each(res.misi, function(i, value) {

                    $('.misi').append('<p>' + value.no_urut + '.' + value.misi + '</p>')
                });
                $.each(res.sasaran, function(i, value) {
                    $('.sasaran').append('<p>' + value.no_urut + '.' + value.sasaran + '</p>')
                });
                $.each(res.tujuan, function(i, value) {
                    $('.tujuan').append('<p>' + value.no_urut + '.' + value.tujuan + '</p>')
                });

            }
        });
        $.ajax({
            type: "post",
            url: "<?= base_url('home/rpjmd_opd') ?>",
            async: false,
            data: {
                opd: $('[name=id]').val(),
                rpjmd: value,
            },
            dataType: "JSON",
            success: function(res) {
                $('.sasaran_opd , .tujuan_opd').html('');

                $.each(res.sasaran, function(i, value) {
                    $('.sasaran_opd').append('<p>' + value.no_urut + '.' + value.sasaran + '</p>')
                });
                $.each(res.tujuan, function(i, value) {
                    $('.tujuan_opd').append('<p>' + value.no_urut + '.' + value.tujuan + '</p>')
                });

            }
        });
    }
    $('#upload1a').on('click', function() {
        var file_data = $('#fileExcel')[0].files;
        var form = new FormData();
        form.append('fileExcel', file_data[0]);
        form.append('tahun', $('[name=tahun]').val());
        form.append('nama_opd', $('[name=pemda]').val());
        form.append('pemda', 'PEMERINTAH DAERAH KABUPATEN SUMEDANG');
        form.append('id_opd', $('[name=id]').val());
        form.append('rpjmd', $('[name=id_rpjmd]').val());

        var settings = {
            "url": "<?= base_url('home/import') ?>",
            "method": "POST",
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,

            "data": form
        };

        $.ajax(settings).done(function(obj) {
            $.ajax({
                type: "post",
                url: "<?= base_url('home/loadResponden') ?>",
                data: {
                    tahun: $('[name=tahun]').val(),
                    id_opd: $('[name=id]').val()
                },
                dataType: "html",
                success: function(response) {
                    $('#responden').html(response);
                }
            });
            toastr.success('Berhasil di import');

        });
    });



    function addOtherForm() {
        var parent = document.getElementById('form-parent');
        var child = `<div class="card card-custom example example-compact my-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Sumber Data</label>
                                    <input type="text" class="form-control"
                                        placeholder="Ketikan Sumber Data" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea">Uraian
                                        Kelemahan</label>
                                    <textarea class="form-control" id="exampleTextarea"
                                        placeholder="Ketikan Uraian Kelemahan"
                                        rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Klasifikasi</label>
                                    <input type="text" class="form-control"
                                        placeholder="Ketikan Klasifikasi" />
                                </div>
                                <div class="form-group">
                <label>
                    Nilai
                </label>
                <div class="radio-inline d-flex justify-content-around">
                    <label class="radio radio-lg radio-outline">
                        <input type="radio" name="nilai" value="1" />
                        <span></span>
                        1
                    </label>
                    <label class="radio radio-lg radio-outline">
                        <input type="radio" name="nilai" value="2" />
                        <span></span>
                        2
                    </label>
                    <label class="radio radio-lg radio-outline">
                        <input type="radio" name="nilai" value="3" />
                        <span></span>
                        3
                    </label>
                    <label class="radio radio-lg radio-outline">
                        <input type="radio" name="nilai" value="4" />
                        <span></span>
                        4
                    </label>
                </div>
                            </div>
                            
                        </div>`;
        parent.insertAdjacentHTML('beforeend', child);
    }
</script>
<!--end::Page Scripts-->
</body>

<!--end::Body-->

</html>