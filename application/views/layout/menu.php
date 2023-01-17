<?php
$segment = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);
$segment3 = $this->uri->segment(3);


?>
<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
    <!--begin::Header Menu-->


    <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default mx-auto">

        <!--begin::Header Nav-->
        <ul class="menu-nav">
            <li class="menu-item <?= $segment == 'panel' ? 'menu-item-active' : '' ?>" data-menu-toggle="click" aria-haspopup="true">
                <a href="<?= base_url('panel') ?>" class="menu-link menu-toggle">

                    <span class="menu-text text-darken">Dashboard </span>

                </a>
            </li>
            <li class="menu-item <?= $segment == 'rpjmd' ? 'menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-active' : '' ?>" data-menu-toggle="click" aria-haspopup="true">

                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="menu-text">Strategis Pemda </span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                    <ul class="menu-subnav">
                        <li class="menu-item <?= $segment == 'rpjmd' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
                            <a href="<?= base_url('rpjmd') ?>" class="menu-link">
                                <span class="menu-text">RPJMD</span>
                            </a>
                        </li>
                        <li class="menu-item <?= $segment == 'misi' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
                            <a href="<?= base_url('misi') ?>" class="menu-link">

                                <span class="menu-text">Misi</span>
                            </a>
                        </li>
                        <li class="menu-item <?= $segment == 'tujuan' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
                            <a href="<?= base_url('tujuan') ?>" class="menu-link">

                                <span class="menu-text">Tujuan</span>
                            </a>
                        </li>
                        <li class="menu-item <?= $segment == 'sasaran' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
                            <a href="<?= base_url('sasaran') ?>" class="menu-link">

                                <span class="menu-text">Sasaran</span>
                            </a>
                        </li>



                    </ul>
                </div>
            </li>

            <li class="menu-item <?= $segment == 'opd' ? 'menu-item-active' : '' ?>" aria-haspopup="true">
                <a href="<?= base_url('opd') ?>" class="menu-link">
                    <span class="menu-text">OPD</span>
                </a>
            </li>
            <li class="menu-item menu-item-submenu  <?= $segment == 'kriteria' ? 'menu-item-active' : '' ?>" data-menu-toggle="click" aria-haspopup="true">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="menu-text">Parameter Kriteria</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu menu-submenu-fixed menu-submenu-left" style="width:1000px" data-hor-direction="menu-submenu-left">
                    <div class="menu-subnav">
                        <ul class="menu-content">
                            <li class="menu-item">
                                <h3 class="menu-heading menu-toggle">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Kriteria</span>
                                    <i class="menu-arrow"></i>
                                </h3>
                                <ul class="menu-inner">
                                    <li class="menu-item  <?= $segment2 == 'kemungkinan' ? 'menu-item-active' : '' ?> " aria-haspopup="true">
                                        <a href="<?= base_url('kriteria/kemungkinan') ?>" class="menu-link">
                                            <span class="menu-text">Kemungkinan</span>
                                        </a>
                                    </li>
                                    <li class="menu-item  <?= $segment2 == 'kerugian_negara' ? 'menu-item-active' : '' ?> " aria-haspopup="true">
                                        <a href="<?= base_url('kriteria/kerugian_negara') ?>" class="menu-link">
                                            <span class="menu-text">Dampak Kerugian Negara</span>
                                        </a>
                                    </li>
                                    <li class="menu-item  <?= $segment2 == 'penurunan_reputasi' ? 'menu-item-active' : '' ?> " aria-haspopup="true">
                                        <a href="<?= base_url('kriteria/penurunan_reputasi') ?>" class="menu-link">
                                            <span class="menu-text">Dampak Penurunan Reputasi</span>
                                        </a>
                                    </li>
                                    <li class="menu-item  <?= $segment2 == 'penurunan_kinerja' ? 'menu-item-active' : '' ?> " aria-haspopup="true">
                                        <a href="<?= base_url('kriteria/penurunan_kinerja') ?>" class="menu-link">
                                            <span class="menu-text">Dampak Penurunan Kinerja</span>
                                        </a>
                                    </li>
                                    <li class="menu-item  <?= $segment2 == 'gangguan_pelayanan' ? 'menu-item-active' : '' ?> " aria-haspopup="true">
                                        <a href="<?= base_url('kriteria/gangguan_pelayanan') ?>" class="menu-link">
                                            <span class="menu-text">Dampak Gangguan Terhadap Layanan</span>
                                        </a>
                                    </li>
                                    <li class="menu-item  <?= $segment2 == 'tuntutan_hukum' ? 'menu-item-active' : '' ?> " aria-haspopup="true">
                                        <a href="<?= base_url('kriteria/tuntutan_hukum') ?>" class="menu-link">
                                            <span class="menu-text">Dampak Tuntutan Hukum</span>
                                        </a>
                                    </li>
                                    <li class="menu-item  <?= $segment2 == 'kategori_risiko' ? 'menu-item-active' : '' ?> " aria-haspopup="true">
                                        <a href="<?= base_url('kriteria/kategori_risiko') ?>" class="menu-link">
                                            <span class="menu-text">Kategori Risiko</span>
                                        </a>
                                    </li>
                                    <li class="menu-item  <?= $segment2 == 'sumber_risiko' ? 'menu-item-active' : '' ?> " aria-haspopup="true">
                                        <a href="<?= base_url('kriteria/sumber_risiko') ?>" class="menu-link">
                                            <span class="menu-text">Sumber Risiko</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </li>
        </ul>
        <!--end::Header Nav-->
    </div>
    <!--end::Header Menu-->
</div>