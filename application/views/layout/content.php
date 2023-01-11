                <?php $this->load->view('layout/head'); ?>

                <!--begin::Body-->

                <body id="kt_body" class="header-fixed header-mobile-fixed">
                    <?php $this->load->view('layout/menu_mobile') ?>

                    <div class="d-flex flex-column flex-root">
                        <!--begin::Page-->
                        <div class="d-flex flex-row flex-column-fluid page">

                            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                                <?php $this->load->view('layout/header'); ?>
                                <!--begin::Content-->
                                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                                    <?php $this->load->view($content) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
                <?php $this->load->view('layout/footer'); ?>