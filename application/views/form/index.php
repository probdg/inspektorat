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
    <link href="./assets/css/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <link href="./assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    <link href="./assets/table.css" rel="stylesheet" type="text/css" />

    <!--end::Layout Themes-->
    <!-- <link rel="shortcut icon" href="./assets/media/logos/favicon.ico" /> -->
    <script src="./assets/js/jquery.js"></script>
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }

        body {
            font-family: Arial,
                sans-serif !important;
        }

        .dataTables_wrapper .dataTable th,
        .dataTables_wrapper .dataTable td {
            vertical-align: top;
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
                                    <div class="wizard-nav d-flex d-flex pt-10 pt-lg-10 pb-5">
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
                                                            FORM 1
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            Hasil Survey
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
                                                            Form 2
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            <?php if ($sess_opd == '56') : ?>
                                                                Penetapan Konteks Risiko Pemda
                                                            <?php else : ?>
                                                                Penetapan Konteks Risiko OPD
                                                            <?php endif ?>
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
                                                            Form 3
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            <?php if ($sess_opd == '56') : ?>
                                                                Risk Strategis Pemda
                                                            <?php else : ?>
                                                                Risk Strategis OPD
                                                            <?php endif ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Wizard Step 3 Nav-->
                                            <!--begin::Wizard Step 11 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">4</span>
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
                                                        <span class="wizard-number">5</span>
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
                                                        <span class="wizard-number">6</span>
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
                                                        <span class="wizard-number">7</span>
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
                                            <!--begin::Wizard Step 14 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">7</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 7 Peta Risiko
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            Peta Risiko
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
                                                        <span class="wizard-number">8</span>
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
                                                        <span class="wizard-number">9</span>
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
                                                        <span class="wizard-number">10</span>
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
                                            <!--begin::Wizard Step 17 Nav-->
                                            <div class="wizard-step" data-wizard-type="step">
                                                <div class="wizard-wrapper">
                                                    <div class="wizard-icon">
                                                        <i class="wizard-check ki ki-check"></i>
                                                        <span class="wizard-number">11</span>
                                                    </div>
                                                    <div class="wizard-label">
                                                        <h3 class="wizard-title">
                                                            Form 11
                                                        </h3>
                                                        <div class="wizard-desc">
                                                            Daftar Risiko Prioritas
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
                                                    HASIL SURVEY
                                                </h3>
                                                <div class="text-muted font-weight-bold font-size-h5">
                                                    PEMERINTAH DAERAH KABUPATEN SUMEDANG
                                                </div>
                                            </div>

                                            <!--end::Title-->
                                            <div class="card card-custom gutter-b">
                                                <div class="card-body">
                                                    <ul class="nav nav-success nav-pills nav-fill">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#hasil_survey_1">Upload Hasil Survey</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#hasil_survey_2">Hasil Survey</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#hasil_survey_3">Sumber Data</a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#hasil_survey_4" tabindex="-1" aria-disabled="true">Hasil Reviu Survey</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content mt-5" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="hasil_survey_1" role="tabpanel" aria-labelledby="hasil_survey_2">
                                                            <?php $this->load->view('form/1a'); ?>

                                                        </div>
                                                        <div class="tab-pane fade" id="hasil_survey_2" role="tabpanel" aria-labelledby="hasil_survey_2">
                                                            <?php $this->load->view('form/1a1'); ?>

                                                        </div>
                                                        <div class="tab-pane fade" id="hasil_survey_3" role="tabpanel" aria-labelledby="hasil_survey_3">
                                                            <?php $this->load->view('form/1b'); ?>

                                                        </div>
                                                        <div class="tab-pane fade" id="hasil_survey_4" role="tabpanel" aria-labelledby="hasil_survey_4">
                                                            <?php $this->load->view('form/1c'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end: Wizard Step 1-->
                                        <!--begin: Wizard Step 2-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    PENETAPAN KONTEKS
                                                </h3>
                                            </div>
                                            <!--end::Title-->
                                            <div class="card card-custom gutter-b">
                                                <div class="card-body">
                                                    <?php if ($sess_opd == '56') : ?>
                                                        <?php $this->load->view('form/2a'); ?>
                                                    <?php else : ?>
                                                        <!--begin::Form Group-->
                                                        <div class="form-group">
                                                            <label class="font-size-h6 font-weight-bolder text-dark">
                                                                Nama Pemda *
                                                            </label>
                                                            <input type="text" name="pemda" class="form-control h-auto p-3 border-0 rounded-lg font-size-h6 pemda" value="<?= $namaPemda ?>" readonly />

                                                        </div>
                                                        <!--end::Form Group-->

                                                        <!--begin::Form Group-->
                                                        <div class="form-group">
                                                            <label class="font-size-h6 font-weight-bolder text-dark">
                                                                Tahun Penilaian *
                                                            </label>
                                                            <input type="number" maxlength="4" class="form-control h-auto p-3 border-0 rounded-lg font-size-h6 tahun" readonly />
                                                        </div>
                                                        <!--end::Form Group-->

                                                        <!--begin::Form Group-->
                                                        <div class="form-group">
                                                            <label class="font-size-h6 font-weight-bolder text-dark">
                                                                Periode yang dinilai *
                                                            </label>
                                                            <input type="text" class="form-control h-auto p-3 border-0 rounded-lg font-size-h6 rpjmd" value="" readonly />
                                                        </div>
                                                        <!--end::Form Group-->

                                                        <!--begin::Form Group-->
                                                        <div class="form-group">
                                                            <label class="font-size-h6 font-weight-bolder text-dark">
                                                                OPD yang dinilai *
                                                            </label>
                                                            <input type="text" class="form-control form-control-solid h-auto p-3 border-0 rounded-lg font-size-h6" value="<?= $namaOpd ?>" readonly />

                                                        </div>
                                                        <!--end::Form Group-->

                                                        <!--begin::Form Group-->
                                                        <div class="form-group">
                                                            <label class="font-size-h6 font-weight-bolder text-dark">
                                                                Sumber Data*
                                                            </label>
                                                            <input type="text" name="sumber_data_2b" class="form-control h-auto p-3 border-0 rounded-lg font-size-h6" value="Renstra <?= $namaOpd ?>" />
                                                        </div>
                                                        <!--end::Form Group-->

                                                        <!-- <div class="form-group text-right">

                                                            <button id="btn2b" type="button" class="btn btn-warning font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3">
                                                                <i class="far fa-save"></i>
                                                                Simpan
                                                            </button>
                                                        </div> -->

                                                        <ul class="nav nav-success nav-pills nav-fill">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab" href="#penetapan_kontek_1">1. RISIKO STRATEGIS </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#penetapan_kontek_2">2.RISIKO KEGIATAN </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#penetapan_kontek_3">3.RISIKO SUBKEGIATAN </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#penetapan_kontek_4">4.RISIKO AKTIFITAS </a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content mt-5" id="myTabContent">
                                                            <div class="tab-pane fade show active" id="penetapan_kontek_1" role="tabpanel" aria-labelledby="penetapan_kontek_1">
                                                                <?php $this->load->view('form/2b'); ?>

                                                            </div>
                                                            <div class="tab-pane fade" id="penetapan_kontek_2" role="tabpanel" aria-labelledby="penetapan_kontek_2">
                                                                <?php $this->load->view('form/2c_kegiatan'); ?>
                                                            </div>

                                                            <div class="tab-pane fade" id="penetapan_kontek_3" role="tabpanel" aria-labelledby="penetapan_kontek_3">
                                                                <?php $this->load->view('form/2c_subkegiatan'); ?>
                                                            </div>

                                                            <div class="tab-pane fade" id="penetapan_kontek_4" role="tabpanel" aria-labelledby="penetapan_kontek_4">
                                                                <?php $this->load->view('form/2c_aktifitas'); ?>
                                                            </div>


                                                        </div>

                                                    <?php endif ?>

                                                </div>
                                            </div>
                                        </div>
                                        <!--end: Wizard Step 2-->

                                        <!--begin: Wizard Step 3-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    Identifikasi Risiko Strategis Pemerintah Daerah
                                                </h3>
                                            </div>
                                            <!--end::Title-->
                                            <div class="card card-custom gutter-b">
                                                <div class="card-body">
                                                    <?php if ($sess_opd == '56') : ?>

                                                        <?php $this->load->view('form/3a'); ?>


                                                    <?php else : ?>
                                                        <ul class="nav nav-success nav-pills nav-fill">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab" href="#identifikasi_risk_1">1. RISIKO STRATEGIS </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#identifikasi_risk_2">2.RISIKO KEGIATAN </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#identifikasi_risk_3">3.RISIKO SUB KEGIATAN </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#identifikasi_risk_4">4.RISIKO AKTIFITAS </a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content mt-5" id="myTabContent">
                                                            <div class="tab-pane fade show active" id="identifikasi_risk_1" role="tabpanel" aria-labelledby="identifikasi_risk_1">
                                                                <?php $this->load->view('form/3b'); ?>
                                                            </div>
                                                            <div class="tab-pane fade" id="identifikasi_risk_2" role="tabpanel" aria-labelledby="identifikasi_risk_2">
                                                                <?php $this->load->view('form/3c_kegiatan'); ?>
                                                            </div>
                                                            <div class="tab-pane fade" id="identifikasi_risk_3" role="tabpanel" aria-labelledby="identifikasi_risk_3">
                                                                <?php $this->load->view('form/3c_subkegiatan'); ?>
                                                            </div>
                                                            <div class="tab-pane fade" id="identifikasi_risk_4" role="tabpanel" aria-labelledby="identifikasi_risk_4">
                                                                <?php $this->load->view('form/3c_aktifitas'); ?>
                                                            </div>
                                                        </div>

                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end: Wizard Step 3-->

                                        <!--begin: Wizard Step 11-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    Hasil Analisis Risiko
                                                </h3>
                                            </div>
                                            <!--end::Title-->
                                            <div class="card card-custom gutter-b">
                                                <div class="card-body">
                                                    <?php $this->load->view('form/4'); ?>
                                                </div>
                                            </div>
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
                                            <div class="card card-custom gutter-b">
                                                <div class="card-body">
                                                    <?php $this->load->view('form/5'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end: Wizard Step 12-->

                                        <!--begin: Wizard Step 13-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    <center> Penilaian atas Kegiatan Pengendalian yang Ada dan Masih Dibutuhkan/ RTP atas Kelemahan Lingkungan Pengendalian
                                                        ( RTP atas CEE)</center>
                                                </h3>
                                            </div>
                                            <!--end::Title-->
                                            <div class="card card-custom gutter-b">
                                                <div class="card-body">
                                                    <?php $this->load->view('form/6'); ?>
                                                </div>
                                            </div>

                                        </div>
                                        <!--end: Wizard Step 13-->

                                        <!--begin: Wizard Step 14-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    <center>Penilaian atas Kegiatan Pengendalian yang Ada dan Masih Dibutuhkan
                                                        (RTP atas Hasil Identifikasi Risiko) </center>
                                                </h3>
                                            </div>
                                            <!--end::Title-->
                                            <div class="card card-custom gutter-b">
                                                <div class="card-body">
                                                    <?php $this->load->view('form/7'); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <!--end: Wizard Step 14-->
                                        <!--begin: Wizard Step 14-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Title-->
                                            <div class="pt-10 pb-10 pb-lg-15">
                                                <h3 class="font-weight-bolder text-dark font-size-h2">
                                                    <center>Peta Risiko </center>
                                                </h3>
                                            </div>
                                            <!--end::Title-->
                                            <div class="card card-custom gutter-b">
                                                <div class="card-body">
                                                    <?php $this->load->view('form/7_peta'); ?>

                                                </div>
                                            </div>
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
                                            <div class="card card-custom gutter-b">
                                                <div class="card-body">
                                                    <?php $this->load->view('form/8'); ?>
                                                </div>
                                            </div>
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
                                            <div class="card card-custom gutter-b">
                                                <div class="card-body">
                                                    <?php $this->load->view('form/9'); ?>
                                                </div>
                                            </div>

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
                                            <div class="card card-custom gutter-b">
                                                <div class="card-body">
                                                    <?php $this->load->view('form/10'); ?>
                                                </div>
                                            </div>

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

                                            <?php $this->load->view('form/11'); ?>

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

    <?php $this->load->view('form/modalUmum'); ?>
    <?php $this->load->view('form/modal1b'); ?>
    <?php $this->load->view('form/modal1c'); ?>
    <?php $this->load->view('form/modal2a'); ?>
    <?php $this->load->view('form/modal2b'); ?>
    <?php $this->load->view('form/modal2bPengelola'); ?>

    <!-- Kegiatan -->
    <?php $this->load->view('form/modal2c'); ?>
    <!-- Sub Kegiatan -->
    <?php $this->load->view('form/modal2c_subkegiatan'); ?>
    <!-- Aktifitas -->
    <?php $this->load->view('form/modal2c_aktifitas'); ?>

    <?php $this->load->view('form/modal2cPengelola1'); ?>
    <?php $this->load->view('form/modal2cPengelola2'); ?>
    <?php $this->load->view('form/modal2cPengelola3'); ?>
    <?php $this->load->view('form/modal2cPengelola4'); ?>

    <?php $this->load->view('form/modal3a'); ?>
    <?php $this->load->view('form/modal3b'); ?>
    <?php $this->load->view('form/modal3c'); ?>
    <?php $this->load->view('form/modal4_pemda'); ?>
    <?php $this->load->view('form/modal4_opd'); ?>
    <?php $this->load->view('form/modal4_operasional'); ?>
    <?php $this->load->view('form/modal6'); ?>

    <?php $this->load->view('form/modal7_pemda'); ?>
    <?php $this->load->view('form/modal7_opd'); ?>
    <?php $this->load->view('form/modal7_operasional'); ?>

    <?php $this->load->view('form/modal8_pemda'); ?>
    <?php $this->load->view('form/modal8_opd'); ?>
    <?php $this->load->view('form/modal8_operasional'); ?>

    <?php $this->load->view('form/modal9_pemda'); ?>
    <?php $this->load->view('form/modal9_opd'); ?>
    <?php $this->load->view('form/modal9_operasional'); ?>
    <?php $this->load->view('form/modalPrint'); ?>
    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Up-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"></rect>
                    <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"></path>
                </g>
            </svg><!--end::Svg Icon--></span>
    </div>
    <ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">

        <!--begin::Item-->
        <li class="nav-item mb-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="Informasi Umum Pemda & OPD">
            <button onclick="modal_umum_show()" class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary">
                <i class="flaticon2-gear"></i>
            </button>
        </li>
        <!--end::Item-->


    </ul>
    <!--end::Main-->
</body>
<!--begin::Global Config(global config for global JS scripts)-->


<!--end::Global Config-->

<?php $this->load->view('form/js7_peta'); ?>
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
<!-- load JS -->
<?php $this->load->view('form/js1a'); ?>
<!-- SUMBER DATA -->
<?php $this->load->view('form/js1b'); ?>
<!-- REVIU HASIL -->
<?php $this->load->view('form/js1c'); ?>
<!-- INFORMASI UMUM PEMDA -->
<?php $this->load->view('form/js2a'); ?>
<!-- INFORMASI SOP OPD -->
<?php $this->load->view('form/js2b'); ?>
<!-- INFORMASI PROGRAM OPD -->
<?php $this->load->view('form/js2c'); ?>
<!-- IDENTIFIKASI RISK PEMDA -->
<?php $this->load->view('form/js3a'); ?>
<!-- IDENTIFIKASI RISK STRATEGIS OPD -->
<?php $this->load->view('form/js3b'); ?>
<!-- IDENTIFIKASI OPERARIONAL OPD -->
<?php $this->load->view('form/js3c'); ?>
<!-- ANALISIS RISIKO -->
<?php $this->load->view('form/js4'); ?>
<!-- SKALA PRIORITAS RISIKO -->
<?php $this->load->view('form/js5'); ?>
<!-- RTP ATAS CEE -->
<?php $this->load->view('form/js6'); ?>
<!-- RTP atas Hasil Identifikasi Risiko -->
<?php $this->load->view('form/js7'); ?>

<?php $this->load->view('form/js8'); ?>
<?php $this->load->view('form/js9'); ?>
<?php $this->load->view('form/js10'); ?>




<script>
    var time;

    const loadUrusan = () => {
        $('[name="urusan_pemda"]').html('')
        $('[name="urusan_opd"]').html('')

        $.ajax({
            type: "get",
            url: '<?= base_url('form/Form2a/get_urusan') ?>',
            dataType: "html",
            success: function(response) {
                $('[name="urusan_pemda"]').html(response)
                $('[name="urusan_opd"]').html(response)

            }
        });
    }
    loadUrusan();
    modal_umum_show();
    $('.summernote').summernote({
        height: 150,
        // toolbar: false,
        toolbar: [
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
        ],
    });

    function printElement() {
        var divContents = document.getElementsByClassName("printPreview")[0].innerHTML;
        var a = window.open('', '', 'height=500, width=500');
        a.document.write('<html>');
        a.document.write('<body>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }

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
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    function modal_umum_show() {

        $('.modal-title').text('Informasi Umum Strategis Pemda dan OPD');
        $('#modal_form_umum').modal('show');
        $('#modal_form_umum').modal({
            backdrop: 'static',
            keyboard: false
        })
    }
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
                                id_opd: $('[name=id]').val(),
                                id_rpjmd: res.id
                            },
                            dataType: "html",
                            success: function(response) {
                                $('#responden').html(response);
                                $('.export-1a1').show();
                                reloadAllTable();
                            }
                        });

                    } else {
                        $('.export-1a1').hide();
                        toastr.error('Tidak di temukan RPJMD');

                    }
                }
            });
        }, 500);
    }
    const reloadAllTable = () => {
        reload_table1b();
        reload_table1c();
        reload_table2a();
        reload_table3a();
        reload_table3b();
        reload_table3c();
        reload_iku_opd();
        reload_output_opd();
        reload_table_4_pemda();
        reload_table_4_opd();
        reload_table_4_operasional();
        reload_table_6();

        reload_table_7_pemda();
        reload_table_7_opd();
        reload_table_7_operasional();

        reload_table_8_pemda();
        reload_table_8_opd();
        reload_table_8_operasional();
        reload_table_9_pemda();
        reload_table_9_opd();
        reload_table_9_operasional();
    }


    const changeRpjmd = (value) => {
        updateData();
        <?php if ($sess_opd == 56) : ?>
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
                    $('.misi , .sasaran , .tujuan , #select_tujuan_opd').html('');
                    $('#select_tujuan_pemda').append('<option value="">Pilih Tujuan</option>');
                    $.each(res.misi, function(i, value) {
                        $('.misi').append('<p style="margin:0px;">' + value.no_urut + '.' + value.misi + '</p>')
                    });
                    $.each(res.sasaran, function(i, value) {
                        // $('.sasaran').append('<p style="margin:0px;">' + value.no_urut + '.' + value.sasaran + '</p>')
                    });
                    $.each(res.tujuan, function(i, value) {
                        $('#select_tujuan_pemda').append('<option value="' + value.id + '">' + value.no_urut + '.' + value.tujuan + '</option>')
                        // $('.tujuan').append('<p style="margin:0px;">' + value.no_urut + '.' + value.tujuan + '</p>')
                    });

                }
            });
        <?php else : ?>
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
        <?php endif ?>
    }
</script>

<!--end::Page Scripts-->
</body>

<!--end::Body-->

</html>