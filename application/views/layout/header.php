<!--begin::Wrapper-->
<div id="kt_header" class="header header-fixed bg-success">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">

        <!--begin::Header Menu Wrapper-->

        <?php $this->load->view('layout/menu') ?>
        <!--end::Header Menu Wrapper-->
        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::User-->
            <div class="topbar-item">
                <div class="btn btn-icon btn-icon-mobile w-auto btn-success d-flex align-items-center btn-lg px-2" onclick="if (confirm('Anda yakin logout')){return window.location = `<?= base_url('login/out') ?>`;}else{event.stopPropagation(); event.preventDefault();};">

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