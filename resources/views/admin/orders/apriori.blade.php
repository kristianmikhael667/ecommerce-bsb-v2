@extends('layouts.admin')

@section('content')
<div class="container px-5 my-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card border-0 rounded-3 shadow-lg" id="divFormSupp">
                <div class="card-body p-6">
                    <div class="text-center">
                        <div class="h1 fw-light">Proses Apriori </div>
                        <p class="mb-4 text-muted">Setup nilai support & confidence
                        </p>
                    </div>


                    <!-- Name Input -->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="txtName" type="text" placeholder="Name"
                            data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                    </div>

                    {{-- Min. Support --}}
                    <div class="form-floating mb-3">
                        <select class="form-control" id="txtSupport">
                            <option value=''>-- Min Support --</option>

                            <?php
                                $x = 1;
                                for ($x; $x <= 100; $x++) { ?>
                            <option value="<?= $x; ?>">
                                <?= $x; ?>
                            </option>
                            <?php } ?>
                        </select>
                        <small><b style="color: red">Note!!! </b><i>Semakin rendah nilai support akan semakin banyak
                                proses yang mengakibatkan proses
                                apriori menjadi lama</i></small>
                    </div>

                    {{-- Min. Confidence --}}
                    <div class="form-floating mb-3">
                        <select class="form-control" id="txtConfidence">
                            <option value=''>-- Min Confidence --</option>

                            <?php
                                $x = 1;
                                for ($x; $x <= 100; $x++) { ?>
                            <option value="<?= $x; ?>">
                                <?= $x; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Submit success message -->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            <p>To activate this form, sign up at</p>
                            <a
                                href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>

                    <!-- Submit error message -->
                    <div class="d-none" id="submitErrorMessage">
                        <div class="text-center text-danger mb-3">Error sending message!</div>
                    </div>

                    <!-- Submit button -->
                    <div class="d-grid">
                        <a class="btn btn-primary btn-lg" href="javascript:void(0)" onclick="prosesApriori()">Analis</a>
                    </div>
                    <!-- End of contact form -->

                </div>
            </div>
            <div id="divLoadingPengujian" style="text-align: center;margin-bottom:30px;display:none;">
                <img src="{{ asset('backend/img/loading.svg') }}"><br />
                Memproses apriori, akan memakan waktu sesuai dengan banyaknya data yang diproses
            </div>

        </div>
    </div>
</div>

<script>
    const server = "{{ url('') }}/";
    var urlapi = server+ 'admin/apriori/analisa/proses'
    prosesApriori = () => {
        const nama = document.getElementById("txtName").value;
        const support = document.getElementById("txtSupport").value;
        const confidence = document.getElementById("txtConfidence").value;

        const ds = {
            'support' : support,
            'confidence': confidence,
            'nama' : nama
        }
        confirmQuest('info', 'Konfirmasi', 'Mulai analisa penjualan ... ?', function (x) {konfirmasiApriori(ds)});
    }

    function konfirmasiApriori(ds)
    {
        // $("#divFormSupp").hide();
        // $("#divLoadingPengujian").show();
        axios.post(urlapi, ds).then(function(res){
            console.log('msk lah bisa');
            console.log(res.data);
            let kdPengujian = res.data.kdPengujian;
            pesanUmumApp('success', 'Sukses', 'Proses analisa apriori selesai ..');
            window.location.replace(server + 'admin/apriori/analisa/hasil/'+kdPengujian);
        });
    }
</script>
@endsection