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
    $('.select2').select2();
    const changeTahun = (e) => {
        console.log(e.value)
        $('.tahun').val(e.value)
    }

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
                            </div>
                        </div>`;
        parent.insertAdjacentHTML('beforeend', child);
    }
</script>
<!--end::Page Scripts-->
</body>

<!--end::Body-->

</html>