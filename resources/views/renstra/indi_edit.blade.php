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
                <div class="row">
                    <div class=" col form-group mb-2">
                        <label for="baseline">Baseline</label>
                        <input type="number" name="baseline" id="baseline" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t1">T1</label>
                        <input type="number" name="t1" id="t1" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t2">T2</label>
                        <input type="number" name="t2" id="t2" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t3">T3</label>
                        <input type="number" name="t3" id="t3" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t4">T4</label>
                        <input type="number" name="t4" id="t4" class="form-control">
                    </div>
                    <div class="col form-group mb-2">
                        <label for="t5">T5</label>
                        <input type="number" name="t5" id="t5" class="form-control">
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
                <div class="form-group mb-2 d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scriptes')
<script>
$(function () {
    fetch(apiurl + "/get/indikator/{{ $master_ik }}")
        .then((response) => response.json())
        .then((data) => {
            // console.log(data);
            $("#indikator").val(data.indikator);
            $("#satuan").val(data.satuan);
            $("#baseline").val(data.baseline);
            $("#t1").val(data.t1);
            $("#t2").val(data.t2);
            $("#t3").val(data.t3);
            $("#t4").val(data.t4);
            $("#t5").val(data.t5);
        });
});
</script>
<script src="{{ asset('js/updater.js') }}"></script>
@endsection