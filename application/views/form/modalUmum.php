<div class="modal fade" id="modal_form_umum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">

                <form id="form_umum" novalidate="novalidate" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                            Urusan Pemerintahan *
                        </label>
                        <div class="col-12">
                            <select name="urusan_pemda" id="urusan_pemda" class="form-control h-auto p-2 font-size-h6 urusan_pemda">
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="form-group row">
                        <label class="font-size-h6 font-weight-bolder text-dark col-form-label col-12 ">
                            Tahun Penilaian *
                        </label>
                        <div class="col-12">
                            <input class="form-control h-auto p-2 font-size-h6 tahun" maxlength="4" max="9999" onkeyup="changeTahun(this)" autofocus placeholder="silahkan masukan tahun penilaian">
                        </div>
                    </div>
                    <!--begin::Form Group-->

                </form>
            </div>

        </div>
    </div>
</div>