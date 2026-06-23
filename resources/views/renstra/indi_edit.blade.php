@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col col-title">
        <h2>Update Indikator</h2>
        <p class='fw-bold'>{{ $master_ik }}</p>
    </div>
</div>
    {{-- dismissible flash message --}}
    <div id="alert-phi" class="alert alert-success alert-dismissible fade d-none" role="alert">
        <p id="alert-message"></p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

     <div class="row">
        <div class="col-sm-6 mx-auto">
            <form action="#" method="post" id="form-indi">
                @csrf
                @method('PATCH')
                <div class="form-group mb-2">
                    <label for="master_ik">Master IK</label>
                    <input type="text" name="master_ik" id="master_ik" class="form-control" value="{{ $master_ik }}" readonly>
                </div>
                <div class="form-group mb-2">
                    <label for="indikator">Indikator</label>
                    <textarea name="indikator" id="indikator" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="satuan">Satuan</label>
                    <input type="text" name="satuan" id="satuan" class="form-control">
                </div>
                {{-- inline block --}}
                <p class="mb-0">Hasil</p>
                <div class="row">
                    <div class="col form-group mb2">
                        <p class="fw-bold">Target</p>
                    </div>
                    <div class="col form-group mb-2">
                        <label for="baseline">Baseline</label>
                        <input type="number" name="baseline" id="baseline" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t1">2026</label>
                        <input type="number" name="t1" id="t1" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t2">2027</label>
                        <input type="number" name="t2" id="t2" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t3">2028</label>
                        <input type="number" name="t3" id="t3" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t4">2029</label>
                        <input type="number" name="t4" id="t4" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t5">2030</label>
                        <input type="number" name="t5" id="t5" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group mb2">
                        <p class="fw-bold">Capaian</p>
                    </div>
                    <div class="col form-group mb-2">
                        <input type="number" name="cbaseline" id="cbaseline" class="form-control" disabled>
                    </div>
                    <div class="col form-group mb-2">
                        <input type="number" name="ct1" id="ct1" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <input type="number" name="ct2" id="ct2" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <input type="number" name="ct3" id="ct3" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <input type="number" name="ct4" id="ct4" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <input type="number" name="ct5" id="ct5" class="form-control">
                    </div>
                </div>

                <p class="mb-0">Anggaran</p>
                <div class="row">
                    <div class="col form-group mb2">
                        <p class="fw-bold">Target</p>
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t1">2026</label>
                        <input type="number" name="vat1" id="vat1" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t2">2027</label>
                        <input type="number" name="vat2" id="vat2" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t3">2028</label>
                        <input type="number" name="vat3" id="vat3" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t4">2029</label>
                        <input type="number" name="vat4" id="vat4" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t5">2030</label>
                        <input type="number" name="vat5" id="vat5" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group mb2">
                        <p class="fw-bold">Capaian</p>
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t1">2026</label>
                        <input type="number" name="cat1" id="cat1" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t2">2027</label>
                        <input type="number" name="cat2" id="cat2" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t3">2028</label>
                        <input type="number" name="cat3" id="cat3" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t4">2029</label>
                        <input type="number" name="cat4" id="cat4" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t5">2030</label>
                        <input type="number" name="cat5" id="cat5" class="form-control">
                    </div>
                </div>
{{-- 
                <div class="form-group mb-2">
                    <label for="iku_alasan">IKU Alasan</label>
                    <textarea name="iku_alasan" id="iku_alasan" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="iku_formulasi">IKU Formulasi</label>
                    <textarea name="iku_formulasi" id="iku_formulasi" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="iku_tipehitung">IKU Tipe Hitung</label>
                    <input type="text" name="iku_tipehitung" id="iku_tipehitung" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <label for="iku_do">IKU DO</label>
                    <textarea name="iku_do" id="iku_do" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="iku_sumberdata">IKU Sumber Data</label>
                    <textarea name="iku_sumberdata" id="iku_sumberdata" class="form-control" rows="3"></textarea>
                </div>
 --}}
                <div class="form-group mt-3 mb-5 d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scriptes')
<script>
$(function () {
    fetch(apiurl + "/get/indikaget/{{ $master_ik }}")
        .then((response) => response.json())
        .then((data) => {
            // console.log(data);
            $("#indikator").val(data.indikator.indikator);
            $("#satuan").val(data.indikator.satuan);
            $("#baseline").val(data.indikator.baseline);
            $("#t1").val(data.indikator.t1);
            $("#t2").val(data.indikator.t2);
            $("#t3").val(data.indikator.t3);
            $("#t4").val(data.indikator.t4);
            $("#t5").val(data.indikator.t5);
            $("#ct1").val(data.indikator.ct1);
            $("#ct2").val(data.indikator.ct2);
            $("#ct3").val(data.indikator.ct3);
            $("#ct4").val(data.indikator.ct4);
            $("#ct5").val(data.indikator.ct5);
            $("#vat1").val(data.budget.t1);
            $("#vat2").val(data.budget.t2);
            $("#vat3").val(data.budget.t3);
            $("#vat4").val(data.budget.t4);
            $("#vat5").val(data.budget.t5);
            $("#cat1").val(data.budget.ct1);
            $("#cat2").val(data.budget.ct2);
            $("#cat3").val(data.budget.ct3);
            $("#cat4").val(data.budget.ct4);
            $("#cat5").val(data.budget.ct5);
        });
});
</script>
<script src="{{ asset('js/updater.js') }}"></script>
@endsection