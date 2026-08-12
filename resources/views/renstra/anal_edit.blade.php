@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col col-title">
        {{-- <h2>Update Masalah Solusi dan Analisa</h2> --}}
        <h2>Pengukuran Kinerja</h2>
        <p class='fw-bold'>{{ $master_ik }}</p>
    </div>
</div>
    {{-- dismissible flash message --}}
    <div id="alert-phi" class="alert alert-success alert-dismissible fade d-none" role="alert">
        <p id="alert-message"></p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @if ($master_ik == '00-00-00-00-00-00')
        <div class="row mt-5">
            <h5>Pilih Indikator</h5>
            <div class="form-group">
                <input type="text" name="" id="find-indikator" class="form-control" placeholder="Tuliskan beberapa kata awal indikator, lalu tekan enter">
            </div>
        </div>
    @else

    <div class="row mt-5">
        <div class="col-sm-6 mx-auto">
            <form action="#" method="post" id="form-analisa">
                @csrf
                @method('PATCH')
                <div class="form-group mb-3">
                    <label for="master_ik" class="bg-success w-100 text-light p-1">Kode Indikator</label>
                    <input type="text" name="master_ik" id="master_ik" class="form-control" readonly value="{{ $master_ik }}">
                </div>
                <div class="form-group mb-3">
                    <label for="masalah" class="bg-success w-100 text-light p-1">Masalah</label>
                    <textarea name="masalah" id="masalah" rows="8" class="form-control ta-fix"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="solusi" class="bg-success w-100 text-light p-1">Solusi</label>
                    <textarea name="solusi" id="solusi" rows="8" class="form-control ta-fix"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="analisa" class="bg-success w-100 text-light p-1">Analisa</label>
                    <textarea name="analisa" id="analisa" rows="8" class="form-control ta-fix"></textarea>
                </div>
                <div class="form-group mt-3 mb-5 d-flex justify-content-between p-2">
                    <button class="btn btn-danger rounded" id="goback">Kembali</button>
                    <input type="submit" class="btn btn-primary rounded" value="Simpan">
                </div>
            </form>
        </div>
    </div>
    
    @endif
@endsection

@section('scriptes')
<script>
    let mik = "{{ $master_ik }}";
</script>
<script src="{{ asset('js/updater.js') }}"></script>
<script>
    $(function () {
        fetch(apiurl + "/getanalisa/"+mik)
            .then((response) => response.json())
            .then((data) => {
                // console.log(data);
                $("#masalah").val(data.data.masalah);
                $("#solusi").val(data.data.solusi);
                $("#analisa").val(data.data.analisa);
            });
    });
    $("#goback").on("click",function(){
        history.go(-1);
    })

</script>

@endsection